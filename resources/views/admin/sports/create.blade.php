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
                <h4 class="mb-4">Add a new sport</h4>
                
                <form action="{{ route('admin.sports.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="description_info">description_info</label>
                        <textarea class="form-control" id="description_info" name="description_info" rows="3" required></textarea>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="description_rule">description_rule</label>
                        <textarea class="form-control" id="description_rule" name="description_rule" rows="3" required></textarea>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="link_info">link_info</label>
                        <input type="url" class="form-control" id="link_info" name="link_info">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="link_rule">link_rule</label>
                        <input type="url" class="form-control" id="link_rule" name="link_rule">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Content End -->
</div>
@endsection