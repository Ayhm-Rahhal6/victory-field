<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Contact;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        $usersCount = User::count();
        $reservationsCount = Reservation::count();
        $contactsCount = Contact::count();

        return view('welcome', compact('news', 'usersCount', 'reservationsCount', 'contactsCount'));
    }
}
