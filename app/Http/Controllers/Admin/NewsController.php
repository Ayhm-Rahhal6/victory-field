<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'source' => 'required|string|max:255',
        ]);

        $data = $request->except(['image', 'logo']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news/images', 'public');
        }

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('news/logos', 'public');
        }

        News::create($data);

        return redirect()->route('admin.news.index')
                        ->with('success', 'News created successfully');
    }

    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'source' => 'required|string|max:255',
        ]);

        $data = $request->except(['image', 'logo']);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news/images', 'public');
        }

        if ($request->hasFile('logo')) {
            if ($news->logo) {
                Storage::disk('public')->delete($news->logo);
            }
            $data['logo'] = $request->file('logo')->store('news/logos', 'public');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')
                        ->with('success', 'News updated successfully');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        
        if ($news->logo) {
            Storage::disk('public')->delete($news->logo);
        }

        $news->delete();

        return redirect()->route('admin.news.index')
                        ->with('success', 'News deleted successfully');
    }
}