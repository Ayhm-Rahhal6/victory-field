<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SportController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $sports = Sport::latest()->paginate(10);
        return view('admin.sports.index', compact('sports'));
    }

    public function create()
    {
        return view('admin.sports.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description_info' => 'required|string',
        'description_rule' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'link_info' => 'nullable|url',
        'link_rule' => 'nullable|url'
    ]);

    // معالجة الصورة إذا وجدت
    if($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('sports', 'public');
    }

    Sport::create($validated);

    return redirect()->route('admin.sports.index')
                   ->with('success', 'تمت إضافة الرياضة بنجاح');
}
    public function show(Sport $sport)
    {
        return view('admin.sports.show', compact('sport'));
    }

    public function edit(Sport $sport)
    {
        return view('admin.sports.edit', compact('sport'));
    }

    public function update(Request $request, Sport $sport)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description_info' => 'required|string',
            'description_rule' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link_info' => 'nullable|url',
            'link_rule' => 'nullable|url',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا وجدت
            if ($sport->image) {
                Storage::disk('public')->delete($sport->image);
            }
            $data['image'] = $request->file('image')->store('sports', 'public');
        }

        $sport->update($data);

        return redirect()->route('admin.sports.index')
                        ->with('success', 'Sport updated successfully');
    }

    public function destroy(Sport $sport)
    {
        if ($sport->image) {
            Storage::disk('public')->delete($sport->image);
        }
        
        $sport->delete();

        return redirect()->route('admin.sports.index')
                        ->with('success', 'Sport deleted successfully');
    }
}