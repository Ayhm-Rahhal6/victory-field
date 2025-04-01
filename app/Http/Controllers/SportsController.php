<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function index()
{
    $sports = Sport::all();
    return view('public.pages.sports', compact('sports'));
}

}
