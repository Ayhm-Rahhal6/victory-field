<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $reservations = Reservation::with(['user:id,name,phone_number', 'field:id,name,sport_type'])
            ->select('id', 'user_id', 'field_id', 'start_time', 'end_time', 'total_hours', 'total_price', 'created_at')
            ->latest()
            ->paginate(10);

        return view('admin.reservations.index', compact('reservations'));
    }
}