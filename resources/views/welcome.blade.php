@extends('layouts.public')
@section('content')
  <!-- Start: Hero Carousel -->
  <div class="carousel slide" data-bs-ride="carousel" id="carousel-1" style="height: 600px;">
    <div class="carousel-inner h-100">
        <div class="carousel-item active h-100" style="filter: brightness(55%);">
            <img class="w-100 d-block position-absolute h-100 fit-cover"
                src="/assets/img/slid1.webp?h=612e2267d863dbd293490f5a0de4dcb7" alt="Slide Image" style="z-index: -1;">
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                <h1 class=" fw-bold" style="color: rgb(255, 255, 255);">Welcome to Our Website</h1>
                <p class="text-white">Enjoy the best experience in booking sports fields easily</p>
                <a href="/reservation" class="btn mt-3" style="background-color: #21b04c; color: rgb(255, 255, 255); padding: 10px 20px; border-radius: 5px; font-size: 18px;">Book Now</a>
            </div>
        </div>
    </div>
    <div>
        <a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev">
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next">
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <div class="carousel-indicators"></div>
</div>


  <!-- End: Hero Carousel -->


  <h2 class="text-center pb-0 mb-4 ms-5 mt-5" data-aos="zoom-in" data-aos-duration="250" data-aos-delay="250"
    style="color: #75aadb;"><span style="color: rgb(26, 26, 26);">We Offer Awesome</span><span
      style="color: #d12d33;"><strong><span style="color: rgb(34, 177, 76);">&nbsp;Services</span></strong></span></h2>
  
  
      <!-- Start: --mp--Animated Service Box -->
  <section class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4" data-aos="zoom-in" data-aos-duration="250" data-aos-delay="250">
          <div class="serviceBox pink">
            <div class="service-icon"><span><i class="fa fa-thumbs-o-up"></i></span></div>
            <h1 class="titleBlurb">Reservation</h1>
            <p>On the Reservation Page, users can browse available fields, view details, select a date and time, and
              book easily. Login is required for booking.</p>
          </div>
        </div>
        <div class="col-sm-12 col-md-4" data-aos="zoom-in" data-aos-duration="250" data-aos-delay="250">
          <div class="serviceBox pink">
            <div class="service-icon"><span><i class="fa fa-futbol-o"></i></span></div>
            <h1 class="titleBlurb">Sports</h1>
            <p>The Sports Page provides information and rules for each sport to help users understand them better before
              booking a field.</p>
          </div>
        </div>
        <div class="col-sm-12 col-md-4" data-aos="zoom-in" data-aos-duration="250" data-aos-delay="250">
          <div class="serviceBox pink">
            <div class="service-icon"><span><i class="fa fa-map"></i></span></div>
            <h1 class="titleBlurb">Location</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui quaerat fugit quas veniam perferendis
              repudiandae sequi, dolore quisquam illum?</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End: --mp--Animated Service Box -->
  
  
  
  <!-- Start: Articles Cards -->
  <div class="container py-4 py-xl-5 mt-2 mb-5">
    <div class="row mb-5" data-aos="zoom-in" data-aos-duration="250" data-aos-delay="250">
      <div class="col-md-11 col-lg-10 col-xl-9 text-center mx-auto">
        <h2>Latest <strong><span style="color: #21b04c;">News</span></strong></h2>
        <p class="w-lg-50"><strong><em><span style="color: rgb(26, 26, 26);">Stay updated with the latest news and
                events – right here!</span></em></strong></p>
      </div>
    </div>
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
      @foreach ($news as $item)
      <div class="col-lg-4" data-aos="zoom-in-up">
        <div class="card"
            style="border-radius: 50px; width: 100%; height: 450px; overflow: hidden;">
            <img class="card-img-top w-100 d-block fit-cover"
                style="height: 200px; border-top-left-radius: 50px; border-top-right-radius: 50px; object-fit: cover;"
                src="{{ asset("storage/$item->image") }}" width="264" height="200">
            <div class="card-body p-4 d-flex flex-column justify-content-between">
                <h4 class="card-title" style="max-height: 60px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $item->title }}</h4>
                <p class="card-text" style="max-height: 80px; overflow: hidden; text-overflow: ellipsis;">{{ $item->description }}</p>
                <div class="d-flex align-items-center">
                    <img class="rounded-circle flex-shrink-0 me-3 fit-cover"
                        width="50" height="50" src="{{ asset("storage/$item->logo") }}">
                    <div>
                        <p class="fw-bold mb-0 mt-2">{{ $item->source }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
      @endforeach
    </div>
  </div>
  <!-- End: Articles Cards -->
  
  
  <!-- Start: Hero Features (Material Design Animation) -->
  <section class="mt-5">
    <div class="row mb-5" data-aos="zoom-in" data-aos-duration="250" data-aos-delay="250">
      <div class="col-md-11 col-lg-10 col-xl-9 text-center mx-auto">
        <h2>Upcoming <strong><span style="color: rgb(34, 177, 76);">Updates</span></strong></h2>
      </div>
    </div>
    <div data-aos="slide-up" data-aos-duration="250" data-aos-delay="250"
      style="height: 600px;background: url(&quot;https://www.architectandinteriorsindia.com/cloud/2022/09/23/VegasSports-15-1200x900.jpg&quot;) center / cover;">
    </div>
    <div class="container h-100 position-relative" style="top: -50px;">
      <div class="row gy-5 gy-lg-0 row-cols-1 row-cols-md-2 row-cols-lg-3">
        <div class="col" data-aos="zoom-in" data-aos-duration="250" data-aos-delay="250">
          <div class="card" style="background: #1a1a1a;">
            <div class="card-body pt-5 p-4" style="background: #1a1a1a;">
              <div
                class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center position-absolute mb-3 bs-icon"
                style="top: -30px;background: #22b14c;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                  fill="currentColor" viewBox="0 0 16 16" class="bi bi-cart2">
                  <path
                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0">
                  </path>
                </svg></div>
              <h5 class="card-title"><strong><span style="color: rgb(255, 255, 255);">Store</span></strong></h5>
              <p class="card-text"><br><span style="color: rgb(255, 255, 255);">Browse and buy top-quality sports gear
                  with ease. Find everything you need to boost your game effortlessly!</span></p>
            </div>
          </div>
        </div>
        <div class="col" data-aos="zoom-in" data-aos-duration="250" data-aos-delay="250">
          <div class="card" style="background: #1a1a1a;">
            <div class="card-body pt-5 p-4" style="background: #1a1a1a;">
              <div
                class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center position-absolute mb-3 bs-icon"
                style="top: -30px;background: #22b14c;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                  fill="currentColor" viewBox="0 0 16 16" class="bi bi-truck">
                  <path
                    d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2">
                  </path>
                </svg></div>
              <h5 class="card-title"><strong><span style="color: rgb(255, 255, 255);">D</span></strong><span
                  style="color: rgb(255, 255, 255);">elivery</span></h5>
              <p class="card-text"><br><span style="color: rgb(255, 255, 255);">Get your sports gear quickly and
                  securely delivered. Shop with ease and receive your order without any hassle!</span></p>
            </div>
          </div>
        </div>
        <div class="col" data-aos="zoom-in" data-aos-duration="250" data-aos-delay="250">
          <div class="card" style="background: #1a1a1a;">
            <div class="card-body pt-5 p-4" style="background: #1a1a1a;">
              <div
                class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center position-absolute mb-3 bs-icon"
                style="top: -30px;background: #22b14c;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                  fill="currentColor" viewBox="0 0 16 16" class="bi bi-clipboard-plus">
                  <path fill-rule="evenodd"
                    d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7">
                  </path>
                  <path
                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z">
                  </path>
                  <path
                    d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z">
                  </path>
                </svg></div>
              <h5 class="card-title"><strong><span style="color: rgb(255, 255, 255);">Membership Program</span></strong>
              </h5>
              <p class="text-start card-text"><span style="color: rgb(255, 255, 255);">&nbsp; &nbsp; &nbsp; &nbsp;
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Join our exclusive
                  membership for great benefits. Enjoy discounts, priority booking, and premium access!</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End: Hero Features (Material Design Animation) -->
  
  
  
  
 <!-- Start: Stats -->
<div class="container py-4 py-xl-5 mb-5" style="background: #e0e0e0;">
  <div class="row gy-4 row-cols-2 row-cols-md-4 mt-0">
      <div class="col-lg-4" data-aos="zoom-out-right" data-aos-duration="250" data-aos-delay="250">
          <div class="text-center d-flex flex-column justify-content-center align-items-center py-3">
              <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-2 bs-icon lg" style="background: #22b14c;">
                  <i class="fa fa-users"></i>
              </div>
              <div class="px-3">
                  <h2 class="fw-bold mb-0">{{ $usersCount }}+</h2>
                  <p class="mb-0">Users</p>
              </div>
          </div>
      </div>
      <div class="col-lg-4" data-aos="zoom-out-up" data-aos-duration="250" data-aos-delay="250">
          <div class="text-center d-flex flex-column justify-content-center align-items-center py-3">
              <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-2 bs-icon lg" style="background: #22b14c;">
                  <i class="fa fa-ticket"></i>
              </div>
              <div class="px-3">
                  <h2 class="fw-bold mb-0">{{ $reservationsCount }}+</h2>
                  <p class="mb-0">Reservations</p>
              </div>
          </div>
      </div>
      <div class="col-lg-4" data-aos="zoom-out-left" data-aos-duration="250" data-aos-delay="250">
          <div class="text-center d-flex flex-column justify-content-center align-items-center py-3">
              <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-2 bs-icon lg" style="background: #22b14c;">
                  <i class="fa fa-envelope"></i>
              </div>
              <div class="px-3">
                  <h2 class="fw-bold mb-0">{{ $contactsCount }}+</h2>
                  <p class="mb-0">Contact Us</p>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- End: Stats -->

  
  
@endsection
