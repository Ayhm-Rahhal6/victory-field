<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FieldController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $fields = Field::latest()->paginate(10);
        return view('admin.fields.index', compact('fields'));
    }

    public function create()
    {
        return view('admin.fields.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sport_type' => 'required|string|max:255',
            'location' => 'required|url', 
            'price_per_hour' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('fields', 'public');
        }

        Field::create($data);

        return redirect()->route('admin.fields.index')
                        ->with('success', 'Field created successfully');
    }

    public function show(Field $field)
    {
        return view('admin.fields.show', compact('field'));
    }

    public function edit(Field $field)
    {
        return view('admin.fields.edit', compact('field'));
    }

    public function update(Request $request, Field $field)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sport_type' => 'required|string|max:255',
            'location' => 'required|url',
            'price_per_hour' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $field->name = $validated['name'];
        $field->sport_type = $validated['sport_type'];
        $field->location = $validated['location'];
        $field->price_per_hour = $validated['price_per_hour'];
        $field->description = $validated['description'];

        if ($request->hasFile('image')) {
            if ($field->image) {
                Storage::disk('public')->delete($field->image);
            }
            $field->image = $request->file('image')->store('fields', 'public');
        }

        $field->save();

        return redirect()->route('admin.fields.index')
                        ->with('success', 'Field updated successfully');
    }
    public function destroy(Field $field)
    {
        if ($field->image) {
            Storage::disk('public')->delete($field->image);
        }
        
        $field->delete();

        return redirect()->route('admin.fields.index')
                        ->with('success', 'Field deleted successfully');
    }
}