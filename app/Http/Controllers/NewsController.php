<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\News;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
{
    $news = News::all();
    return view('welcome', compact('news'));
}

}
