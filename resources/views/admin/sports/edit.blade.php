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
                    <h6 class="mb-0">Edit Sport</h6>
                    <a href="{{ route('admin.sports.index') }}" class="btn btn-light">
                        <i class="fas fa-arrow-left me-2"></i>Back to List
                    </a>
                </div>
                
                <form method="POST" action="{{ route('admin.sports.update', $sport->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $sport->title }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description_info" class="form-label">Information Description</label>
                        <textarea class="form-control" id="description_info" name="description_info" rows="3" required>{{ $sport->description_info }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description_rule" class="form-label">Rules Description</label>
                        <textarea class="form-control" id="description_rule" name="description_rule" rows="3" required>{{ $sport->description_rule }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">Current Image</label>
                        @if($sport->image)
                        <div>
                            <img src="{{ asset('storage/' . $sport->image) }}" width="100" class="img-thumbnail mb-2">
                        </div>
                        @else
                        <p>No image uploaded</p>
                        @endif
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    
                    <div class="mb-3">
                        <label for="link_info" class="form-label">Information Link</label>
                        <input type="url" class="form-control" id="link_info" name="link_info" value="{{ $sport->link_info }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="link_rule" class="form-label">Rules Link</label>
                        <input type="url" class="form-control" id="link_rule" name="link_rule" value="{{ $sport->link_rule }}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Sport</button>
                </form>
            </div>
        </div>

        
    </div>
    <!-- Content End -->
</div>
@endsection