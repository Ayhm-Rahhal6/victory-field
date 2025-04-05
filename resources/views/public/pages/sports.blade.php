@extends('layouts.public')
@section('content')



<!-- Start: Features Image -->
<div class="container py-4 py-xl-5">
  @foreach ($sports as $sport)
    <div class="row row-cols-1 row-cols-md-2 mb-5">
      <div class="col-lg-5" data-aos="fade-right" data-aos-duration="250" data-aos-delay="250">
        <div class="col-lg-5" data-aos="fade-right" data-aos-duration="250" data-aos-delay="250"><img
          class="rounded w-100 h-90 fit-cover" style="min-height: 300px; min-width: 450px;"
          src="{{ asset('storage/' . $sport->image) }}" width="300" height="200"></div>
    </div>
      <div class="col-lg-6 col-xl-6 col-xxl-6 d-flex flex-column justify-content-center p-4" data-aos="fade-left"
        data-aos-duration="250" data-aos-delay="250" style="height: 300px;">
        <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-4 mt-5"
          style="height: 120px;">
          {{-- <div
            class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon md mb-0"
            style="background: #22b14c;width: 35px;height: 35px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
              height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right-circle">
              <path fill-rule="evenodd"
                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
              </path>
            </svg></div> --}}
          <h4 class="pt-0 mb-0 mt-0"><strong><span style="color: rgb(26, 26, 26);">Information ({{ $sport->title }})</span></strong></h4>
          <div>
            <p class="mb-0">{{ $sport->description_info }}</p>
            <a href="{{ $sport->link_info }}" class="mt-0 mb-0 text-success text-decoration-none">Read More&nbsp;<svg
                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                class="bi bi-arrow-right">
                <path fill-rule="evenodd"
                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8">
                </path>
              </svg></a>
          </div>
        </div>
        <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5"
          style="height: 120px;">
          {{-- <div
            class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon md mb-0"
            style="background: #22b14c;width: 35px;height: 35px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
              height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right-circle">
              <path fill-rule="evenodd"
                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
              </path>
            </svg></div> --}}
          <div>
            <h4 class="mt-0 mb-0"><strong><span style="color: rgb(26, 26, 26);">Rules</span></strong></h4>
            <p class="mb-0">{{ $sport->description_rule }}</p>
            <a href="{{ $sport->link_rule }}" class="text-success text-decoration-none">Read More&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                <path fill-rule="evenodd"
                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8">
                </path>
              </svg></a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    </div>
  <!-- End: Features Image -->
@endsection