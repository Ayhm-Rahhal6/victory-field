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

        <!-- Recent Sales Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Users List</h6>
                    <div>
                        <a href="{{ route('admin.users.export') }}" class="btn btn-success ms-2">
                            <i class="fas fa-file-export"></i> Export to Excel
                        </a>
                    </div>
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
                                <th scope="col">Registered At</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number ?? 'N/A' }}</td>
                                <td>{{ $user->created_at->format('M d, Y H:i') }}</td>
                                <td class="d-flex gap-2">
                                    
                                    <a href="#" 
                                    class="btn btn-sm btn-warning show-reservations" 
                                    data-user-id="{{ $user->id }}"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#reservationsModal">
                                    <i class="fas fa-calendar-alt"></i> Reservations
                                 </a>
                                    
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                                <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No users found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Recent Sales End -->
        
    </div>
    <!-- Content End -->
</div>

<div class="modal-body">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Field Name</th>
                    <th>Sport Type</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Duration</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="reservationsTableBody">
                <!-- سيتم ملؤه عبر AJAX -->
            </tbody>
        </table>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('#userSearch').on('keyup', function() {
            const value = $(this).val().toLowerCase();
            $('table tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });



    success: function(reservations) {
    let html = '';
    
    if (reservations.length > 0) {
        reservations.forEach((reservation, index) => {
            html += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${reservation.field.name}</td>
                    <td>${reservation.field.sport_type}</td>
                    <td>${reservation.start_time}</td>
                    <td>${reservation.end_time}</td>
                    <td>${reservation.total_hours} hours</td>
                    <td>$${reservation.total_price}</td>
                    <td>
                        <span class="badge ${reservation.status === 'confirmed' ? 'bg-success' : 'bg-warning'}">
                            ${reservation.status}
                        </span>
                    </td>
                </tr>
            `;
        });
    } else {
        html = '<tr><td colspan="8" class="text-center">No reservations found</td></tr>';
    }
    
    $('#reservationsTableBody').html(html);
},



// في جزء JavaScript
const formatTime = (timeStr) => {
    return new Date('1970-01-01T' + timeStr).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
};

const formatPrice = (price) => {
    return parseFloat(price).toFixed(2);
};

// ثم في حلقة العرض
`<td>${formatTime(reservation.start_time)}</td>`
`<td>${formatTime(reservation.end_time)}</td>`
`<td>$${formatPrice(reservation.total_price)}</td>`
</script>
@endsection

@endsection