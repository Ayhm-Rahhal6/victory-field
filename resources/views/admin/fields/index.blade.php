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
                    <h6 class="mb-0">Fields List</h6>
                    <a href="{{ route('admin.fields.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add Field
                    </a>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-white">
                                <th>#</th>
                                <th>Name</th>
                                <th>Sport Type</th>
                                <th>Location</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fields as $field)
                            <tr>
                                <td>{{ ($fields->currentPage() - 1) * $fields->perPage() + $loop->iteration }}</td>                                <td>{{ $field->name }}</td>
                                <td>{{ $field->sport_type }}</td>
                                <td>
                                    <a href="{{ $field->location }}" target="_blank" class="btn btn-sm btn-link">
                                        View Location
                                    </a>
                                </td>
                                <td>
                                    @if($field->image)
                                    <img src="{{ asset('storage/' . $field->image) }}" width="50" class="img-thumbnail">
                                    @else
                                    No Image
                                    @endif
                                </td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('admin.fields.edit', $field->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.fields.destroy', $field->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center mt-3">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm">
                            {{ $fields->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
    <!-- Content End -->

</div>



@endsection