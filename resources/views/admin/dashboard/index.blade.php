@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">Welcome {{ Auth::user()->name }}! 🎉</h5>
              <p class="mb-4">
                Thank you for logging in admin. Keep track of your platform's performance below.
              </p>
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png')}}" height="140" alt="Welcome User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
      <div class="mb-2 mb-md-0">©
        <script>document.write(new Date().getFullYear());</script> SOS
        <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder"></a>
      </div>
      <div class="col-md navbar-nav-right d-flex align-items-center" id="navbar-collapse">
         <marquee>
          <h1 class="align-items-center ms-auto" style="font-size: 20px;">
            <b>Southern Leyte State University - Bontoc Campus | Scholarship Opportunity System</b>
          </h1>
         </marquee>
      </div>
      <div class="d-none d-lg-inline-block">
        <img src="../assets/img/img/logo.jpg" alt="logo" width="20" height="20">
        <span class="brand-text demo menu-text"></span>
      </div>  
    </div>
  </footer>
  <!-- / Footer -->
</div>
@endsection