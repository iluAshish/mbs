@extends('web.layouts.main')
@section('content')
 @if(@$banner->image != '')
<section class="bread-nav-wrapper">
    <div class="container-ctn">
        <div class="row align-items-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                @if(@$banner->title)
                                 <div class="big-title">{!! $banner->title ??'' !!}</div>
                             @else
                                 <div class="big-title">Services</div>
                             @endif

                <ul class="list-inline bread-nav-action">
                    <li class="list-inline-item">
                        <a href="{{url('/')}}" class="text-decoration-none">Home</a>
                    </li>
                    <li class="list-inline-item">/</li>
                    <li class="list-inline-item">
                        <a href="{{url('services')}}" class="active text-decoration-none">Services</a>
                    </li>
                </ul>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 d-flex justify-content-end">
                @if(@$banner->image != '')
                <div class="brid-right">
                        {!! Helper::printImage($banner,'image','image_webp','image_attribute','img-fluid') !!}
                </div>
                @else
                <div class="brid-right">
                    {!! Helper::printImage($service_banner,'image','image_webp','image_attribute','img-fluid') !!}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif
@if(@$banner->image == '')
    <section class="bread-crumb-only bread-nav-wrapper">
        <div class="container-ctn">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <ul class="list-inline bread-nav-action">
                        <li class="list-inline-item">
                            <a href="{{url('/')}}" class="text-decoration-none">Home</a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            <a href="{{url('services')}}" class="active text-decoration-none">Services</a>
                        </li>
                    </ul>
                </div>
              
            </div>
        </div>
    </section>
@endif
<section class="service-detail-wrapper pb-0">
    <div class="container-ctn">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="right-content">
                    <p class="small-title">
                        SERVICES
                    </p>
                    <h1 class="big-title">{!! @$service_details->title !!}</h1>
                    <div class="service-img">
                        {!! Helper::printImage($service_details,'image','image_webp','image_attribute','img-fluid') !!}
                    </div>
                    <div class="discription">
                        <!--<p>{!! @$service_details->short_description !!}</p>-->
                        {!! @$service_details->description !!}
                    </div>
                    <div class="sub-section-wrapper">
                        @if(@$service_details->alternate_image != '')
                        <div class="service-img">
                            {!! Helper::printImage($service_details,'alternate_image','alternate_image_webp','alternate_image_attribute','img-fluid') !!}
                        </div>
                        @endif
                    @if(@$service_details->alternate_description != '')
                        <div class="discription">
                            {!! @$service_details->alternate_description !!}
                        </div>
                    @endif
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="service-bar">
                <div class="services-listing-bar">
                        <h2>Services</h2>
                        <ul class="list-inline arrow-list">
                            @foreach($menu as $service_item)
                            <li>
                                <a href="{{url('/')}}/service/{!! $service_item->short_url !!}" class="text-decoration-none">{!! $service_item->title !!}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="service-enquiry">
                        <div class="study-form enq-area">
                            <div class="enq-form">
                                <h2>Enquiry</h2>
                                <form id="service-enquiry" method="post" action="{{url('/')}}/service-enquiry">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                            <div class="filed-btm">
                                                <!-- <label for="sname" class="form-label">Full Name</label> -->
                                                <input type="text" class="form-control" id="sname" name="name" placeholder="Full Name" />
                                                <div id="service-enquiry-error-name" class="error-message">Please enter your name</div>
                                                <div class="filed-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                        <path
                                                            d="M16.7676 14.9141C16.3992 14.0414 15.8645 13.2486 15.1934 12.5801C14.5243 11.9096 13.7317 11.375 12.8594 11.0059C12.8516 11.002 12.8438 11 12.836 10.9961C14.0528 10.1172 14.8438 8.68555 14.8438 7.07031C14.8438 4.39453 12.6758 2.22656 10 2.22656C7.32427 2.22656 5.1563 4.39453 5.1563 7.07031C5.1563 8.68555 5.94731 10.1172 7.16411 10.998C7.1563 11.002 7.14849 11.0039 7.14067 11.0078C6.26567 11.377 5.48052 11.9062 4.80669 12.582C4.1362 13.2511 3.60162 14.0437 3.23247 14.916C2.86982 15.77 2.67423 16.6856 2.6563 17.6133C2.65578 17.6341 2.65943 17.6549 2.66705 17.6743C2.67467 17.6937 2.6861 17.7114 2.70066 17.7263C2.71522 17.7412 2.73262 17.7531 2.75184 17.7612C2.77105 17.7693 2.7917 17.7734 2.81255 17.7734H3.98442C4.07036 17.7734 4.13872 17.7051 4.14067 17.6211C4.17974 16.1133 4.7852 14.7012 5.85552 13.6309C6.96294 12.5234 8.43364 11.9141 10 11.9141C11.5665 11.9141 13.0372 12.5234 14.1446 13.6309C15.2149 14.7012 15.8204 16.1133 15.8594 17.6211C15.8614 17.707 15.9297 17.7734 16.0157 17.7734H17.1875C17.2084 17.7734 17.229 17.7693 17.2483 17.7612C17.2675 17.7531 17.2849 17.7412 17.2994 17.7263C17.314 17.7114 17.3254 17.6937 17.333 17.6743C17.3407 17.6549 17.3443 17.6341 17.3438 17.6133C17.3243 16.6797 17.1309 15.7715 16.7676 14.9141ZM10 10.4297C9.10356 10.4297 8.25981 10.0801 7.62505 9.44531C6.99028 8.81055 6.64067 7.9668 6.64067 7.07031C6.64067 6.17383 6.99028 5.33008 7.62505 4.69531C8.25981 4.06055 9.10356 3.71094 10 3.71094C10.8965 3.71094 11.7403 4.06055 12.375 4.69531C13.0098 5.33008 13.3594 6.17383 13.3594 7.07031C13.3594 7.9668 13.0098 8.81055 12.375 9.44531C11.7403 10.0801 10.8965 10.4297 10 10.4297Z"
                                                            fill="#fff"
                                                        />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                            <div class="filed-btm">
                                                <!-- <label for="snumber" class="form-label">Phone number</label> -->
                                                <input type="tel" class="form-control" id="snumber" name="phone" placeholder="Phone number" />
                                                <div id="service-enquiry-error-number" class="error-message">Please enter your number</div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                            <div class="filed-btm">
                                                <!-- <label for="semail" class="form-label">Email address</label> -->
                                                <input type="email" class="form-control" id="semail" name="email" placeholder="johndoe@gmail.com" />
                                                <div id="service-enquiry-error-email" class="error-message">Please enter your email</div>
                                                <div class="filed-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                                        <rect x="4" y="6" width="16" height="12" stroke="#fff" stroke-width="1.5" />
                                                        <path d="M4 6L12 12L20 6" stroke="#fff" stroke-width="1.5" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                            <div class="filed-btm mb-0">
                                                <!-- <label for="smsg" class="form-label">Message</label> -->
                                                <textarea class="form-control" placeholder="Say Something" id="smsg" name="message"></textarea>
                                                <div id="service-enquiry-error-msg" class="error-message">Please enter message</div>
                                                <div class="filed-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                                        <path
                                                            d="M16.656 0.92995L4.46402 13.122C3.99836 13.5851 3.6292 14.136 3.3779 14.7428C3.1266 15.3496 2.99817 16.0002 3.00002 16.6569V18C3.00002 18.2652 3.10538 18.5195 3.29291 18.7071C3.48045 18.8946 3.7348 19 4.00002 19H5.34302C5.99978 19.0018 6.65039 18.8734 7.25718 18.6221C7.86396 18.3708 8.41488 18.0016 8.87802 17.5359L21.07 5.34395C21.6544 4.75812 21.9826 3.96443 21.9826 3.13695C21.9826 2.30948 21.6544 1.51578 21.07 0.92995C20.4757 0.361844 19.6852 0.0447998 18.863 0.0447998C18.0408 0.0447998 17.2503 0.361844 16.656 0.92995ZM19.656 3.92995L7.46402 16.122C6.90015 16.6824 6.13803 16.9979 5.34302 17H5.00002V16.6569C5.0021 15.8619 5.31759 15.0998 5.87802 14.536L18.07 2.34395C18.2836 2.13991 18.5676 2.02604 18.863 2.02604C19.1584 2.02604 19.4424 2.13991 19.656 2.34395C19.866 2.55447 19.9839 2.83964 19.9839 3.13695C19.9839 3.43426 19.866 3.71944 19.656 3.92995Z"
                                                            fill="#fff"
                                                        />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                            <div class="primaryBtn" id="btnposition">
                                                <div id="slide"></div>
                                                <input type="hidden" name="type" value="UAE">
                                                <input type="hidden" name="service_id" value="{!! @$service_details->id !!}">
                                                <button class="btn" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="enq-form">
                        <form action="{{url('/')}}/service-enquiry" id="product_form" method="POST">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="filed-btm">
                                        <label for="fname" class="form-label">Full Name*</label>
                                        <input type="text" class="form-control" name="name" id="fname" placeholder="Full Name" />
                                        <div class="filed-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M16.7676 14.9141C16.3992 14.0414 15.8645 13.2486 15.1934 12.5801C14.5243 11.9096 13.7317 11.375 12.8594 11.0059C12.8516 11.002 12.8438 11 12.836 10.9961C14.0528 10.1172 14.8438 8.68555 14.8438 7.07031C14.8438 4.39453 12.6758 2.22656 10 2.22656C7.32427 2.22656 5.1563 4.39453 5.1563 7.07031C5.1563 8.68555 5.94731 10.1172 7.16411 10.998C7.1563 11.002 7.14849 11.0039 7.14067 11.0078C6.26567 11.377 5.48052 11.9062 4.80669 12.582C4.1362 13.2511 3.60162 14.0437 3.23247 14.916C2.86982 15.77 2.67423 16.6856 2.6563 17.6133C2.65578 17.6341 2.65943 17.6549 2.66705 17.6743C2.67467 17.6937 2.6861 17.7114 2.70066 17.7263C2.71522 17.7412 2.73262 17.7531 2.75184 17.7612C2.77105 17.7693 2.7917 17.7734 2.81255 17.7734H3.98442C4.07036 17.7734 4.13872 17.7051 4.14067 17.6211C4.17974 16.1133 4.7852 14.7012 5.85552 13.6309C6.96294 12.5234 8.43364 11.9141 10 11.9141C11.5665 11.9141 13.0372 12.5234 14.1446 13.6309C15.2149 14.7012 15.8204 16.1133 15.8594 17.6211C15.8614 17.707 15.9297 17.7734 16.0157 17.7734H17.1875C17.2084 17.7734 17.229 17.7693 17.2483 17.7612C17.2675 17.7531 17.2849 17.7412 17.2994 17.7263C17.314 17.7114 17.3254 17.6937 17.333 17.6743C17.3407 17.6549 17.3443 17.6341 17.3438 17.6133C17.3243 16.6797 17.1309 15.7715 16.7676 14.9141ZM10 10.4297C9.10356 10.4297 8.25981 10.0801 7.62505 9.44531C6.99028 8.81055 6.64067 7.9668 6.64067 7.07031C6.64067 6.17383 6.99028 5.33008 7.62505 4.69531C8.25981 4.06055 9.10356 3.71094 10 3.71094C10.8965 3.71094 11.7403 4.06055 12.375 4.69531C13.0098 5.33008 13.3594 6.17383 13.3594 7.07031C13.3594 7.9668 13.0098 8.81055 12.375 9.44531C11.7403 10.0801 10.8965 10.4297 10 10.4297Z"
                                                    fill="#05735B"
                                                />
                                            </svg>
                                            
                                        </div>
                                        <div id="error-name" class="error-message">Please enter Name</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="filed-btm">
                                        <label for="email" class="form-label">Email address*</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="johndoe@gmail.com" />
                                        <div class="filed-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                                <rect x="4" y="6" width="16" height="12" stroke="#05735B" stroke-width="1.5" />
                                                <path d="M4 6L12 12L20 6" stroke="#05735B" stroke-width="1.5" />
                                            </svg>
                                        </div>
                                        <div id="error-email" class="error-message">Please enter Email</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="filed-btm">
                                        <label for="number" class="form-label">Phone number*</label>
                                        <input type="number" class="form-control phoneNumber" name="phone" id="number" placeholder="+1 000 000 00" />
                                        <div class="filed-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect x="6" y="3" width="12" height="18" stroke="#05735B" stroke-width="1.5" />
                                                <circle cx="12" cy="17" r="1" fill="#05735B" />
                                            </svg>
                                        </div>
                                        <div id="error-number" class="error-message">Invalid UAE phone number</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="filed-btm">
                                        <label for="msg" class="form-label">Message</label>
                                        <textarea class="form-control" placeholder="Say Something" name="message" id="msg"></textarea>
                                        <div class="filed-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                                <path
                                                    d="M16.656 0.92995L4.46402 13.122C3.99836 13.5851 3.6292 14.136 3.3779 14.7428C3.1266 15.3496 2.99817 16.0002 3.00002 16.6569V18C3.00002 18.2652 3.10538 18.5195 3.29291 18.7071C3.48045 18.8946 3.7348 19 4.00002 19H5.34302C5.99978 19.0018 6.65039 18.8734 7.25718 18.6221C7.86396 18.3708 8.41488 18.0016 8.87802 17.5359L21.07 5.34395C21.6544 4.75812 21.9826 3.96443 21.9826 3.13695C21.9826 2.30948 21.6544 1.51578 21.07 0.92995C20.4757 0.361844 19.6852 0.0447998 18.863 0.0447998C18.0408 0.0447998 17.2503 0.361844 16.656 0.92995ZM19.656 3.92995L7.46402 16.122C6.90015 16.6824 6.13803 16.9979 5.34302 17H5.00002V16.6569C5.0021 15.8619 5.31759 15.0998 5.87802 14.536L18.07 2.34395C18.2836 2.13991 18.5676 2.02604 18.863 2.02604C19.1584 2.02604 19.4424 2.13991 19.656 2.34395C19.866 2.55447 19.9839 2.83964 19.9839 3.13695C19.9839 3.43426 19.866 3.71944 19.656 3.92995Z"
                                                    fill="#05735B"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="quick-enq-wrapper">
                                        <input type="hidden" name="service_id" value="{!! @$service_details->id !!}">
                                        <button href="#" class="quick-enq text-decoration-none">
                                            <div class="btn-icon">
                                                <img src="{{ asset('web/images/icons/send.svg') }}" class="img-fluid" alt="button" />
                                            </div>
                                            <div class="btn-title">
                                                <p>Send</p>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                  
                    <div class="service-info-box">
                        <div class="service-support">
                            <div><img src="web/images/icons/service-call.webp" class="img-fluid s-call" alt="" /></div>
                            <div><h2>CALL US</h2></div>
                        </div>
                        <ul class="call-flex">
                            @foreach ($locationList as $location)
                                <li>
                                    <a href="tel:{{ $location->phone_number }}" class="text-decoration-none"><span class="gray-txt">{{ $location->name }}:</span>{{ $location->phone_number }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- service slider -->
<section class="service-wrapper s-slider-wrapper">
    <div class="container-ctn">
        <div class="row align-items-end">
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                <p class="small-title">
                    OUR SERVICES
                </p>
                <h2 class="big-title">We Offer A Wide Variety Of Services</h2>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 d-flex justify-content-end">
                <div class="primaryBtn" id="btnposition">
                    <div id="slide"></div>
                    <a href="#" class="text-decoration-none"> EXPLORE MORE</a>
                </div>
            </div>
        </div>
        <div class="service-slider">
            @foreach($other_services as $other_service)

            <div>
                <a href="{{url('/')}}/service/{!! $other_service->short_url !!}">
                    <div class="service-box">
                        {{-- <img src="web/images/service-1.png" class="img-fluid" width="521" height="461" alt="service slider" /> --}}
                        {!! Helper::printImage($other_service,'image','image_webp','image_attribute','img-fluid') !!}
                        <div class="slider-content" >
                            @if(@$other_service->title != '')
                                <h3>{!! $other_service->title !!}</h3>
                            @endif
                            <div class="discription">
                                @if(@$other_service->short_description != '')
                                <p>{!! $other_service->short_description !!}</p>
                                @endif
                            </div>
                            <div class="read-more">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                        <g clip-path="url(#clip0_13_136)">
                                            <path
                                                d="M23.75 0H6.25C2.80375 0 0 2.80375 0 6.25V23.75C0 27.1963 2.80375 30 6.25 30H23.75C27.1963 30 30 27.1963 30 23.75V6.25C30 2.80375 27.1963 0 23.75 0ZM20 16.25H16.25V20C16.25 20.6912 15.69 21.25 15 21.25C14.31 21.25 13.75 20.6912 13.75 20V16.25H10C9.31 16.25 8.75 15.6912 8.75 15C8.75 14.3088 9.31 13.75 10 13.75H13.75V10C13.75 9.30875 14.31 8.75 15 8.75C15.69 8.75 16.25 9.30875 16.25 10V13.75H20C20.69 13.75 21.25 14.3088 21.25 15C21.25 15.6912 20.69 16.25 20 16.25Z"
                                                fill="#E9651B"
                                            />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_13_136">
                                                <rect width="30" height="30" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                                <span class="action-title">Read More</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end of service slider -->

@endsection
