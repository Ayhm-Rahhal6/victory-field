<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function contact(){
        return view('public.pages.contact-us');
    }

    public function about(){
        return view('public.pages.about-us');
    }

    public function sports(){
        return view('public.pages.sports');
    }

    public function reservation(){
        return view('public.pages.reservation');
    }


}
