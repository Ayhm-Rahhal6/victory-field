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
        
        $allSports = Sport::all(); // For dropdown
        
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
        dd($request->input('date'));
        // dd($request->input('start_time'));
        // dd($request->input('end_time'));
        // dd($request->input('sport_id'));
        // dd($request->input('field_id'));
        // dd($request->input('user_id'));
        // dd($request->input('price'));

        // Validate the incoming request data
        $validate = [
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'sport_id' => 'required|exists:sports,id',
            'field_id' => 'required|exists:fields,id',
            'user_id' => 'required|exists:users,id',
            'price' => 'required|numeric',
        ];

        // Perform the validation
        $validatedData = $request->validate($validate);

        // Debugging output (you can remove these dd statements after validation works)
        // dd($validatedData); // This will show the validated data

        // Create the reservation in the database
        $reservation = Reservation::create([
            'user_id' => $validatedData['user_id'], // Ensure user_id is passed correctly
            'field_id' => $validatedData['field_id'],
            'start_time' => $validatedData['date'] . ' ' . $validatedData['start_time'],
            'end_time' => $validatedData['date'] . ' ' . $validatedData['end_time'],
            'total_hours' => (strtotime($validatedData['end_time']) - strtotime($validatedData['start_time'])) / 3600, // Calculate the total hours
            'total_price' => $validatedData['price'],
        ]);

        // Redirect to the reservation index page with a success message and reservation details
        return redirect()->route('reservation.index')->with([
            'success' => 'Reservation successfully confirmed!',
            'reservation' => $reservation // Passing reservation data to the session
        ]);
    }

}
