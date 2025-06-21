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
                                        style="background: #22b14c; border-color: #22b14c; border-radius: 10px; pading: 0px"
                                        data-sport-id="{{ $sport->id }}"
                                        data-field-id="{{ $field->id }}"
                                        data-price="{{ $field->price_per_hour }}">
                                    Reservation
                                </button>
                                @else
                                <a href="{{ route('login') }}" class="btn btn-dark btn-sm text-light text-decoration-none"
                                   style="background: #22b14c; border-color: #22b14c; border-radius: 10px; pading: 0px;">
                                    Reservation
                                </a>
                                @endif
                                <button class="btn btn-outline-dark btn-sm ms-auto" 
                                        type="button"
                                        style="border-radius: 10px; border-color: #22b14c; background: #22b14c;">
                                    <span style="color: rgb(255, 255, 255); pading: 0px"><a href="{{ $field->location }}" target="_blank" style="color: rgb(255, 255, 255); pading: 0px">
                                        View Location
                                    </a></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
        @endif
    </section>

    <!-- Reservation Modal -->
    <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="reservationModalLabel">Book Your Slot</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="booking-container text-center p-3">
                        <input type="date" class="form-control date-input" 
                               placeholder="Select Date" 
                               style="width: 100%; border-radius: 10px; border-color: #22b14c;" id="reservation-date">
                        
                        <div class="time-selection mt-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h4>Start Time</h4>
                                    <select class="form-select start-time" id="start-time">
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
                        <input type="hidden" class="sport-id">
                        <input type="hidden" class="field-id" id="field-id">
                        
                        <div class="summary border p-3 bg-light rounded mt-3"></div>
                        <div id="bookingErrors" class="alert alert-danger mt-3" style="display: none;"></div>
                    </div>
                </div>
                <div class="modal-footer mt-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .btn:hover {
        background-color: #22b14c !important; 
        border-color: #1a8f3d !important;
        color: white !important;
        transition: all 0.2s ease;
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
            }, 5000);
        @endif
    }

    // Initialize modal
    const reservationModal = new bootstrap.Modal(document.getElementById('reservationModal'));
    let currentPricePerHour = 0;
    
    // Handle reservation button clicks
    document.querySelectorAll('.reservation-btn').forEach(button => {
        button.addEventListener('click', function () {
            const sportId = this.getAttribute('data-sport-id');
            const fieldId = this.getAttribute('data-field-id');
            currentPricePerHour = parseFloat(this.getAttribute('data-price'));
            
            // Set modal data
            const modal = document.getElementById('reservationModal');
            modal.querySelector('.sport-id').value = sportId;
            modal.querySelector('.field-id').value = fieldId;
            
            // Reset modal
            const dateInput = modal.querySelector('.date-input');
            const startTimeSelect = modal.querySelector('.start-time');
            const endTimeSelect = modal.querySelector('.end-time');
            const summaryDiv = modal.querySelector('.summary');
            const errorDiv = modal.querySelector('#bookingErrors');
            
            // Set minimum date to today
            const today = new Date().toISOString().split('T')[0];
            dateInput.setAttribute('min', today);
            dateInput.value = today;
            
            // Reset selections
            startTimeSelect.selectedIndex = 0;
            endTimeSelect.selectedIndex = 0;
            summaryDiv.innerHTML = '';
            errorDiv.style.display = 'none';
            errorDiv.innerHTML = '';
            
            // Show modal
            reservationModal.show();
            
            // Trigger initial update
            updateEndTimes(startTimeSelect, endTimeSelect);
            updateSummary(dateInput, startTimeSelect, endTimeSelect, summaryDiv, currentPricePerHour);
        });
    });
    
    // Set up event listeners for modal controls
    const modal = document.getElementById('reservationModal');
    const dateInput = modal.querySelector('.date-input');
    const startTimeSelect = modal.querySelector('.start-time');
    const endTimeSelect = modal.querySelector('.end-time');
    const summaryDiv = modal.querySelector('.summary');
    const errorDiv = modal.querySelector('#bookingErrors');
    
    dateInput.addEventListener('change', function() {
        updateSummary(dateInput, startTimeSelect, endTimeSelect, summaryDiv, currentPricePerHour);
        checkAvailability();
    });
    
    startTimeSelect.addEventListener('change', function() {
        updateEndTimes(startTimeSelect, endTimeSelect);
        updateSummary(dateInput, startTimeSelect, endTimeSelect, summaryDiv, currentPricePerHour);
        checkAvailability();
    });
    
    endTimeSelect.addEventListener('change', function() {
        updateSummary(dateInput, startTimeSelect, endTimeSelect, summaryDiv, currentPricePerHour);
        checkAvailability();
    });
    
    function updateEndTimes(startSelect, endSelect) {
        let selectedStart = parseFloat(startSelect.value.replace(':30', '.5'));
        endSelect.querySelectorAll('option').forEach(option => {
            let optionValue = parseFloat(option.value.replace(':30', '.5'));
            option.disabled = optionValue <= selectedStart;
        });
        
        // Reset end time if invalid
        if (endSelect.value && parseFloat(endSelect.value.replace(':30', '.5')) <= selectedStart) {
            endSelect.value = "";
        }
    }
    
    function updateSummary(dateInput, startSelect, endSelect, summaryDiv, pricePerHour) {
        let date = dateInput.value;
        let startTime = startSelect.value;
        let endTime = endSelect.value;
        
        if (!date || !startTime || !endTime) {
            summaryDiv.innerHTML = '';
            return;
        }

        let start = parseFloat(startTime.replace(':30', '.5'));
        let end = parseFloat(endTime.replace(':30', '.5'));
        let hours = end - start;
        let totalPrice = (hours * pricePerHour).toFixed(2);
        let day = new Date(date).toLocaleDateString('en-US', { weekday: 'long' });

        summaryDiv.innerHTML = `
            <h5>Reservation Summary</h5>
            <p><strong>Date:</strong> ${date} (${day})</p>
            <p><strong>Duration:</strong> ${hours} hour(s)</p>
            <p><strong>Total Price:</strong> $${totalPrice}</p>
            <button class="btn btn-success mt-3 confirm-btn" style="border-radius: 10px;"
                    data-price="${totalPrice}">Confirm Reservation</button>
        `;

        summaryDiv.querySelector('.confirm-btn').addEventListener('click', function() {
            submitReservation(
                date, 
                startTime, 
                endTime, 
                totalPrice, 
                modal.querySelector('.sport-id').value, 
                modal.querySelector('.field-id').value
            );
        });
    }
    
    function checkAvailability() {
        const date = dateInput.value;
        const startTime = startTimeSelect.value;
        const endTime = endTimeSelect.value;
        const fieldId = modal.querySelector('.field-id').value;
        
        if (!date || !startTime || !endTime) {
            return;
        }
        
        errorDiv.style.display = 'none';
        errorDiv.innerHTML = '';
        
        fetch("{{ route('public.reservations.check') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                date: date,
                start_time: startTime,
                end_time: endTime,
                field_id: fieldId,
                _token: "{{ csrf_token() }}"
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.available === false) {
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = `
                    <i class="fas fa-exclamation-circle"></i> 
                    This time slot is already booked. Please choose another time.
                `;
            }
        })
        .catch(error => {
            console.error('Error checking availability:', error);
        });
    }
    
    function submitReservation(date, startTime, endTime, price, sportId, fieldId) {
        // Check if there are any errors displayed
        if (errorDiv.style.display === 'block') {
            return;
        }
        
        let userId = "{{ Auth::id() }}";
        
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = "{{ route('public.reservations.store') }}";
        form.style.display = 'none';

        let csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = "{{ csrf_token() }}";
        form.appendChild(csrfInput);

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

        document.body.appendChild(form);
        form.submit();
    }
});

// Function for the sport dropdown
function setSport(sportValue, sportText) {
    document.getElementById('selectedSport').value = sportValue;
    let dropdown = document.getElementById('sportDropdown');
    dropdown.textContent = sportText;
    dropdown.style.cssText = "background-color: #22b14c !important; color: white !important;";
}
</script>






<script>
    const fieldId = document.getElementById('field-id').value;
    const dateInput = document.getElementById('reservation-date');
    const startTimeSelect = document.getElementById('start-time');

    dateInput.addEventListener('change', fetchAvailableTimes);

    function fetchAvailableTimes() {
        const selectedDate = dateInput.value;
        if (!selectedDate) return;

        fetch(`/reserved-times?field_id=${fieldId}&date=${selectedDate}`)
            .then(response => response.json())
            .then(data => {
                const reservedSlots = data.map(res => ({
                    start: res.start_time,
                    end: res.end_time
                }));

                const allHours = generateTimeSlots();
                const availableHours = allHours.filter(hour => {
                    return !reservedSlots.some(slot => isWithinReserved(hour, slot));
                });

                // تفريغ الخيارات
                startTimeSelect.innerHTML = '';

                // إضافة الخيارات المتاحة
                availableHours.forEach(hour => {
                    const option = document.createElement('option');
                    option.value = hour;
                    option.textContent = hour;
                    startTimeSelect.appendChild(option);
                });
            });
    }

    function generateTimeSlots() {
        const times = [];
        for (let hour = 8; hour < 24; hour++) {
            times.push(`${hour.toString().padStart(2, '0')}:00`);
        }
        return times;
    }

    function isWithinReserved(time, slot) {
        return time >= slot.start && time < slot.end;
    }
</script>

@endsection