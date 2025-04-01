@extends('layouts.public')
@section('content')
<!-- Start: Articles Cards -->
<div class="container py-4 py-xl-5"><!-- Start: Pretty Search Form -->
    <form class="search-form mb-0">
        <div class="input-group"><span class="input-group-text"><i class="fa fa-search"></i></span><input
                class="form-control" type="text" placeholder="Search..."><!-- Start: dropdown-search-bs4 -->
            <div class="input-group-text dropdown"><button class="btn btn-secondary dropdown-toggle" type="button"
                    aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"
                    style="background: #22b14c;">Dropdown Baby</button>
                <div class="dropdown-menu"><input class="form-control form-control dropdown-search-input"
                        type="text" placeholder="Search.."><a class="dropdown-item" href="#">Angular</a><a
                        class="dropdown-item" href="#">Java</a><a class="dropdown-item" href="#">JavaScript</a>
                </div>
            </div><!-- End: dropdown-search-bs4 -->
        </div>
    </form><!-- End: Pretty Search Form --><!-- Start: ♣ Filterable Cards ♣ -->
    <section class="py-5">
        <div class="row mb-5" data-aos="zoom-in" data-aos-duration="250" data-aos-delay="250">
            <div class="col-md-8 col-lg-11 col-xl-9 text-center mx-auto">
                <h2><strong><span style="color: rgb(34, 177, 76);">Football</span></strong></h2>
                <p class="w-lg-50"><strong><em><span style="color: rgb(26, 26, 26);">Curae hendrerit donec commodo
                                hendrerit egestas tempus, turpis facilisis nostra nunc. Vestibulum dui eget
                                ultrices.</span></em></strong></p>
            </div>
        </div><!-- Start: Cards container -->
        <div class="container"><!-- Start: filter controls -->
            <div class="filtr-controls text-center lead text-uppercase mb-3"></div>
            <!-- End: filter controls --><!-- Start: Cards -->
            <div class="row filtr-container"><!-- Start: Card column -->
                <div class="col-md-6 col-lg-4 filtr-item" data-aos="zoom-in-up" data-aos-duration="250"
                    data-aos-delay="250" data-category="2,3">
                    <div class="card border-dark"><img class="img-fluid card-img-top w-100 d-block rounded-0"
                            src="/assets/img/f1.webp?h=9c51020e172cad3f3134e7f20e520115">
                        <div class="card-body">
                            <h6>Heading</h6>
                            <h6>Heading</h6>
                        </div><!-- Start: Card footer -->
                        <div class="d-flex card-footer"><button class="btn btn-dark btn-sm" type="button"
                                style="background: #22b14c;border-color: #22b14c;border-radius: 10px;">Reservation</button><button
                                class="btn btn-outline-dark btn-sm ms-auto" type="button"
                                style="border-radius: 10px;border-color: #22b14c;background: #22b14c;"><span
                                    style="color: rgb(255, 255, 255);">&nbsp;Location</span></button></div>
                        <!-- End: Card footer -->
                    </div>
                </div><!-- End: Card column -->
            </div><!-- End: Cards -->
        </div><!-- End: Cards container -->
    </section><!-- End: ♣ Filterable Cards ♣ -->
</div><!-- End: Articles Cards -->

@endsection
