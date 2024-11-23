<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * عرض جميع الحيوانات مع دعم البحث.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // استلام كلمة البحث من المستخدم
        $search = $request->input('search');
        
        // استعلام لجلب الحيوانات مع دعم البحث في name, type, breed, age, special_needs
        $pets = Pet::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('type', 'like', '%' . $search . '%')
                    ->orWhere('breed', 'like', '%' . $search . '%')
                    ->orWhere('special_needs', 'like', '%' . $search . '%');
            })
            ->paginate(10); // التصفح عبر الصفحات

        // إرجاع العرض مع البيانات
        return view('pets.index', compact('pets', 'search'));
    }

    /**
     * عرض صفحة إضافة حيوان أليف جديد.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * تخزين حيوان أليف جديد.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|numeric|min:0',
            'special_needs' => 'nullable|string',
        ]);

        // إنشاء حيوان أليف جديد
        Pet::create([
            'name' => $request->name,
            'type' => $request->type,
            'breed' => $request->breed,
            'age' => $request->age,
            'special_needs' => $request->special_needs,
            'user_id' => auth()->id(), // تعيين المستخدم الحالي
        ]);

        // إعادة التوجيه إلى صفحة القائمة مع رسالة نجاح
        return redirect()->route('pets.index')->with('success', 'Pet added successfully.');
    }

    /**
     * عرض صفحة تعديل حيوان أليف.
     *
     * @param \App\Models\Pet $pet
     * @return \Illuminate\View\View
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
    }

    /**
     * تحديث بيانات حيوان أليف.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pet $pet
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Pet $pet)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|numeric|min:0',
            'special_needs' => 'nullable|string',
        ]);

        // تحديث بيانات الحيوان الأليف
        $pet->update($validated);

        // إعادة التوجيه إلى صفحة القائمة مع رسالة نجاح
        return redirect()->route('pets.index')->with('success', 'Pet updated successfully.');
    }

    /**
     * حذف حيوان أليف.
     *
     * @param \App\Models\Pet $pet
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully.');
    }
}
