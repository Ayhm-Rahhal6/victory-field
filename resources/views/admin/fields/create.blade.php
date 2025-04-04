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
                    <h6 class="mb-0">Create New Field</h6>
                    <a href="{{ route('admin.fields.index') }}" class="btn btn-light">
                        <i class="fas fa-arrow-left me-2"></i>Back to List
                    </a>
                </div>
                
                <form method="POST" action="{{ route('admin.fields.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Field Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="sport_type" class="form-label">Sport Type</label>
                        <input type="text" class="form-control" id="sport_type" name="sport_type" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="location" class="form-label">Location URL</label>
                        <input type="url" class="form-control" id="location" name="location" required placeholder="https://maps.google.com/...">
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">Field Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Create Field</button>
                </form>
            </div>
        </div>
        
    </div>
    <!-- Content End -->
</div>
@endsection