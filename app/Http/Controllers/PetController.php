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
            ->paginate(4); // التصفح عبر الصفحات

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
            'age' => 'required|integer|min:0',
            'special_needs' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // تجهيز البيانات
        $data = $validated;
        $data['user_id'] = auth()->id(); // تعيين المستخدم الحالي

        // التحقق من وجود ملف صورة ورفعه
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('pets', 'public'); // رفع الصورة إلى مجلد "pets" داخل التخزين العام
        }else {
            $data['image'] = null;
        }
        // dd($request->hasFile('image'));

        // إنشاء حيوان أليف جديد
        Pet::create($data);

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
            'age' => 'required|integer|min:0',
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
