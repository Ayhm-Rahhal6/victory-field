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
                            {{-- src="{{ Auth::user()->image ?? asset('img/default-user.jpg') }}"  --}}
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkq65qDKJziZKpNSyjRv0RtWQg5k0um-yn7Q&s"
                            alt="Admin Avatar" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->



        <!-- Sales Chart Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                            <div class="col-sm-12 col-xl-6">
                                <div class="bg-secondary text-center rounded p-4">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h6 class="mb-0">Worldwide Sales</h6>
                                        <a href="">Show All</a>
                                    </div>
                                    <canvas id="worldwide-sales"></canvas>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6">
                                <div class="bg-secondary text-center rounded p-4">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h6 class="mb-0">Salse & Revenue</h6>
                                        <a href="">Show All</a>
                                    </div>
                                    <canvas id="salse-revenue"></canvas>
                                </div>
                            </div>
            </div>
        </div>
        <!-- Sales Chart End -->

        <!-- Recent Sales Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Recent Salse</h6>
                    <a href="">Show All</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-white">
                                <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                <th scope="col">Date</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>01 Jan 2045</td>
                                <td>INV-0123</td>
                                <td>Jhon Doe</td>
                                <td>$123</td>
                                <td>Paid</td>
                                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>01 Jan 2045</td>
                                <td>INV-0123</td>
                                <td>Jhon Doe</td>
                                <td>$123</td>
                                <td>Paid</td>
                                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>01 Jan 2045</td>
                                <td>INV-0123</td>
                                <td>Jhon Doe</td>
                                <td>$123</td>
                                <td>Paid</td>
                                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>01 Jan 2045</td>
                                <td>INV-0123</td>
                                <td>Jhon Doe</td>
                                <td>$123</td>
                                <td>Paid</td>
                                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                            </tr>
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>01 Jan 2045</td>
                                <td>INV-0123</td>
                                <td>Jhon Doe</td>
                                <td>$123</td>
                                <td>Paid</td>
                                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Recent Sales End -->

    </div>
    <!-- Content End -->

    
</div>

@endsection
