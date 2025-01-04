<?php
namespace App\Http\Controllers\custumer;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingsController extends Controller
{

    public function show($room_id)
    {
        $room = Room::findOrFail($room_id);
        $user = auth()->user();
        $pets = Pet::where('user_id', $user->id)->get();

        // dd($pets);
        
        return view('custumer.checkout', compact('room', 'user', 'pets'));
    }
    public function create(Room $room)
    {
        $pets = auth()->user()->pets;
        return view('custumer.create', compact('room'));
    }

    public function store(Request $request, Room $room)
    {
        // dd($room);
        // التحقق من صحة البيانات الأساسية
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
    
        // التحقق من تسجيل الدخول
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً.');
        }
    
        $petId = null; // متغير لتخزين معرف الحيوان
    
        try {
            if ($request->pet_option === 'new_pet') {
                // التحقق من صحة البيانات المدخلة للحيوان الجديد
                $request->validate([
                    'new_pet_name' => 'required|string|max:255',
                    'new_pet_age' => 'required|integer|min:0',
                    'new_pet_image' =>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'new_pet_breed' => 'required|string|max:255',
                ]);
    
                // حفظ الصورة في المجلد storage/app/public/pets

                if ($request->hasFile('new_pet_image')) {
                    $imagePath = $request->file('new_pet_image')->store('pets', 'public'); // رفع الصورة إلى مجلد "pets" داخل التخزين العام
                }else {
                    $imagePath = null;
                }
                // إنشاء حيوان جديد
                $pet = Pet::create([
                    'user_id' => auth()->id(),
                    'name' => $request->new_pet_name,
                    'age' => $request->new_pet_age,
                    'image' => $imagePath,
                    'breed' => $request->new_pet_breed,
                    'type' => 'cat',
                ]);
    
                // تخزين معرف الحيوان الجديد
                $petId = $pet->id;
    
            } elseif ($request->pet_option === 'existing_pet') {
                // التحقق من اختيار حيوان موجود
                $request->validate([
                    'pet_id' => 'required|exists:pets,id',
                ]);
    
                // تخزين معرف الحيوان المحدد
                $petId = $request->pet_id;
    
            } else {
                // في حالة عدم اختيار أي خيار
                return redirect()->back()->with('error', 'الرجاء اختيار حيوان أو إضافة حيوان جديد.');
            }
    
            // حساب السعر بناءً على عدد الأيام
            $startDate = Carbon::parse($request->start_date);
            $endDate = Carbon::parse($request->end_date);
            $totalDays = $endDate->diffInDays($startDate);
            $totalPrice = $totalDays * $room->price_per_night;
    
            // إنشاء الحجز
            Booking::create([
                'user_id' => auth()->id(), // معرف المستخدم الحالي
                'pet_id' => $petId,        // معرف الحيوان (سواء كان جديدًا أو موجودًا)
                'room_id' => $room->id,    // معرف الغرفة
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'total_price' => $totalPrice, // السعر المحسوب
            ]);
            $room->is_available = false;
            $room->save();
    
            return redirect()->route('booking.success')->with('success', 'Booking confirmed successfully!');
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء الحجز: ' . $e->getMessage());
        }
    }
    }

