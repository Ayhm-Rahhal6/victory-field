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
            
            <button class="btn btn-outline-secondary dropdown-toggle rounded-3" 
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
                                src="{{ asset("/assets/img/{$field->image}") }}"
                                alt="{{ $field->name }}">
                            <div class="card-body">
                                <h6>{{ $field->name }}</h6>
                                <h6>${{ number_format($field->price_per_hour, 2) }}/hour</h6>
                            </div>
                            <div class="d-flex card-footer">
                                <button class="btn btn-dark btn-sm reservation-btn"
                                        style="background: #22b14c; border-color: #22b14c; border-radius: 10px;">
                                    Reservation
                                </button>
                                <button class="btn btn-outline-dark btn-sm ms-auto" 
                                        type="button"
                                        style="border-radius: 10px; border-color: #22b14c; background: #22b14c;">
                                    <span style="color: rgb(255, 255, 255);">Location</span>
                                </button>
                            </div>
                            
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
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.reservation-btn').forEach(button => {
        button.addEventListener('click', function () {
            let bookingContainer = this.closest('.card').querySelector('.booking-container');
            if (bookingContainer.style.display === 'none' || bookingContainer.style.display === '') {
                bookingContainer.style.display = 'block';
            } else {
                bookingContainer.style.display = 'none';
            }
        });
    });

    document.querySelectorAll('.booking-container').forEach(container => {
        let startTimeSelect = container.querySelector('.start-time');
        let endTimeSelect = container.querySelector('.end-time');
        let dateInput = container.querySelector('.date-input');

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
            let pricePerHour = parseFloat(container.closest('.card').querySelector('h6:nth-child(2)').innerText.replace('$', ''));
            if (!date || !startTime || !endTime) return;

            let start = parseFloat(startTime.replace(':30', '.5'));
            let end = parseFloat(endTime.replace(':30', '.5'));
            let hours = end - start;
            let totalPrice = (hours * pricePerHour).toFixed(2);
            let day = new Date(date).toLocaleDateString('en-US', { weekday: 'long' });

            container.querySelector('.summary')?.remove();
            container.insertAdjacentHTML('beforeend', `
                <div class="summary border p-3 bg-light rounded mt-3">
                    <h5>Reservation Summary</h5>
                    <p><strong>Date:</strong> ${date} (${day})</p>
                    <p><strong>Duration:</strong> ${hours} hour(s)</p>
                    <p><strong>Total Price:</strong> $${totalPrice}</p>
                    <button class="btn btn-success mt-3 confirm-btn" style="border-radius: 10px;">Confirm Reservation</button>
                </div>
            `);
        }

        startTimeSelect.addEventListener('change', updateEndTimes);
        startTimeSelect.addEventListener('change', updateSummary);
        endTimeSelect.addEventListener('change', updateSummary);
        dateInput.addEventListener('change', updateSummary);

        updateEndTimes();  // Initial end time update

        container.addEventListener('click', function (event) {
            if (event.target.classList.contains('confirm-btn')) {
                let date = container.querySelector('.date-input').value;
                let startTime = container.querySelector('.start-time').value;
                let endTime = container.querySelector('.end-time').value;
                let sportId = container.querySelector('.sport-id').value;
                let fieldId = container.querySelector('.field-id').value;
                let userId = "{{ auth()->id() }}";  // Pass the logged-in user's ID here

                if (!date || !startTime || !endTime) {
                    alert("Please fill in all the fields.");
                    return;
                }

                let form = document.createElement('form');
                form.method = 'POST';
                form.action = "{{ route('reservations.store') }}";

                form.innerHTML = `
                    @csrf
                    <input type="hidden" name="date" value="${date}">
                    <input type="hidden" name="start_time" value="${startTime}">
                    <input type="hidden" name="end_time" value="${endTime}">
                    <input type="hidden" name="sport_id" value="${sportId}">
                    <input type="hidden" name="field_id" value="${fieldId}">
                    <input type="hidden" name="user_id" value="${userId}">  <!-- Include user_id here -->
                `;

                document.body.appendChild(form);
                form.submit();
            }
        });
    });
});
</script>

@endsection
