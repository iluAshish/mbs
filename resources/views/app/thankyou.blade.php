@extends('web.layouts.main')
@section('content')
    <!-- hero slider -->
    <div class="breadcumbs-wrapper">
        <svg xmlns="http://www.w3.org/2000/svg" width="1920" height="600" viewBox="0 0 1920 600" fill="none">
            <path d="M0 0V600L1920 432V0H0Z" fill="url(#paint0_linear_359_1772)" />
            <defs>
                <linearGradient id="paint0_linear_359_1772" x1="1.14887e-06" y1="260" x2="2041" y2="83.9999" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#0C709D" />
                    <stop offset="1" stop-color="#75B341" />
                </linearGradient>
            </defs>
        </svg>
        <div class="container-ctn">
            <div class="left-banner">
                <div class="left-wrapper">
                    <div class="center-title">
                        <h3>Thank You</h3>
                        <h2>Thank You</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-img">
            <div class="mask-img">
                <img src="{{ asset('web/images/about-right.png') }}" class="img-fluid bread-img" alt="breadcumb image" />
            </div>
        </div>
        <div class="bread-action">
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <a href="/" class="text-decoration-none">Home</a>
                </li>
                <li class="list-inline-item">></li>
                <li class="list-inline-item">
                    <a href="/thankyou" class="active text-decoration-none">Thank You</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- error wrapper -->
    <section class="thankyou-wrapper">
        <div class="container-ctn">
            <div class="center-wrapper">
                <div class="mid-title">
                    <p>Lorem Ipsum is simply dummy text</p>
                </div>
                <div class="larg-txt">
                    <h2>Thank You</h2>
                </div>
            </div>
            <div class="quick-enq-wrapper">
                <a href="/" class="quick-enq text-decoration-none">
                    <div class="btn-icon">
                        <img src="{{ asset('web/images/icons/enq-btn-icon.svg') }}" class="img-fluid" alt="button" />
                    </div>
                    <div class="btn-title">
                        <p>Home</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- end of error wrapper -->
    @endsection
