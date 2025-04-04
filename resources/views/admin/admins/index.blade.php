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
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Admins List</h6>
                    @can('create', App\Models\User::class)
                    <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add Admin
                    </a>
                    @endcan
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
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admins as $admin)
                            <tr>
                                <td>{{ $loop->iteration + ($admins->currentPage() - 1) * $admins->perPage() }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->phone_number ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge {{ $admin->role === 'super_admin' ? 'bg-danger' : 'bg-warning' }}">
                                        {{ ucfirst(str_replace('_', ' ', $admin->role)) }}
                                    </span>
                                </td>
                                {{-- <td>{{ $admin->created_at->format('M d, Y H:i') }}</td> --}}
                                <td class="d-flex gap-2">
                                    <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    
                                    @can('delete', $admin)
                                    <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this admin?')">
                                                <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No admins found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    <div class="d-flex justify-content-center mt-3">
                        {{ $admins->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Content End -->
</div>

@endsection