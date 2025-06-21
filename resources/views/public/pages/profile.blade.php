@extends('layouts.public')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Profile Header -->
                <div class="card mb-4 text-center">
                    <div class="card-body">
                        <div class="profile-picture-container mb-3">
                            @if(Auth::user()->profile_picture)
                                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" 
                                    alt="User Profile"
                                    class="rounded-circle border shadow-sm"
                                    width="150" 
                                    height="150"
                                    style="object-fit: cover; object-position: center; image-rendering: -webkit-optimize-contrast;"
                                    id="profile-picture-preview">
                            @else
                                <img src="{{ asset('/assets/img/profilepic.png') }}" 
                                    alt="User Profile"
                                    class="rounded-circle border shadow-sm"
                                    width="150" 
                                    height="150"
                                    style="object-fit: cover; object-position: center; image-rendering: -webkit-optimize-contrast;"
                                    id="profile-picture-preview">
                            @endif
                        </div>
                        
                        <h1 class="card-title">{{ Auth::user()->name }}</h1>
                        <p class="card-text"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p class="card-text"><strong>Phone:</strong> <span id="current-phone">{{ Auth::user()->phone_number }}</span></p>
                        
                        <button id="edit-profile-btn" class="btn btn-success mt-3">Edit Profile</button>
                        
                        <div id="edit-profile-form" style="display: none;" class="mt-4 text-left">
                            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div id="change-picture-btn" style="display: none;" class="mt-2">
                                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="d-none">
                                    <label for="profile_picture" class="btn btn-sm btn-outline-success"  style="hover: green; margin-bottom: 20px;">Change Picture</label>
                                </div>                                
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row mt-3">
                                    <label for="phone_number" class="col-md-4 col-form-label">Phone Number</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ Auth::user()->phone_number }}" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row mt-3">
                                    <label for="current_password" class="col-md-4 col-form-label">Current Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" id="current_password" name="current_password">
                                        <small class="form-text text-muted">Required if changing password</small>
                                    </div>
                                </div>
                                
                                <div class="form-group row mt-3">
                                    <label for="new_password" class="col-md-4 col-form-label">New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" id="new_password" name="new_password">
                                        <small class="form-text text-muted">Leave blank if you don't want to change password</small>
                                    </div>
                                </div>
                                
                                <div class="form-group row mt-3">
                                    <label for="new_password_confirmation" class="col-md-4 col-form-label">Confirm New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                                    </div>
                                </div>
                                
                                <div class="form-group row mt-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                        <button type="button" id="cancel-edit-btn" class="btn btn-outline-secondary ml-2">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

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
                            <div class="d-flex justify-content-center mt-3" >
                                <nav aria-label="Page navigation">
                                    <ul class="pagination pagination-sm ">
                                        {{ $history->links('pagination::bootstrap-4') }}
                                    </ul>
                                </nav>
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

    
    <style>
        .btn-success:hover {
            background-color: #218838 !important;
            border-color: #1e7e34 !important;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editBtn = document.getElementById('edit-profile-btn');
            const cancelBtn = document.getElementById('cancel-edit-btn');
            const editForm = document.getElementById('edit-profile-form');
            
            editBtn.addEventListener('click', function() {
                editForm.style.display = 'block';
                editBtn.style.display = 'none';
            });
            
            cancelBtn.addEventListener('click', function() {
                editForm.style.display = 'none';
                editBtn.style.display = 'block';
            });
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editBtn = document.getElementById('edit-profile-btn');
        const cancelBtn = document.getElementById('cancel-edit-btn');
        const editForm = document.getElementById('edit-profile-form');
        const changePicBtn = document.getElementById('change-picture-btn');
        const profilePicInput = document.getElementById('profile_picture');
        const profilePicPreview = document.getElementById('profile-picture-preview');
        
        editBtn.addEventListener('click', function() {
            editForm.style.display = 'block';
            changePicBtn.style.display = 'block';
            this.style.display = 'none';
        });
        
        cancelBtn.addEventListener('click', function() {
            editForm.style.display = 'none';
            changePicBtn.style.display = 'none';
            editBtn.style.display = 'block';
        });
        
        profilePicInput.addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(event) {
                    profilePicPreview.src = event.target.result;
                };
                
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    });
    </script>
@endsection