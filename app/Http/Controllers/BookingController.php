<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * عرض جميع الحجوزات مع دعم البحث.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // استلام كلمة البحث من المستخدم
        $search = $request->input('search');
        
        // استعلام لجلب الحجوزات مع دعم البحث في user, pet, room, status
        $bookings = Booking::query()
            ->when($search, function ($query, $search) {
                // البحث بناءً على user (اسم المستخدم)
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })
                // البحث بناءً على pet (اسم الحيوان الأليف)
                ->orWhereHas('pet', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })
                // البحث بناءً على room (اسم الغرفة)
                ->orWhereHas('room', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })
                // البحث بناءً على status (الحالة)
                ->orWhere('status', 'like', '%' . $search . '%');
            })
            // تحميل العلاقات الخاصة بالـ user, pet, room
            ->with(['user', 'pet', 'room'])
            ->paginate(10);

        // إرجاع العرض مع البيانات
        return view('bookings.index', compact('bookings', 'search'));
    }

    /**
     * عرض نموذج إضافة حجز جديد.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('bookings.create');
    }

    /**
     * تخزين حجز جديد في قاعدة البيانات.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'pet_id' => 'required|exists:pets,id',
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|string|in:pending,confirmed,cancelled',
        ]);

        // إنشاء حجز جديد
        Booking::create($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }

    /**
     * عرض نموذج تعديل الحجز.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\View\View
     */
    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    /**
     * تحديث حجز موجود في قاعدة البيانات.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'pet_id' => 'required|exists:pets,id',
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|string|in:pending,confirmed,cancelled',
        ]);

        // تحديث الحجز
        $booking->update($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully!');
    }

    /**
     * حذف حجز.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Booking $booking)
    {
        // حذف الحجز
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully!');
    }
}
