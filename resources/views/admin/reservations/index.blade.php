@extends('layouts.admin')

@section('content')
<div class="container-fluid position-relative d-flex p-0">

    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" 
                             src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkq65qDKJziZKpNSyjRv0RtWQg5k0um-yn7Q&s" 
                             alt="Admin Avatar" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Reservations List</h6>
                </div>
                
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-white">
                                <th>#</th>
                                <th>User</th>
                                <th>Phone</th>
                                <th>Field</th>
                                <th>Sport Type</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Duration</th>
                                <th>Total Price</th>
                                <th>Booked At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $reservation->user->name }}</td>
                                <td>{{ $reservation->user->phone_number ?? 'N/A' }}</td>
                                <td>{{ $reservation->field->name }}</td>
                                <td>{{ $reservation->field->sport_type }}</td>
                                <td>{{ $reservation->start_time }}</td>
                                <td>{{ $reservation->end_time }}</td>
                                <td>{{ $reservation->total_hours }} hours</td>
                                <td>${{ number_format($reservation->total_price, 2) }}</td>
                                <td>{{ $reservation->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center mt-3">
                    {{ $reservations->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
    <!-- Content End -->

@endsection