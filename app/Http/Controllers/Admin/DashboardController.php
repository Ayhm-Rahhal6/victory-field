<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Field;
use App\Models\Sport;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $reservationsCount = Reservation::count(); 
        $usersCount = User::count(); 
        $fieldsCount = Field::count();
        $totalRevenue = Reservation::sum('total_price');
        $netProfit = $reservationsCount * 5;
        $sportsCount = Sport::count();
        return view('dashboard', compact('usersCount', 'reservationsCount', 'fieldsCount', 'totalRevenue', 'netProfit', 'sportsCount'));    
    }
}