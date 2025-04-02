@extends('layouts.public')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Profile Header -->
                <div class="card mb-4 text-center">
                    <div class="card-body">
                        <img src="{{ asset('/assets/img/profilepic.png') }}" alt="User Profile" class="rounded-circle mb-3" width="150" height="150">
                        <h1 class="card-title">{{ Auth::user()->name }}</h1>
                        <p class="card-text"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p class="card-text"><strong>Phone:</strong> {{ Auth::user()->phone_number }}</p>
                    </div>
                </div>

                <!-- Booking History -->
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h2 class="mb-0">Booking History</h2>
                    </div>
                    <div class="card-body">
                        @if($history->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Field</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Duration</th>
                                            <th>Price</th>
                                            <th>Booked On</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($history as $reservation)
                                            <tr>
                                                <td>
                                                    {{ $reservation->field->name ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($reservation->start_time)->format('d M Y') }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($reservation->start_time)->format('h:i A') }} - 
                                                    {{ \Carbon\Carbon::parse($reservation->end_time)->format('h:i A') }}
                                                </td>
                                                <td>
                                                    {{ $reservation->total_hours }} hour(s)
                                                </td>
                                                <td>
                                                    ${{ number_format($reservation->total_price, 2) }}
                                                </td>
                                                <td>
                                                    {{ $reservation->created_at->format('d M Y') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-4 d-flex justify-content-center">
                                {{ $history->links() }}
                            </div>
                        @else
                            <div class="alert alert-info" role="alert">
                                You haven't made any reservations yet.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection