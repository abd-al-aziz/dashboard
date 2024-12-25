<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $adoptions = Adoption::query()
            ->when($search, function ($query, $search) {
                $query->where('is_adopted', '0' );
                     
            })
            ->paginate(8);

        return view('adoption.index', compact('adoptions', 'search'));
    }

    public function create()
    {
        return view('adoption.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'color' => 'required|string|max:255',
            'personality' => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('adoptions', 'public');
        }

        $data['user_id'] = auth()->id();
        Adoption::create($data);

        return redirect()->route('adoption.index')->with('success', 'Adoption request added successfully.');
    }

    public function edit(Adoption $adoption)
    {
        return view('adoption.edit', compact('adoption'));
    }

    public function update(Request $request, Adoption $adoption)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'color' => 'required|string|max:255',
            'personality' => 'required|string',
        ]);

        $data = $validated;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('adoptions', 'public');
        }

        $adoption->update($data);

        return redirect()->route('adoption.index')->with('success', 'Adoption request updated successfully.');
    }

    public function destroy(Adoption $adoption)
    {
        $adoption->delete();
        return redirect()->route('adoption.index')->with('success', 'Adoption request deleted successfully.');
    }
    public function requestAdoption(Adoption $adoption)
{
    $adoption->update(['is_adopted' => true]);
    return redirect()->back()->with('success', 'Adoption request submitted successfully.');
}
}
