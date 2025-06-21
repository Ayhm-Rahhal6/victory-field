@extends('layouts.admin')
@section('content')

<div class="container-fluid position-relative d-flex p-0">
    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">

            <div class="dropdown ms-3">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-envelope"></i>
                    <span class="badge bg-danger" id="contact-notification-badge"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" id="contact-notifications-list">
                    <li><h6 class="dropdown-header">آخر الرسائل</h6></li>
                </ul>
            </div>

            <!-- نافذة الإشعار العائم -->
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="contact-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-primary text-white">
                        <strong class="me-auto">رسالة جديدة</strong>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body" id="contact-toast-body"></div>
                </div>
            </div>




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

        <!-- Dashboard Cards Start -->
        
        
        <div class="container-fluid pt-2 px-2" style="margin-top: 15px; margin-bottom: 15px;">
            <div class="row g-2">
                <!-- Card 1: Total Users -->
                <div class="col-md-4 col-lg-2">
                    <div class="card bg-green-100 text-white rounded-2 shadow border-0 h-100">
                        <div class="card-body p-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-1 small">Total Users</p>
                                    <h5 class="mb-0">{{ $usersCount ?? 0 }}</h5> 
                                </div>
                                <div class="bg-white text-green-100 rounded-circle p-2">
                                    <i class="fas fa-users fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Card 2: Total Reservations -->
                <div class="col-md-4 col-lg-2">
                    <div class="card bg-green-200 text-white rounded-2 shadow border-0 h-100">
                        <div class="card-body p-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-1 small">Total Reservations</p>
                                    <h5 class="mb-0">{{ $reservationsCount ?? 0 }}</h5> 
                                </div>
                                <div class="bg-white text-green-200 rounded-circle p-2">
                                    <i class="fas fa-calendar-check fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Card 3: Total Fields -->
                <div class="col-md-4 col-lg-2">
                    <div class="card bg-green-300 text-white rounded-2 shadow border-0 h-100">
                        <div class="card-body p-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-1 small">Total Fields</p>
                                    <h5 class="mb-0">{{ $fieldsCount ?? 0 }}</h5>
                                </div>
                                <div class="bg-white text-green-300 rounded-circle p-2">
                                    <i class="fas fa-futbol fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Card 4: Total Revenue -->
                <div class="col-md-4 col-lg-2">
                    <div class="card bg-green-400 text-white rounded-2 shadow border-0 h-100">
                        <div class="card-body p-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-1 small">Total Revenue</p>
                                    <h5 class="mb-0">{{ $totalRevenue ?? 0 }} JD</h5> 
                                </div>
                                <div class="bg-white text-green-400 rounded-circle p-2">
                                    <i class="fas fa-coins fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Net Profit -->
                <div class="col-md-4 col-lg-2">
                    <div class="card bg-green-500 text-white rounded-2 shadow border-0 h-100">
                        <div class="card-body p-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-1 small">Net Profit</p>
                                    <h5 class="mb-0">{{ $netProfit ?? 0 }} JD</h5>
                                </div>
                                <div class="bg-white text-green-500 rounded-circle p-2">
                                    <i class="fas fa-money-bill-wave fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 6: Example Additional Metric -->
                <div class="col-md-4 col-lg-2">
                    <div class="card bg-green-600 text-white rounded-2 shadow border-0 h-100">
                        <div class="card-body p-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-1 small">Total Sports</p>
                                    <h5 class="mb-0">{{ $sportsCount ?? 0 }}</h5>
                                </div>
                                <div class="bg-white text-green-600 rounded-circle p-2">
                                    <i class="fas fa-user-clock fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Cards End -->

        <!-- Charts Section Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card shadow border-0 h-100">
                        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 text-dark">Sports Popularity</h5>
                            <a href="{{ route('admin.sports.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                        </div>
                        <div class="card-body">
                            <canvas id="sports-popularity" height="300"></canvas>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card shadow border-0 h-100">
                        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 text-dark">Content Statistics</h5>
                            <a href="{{ route('admin.sports.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                        </div>
                        <div class="card-body">
                            <canvas id="content-statistics" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Charts Section End -->

      
    </div>
    <!-- Content End -->
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sports Popularity Chart
    const sportsPopularityCanvas = document.getElementById('sports-popularity');
    if (sportsPopularityCanvas) {
        new Chart(sportsPopularityCanvas, {
            type: 'bar',
            data: {
                labels: ["Football", "Basketball", "Tennis", "Swimming", "Volleyball", "Others"],
                datasets: [{
                    label: "Popularity Score",
                    data: [85, 72, 68, 59, 45, 38],
                    backgroundColor: "rgba(13, 110, 253, 0.7)",
                    borderColor: "rgba(13, 110, 253, 1)",
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        backgroundColor: '#333',
                        titleFont: { size: 14 },
                        bodyFont: { size: 12 },
                        padding: 12,
                        cornerRadius: 4
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }

    // Content Statistics Chart
    const contentStatisticsCanvas = document.getElementById('content-statistics');
    if (contentStatisticsCanvas) {
        new Chart(contentStatisticsCanvas, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                datasets: [{
                    label: "Info Content",
                    data: [15, 30, 55, 45, 70, 65, 85],
                    backgroundColor: "rgba(25, 135, 84, 0.1)",
                    borderColor: "rgba(25, 135, 84, 1)",
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                }, {
                    label: "Rule Content",
                    data: [20, 25, 30, 35, 40, 45, 50],
                    backgroundColor: "rgba(13, 110, 253, 0.1)",
                    borderColor: "rgba(13, 110, 253, 1)",
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        backgroundColor: '#333',
                        titleFont: { size: 14 },
                        bodyFont: { size: 12 },
                        padding: 12,
                        cornerRadius: 4
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }
</script>






<script>
// استقبال الإشعارات
Echo.channel('contact-notifications')
    .listen('NewContactNotification', (data) => {
        updateContactNotifications(data.contact);
    });

function updateContactNotifications(contact) {
    // تحديث العداد
    const badge = document.getElementById('contact-notification-badge');
    badge.textContent = parseInt(badge.textContent || 0) + 1;

    // إضافة الإشعار للقائمة
    const list = document.getElementById('contact-notifications-list');
    const newItem = document.createElement('li');
    newItem.innerHTML = `
        <a class="dropdown-item" href="/admin/contacts/${contact.id}">
            <strong>${contact.name}</strong><br>
            <small>${contact.subject}</small>
        </a>
    `;
    list.appendChild(newItem);

    // عرض الإشعار العائم
    const toastBody = document.getElementById('contact-toast-body');
    toastBody.innerHTML = `
        <strong>${contact.name}</strong>: ${contact.subject}<br>
        ${contact.message.substring(0, 50)}...
    `;
    new bootstrap.Toast(document.getElementById('contact-toast')).show();
}

// جلب الإشعارات عند تحميل الصفحة
document.addEventListener('DOMContentLoaded', function() {
    fetch('/admin/contacts/unread-count')
        .then(response => response.json())
        .then(data => {
            document.getElementById('contact-notification-badge').textContent = data.count || '';
        });
});
</script>


<style>
    /* في ملف CSS الخاص بك */
#contact-notification-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    font-size: 0.7rem;
    padding: 3px 6px;
}

.dropdown-toggle {
    position: relative;
}

#contact-notifications-list {
    max-height: 400px;
    overflow-y: auto;
}

#contact-notifications-list .dropdown-item {
    white-space: normal;
    padding: 0.5rem 1rem;
}
</style>






<style>
    /* Custom green shades */
    .bg-green-100 { background-color: #22b14c; }
    .bg-green-200 { background-color: #22b14c; }
    .bg-green-300 { background-color: #22b14c; }
    .bg-green-400 { background-color: #22b14c; }
    .bg-green-500 { background-color: #22b14c; }
    .bg-green-600 { background-color: #22b14c; }
    
    .text-green-100 { color: #22b14c; }
    .text-green-200 { color: #22b14c; }
    .text-green-300 { color: #22b14c; }
    .text-green-400 { color: #22b14c; }
    .text-green-500 { color: #22b14c; }
    .text-green-600 { color: #22b14c; }
    
    /* Smaller font sizes */
    .card h5 { font-size: 1.1rem; font-weight: 600; }
    .card .small { font-size: 0.75rem; }
    .card .fa-lg { font-size: 1.25rem; }
    
    /* Compact card styling */
    .card { transition: all 0.3s; }
    .card:hover { transform: translateY(-2px); box-shadow: 0 4px 8px rgba(0,0,0,0.1) !important; }
</style>

@endsection