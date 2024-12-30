<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * عرض جميع الغرف مع دعم البحث.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // استلام كلمة البحث من المستخدم
        $search = $request->input('search');
        
        // استعلام لجلب الغرف مع دعم البحث في name, type, description
        $rooms = Room::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('type', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->paginate(5); // التصفح عبر الصفحات

        // إرجاع العرض مع البيانات
        return view('rooms.index', compact('rooms', 'search'));
    }

    /**
     * عرض صفحة إضافة غرفة جديدة.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * تخزين غرفة جديدة.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_night' => 'required|numeric|min:0',
            'is_available' => 'required|boolean',
        ]);

        // إنشاء غرفة جديدة
        Room::create([
            'name' => $request->name,
            'description' => $request->description,
            'price_per_night' => $request->price_per_night,
            'is_available' => $request->is_available,
        ]);

        // إعادة التوجيه إلى صفحة القائمة مع رسالة نجاح
        return redirect()->route('rooms.index')->with('success', 'Room added successfully.');
    }

    /**
     * عرض صفحة تعديل غرفة.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\View\View
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    /**
     * تحديث بيانات غرفة.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Room $room)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_night' => 'required|numeric|min:0',
            'is_available' => 'required|boolean',
        ]);

        // تحديث بيانات الغرفة
        $room->update($validated);

        // إعادة التوجيه إلى صفحة القائمة مع رسالة نجاح
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    /**
     * حذف غرفة.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
