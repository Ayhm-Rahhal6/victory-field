<?php

namespace App\Http\Controllers;

use App\Models\Sport; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Field;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function __construct()
    {
        // Apply auth middleware to all methods except index and search
        $this->middleware('auth')->except(['index', 'search']);
    }

    public function index()
    {
        $allSports = Sport::all();
        $sports = Sport::with(['fields' => function($query) {
            $query->select('id', 'name', 'sport_type', 'price_per_hour', 'image');
        }])->get();
        return view('public.pages.reservation', [
            'sports' => $sports,
            'allSports' => $allSports
        ]);
    }
    
    public function search(Request $request)
    {
        $searchTerm = trim($request->input('search'));
        $selectedSport = $request->input('selected_sport');
        
        $allSports = Sport::all();
        
        $sports = Sport::with(['fields' => function($query) {
                $query->select('id', 'name', 'sport_type', 'price_per_hour', 'image');
            }])
            ->when($searchTerm, function($query) use ($searchTerm) {
                return $query->where('title', 'LIKE', "%{$searchTerm}%");
            })
            ->when($selectedSport && $selectedSport !== 'all', function($query) use ($selectedSport) {
                return $query->where('title', $selectedSport);
            })
            ->get();
        
        return view('public.pages.reservation', [
            'sports' => $sports,
            'allSports' => $allSports,
            'searchTerm' => $searchTerm,
            'selectedSport' => $selectedSport === 'all' ? null : $selectedSport
        ]);
    }

    public function confirmReservation(Request $request)
{
    $validatedData = $request->validate([
        'date' => 'required|date|after_or_equal:today',
        'start_time' => 'required|date_format:G:i',
        'end_time' => 'required|date_format:G:i|after:start_time',
        'sport_id' => 'required|exists:sports,id',
        'field_id' => 'required|exists:fields,id',
        'user_id' => 'required|exists:users,id',
    ]);

    if ($validatedData['user_id'] != Auth::id()) {
        return redirect()->back()->with('error', 'Invalid user information.');
    }

    $start = Carbon::parse($validatedData['date'] . ' ' . $validatedData['start_time']);
    $end = Carbon::parse($validatedData['date'] . ' ' . $validatedData['end_time']);
    
    // التحقق من عدم وجود حجز متعارض
    $conflictingReservation = Reservation::where('field_id', $validatedData['field_id'])
        ->where(function($query) use ($start, $end) {
            $query->whereBetween('start_time', [$start, $end])
                  ->orWhereBetween('end_time', [$start, $end])
                  ->orWhere(function($q) use ($start, $end) {
                      $q->where('start_time', '<', $start)
                        ->where('end_time', '>', $end);
                  });
        })
        ->exists();

    if ($conflictingReservation) {
        return redirect()->back()->with('error', 'This field is already booked for the selected time slot.');
    }

    $hours = $end->diffInHours($start);
    $field = Field::find($validatedData['field_id']);
    $totalPrice = $hours * $field->price_per_hour;

    $reservation = Reservation::create([
        'user_id' => $validatedData['user_id'], 
        'field_id' => $validatedData['field_id'],
        'start_time' => $start,
        'end_time' => $end,
        'total_hours' => $hours,
        'total_price' => $totalPrice,
    ]);

    return redirect()->route('reservation.index')->with([
        'success' => 'Reservation successfully confirmed!',
        'reservation' => $reservation 
    ]);
}
}