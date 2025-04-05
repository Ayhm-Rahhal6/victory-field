@extends('layouts.public')

@section('content')
<div class="container py-4 py-xl-5">
    <form method="POST" action="{{ route('search.sports') }}" class="search-form mb-0">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="search" id="searchInput" 
                   class="form-control rounded-3" 
                   placeholder="Search sports..." 
                   value="{{ $searchTerm ?? '' }}"
                   autocomplete="off">
            
            <button class="btn dropdown-toggle rounded-3" 
                    type="button" id="sportDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false"
                    onmouseover="this.classList.add('btn-success')" 
                    onmouseout="this.classList.remove('btn-success')">
                {{ $selectedSport ?? 'Choose Sport' }}
            </button>
            
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#" 
                      onclick="setSport('all', 'All Sports')">All Sports</a></li>
                @foreach($allSports as $sport)
                <li><a class="dropdown-item" href="#" 
                      onclick="setSport('{{ $sport->title }}', '{{ $sport->title }}')">{{ $sport->title }}</a></li>
                @endforeach
            </ul>
            
            <input type="hidden" name="selected_sport" id="selectedSport" value="{{ $selectedSport ?? '' }}">
            <button class="btn btn-success rounded-3" type="submit">Search</button>
        </div>
    </form>
    <!-- Toast Notification Container -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="reservationToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                @if(session('success'))
                    {{ session('success') }}
                @endif
            </div>
        </div>
    </div>

    @if(session('booking_error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('booking_error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="py-5">
        @if($sports->isEmpty())
        <div class="alert alert-info text-center">
            No sports available at this time.
        </div>
        @else
            @foreach($sports as $sport)
            <div class="sport-section mb-5" data-aos="zoom-in" data-aos-duration="250">
                <div class="row mb-3">
                    <div class="col text-center">
                        <h2 style="color: rgb(34, 177, 76);">{{ $sport->title }}</h2>
                        <p>{{ $sport->description_info }}</p>
                    </div>
                </div>

                @if($sport->fields->isEmpty())
                <div class="alert alert-warning text-center">
                    No fields available for {{ $sport->title }}.
                </div>
                @else
                <div class="row filtr-container">
                    @foreach($sport->fields as $field)
                    <div class="col-md-6 col-lg-4 filtr-item" data-aos="zoom-in-up" data-aos-duration="250" data-aos-delay="250">
                        <div class="card border-dark">
                            <img class="img-fluid card-img-top w-100 d-block rounded-0"
                                style="height: 200px; object-fit: cover;"
                                src="{{ asset("storage/$field->image") }}"
                                alt="{{ $field->name }}">
                            <div class="card-body">
                                <h6>{{ $field->name }}</h6>
                                <h6>${{ number_format($field->price_per_hour, 2) }}/hour</h6>
                            </div>
                            <div class="d-flex card-footer">
                                @if(Auth::check())
                                <button class="btn btn-dark btn-sm reservation-btn"
                                        style="background: #22b14c; border-color: #22b14c; border-radius: 10px;">
                                    Reservation
                                </button>
                                @else
                                <a href="{{ route('login') }}" class="btn btn-dark btn-sm text-light text-decoration-none"
                                   style="background: #22b14c; border-color: #22b14c; border-radius: 10px;">
                                    Login to Reserve
                                </a>
                                @endif
                                <button class="btn btn-outline-dark btn-sm ms-auto" 
                                        type="button"
                                        style="border-radius: 10px; border-color: #22b14c; background: #22b14c;">
                                    <span style="color: rgb(255, 255, 255);"><a href="{{ $field->location }}" target="_blank" style="color: rgb(255, 255, 255);">
                                        View Location
                                    </a><n/span>
                                </button>
                            </div>
                            
                            @if(Auth::check())
                            <div id="reservation-div" class="booking-container text-center border border-success rounded-2 p-3">
                                <h2>Book Your Slot</h2>
                               <input type="date" class="form-control date-input" 
                                      placeholder="Select Date" 
                                      style="width: 100%; border-radius: 10px; border-color: #22b14c;">
                                
                                <div class="time-selection mt-4">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <h4>Start Time</h4>
                                            <select class="form-select start-time">
                                                @for($hour = 8; $hour <= 20; $hour++)
                                                    <option value="{{ $hour }}:00">{{ $hour }}:00</option>
                                                    <option value="{{ $hour }}:30">{{ $hour }}:30</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <h4>End Time</h4>
                                            <select class="form-select end-time">
                                                @for($hour = 9; $hour <= 21; $hour++)
                                                    <option value="{{ $hour }}:00">{{ $hour }}:00</option>
                                                    <option value="{{ $hour }}:30">{{ $hour }}:30</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="sport-id" value="{{ $sport->id }}">
                                <input type="hidden" class="field-id" value="{{ $field->id }}">
                                
                                <div class="summary border p-3 bg-light rounded mt-3"></div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
        @endif
    </section>

</div>

<style>
    .btn:hover {
        background-color: #22b14c !important; 
        border-color: #1a8f3d !important;
        color: white !important;
        transition: all 0.2s ease;
    }
    .booking-container{
        display: none;
    }

    #reservationToast {
        min-width: 300px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    
    .toast-header.bg-success {
        background-color: #22b14c !important;
    }
    
    /* Animation for toast */
    .toast.show {
        animation: slideIn 0.3s forwards;
    }
    #sportDropdown{
        background-color: #22b14c;
        color:white;
        margin: 5px
    }
    @keyframes slideIn {
        from { transform: translateY(100%); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
</style>

<script>

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all toasts
    const toastEl = document.getElementById('reservationToast');
    if (toastEl) {
        const toast = new bootstrap.Toast(toastEl);
        
        // Only show if there's a success message
        @if(session('success'))
            toast.show();
            
            // Auto-hide after 5 seconds
            setTimeout(() => {
                toast.hide();
            }, 2000);
        @endif
    }
});


document.addEventListener("DOMContentLoaded", function () {
    // Toggle the booking container when clicking reservation button
    document.querySelectorAll('.reservation-btn').forEach(button => {
        button.addEventListener('click', function () {
            let bookingContainer = this.closest('.card').querySelector('.booking-container');
            bookingContainer.style.display = (bookingContainer.style.display === 'none' || bookingContainer.style.display === '') ? 'block' : 'none';
        });
    });

    // Initialize each booking container
    document.querySelectorAll('.booking-container').forEach(container => {
        let startTimeSelect = container.querySelector('.start-time');
        let endTimeSelect = container.querySelector('.end-time');
        let dateInput = container.querySelector('.date-input');
        let summaryDiv = container.querySelector('.summary');

        function updateEndTimes() {
            let selectedStart = parseFloat(startTimeSelect.value.replace(':30', '.5'));
            endTimeSelect.querySelectorAll('option').forEach(option => {
                let optionValue = parseFloat(option.value.replace(':30', '.5'));
                option.disabled = optionValue <= selectedStart;
            });
            if (endTimeSelect.value && parseFloat(endTimeSelect.value.replace(':30', '.5')) <= selectedStart) {
                endTimeSelect.value = "";
            }
        }

        function updateSummary() {
            let date = dateInput.value;
            let startTime = startTimeSelect.value;
            let endTime = endTimeSelect.value;
            
            // Only proceed if all values are selected
            if (!date || !startTime || !endTime) {
                summaryDiv.innerHTML = '';
                return;
            }

            // Calculate price
            let pricePerHour = parseFloat(container.closest('.card').querySelector('h6:nth-child(2)').textContent.replace('$', '').replace('/hour', ''));
            let start = parseFloat(startTime.replace(':30', '.5'));
            let end = parseFloat(endTime.replace(':30', '.5'));
            let hours = end - start;
            let totalPrice = (hours * pricePerHour).toFixed(2);
            let day = new Date(date).toLocaleDateString('en-US', { weekday: 'long' });

            // Update summary div
            summaryDiv.innerHTML = `
                <h5>Reservation Summary</h5>
                <p><strong>Date:</strong> ${date} (${day})</p>
                <p><strong>Duration:</strong> ${hours} hour(s)</p>
                <p><strong>Total Price:</strong> $${totalPrice}</p>
                <button class="btn btn-success mt-3 confirm-btn" style="border-radius: 10px;"
                        data-price="${totalPrice}">Confirm Reservation</button>
            `;

            // Add event listener to the newly created confirm button
            let confirmBtn = summaryDiv.querySelector('.confirm-btn');
            confirmBtn.addEventListener('click', function() {
                submitReservation(date, startTime, endTime, totalPrice);
            });
        }

        function submitReservation(date, startTime, endTime, price) {
            let sportId = container.querySelector('.sport-id').value;
            let fieldId = container.querySelector('.field-id').value;
            let userId = "{{ Auth::id() }}";

            // Create form
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('public.reservations.store') }}";
            form.style.display = 'none';

            // Add CSRF token
            let csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = "{{ csrf_token() }}";
            form.appendChild(csrfInput);

            // Add other form fields
            let fields = {
                'date': date,
                'start_time': startTime,
                'end_time': endTime,
                'sport_id': sportId,
                'field_id': fieldId,
                'user_id': userId,
                'price': price
            };

            for (let key in fields) {
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = fields[key];
                form.appendChild(input);
            }

            // Append form to document and submit
            document.body.appendChild(form);
            form.submit();
        }

        // Initialize and add event listeners
        startTimeSelect.addEventListener('change', function() {
            updateEndTimes();
            updateSummary();
        });
        endTimeSelect.addEventListener('change', updateSummary);
        dateInput.addEventListener('change', updateSummary);

        // Initial setup
        updateEndTimes();
    });
});

// Function for the sport dropdown
function setSport(sportValue, sportText) {
    document.getElementById('selectedSport').value = sportValue;
    let dropdown = document.getElementById('sportDropdown');
    dropdown.textContent = sportText;
    dropdown.style.cssText = "background-color: #22b14c !important; color: white !important;";
}

</script>
@endsection