<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Sports;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function index()
{
    $sports = Sports::all();
    return view('public.pages.sports', compact('sports'));
}

}
