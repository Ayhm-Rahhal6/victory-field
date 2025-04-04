@extends('layouts.public')
@section('content')
<!-- Start: Team -->
<div class="container py-4 py-xl-5">

    <div class="row mb-4 mb-lg-5 pt-5 pb-5 d-flex flex-column justify-content-center align-items-center">
      <div class="col-md-12 col-lg-6 col-xl-6 text-center mx-auto w-100" data-aos="zoom-in" data-aos-duration="250" data-aos-delay="250">
        <h2><strong><span style="color: rgb(34, 177, 76);">Our Story</span></strong></h2>
        <p class="w-lg-75"><strong><em><span style="color: rgb(26, 26, 26);">Born from frustration with complicated field reservations, VictoryField started with a simple goal: make sports logistics easy. Founded by athletes who understood the problem firsthand, we've grown from managing a handful of local fields to connecting players with hundreds of facilities. We believe time is better spent playing sports than organizing them.</span></em></strong></p>
      </div>
      <div class="col-md-12 col-lg-6 col-xl-6 text-center pt-3 w-100" data-aos="fade-up" data-aos-duration="350" data-aos-delay="300">
        <img src="{{ asset('assets/img/h2.png') }}" alt="Our Story - VictoryField journey" class="img-fluid rounded shadow" style="max-height: 400px;">
      </div>
    </div>
    <div class="row mb-4 mb-lg-5 pt-5">
      <div class="col-md-12 col-lg-12 col-xl-12 text-center mx-auto" data-aos="zoom-in" data-aos-duration="250"
        data-aos-delay="250">
        <h2><strong><span style="color: rgb(34, 177, 76);">Our Team</span></strong></h2>
        <p class="w-lg-50"><strong><em><span style="color: rgb(26, 26, 26);">At VictoryField, our dedicated team of
                developers, customer support, and sports enthusiasts work together to provide a seamless booking
                experience. We are committed to making sports fields more accessible and easy to reserve for
                everyone!</span></em></strong></p>
      </div>
    </div>
    <div class="row gy-4 row-cols-2 row-cols-md-4">
      <div class="col" data-aos="fade-right" data-aos-duration="250" data-aos-delay="250">
        <div class="card border-0 shadow-none" style="background: #e0e0e0;">
          <div class="card-body text-center d-flex flex-column align-items-center p-0" style="background: #e0e0e0;"><img
              class="rounded-circle mb-3 fit-cover" width="130" height="130"
              src="/assets/img/ayhmrahhal-removebg-preview.png?h=e6d8c8752a2071a12e740674f2d24050">
            <h5 class="fw-bold text-primary card-title mb-0"><span style="color: rgb(34, 177, 76);">Ayhm Rahhal</span>
            </h5>
            <p class="text-muted card-text mb-2"><strong><span style="color: rgb(26, 26, 26);">Full-Stack Web
                  Developer</span></strong></p>
            <ul class="list-inline fs-6 text-muted w-100 mb-0" style="color: #1a1a1a;">
              <li class="list-inline-item text-center">
                <a href="https://www.facebook.com/ayhmrahhal">
                <div class="d-flex flex-column align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                    height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook"
                    data-bss-hover-animate="tada" style="color: #1a1a1a;">
                    <path
                      d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951">
                    </path>
                  </svg></div>
                </a>
              </li>
              <li class="list-inline-item text-center">
                <a href="https://github.com/AyhmRahhal">
                <div class="d-flex flex-column align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                    height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-github"
                    data-bss-hover-animate="tada" style="color: #1a1a1a;">
                    <path
                      d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8">
                    </path>
                  </svg></div>
                </a>
              </li>
              <li class="list-inline-item text-center">
                <a href="https://www.linkedin.com/in/ayhm-rahhal/">
                <div class="d-flex flex-column align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                    height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-linkedin"
                    data-bss-hover-animate="tada" style="color: #1a1a1a;">
                    <path
                      d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401m-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4">
                    </path>
                  </svg></div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col" data-aos="fade-up" data-aos-duration="250" data-aos-delay="250">
        <div class="card border-0 shadow-none" style="background: #e0e0e0;">
          <div class="card-body text-center d-flex flex-column align-items-center p-0" style="background: #e0e0e0;"><img
              class="rounded-circle mb-3 fit-cover" width="130" height="130"
              src="/assets/img/laith.png?h=3d1d6fea5e00a41b1d02857651c2dee2">
            <h5 class="fw-bold text-primary card-title mb-0"><span style="color: rgb(34, 177, 76);">Laith AlQudah</span>
            </h5>
            <p class="text-muted card-text mb-2"><strong><span style="color: rgb(26, 26, 26);">Full-Stack Web
                  Developer</span></strong></p>
            <ul class="list-inline fs-6 text-muted w-100 mb-0">
              <li class="list-inline-item text-center">
                <a href="#">
                <div class="d-flex flex-column align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                    height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook"
                    data-bss-hover-animate="tada" style="color: #1a1a1a;">
                    <path
                      d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951">
                    </path>
                  </svg></div>
                </a>
              </li>
              <li class="list-inline-item text-center">
                <a href="https://github.com/laithqud">
                <div class="d-flex flex-column align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                    height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-github"
                    data-bss-hover-animate="tada" style="color: #1a1a1a;">
                    <path
                      d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8">
                    </path>
                  </svg></div>
                </a>
              </li>
              <li class="list-inline-item text-center">
                <a href="https://www.linkedin.com/in/laith-al-qudah-88bb45254/">
                <div class="d-flex flex-column align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                    height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-linkedin"
                    data-bss-hover-animate="tada" style="color: #1a1a1a;">
                    <path
                      d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401m-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4">
                    </path>
                  </svg></div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col" data-aos="fade-up" data-aos-duration="250" data-aos-delay="250">
        <div class="card border-0 shadow-none" style="background: #e0e0e0;">
          <div class="card-body text-center d-flex flex-column align-items-center p-0" style="background: #e0e0e0;"><img
              class="rounded-circle mb-3 fit-cover" width="130" height="130"
              src="/assets/img/mohammad.png?h=d94a5513c71512cb8efdb02e89956ed1">
            <h5 class="fw-bold text-primary card-title mb-0"><span style="color: rgb(34, 177, 76);">Mohammad
                Rasheed</span></h5>
            <p class="text-muted card-text mb-2"><strong><span style="color: rgb(26, 26, 26);">Full-Stack Web
                  Developer</span></strong></p>
            <ul class="list-inline fs-6 text-muted w-100 mb-0" style="color: #1a1a1a;">
              <li class="list-inline-item text-center">
                <a href="#">
                <div class="d-flex flex-column align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                    height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook"
                    data-bss-hover-animate="tada" style="color: #1a1a1a;">
                    <path
                      d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951">
                    </path>
                  </svg></div>
                </a>
              </li>
              <li class="list-inline-item text-center">
                <a href="https://github.com/MNSR97">
                <div class="d-flex flex-column align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                    height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-github"
                    data-bss-hover-animate="tada" style="color: #1a1a1a;">
                    <path
                      d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8">
                    </path>
                  </svg></div>
                </a>
              </li>
              <li class="list-inline-item text-center">
                <a href="https://www.linkedin.com/in/mohammad-rasheed-8ba961346/">
                <div class="d-flex flex-column align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                    height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-linkedin"
                    data-bss-hover-animate="tada" style="color: #1a1a1a;">
                    <path
                      d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401m-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4">
                    </path>
                  </svg></div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col" data-aos="fade-left" data-aos-duration="250" data-aos-delay="250">
        <div class="card border-0 shadow-none" style="background: #e0e0e0;">
          <div class="card-body text-center d-flex flex-column align-items-center p-0" style="background: #e0e0e0;"><img
              class="rounded-circle mb-3 fit-cover" width="130" height="130"
              src="/assets/img/luma.png?h=ced5d2d98cad603e5106b4b18a28b2bc">
            <h5 class="fw-bold text-primary card-title mb-0"><span style="color: rgb(34, 177, 76);">Luma Shreideh</span>
            </h5>
            <p class="text-muted card-text mb-2"><strong><span style="color: rgb(26, 26, 26);">Full-Stack Web
                  Developer</span></strong></p>
            <ul class="list-inline fs-6 text-muted w-100 mb-0">
              <li class="list-inline-item text-center">
                <a href="#">
                <div class="d-flex flex-column align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                    height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook"
                    data-bss-hover-animate="tada" style="color: #1a1a1a;">
                    <path
                      d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951">
                    </path>
                  </svg></div>
                </a>
              </li>
              <li class="list-inline-item text-center">
                <a href="https://github.com/lomaalshraideh">
                <div class="d-flex flex-column align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                    height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-github"
                    data-bss-hover-animate="tada" style="color: #1a1a1a;">
                    <path
                      d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8">
                    </path>
                  </svg></div>
                </a>
              </li>
              <li class="list-inline-item text-center">
                <a href="https://www.linkedin.com/in/luma-alshraideh-237119253/" >
                <div class="d-flex flex-column align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                    height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-linkedin"
                    data-bss-hover-animate="tada" style="color: #1a1a1a;">
                    <path
                      d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401m-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4">
                    </path>
                  </svg></div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End: Team -->

@endsection