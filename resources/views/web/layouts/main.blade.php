<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{asset(@$siteInformation->logo)}}" />
    <meta name="title" content="{!! isset($meta_data) ? $meta_data->meta_title : '' !!}" />
    <meta name="description" content="{!! isset($meta_data) ? $meta_data->meta_description : '' !!}" />
    <meta name="keywords" content="{!! isset($meta_data) ? $meta_data->meta_keyword : '' !!}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{!! @$meta_data->meta_title !!}</title>
    {!! isset($meta_data) ? $meta_data->other_meta_tag : '' !!} {!! isset($$siteInformation) ? $$siteInformation->header_tag : '' !!}

    <!-- jQuery first -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- tel With country code -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    <link rel="stylesheet" href="https://pentacodesdemo.com/medicom/assets/css/star-rating-svg.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!--Fancy Box-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('web/css/style.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/custom_animation.min.css') }}" /> -->
    <link rel="shortcut icon" href="{{ asset('web/images/fav.png') }}" type="image/png">
    <link rel="apple-touch-icon" sizes="128x128" href="{{ asset('images/niceicon.png') }}">
    <link rel="stylesheet" href="{{ asset('web/css/lib/slick-full.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/lib/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link rel="stylesheet" href="{{ asset('web/css/lib/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/scss/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

  
    <script>
        var base_url = "{{ url('/') }}";
        var token = "{{ csrf_token() }}";
    </script>
</head>

<body id="home">
      <header id="header">
        <div class="top-header">
            <div class="container-ctn">
                <div class="d-flex justify-content-end justify-content-md-between">
                    <ul class="country d-flex align-items-center">
                        <li><a href=""><img src="{{ asset('web/images/icons/kuwait.webp')}}" width="30" height="30" alt="Kuwait">
                                Kuwait</a></li>
                        <li><a href=""><img src="{{ asset('web/images/icons/uae.webp') }}" width="30" height="30" alt="UAE">
                                UAE</a></li>
                    </ul>
                    <div class="contact-details d-flex align-items-center">
                        <div class="phone">
                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2.29977 1.53211C3.21252 0.624606 4.71552 0.785856 5.47977 1.80736L6.42627 3.07036C7.04877 3.90136 6.99327 5.06236 6.25452 5.79661L6.07602 5.97511C6.05578 6.05004 6.05372 6.12872 6.07002 6.20461C6.11727 6.51061 6.37302 7.15861 7.44402 8.22361C8.51502 9.28861 9.16752 9.54361 9.47802 9.59161C9.55626 9.60734 9.63706 9.60503 9.71427 9.58486L10.0203 9.28036C10.6773 8.62786 11.6853 8.50561 12.4983 8.94736L13.9308 9.72736C15.1585 10.3934 15.4683 12.0614 14.4633 13.0611L13.3975 14.1201C13.0615 14.4539 12.61 14.7321 12.0595 14.7839C10.702 14.9106 7.53927 14.7486 4.21452 11.4434C1.11177 8.35786 0.51627 5.66686 0.44052 4.34086C0.40302 3.67036 0.71952 3.10336 1.12302 2.70286L2.29977 1.53211ZM4.57977 2.48161C4.19952 1.97386 3.49152 1.93336 3.09252 2.33011L1.91502 3.50011C1.66752 3.74611 1.54902 4.01761 1.56402 4.27711C1.62402 5.33086 2.10402 7.75861 5.00802 10.6461C8.05452 13.6746 10.8678 13.7654 11.9553 13.6634C12.1773 13.6431 12.3978 13.5276 12.604 13.3229L13.669 12.2631C14.1025 11.8326 14.0073 11.0481 13.3938 10.7151L11.9613 9.93586C11.5653 9.72136 11.1018 9.79186 10.8138 10.0784L10.4725 10.4181L10.075 10.0191C10.4725 10.4181 10.4718 10.4189 10.471 10.4189L10.4703 10.4204L10.468 10.4226L10.4628 10.4271L10.4515 10.4376C10.4199 10.467 10.3857 10.4936 10.3495 10.5171C10.2895 10.5569 10.21 10.6011 10.1103 10.6379C9.90777 10.7136 9.63927 10.7541 9.30777 10.7031C8.65752 10.6034 7.79577 10.1601 6.65052 9.02161C5.50602 7.88311 5.05902 7.02661 4.95852 6.37711C4.90677 6.04561 4.94802 5.77711 5.02452 5.57461C5.06662 5.46066 5.1269 5.35428 5.20302 5.25961L5.22702 5.23336L5.23752 5.22211L5.24202 5.21761L5.24427 5.21536L5.24577 5.21386L5.46177 4.99936C5.78277 4.67911 5.82777 4.14886 5.52552 3.74461L4.57977 2.48161Z"
                                    fill="#414A66" />
                            </svg>
                            <a href="tel:{{$siteInformation->phone}}">{{$siteInformation->phone}}</a>
                            <a href="tel:{{$siteInformation->landline}}"> {{$siteInformation->landline}}</a>
                        </div>

                        <div class="email">
                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.8188 2.1445L9.71663 8.026C9.51481 8.19321 9.26096 8.28471 8.99887 8.28471C8.73679 8.28471 8.48294 8.19321 8.28113 8.026L1.18237 2.1445C1.14429 2.25915 1.12491 2.37919 1.125 2.5V11.5C1.125 11.7984 1.24353 12.0845 1.4545 12.2955C1.66548 12.5065 1.95163 12.625 2.25 12.625H15.75C16.0484 12.625 16.3345 12.5065 16.5455 12.2955C16.7565 12.0845 16.875 11.7984 16.875 11.5V2.5C16.8755 2.37925 16.8565 2.25921 16.8188 2.1445ZM2.25 0.25H15.75C16.3467 0.25 16.919 0.487053 17.341 0.90901C17.7629 1.33097 18 1.90326 18 2.5V11.5C18 12.0967 17.7629 12.669 17.341 13.091C16.919 13.5129 16.3467 13.75 15.75 13.75H2.25C1.65326 13.75 1.08097 13.5129 0.65901 13.091C0.237053 12.669 0 12.0967 0 11.5V2.5C0 1.90326 0.237053 1.33097 0.65901 0.90901C1.08097 0.487053 1.65326 0.25 2.25 0.25ZM2.01375 1.375L8.28675 6.55338C8.48766 6.71932 8.73994 6.81037 9.00052 6.81099C9.2611 6.8116 9.51381 6.72174 9.7155 6.55675L16.0515 1.375H2.01375Z"
                                    fill="#414A66" />
                            </svg>
                            <a href="mailto:{{$siteInformation->email}}">{{$siteInformation->email}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header">
            <div class="container-ctn">
                <div class="d-flex header-row justify-content-between align-items-md-center">
                    <a href="{{ url('/') }}" class="brand">
                        <picture>
                            <img src="{{asset(@$siteInformation->logo)}}" width="156" height="152" {{$siteInformation->logo_attribute ?? ''}}>
                        </picture>
                    </a>
                    <nav>
                        <ul class=" d-none d-xl-flex">
                            <li><a href="{{ url('/') }}" class="active">Home</a></li>
                            <li><a href="{{route('about-us')}}">About us </a></li>
                            <li class="drop-downs"><a href="{{url('products')}}">Products</a>
                                <div class="product-sidebar">
                                    <div class="d-flex flex-wrap">
                                        <!-- Our Products -->
                                    <div class="product-menu">
                                        <p>Our Products</p>

                                        @foreach($categories_menu as $category)
                                        <div class="accordion-item ">
                                            <button class="accordion-toggle">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none"> <path d="M9.4375 13.2252H5.5C5.35082 13.2252 5.20774 13.2845 5.10225 13.39C4.99676 13.4955 4.9375 13.6385 4.9375 13.7877V17.1627C4.9375 17.3119 4.99676 17.455 5.10225 17.5605C5.20774 17.666 5.35082 17.7252 5.5 17.7252H8.875C9.02418 17.7252 9.16726 17.666 9.27275 17.5605C9.37824 17.455 9.4375 17.3119 9.4375 17.1627V13.2252Z" stroke="#323C59" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round"/> <path d="M13.375 13.2252H9.4375V17.1627C9.4375 17.3119 9.49676 17.455 9.60225 17.5605C9.70774 17.666 9.85082 17.7252 10 17.7252H13.375C13.5242 17.7252 13.6673 17.666 13.7727 17.5605C13.8782 17.455 13.9375 17.3119 13.9375 17.1627V13.7877C13.9375 13.6385 13.8782 13.4955 13.7727 13.39C13.6673 13.2845 13.5242 13.2252 13.375 13.2252ZM11.125 8.72522H7.75C7.60082 8.72522 7.45774 8.78448 7.35225 8.88997C7.24676 8.99546 7.1875 9.13854 7.1875 9.28772V13.2252H11.6875V9.28772C11.6875 9.13854 11.6282 8.99546 11.5227 8.88997C11.4173 8.78448 11.2742 8.72522 11.125 8.72522Z" stroke="#323C59" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round"/> <path d="M17.875 17.7252V6.0252C17.8751 5.82125 17.8197 5.62112 17.7148 5.44621C17.6099 5.2713 17.4594 5.12819 17.2795 5.0322L9.967 1.1322C9.80414 1.0454 9.62242 1 9.43787 1C9.25333 1 9.07161 1.0454 8.90875 1.1322L1.59625 5.0322C1.41616 5.12809 1.26554 5.27115 1.16051 5.44607C1.05548 5.62099 1 5.82117 1 6.0252V17.7252" stroke="#323C59" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                                                </span> {{\Illuminate\Support\Str::words(strip_tags( $category->title ?? ''), 3, '...') }}
                            
                                            </button>                                   
                                            <ul class="submenu">
                                                @foreach($category->subcategories as $subcategory)
                                                    <li>
                                                        <a href="{{ route('categories.detail', ['short_url' => $subcategory->short_url]) }}">
                                                            {{ \Illuminate\Support\Str::words(strip_tags($subcategory->title ?? ''), 5, '...')}}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endforeach

                                 
                                    </div>

                                    <!-- Top Brands -->
                                    <div class="top-brands">
                                        <p>Top Brands</p>
                                        <div class="brands-grid">
                                            @foreach($brands_menu as $brand)
                                                <a href="{{ route('brands.detail',['short_url' => $brand->short_url]) }}" class="brand-link">
                                                    <picture>
                                                        <img src="{{ asset($brand->featured_image_webp ?? $brand->featured_image) }}"
                                                            width="85" height="18"
                                                            class="h-auto"
                                                            alt="{{ $brand->name }}">
                                                    </picture>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>

                                    </div>
                                    </div>

                            </li>
                            <li><a href="{{route('services')}}">Services</a></li>
                            <li><a href="{{route('projects')}}">Projects</a></li>
                            <li><a href="{{route('sectors')}}">Sectors</a></li>
                            <li><a href="{{route('brands')}}">Brands</a></li>
                            <li><a href="{{route('media')}}">Media</a></li>
                            <li><a href="{{route('blogs.list')}}">Blogs</a></li>
                            <li><a href="{{route('contact-us')}}">Contact us</a></li>
                        </ul>
                        <div class="button-wrap">
                            <a data-bs-toggle="modal" href="#enquiryForm" role="button" class="btn-theme btnLight">Quick Enquiry</a>
                        </div>
                        <a class="navbar-toggler d-xl-none" type="button" data-bs-toggle="offcanvas"
                            href="#mobileOffcanvasExample" role="button" aria-controls="offcanvasExample">
                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="18" height="1.44828" rx="0.724138" fill="#fff"></rect>
                                <rect y="6.27588" width="13.5" height="1.44828" rx="0.724138" fill="#fff"></rect>
                                <rect y="12.5518" width="15.75" height="1.44828" rx="0.724138" fill="#fff"></rect>
                            </svg>
                        </a>
                    </nav>
                </div>
            </div>

        </div>
    </header>

    @yield('content')
    <!-- end of heade section -->


    <!-- main modal -->
    <div class="modal fade enquiryModal" id="enquiryModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-SemiBold" id="exampleModalLabel">Quick Enquiry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="enquiry_form" method="POST" action="{{ url('/') }}/enquiry">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="enquiry_fname">Name <sapn>*</sapn></label>
                                    <input type="text" class="form-control"name="name" id="enquiry_fname" placeholder="Enter Name">
                                    <div id="enquiry_error-name" class="medicom_error">Please enter Name</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="enquiry_email">Email <sapn>*</sapn></label>
                                    <input type="email" class="form-control" name="email" id="enquiry_email" placeholder="Enter Email">
                                    <div id="enquiry_error-email" class="medicom_error">Please enter Email</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="enquiry_number">Phone Number <sapn>*</sapn></label>
                                    <input type="text" class="form-control phone_tel" name="phone" id="enquiry_number" placeholder="Phone Number">
                                    <div id="enquiry_error-number" class="medicom_error">Invalid phone number.</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="enquiry_company">Company Name <span>*</span></label>
                                    <input type="text" class="form-control" name="company" id="enquiry_company" placeholder="Enter Company Name">
                                    <div id="enquiry_error-company" class="medicom_error">Please enter company.</div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="enquiry_msg">Message <sapn>*</sapn></label>
                                    <textarea name="message" id="enquiry_msg" class="form-control" placeholder="Message"></textarea>
                                    <div id="enquiry_error-msg" class="medicom_error">Please enter message.</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group ">
                                    <button href="#" class="primary_btn">
                                        <span>Send Request</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end of main modal -->
    <style>#clist-container {pointer-events: none;}</style>

<a id="backButton" class="backButton"></a>
<!-- footer started here  -->

<footer>
    <div class="container-ctn">
        <div class="footer-top d-flex flex-wrap justify-content-between">
            <div class="footer-about d-flex flex-wrap justify-content-between">
                <a href="" class="logo">
                    <picture>
                        <img src="{{asset('web/images/footer-logo.webp')}}" width="112 109" alt="MBS" class="img-fluid">
                    </picture>
                </a>
                <div>
                    <p>Embracing the innovative aspects of technology and analyzing the modern patterns of designs, we
                        have been quite successful in building and maintaining a full-fledged Material Handling Facility
                        at Musaed Bader Al-Sayer & Sons. </p>
                    <a href="" class="btn-theme btnDark">Read More</a>
                </div>
            </div>
            <form class="subscribe-form" id="newsletter-form">
                <strong>Newsletter</strong>
                <p>Sign up to receive news, app updates, and other exclusive info via email</p>
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <label>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.7836 4.15231L10.6815 10.0338C10.4797 10.201 10.2258 10.2925 9.96372 10.2925C9.70164 10.2925 9.44778 10.201 9.24597 10.0338L2.14722 4.15231C2.10913 4.26696 2.08976 4.387 2.08984 4.50781V13.5078C2.08984 13.8062 2.20837 14.0923 2.41935 14.3033C2.63033 14.5143 2.91648 14.6328 3.21484 14.6328H16.7148C17.0132 14.6328 17.2994 14.5143 17.5103 14.3033C17.7213 14.0923 17.8398 13.8062 17.8398 13.5078V4.50781C17.8403 4.38706 17.8213 4.26703 17.7836 4.15231ZM3.21484 2.25781H16.7148C17.3116 2.25781 17.8839 2.49487 18.3058 2.91682C18.7278 3.33878 18.9648 3.91108 18.9648 4.50781V13.5078C18.9648 14.1045 18.7278 14.6768 18.3058 15.0988C17.8839 15.5208 17.3116 15.7578 16.7148 15.7578H3.21484C2.61811 15.7578 2.04581 15.5208 1.62385 15.0988C1.2019 14.6768 0.964844 14.1045 0.964844 13.5078V4.50781C0.964844 3.91108 1.2019 3.33878 1.62385 2.91682C2.04581 2.49487 2.61811 2.25781 3.21484 2.25781ZM2.97859 3.38281L9.25159 8.56119C9.4525 8.72713 9.70479 8.81818 9.96536 8.8188C10.2259 8.81942 10.4787 8.72955 10.6803 8.56456L17.0163 3.38281H2.97859Z"
                                fill="#818DA6" /> </svg>
                        <input type="email" id="email-subscribe" name="email" placeholder="Email address" required>
                        
                    </label>
                    <button type="submit" class="btn-theme btnLight submit_form_btn_newsletter" data-url="newsletter/subscribe">Subscribe</button>
                </div>
            </form>

        </div>
        <div class="footer-bottom d-flex flex-wrap justify-content-between">
            <div class="colums d-flex flex-wrap justify-content-between">
                <div>
                    <strong>Quick Links</strong>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{route('about-us')}}">About us</a></li>
                        <li><a href="{{url('products')}}">Products</a></li>
                        <li><a href="{{route('brands')}}">Brands</a></li>
                        <li><a href="{{route('sectors')}}">Sectors</a></li>
                        <li><a href="{{route('services')}}">Services</a></li>
                        <li><a href="{{route('projects')}}">Case Studies</a></li>
                        <li><a href="">Testimonials</a></li>
                        <li><a href="">Clients</a></li>
                        <li><a href="{{route('blogs.list')}}">Blogs</a></li>
                        <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                    </ul>
                </div>

                @if($featuredCategories->isNotEmpty())
                    @foreach($featuredCategories as $category)
                        <div>
                            <strong>{{$category->title}}</strong>
                            <ul>
                                @foreach($category->products as $product)
                                    <li><a href="{{ route('product-detail',['short_url' => $product->short_url]) }}">{{$product->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach

                @endif
            </div>
            <div class="grids d-flex flex-wrap">
                <div>
                    <strong>Mbs group Cantilever Racking System</strong>
                    <ul>
                        <li><a href=" ">Heavy Duty Cantilever</a></li>
                        <li><a href=" ">Light Duty Cantilever</a></li>
                        <li><a href=" ">Rollrack</a></li>
                    </ul>

                    <strong>Mezzanine Floors & Partitioning</strong>
                    <ul>
                        <li><a href=" ">Mezzanine floor System</a></li>
                        <li><a href=" ">Wiremesh Decking & Shelving</a></li>
                        <li><a href=" ">Anti Collapse Mesh</a></li>
                        <li><a href=" ">Sign & Marketing System</a></li>
                        <li><a href=" ">Storage Cabinets</a></li>
                    </ul>
                </div>
                <div>
                    <strong>Doors & Dock Leveller in Middle East</strong>
                    <ul>
                        <li><a href=" ">Industrial Doors</a></li>
                        <li><a href=" ">Overhead sectional doors</a></li>
                        <li><a href=" ">High-Performance doors</a></li>
                        <li><a href=" ">Mega Doors</a></li>
                        <li><a href=" ">Loading Dock Equipment</a></li>
                    </ul>

                    <strong>Contact Info</strong>
                    <ul>
                        <li>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="13" height="16" viewBox="0 0 13 16"
                                    fill="none">
                                    <path
                                        d="M6.88468 14.5759C6.76228 14.6638 6.61538 14.7111 6.46468 14.7111C6.31398 14.7111 6.16708 14.6638 6.04468 14.5759C2.42293 11.9944 -1.42082 6.68444 2.46493 2.84744C3.53169 1.79807 4.96831 1.21028 6.46468 1.21094C7.96468 1.21094 9.40393 1.79969 10.4644 2.84669C14.3502 6.68369 10.5064 11.9929 6.88468 14.5759Z"
                                        stroke="#818DA6" stroke-width="1.125" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M6.46484 7.96094C6.86267 7.96094 7.2442 7.8029 7.5255 7.5216C7.80681 7.24029 7.96484 6.85876 7.96484 6.46094C7.96484 6.06311 7.80681 5.68158 7.5255 5.40028C7.2442 5.11897 6.86267 4.96094 6.46484 4.96094C6.06702 4.96094 5.68549 5.11897 5.40418 5.40028C5.12288 5.68158 4.96484 6.06311 4.96484 6.46094C4.96484 6.85876 5.12288 7.24029 5.40418 7.5216C5.68549 7.8029 6.06702 7.96094 6.46484 7.96094Z"
                                        stroke="#818DA6" stroke-width="1.125" stroke-linecap="round"
                                        stroke-linejoin="round" /> </svg></span>
                            KIPCO Tower , Sharq,P.O.Box : 21666, Safat, 13077, Kuwait.</li>
                        <li>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.76461 2.49341C5.67736 1.58591 7.18036 1.74716 7.94461 2.76866L8.89111 4.03166C9.51361 4.86266 9.45811 6.02366 8.71936 6.75791L8.54086 6.93641C8.52062 7.01134 8.51857 7.09002 8.53486 7.16591C8.58211 7.47191 8.83786 8.11991 9.90886 9.18491C10.9799 10.2499 11.6324 10.5049 11.9429 10.5529C12.0211 10.5686 12.1019 10.5663 12.1791 10.5462L12.4851 10.2417C13.1421 9.58916 14.1501 9.46691 14.9631 9.90866L16.3956 10.6887C17.6234 11.3547 17.9331 13.0227 16.9281 14.0224L15.8624 15.0814C15.5264 15.4152 15.0749 15.6934 14.5244 15.7452C13.1669 15.8719 10.0041 15.7099 6.67936 12.4047C3.57661 9.31916 2.98111 6.62816 2.90536 5.30216C2.86786 4.63166 3.18436 4.06466 3.58786 3.66416L4.76461 2.49341ZM7.04461 3.44291C6.66436 2.93516 5.95636 2.89466 5.55736 3.29141L4.37986 4.46141C4.13236 4.70741 4.01386 4.97891 4.02886 5.23841C4.08886 6.29216 4.56886 8.71991 7.47286 11.6074C10.5194 14.6359 13.3326 14.7267 14.4201 14.6247C14.6421 14.6044 14.8626 14.4889 15.0689 14.2842L16.1339 13.2244C16.5674 12.7939 16.4721 12.0094 15.8586 11.6764L14.4261 10.8972C14.0301 10.6827 13.5666 10.7532 13.2786 11.0397L12.9374 11.3794L12.5399 10.9804C12.9374 11.3794 12.9366 11.3802 12.9359 11.3802L12.9351 11.3817L12.9329 11.3839L12.9276 11.3884L12.9164 11.3989C12.8847 11.4283 12.8506 11.4549 12.8144 11.4784C12.7544 11.5182 12.6749 11.5624 12.5751 11.5992C12.3726 11.6749 12.1041 11.7154 11.7726 11.6644C11.1224 11.5647 10.2606 11.1214 9.11536 9.98291C7.97086 8.84441 7.52386 7.98791 7.42336 7.33841C7.37161 7.00691 7.41286 6.73841 7.48936 6.53591C7.53147 6.42196 7.59175 6.31558 7.66786 6.22091L7.69186 6.19466L7.70236 6.18341L7.70686 6.17891L7.70911 6.17666L7.71061 6.17516L7.92661 5.96066C8.24761 5.64041 8.29261 5.11016 7.99036 4.70591L7.04461 3.44291Z"
                                        fill="#818DA6" /> </svg></span>
                            <a href="tel:+96522271417">+965 22271417</a> | <a href="tel:+96522271417">+965 22271417</a>
                        </li>
                        <li>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.2836 5.10544L10.1815 10.9869C9.97966 11.1541 9.7258 11.2456 9.46372 11.2456C9.20164 11.2456 8.94778 11.1541 8.74597 10.9869L1.64722 5.10544C1.60913 5.22009 1.58976 5.34013 1.58984 5.46094V14.4609C1.58984 14.7593 1.70837 15.0455 1.91935 15.2564C2.13033 15.4674 2.41648 15.5859 2.71484 15.5859H16.2148C16.5132 15.5859 16.7994 15.4674 17.0103 15.2564C17.2213 15.0455 17.3398 14.7593 17.3398 14.4609V5.46094C17.3403 5.34019 17.3213 5.22015 17.2836 5.10544ZM2.71484 3.21094H16.2148C16.8116 3.21094 17.3839 3.44799 17.8058 3.86995C18.2278 4.2919 18.4648 4.8642 18.4648 5.46094V14.4609C18.4648 15.0577 18.2278 15.63 17.8058 16.0519C17.3839 16.4739 16.8116 16.7109 16.2148 16.7109H2.71484C2.11811 16.7109 1.54581 16.4739 1.12385 16.0519C0.701897 15.63 0.464844 15.0577 0.464844 14.4609V5.46094C0.464844 4.8642 0.701897 4.2919 1.12385 3.86995C1.54581 3.44799 2.11811 3.21094 2.71484 3.21094ZM2.47859 4.33594L8.75159 9.51431C8.9525 9.68026 9.20479 9.77131 9.46536 9.77192C9.72594 9.77254 9.97865 9.68268 10.1803 9.51769L16.5163 4.33594H2.47859Z"
                                        fill="#818DA6" /> </svg></span>
                            <a href="mailto:sales@mbs-group.net">sales@mbs-group.net</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright d-flex flex-wrap align-items-end justify-content-between">
            <div class="social">
                <strong>Follow Us</strong>
                <div class="social-links d-flex align-items-center">
                    <a href="" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                            <path
                                d="M17.4648 2H14.4648C13.1388 2 11.867 2.52678 10.9293 3.46447C9.99163 4.40215 9.46484 5.67392 9.46484 7V10H6.46484V14H9.46484V22H13.4648V14H16.4648L17.4648 10H13.4648V7C13.4648 6.73478 13.5702 6.48043 13.7577 6.29289C13.9453 6.10536 14.1996 6 14.4648 6H17.4648V2Z"
                                stroke="#596075" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                            <path
                                d="M23.4648 3.01006C23.4648 3.01006 21.4468 4.20206 20.3248 4.54006C19.7226 3.84757 18.9222 3.35675 18.0319 3.13398C17.1416 2.91122 16.2043 2.96725 15.3469 3.29451C14.4895 3.62177 13.7533 4.20446 13.2378 4.96377C12.7224 5.72309 12.4525 6.62239 12.4648 7.54006V8.54006C10.7075 8.58562 8.96612 8.19587 7.39585 7.4055C5.82559 6.61513 4.47516 5.44869 3.46484 4.01006C3.46484 4.01006 -0.535156 13.0101 8.46484 17.0101C6.40537 18.408 3.952 19.109 1.46484 19.0101C10.4648 24.0101 21.4648 19.0101 21.4648 7.51006C21.4642 7.23139 21.4375 6.95472 21.3848 6.68006C22.4048 5.67406 23.4648 3.01006 23.4648 3.01006Z"
                                stroke="#596075" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.46484 1.25C4.7355 1.25 4.03603 1.53973 3.5203 2.05546C3.00458 2.57118 2.71484 3.27065 2.71484 4C2.71484 4.72935 3.00458 5.42882 3.5203 5.94454C4.03603 6.46027 4.7355 6.75 5.46484 6.75C6.19419 6.75 6.89366 6.46027 7.40939 5.94454C7.92511 5.42882 8.21484 4.72935 8.21484 4C8.21484 3.27065 7.92511 2.57118 7.40939 2.05546C6.89366 1.53973 6.19419 1.25 5.46484 1.25ZM4.21484 4C4.21484 3.66848 4.34654 3.35054 4.58096 3.11612C4.81538 2.8817 5.13332 2.75 5.46484 2.75C5.79636 2.75 6.11431 2.8817 6.34873 3.11612C6.58315 3.35054 6.71484 3.66848 6.71484 4C6.71484 4.33152 6.58315 4.64946 6.34873 4.88388C6.11431 5.1183 5.79636 5.25 5.46484 5.25C5.13332 5.25 4.81538 5.1183 4.58096 4.88388C4.34654 4.64946 4.21484 4.33152 4.21484 4ZM2.71484 8C2.71484 7.80109 2.79386 7.61032 2.93451 7.46967C3.07517 7.32902 3.26593 7.25 3.46484 7.25H7.46484C7.66376 7.25 7.85452 7.32902 7.99517 7.46967C8.13583 7.61032 8.21484 7.80109 8.21484 8V21C8.21484 21.1989 8.13583 21.3897 7.99517 21.5303C7.85452 21.671 7.66376 21.75 7.46484 21.75H3.46484C3.26593 21.75 3.07517 21.671 2.93451 21.5303C2.79386 21.3897 2.71484 21.1989 2.71484 21V8ZM4.21484 8.75V20.25H6.71484V8.75H4.21484ZM9.71484 8C9.71484 7.80109 9.79386 7.61032 9.93451 7.46967C10.0752 7.32902 10.2659 7.25 10.4648 7.25H14.4648C14.6638 7.25 14.8545 7.32902 14.9952 7.46967C15.1358 7.61032 15.2148 7.80109 15.2148 8V8.434L15.6498 8.247C16.3999 7.9266 17.1956 7.72583 18.0078 7.652C20.7828 7.4 23.2148 9.58 23.2148 12.38V21C23.2148 21.1989 23.1358 21.3897 22.9952 21.5303C22.8545 21.671 22.6638 21.75 22.4648 21.75H18.4648C18.2659 21.75 18.0752 21.671 17.9345 21.5303C17.7939 21.3897 17.7148 21.1989 17.7148 21V14C17.7148 13.6685 17.5831 13.3505 17.3487 13.1161C17.1143 12.8817 16.7964 12.75 16.4648 12.75C16.1333 12.75 15.8154 12.8817 15.581 13.1161C15.3465 13.3505 15.2148 13.6685 15.2148 14V21C15.2148 21.1989 15.1358 21.3897 14.9952 21.5303C14.8545 21.671 14.6638 21.75 14.4648 21.75H10.4648C10.2659 21.75 10.0752 21.671 9.93451 21.5303C9.79386 21.3897 9.71484 21.1989 9.71484 21V8ZM11.2148 8.75V20.25H13.7148V14C13.7148 13.2707 14.0046 12.5712 14.5203 12.0555C15.036 11.5397 15.7355 11.25 16.4648 11.25C17.1942 11.25 17.8937 11.5397 18.4094 12.0555C18.9251 12.5712 19.2148 13.2707 19.2148 14V20.25H21.7148V12.38C21.7148 10.476 20.0538 8.972 18.1448 9.146C17.489 9.2055 16.8465 9.36747 16.2408 9.626L14.7608 10.261C14.6467 10.31 14.5221 10.3299 14.3984 10.3189C14.2746 10.3079 14.1556 10.2663 14.0519 10.1979C13.9482 10.1295 13.8631 10.0364 13.8042 9.927C13.7454 9.81757 13.7147 9.69524 13.7148 9.571V8.75H11.2148Z"
                                fill="#596075" /> </svg>
                    </a>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.4648 2C9.74884 2 9.40884 2.012 8.34184 2.06C7.27784 2.109 6.55084 2.278 5.91484 2.525C5.24732 2.77582 4.64258 3.16931 4.14284 3.678C3.63415 4.17773 3.24066 4.78247 2.98984 5.45C2.74284 6.086 2.57384 6.813 2.52484 7.877C2.47584 8.944 2.46484 9.284 2.46484 12C2.46484 14.716 2.47584 15.056 2.52484 16.123C2.57384 17.187 2.74284 17.914 2.98984 18.55C3.24066 19.2175 3.63415 19.8223 4.14284 20.322C4.64258 20.8307 5.24732 21.2242 5.91484 21.475C6.55084 21.722 7.27784 21.891 8.34184 21.94C9.40884 21.988 9.74884 22 12.4648 22C15.1808 22 15.5208 21.988 16.5878 21.94C17.6518 21.891 18.3788 21.722 19.0148 21.475C19.6824 21.2242 20.2871 20.8307 20.7868 20.322C21.2955 19.8223 21.689 19.2175 21.9398 18.55C22.1868 17.914 22.3558 17.187 22.4048 16.123C22.4528 15.056 22.4648 14.716 22.4648 12C22.4648 9.284 22.4528 8.944 22.4048 7.877C22.3558 6.813 22.1868 6.086 21.9398 5.45C21.689 4.78247 21.2955 4.17773 20.7868 3.678C20.2871 3.16931 19.6824 2.77582 19.0148 2.525C18.3788 2.278 17.6518 2.109 16.5878 2.06C15.5208 2.012 15.1808 2 12.4648 2ZM12.4648 3.802C15.1348 3.802 15.4508 3.812 16.5048 3.86C17.4808 3.905 18.0098 4.067 18.3628 4.204C18.8288 4.386 19.1628 4.603 19.5128 4.952C19.8628 5.302 20.0788 5.636 20.2608 6.102C20.3968 6.455 20.5608 6.984 20.6048 7.959C20.6528 9.014 20.6628 9.329 20.6628 12C20.6628 14.67 20.6528 14.986 20.6048 16.04C20.5598 17.016 20.3968 17.545 20.2608 17.898C20.1005 18.3324 19.8449 18.7253 19.5128 19.048C19.1628 19.398 18.8288 19.614 18.3628 19.796C18.0098 19.932 17.4808 20.096 16.5058 20.14C15.4518 20.188 15.1358 20.198 12.4648 20.198C9.79484 20.198 9.47784 20.188 8.42484 20.14C7.44884 20.095 6.91984 19.932 6.56684 19.796C6.13246 19.6357 5.73951 19.3801 5.41684 19.048C5.08476 18.7253 4.82916 18.3324 4.66884 17.898C4.53184 17.545 4.36884 17.016 4.32484 16.041C4.27684 14.986 4.26684 14.671 4.26684 12C4.26684 9.33 4.27684 9.014 4.32484 7.96C4.36984 6.984 4.53184 6.455 4.66884 6.102C4.85084 5.636 5.06784 5.302 5.41684 4.952C5.76684 4.602 6.10084 4.386 6.56684 4.204C6.91984 4.067 7.44884 3.904 8.42384 3.86C9.47884 3.812 9.79384 3.802 12.4648 3.802ZM12.4648 15.333C11.5809 15.333 10.7331 14.9818 10.1081 14.3568C9.483 13.7317 9.13184 12.884 9.13184 12C9.13184 11.116 9.483 10.2683 10.1081 9.64321C10.7331 9.01815 11.5809 8.667 12.4648 8.667C13.3488 8.667 14.1966 9.01815 14.8216 9.64321C15.4467 10.2683 15.7978 11.116 15.7978 12C15.7978 12.884 15.4467 13.7317 14.8216 14.3568C14.1966 14.9818 13.3488 15.333 12.4648 15.333ZM12.4648 6.865C11.7905 6.865 11.1228 6.99782 10.4998 7.25588C9.87676 7.51394 9.31068 7.89218 8.83385 8.36901C8.35702 8.84584 7.97878 9.41191 7.72072 10.0349C7.46266 10.6579 7.32984 11.3257 7.32984 12C7.32984 12.6743 7.46266 13.3421 7.72072 13.9651C7.97878 14.5881 8.35702 15.1542 8.83385 15.631C9.31068 16.1078 9.87676 16.4861 10.4998 16.7441C11.1228 17.0022 11.7905 17.135 12.4648 17.135C13.8267 17.135 15.1328 16.594 16.0958 15.631C17.0588 14.668 17.5998 13.3619 17.5998 12C17.5998 10.6381 17.0588 9.33201 16.0958 8.36901C15.1328 7.40601 13.8267 6.865 12.4648 6.865ZM19.0028 6.662C19.0028 6.81959 18.9718 6.97563 18.9115 7.12122C18.8512 7.26681 18.7628 7.3991 18.6514 7.51053C18.5399 7.62196 18.4077 7.71035 18.2621 7.77066C18.1165 7.83096 17.9604 7.862 17.8028 7.862C17.6453 7.862 17.4892 7.83096 17.3436 7.77066C17.198 7.71035 17.0657 7.62196 16.9543 7.51053C16.8429 7.3991 16.7545 7.26681 16.6942 7.12122C16.6339 6.97563 16.6028 6.81959 16.6028 6.662C16.6028 6.34374 16.7293 6.03852 16.9543 5.81347C17.1794 5.58843 17.4846 5.462 17.8028 5.462C18.1211 5.462 18.4263 5.58843 18.6514 5.81347C18.8764 6.03852 19.0028 6.34374 19.0028 6.662Z"
                                fill="#596075" /> </svg>
                    </a>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                            <path
                                d="M1.96484 17C1.29818 13.3333 1.29818 10 1.96484 7C2.23151 5.53333 3.06484 4.7 4.46484 4.5C9.79818 3.83333 15.1315 3.83333 20.4648 4.5C21.8648 4.7 22.6982 5.53333 22.9648 7C23.6315 10 23.6315 13.3333 22.9648 17C22.6982 18.4667 21.8648 19.3 20.4648 19.5C15.1315 20.1667 9.79818 20.1667 4.46484 19.5C3.06484 19.3 2.23151 18.4667 1.96484 17ZM9.96484 8.5V15.5L15.9648 12L9.96484 8.5Z"
                                stroke="#596075" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <path d="M16.024 11.0208L16.0449 10.7615C16.0553 10.6083 16.0667 10.4448 16.0771 10.2615C16.1119 9.67951 16.1296 9.03889 16.1303 8.33958C16.1303 7.43125 15.824 6.79062 15.1782 6.18958C14.4907 5.55 13.6584 5.20833 12.4803 5.20833C11.2959 5.20833 10.4407 5.55729 9.86569 6.13333C9.14069 6.85729 8.86881 7.40208 8.86881 8.32083C8.86881 8.86354 8.93131 10.3979 8.96777 11.049C8.99717 11.5794 8.82278 12.1011 8.48027 12.5073C8.53652 12.6115 8.5893 12.7219 8.63861 12.8385C8.95111 13.6417 8.84486 14.4458 8.48027 15.2042C8.07194 16.0562 7.71986 16.6552 7.01152 17.4479C6.80148 17.6837 6.5782 17.9073 6.34277 18.1177C6.51918 18.2869 6.66445 18.4857 6.77194 18.7052C7.32332 18.658 7.87852 18.6843 8.42298 18.7833C9.26673 18.9354 9.80215 19.2354 10.7084 19.8885L10.7251 19.9L10.9469 20.0583C11.5928 20.5167 11.8605 20.6271 12.4813 20.6271C13.1157 20.6271 13.4292 20.501 14.0678 20.0521L14.2834 19.9C15.1969 19.2417 15.749 18.9344 16.6074 18.7792C17.1442 18.6902 17.6895 18.6643 18.2324 18.7021C18.2469 18.6722 18.2636 18.641 18.2824 18.6083C18.3872 18.4208 18.515 18.2552 18.6657 18.1115C18.4403 17.909 18.2261 17.6945 18.024 17.4687C17.4177 16.7942 16.9102 16.037 16.5167 15.2198C16.1386 14.4396 16.0271 13.6156 16.374 12.8021C16.4157 12.7 16.4615 12.6042 16.5115 12.5146C16.16 12.0991 15.9851 11.5636 16.024 11.0208ZM5.27819 10.9135C5.71569 10.9135 5.90423 11.2312 6.54902 11.2312C6.66562 11.2342 6.78137 11.2107 6.88757 11.1625C6.87923 11 6.78548 9.09375 6.78548 8.31979C6.78548 6.56146 7.53444 5.51771 8.39173 4.65937C9.24902 3.80104 10.5855 3.125 12.4813 3.125C14.3771 3.125 15.6751 3.80521 16.598 4.66458C17.5209 5.52396 18.2136 6.675 18.2136 8.33958C18.2136 9.95937 18.1105 11.0417 18.1021 11.1687C18.1918 11.2143 18.2912 11.2375 18.3917 11.2365C19.048 11.2365 19.048 10.9135 19.7771 10.9135C20.4917 10.9135 20.8011 11.5073 20.8011 11.7708C20.8011 12.4177 19.9344 12.7781 19.4157 12.9437C19.0313 13.0656 18.4459 13.2469 18.2959 13.6052C18.2195 13.7865 18.2515 14.0219 18.3917 14.3115C18.3959 14.3198 19.7042 17.3146 22.4855 17.776C22.7303 17.8125 22.8938 18.0271 22.8938 18.2792C22.8938 18.626 22.5084 18.9219 22.1365 19.0937C21.6751 19.3021 21.0011 19.4792 20.1032 19.6198C20.0584 19.701 19.9636 20.125 19.8584 20.5437C19.7178 21.1083 19.0251 20.925 18.8271 20.8833C18.2113 20.7537 17.5771 20.7368 16.9553 20.8333C16.4521 20.924 16.0042 21.2271 15.5011 21.5896C14.7584 22.1146 13.9751 22.7104 12.4803 22.7104C10.9855 22.7104 10.2469 22.1146 9.50423 21.5896C9.00215 21.2271 8.56256 20.926 8.05111 20.8333C7.11465 20.6635 6.41569 20.8708 6.18027 20.8917C5.94486 20.9125 5.30423 21.1469 5.14277 20.5521C5.09694 20.3792 4.94486 19.7104 4.89902 19.6198C4.00632 19.4792 3.32715 19.2937 2.86465 19.0854C2.48444 18.9135 2.1084 18.624 2.1084 18.275C2.1084 18.0292 2.27298 17.8167 2.51673 17.7719C5.26986 17.2688 6.43861 14.6427 6.60111 14.3031C6.73791 14.017 6.76986 13.7812 6.69694 13.5958C6.54694 13.2385 5.96257 13.0615 5.57819 12.9344C5.46882 12.899 4.18757 12.5458 4.18757 11.7708C4.18757 11.5208 4.40006 11.174 4.79277 11.0104C4.96152 10.9417 5.16673 10.9146 5.27715 10.9146" fill="#596075"/>
                        </svg>
                    </a>
                    <a href="">
                       <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9398 2.75066C14.0059 2.73437 15.0637 2.7425 16.1216 2.73438C16.1867 3.97949 16.6343 5.249 17.5457 6.12788C18.4571 7.0312 19.7429 7.44624 20.9961 7.58457V10.8642C19.8243 10.8235 18.6443 10.5793 17.5783 10.0748C17.1144 9.86318 16.6831 9.59463 16.26 9.31794C16.2518 11.6942 16.2681 14.0705 16.2437 16.4386C16.1786 17.5779 15.8042 18.7091 15.1451 19.645C14.0791 21.2075 12.2318 22.2247 10.3357 22.2573C9.17207 22.3223 8.00837 22.005 7.01558 21.419C5.37178 20.4506 4.21621 18.6766 4.04534 16.7723C4.02905 16.3654 4.02092 15.9585 4.03718 15.5597C4.18367 14.0135 4.94861 12.5324 6.13672 11.5233C7.48755 10.3515 9.37549 9.78994 11.1414 10.1236C11.1576 11.328 11.1088 12.5324 11.1088 13.7368C10.3032 13.4764 9.35923 13.5497 8.65124 14.0379C8.13857 14.3716 7.74797 14.8843 7.54453 15.4621C7.37363 15.8771 7.42246 16.3328 7.43059 16.7723C7.6259 18.1069 8.91165 19.2299 10.2788 19.1079C11.1902 19.0997 12.0609 18.5708 12.5329 17.7977C12.6875 17.5291 12.8584 17.2524 12.8666 16.935C12.9479 15.4783 12.9154 14.0298 12.9235 12.5731C12.9317 9.29353 12.9154 6.02209 12.9398 2.75066Z" fill="#596075"/>
                        </svg>
                    </a>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <path d="M8.84551 19.9903C8.86981 19.6396 8.91947 19.292 8.99447 18.9476C9.06009 18.6403 9.25905 17.7705 9.55072 16.5101L9.55801 16.4788L9.96113 14.7413C10.0434 14.3872 10.107 14.1122 10.1497 14.0205C9.9486 13.5525 9.84782 13.0476 9.85384 12.5382C9.85384 11.1455 10.6413 10.0663 11.6622 10.0663C12.0372 10.0601 12.3955 10.2226 12.6434 10.5101C12.8913 10.7976 13.0059 11.1799 12.958 11.5476C12.958 12.0195 12.8695 12.3788 12.4861 13.6674C12.4267 13.865 12.3694 14.0633 12.3143 14.2622C12.2636 14.4423 12.2175 14.6236 12.1757 14.8059C12.0757 15.208 12.1674 15.6361 12.4226 15.957C12.5463 16.1145 12.7061 16.2399 12.8885 16.3228C13.0709 16.4056 13.2705 16.4434 13.4705 16.433C15.0247 16.433 16.1788 14.3653 16.1788 11.6955C16.1788 9.64342 14.8351 8.28509 12.6038 8.28509C12.0453 8.26445 11.4886 8.35989 10.9688 8.56536C10.449 8.77083 9.9775 9.08188 9.58405 9.47884C9.18224 9.88461 8.86524 10.3663 8.65152 10.8959C8.4378 11.4254 8.33165 11.9922 8.33926 12.5632C8.3131 13.1786 8.50163 13.784 8.87259 14.2757C9.06113 14.4215 9.13301 14.6747 9.05488 14.8903C9.01217 15.0653 8.90905 15.4653 8.87051 15.5986C8.85975 15.664 8.83391 15.7261 8.79504 15.7797C8.75617 15.8334 8.70533 15.8774 8.64655 15.908C8.58947 15.9376 8.52619 15.9532 8.4619 15.9536C8.39762 15.9539 8.33416 15.939 8.27676 15.9101C7.06842 15.4111 6.40592 14.058 6.40592 12.3268C6.40592 9.21738 9.00072 6.51009 12.8559 6.51009C16.1215 6.51009 18.5653 8.93613 18.5653 11.8643C18.5653 15.5434 16.5528 18.2226 13.6799 18.2226C13.2712 18.2351 12.8652 18.1512 12.495 17.9776C12.1247 17.8041 11.8005 17.5458 11.5486 17.2236L11.5038 17.408L11.2882 18.2955L11.2861 18.3038C11.134 18.9288 11.0278 19.3632 10.9861 19.5257C10.875 19.8965 10.7361 20.2577 10.5695 20.609C12.6422 21.103 14.8254 20.7843 16.6703 19.7183C18.5153 18.6523 19.8818 16.9201 20.4891 14.8778C21.0964 12.8354 20.8982 10.6379 19.9354 8.73712C18.9725 6.83631 17.3182 5.37652 15.3123 4.6578C13.3064 3.93907 11.1014 4.01601 9.15049 4.8728C7.19958 5.7296 5.65098 7.30115 4.82297 9.26445C3.99497 11.2278 3.95047 13.4336 4.69862 15.4287C5.44677 17.4238 6.93074 19.0555 8.84551 19.9903ZM12.4997 22.9163C6.74655 22.9163 2.08301 18.2528 2.08301 12.4997C2.08301 6.74655 6.74655 2.08301 12.4997 2.08301C18.2528 2.08301 22.9163 6.74655 22.9163 12.4997C22.9163 18.2528 18.2528 22.9163 12.4997 22.9163Z" fill="#596075"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between copy-text">
                <p>MBSGroup © 2025. All Rights Reserved</p>
                <ul>
                    <li><a href="">Terms & Conditions</a></li>
                    <li><a href="">Privacy & Policy</a></li>
                </ul>
            </div>
            <p>Design by : <a href="https://mightywarner.ae/" target="_blank">
                    Mighty Warner Infoserve (OPC) Pvt Ltd</a></p>
        </div>
    </div>
</footer>

<!-- menu mobile -->
<div class="offcanvas offcanvas-start mobile_left_menu " tabindex="-1" id="mobileOffcanvasExample"
    aria-labelledby="offcanvasExampleLabel" role="dialog">
    <div class="offcanvas-header">
        <a href="{{ url('/') }}" class=""><img src="{{asset(@$siteInformation->logo)}}" alt="MBS Group" width="84" height="84"
                class="h-auto"></a>

        <button aria-controls="offcanvasExample" role="button" href="#mobileOffcanvasExample" data-bs-toggle="offcanvas"
            class="btn-close text-reset btn-close-white" type="button"></button>
    </div>
    <div class="offcanvas-body">

        <nav>
            <ul>
                <li><a href="{{ url('/') }}" class="active">Home</a></li>
                <li><a href="{{route('about-us')}}">About us </a></li>
                <li class="submenu">
                    <a href="{{url('products')}}">Products</a>
                    <ul>
                        <li class="nav-item mobDropDown dropdown">
                            <a href="products-category.php">Pallet Racking System</a>
                            <button class="" type="button" id="servicesMenu2" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.51406 4.49656L9.79231 1.21831C9.92533 1.08449 10 0.903472 10 0.714787C10 0.526101 9.92533 0.345081 9.79231 0.211264C9.72592 0.144322 9.64692 0.0911882 9.55989 0.0549283C9.47285 0.0186685 9.3795 -2.71228e-08 9.28522 -3.12441e-08C9.19093 -3.53655e-08 9.09758 0.0186685 9.01055 0.0549283C8.92351 0.0911881 8.84452 0.144322 8.77812 0.211264L5.50701 3.49666C5.44062 3.5636 5.36162 3.61674 5.27459 3.653C5.18756 3.68926 5.0942 3.70792 4.99992 3.70792C4.90563 3.70792 4.81228 3.68926 4.72525 3.653C4.63821 3.61674 4.55922 3.5636 4.49282 3.49666L1.22171 0.211264C1.08817 0.076774 0.906672 0.000842317 0.717145 0.000172601C0.527617 -0.000497115 0.345586 0.0741506 0.211096 0.207693C0.0766069 0.341236 0.000674462 0.522734 4.74545e-06 0.712261C-0.000664971 0.901789 0.0739834 1.08382 0.207526 1.21831L3.48578 4.49656C3.88753 4.89781 4.43211 5.12319 4.99992 5.12319C5.56772 5.12319 6.11231 4.89781 6.51406 4.49656Z"
                                        fill="white"></path>
                                </svg>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="servicesMenu2" style="">
                              <li><a href=" ">Mobile Pallet racking</a></li>
                        <li><a href=" ">Multi-Tier Pallet racking</a></li>


                            </ul>
                        </li>
                        <li class="nav-item mobDropDown dropdown">
                            <a href="products-category.php">Best Shelving System</a>
                            <button class="" type="button" id="servicesMenu2" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.51406 4.49656L9.79231 1.21831C9.92533 1.08449 10 0.903472 10 0.714787C10 0.526101 9.92533 0.345081 9.79231 0.211264C9.72592 0.144322 9.64692 0.0911882 9.55989 0.0549283C9.47285 0.0186685 9.3795 -2.71228e-08 9.28522 -3.12441e-08C9.19093 -3.53655e-08 9.09758 0.0186685 9.01055 0.0549283C8.92351 0.0911881 8.84452 0.144322 8.77812 0.211264L5.50701 3.49666C5.44062 3.5636 5.36162 3.61674 5.27459 3.653C5.18756 3.68926 5.0942 3.70792 4.99992 3.70792C4.90563 3.70792 4.81228 3.68926 4.72525 3.653C4.63821 3.61674 4.55922 3.5636 4.49282 3.49666L1.22171 0.211264C1.08817 0.076774 0.906672 0.000842317 0.717145 0.000172601C0.527617 -0.000497115 0.345586 0.0741506 0.211096 0.207693C0.0766069 0.341236 0.000674462 0.522734 4.74545e-06 0.712261C-0.000664971 0.901789 0.0739834 1.08382 0.207526 1.21831L3.48578 4.49656C3.88753 4.89781 4.43211 5.12319 4.99992 5.12319C5.56772 5.12319 6.11231 4.89781 6.51406 4.49656Z"
                                        fill="white"></path>
                                </svg>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="servicesMenu2" style="">
                                 <li><a href=" ">Mobile Pallet racking</a></li>
                        <li><a href=" ">Multi-Tier Pallet racking</a></li>
                        <li><a href=" ">Narrow Aisle racking</a></li>


                            </ul>
                        </li>
                    </ul>
                </li>

                <li><a href="{{route('services')}}">Services</a></li>
                <li><a href="{{route('projects')}}">Projects</a></li>
                <li><a href="{{route('about-us')}}">Sectors</a></li>
                <li><a href="{{route('brands')}}">Brands</a></li>
                <li><a href="{{route('media')}}">Media</a></li>
                <li><a href="{{route('blogs.list')}}">Blogs</a></li>
                <li><a href="{{route('contact-us')}}">Contact us</a></li>

            </ul>

        </nav>

    </div>
</div>

<!-- footer end here  -->
{{-- @if (@$$siteInformation->whatsapp_number != '' || @$$siteInformation->whatsapp_number != null)
<a href="https://wa.me/{{$$siteInformation->whatsapp_number}}" class="whatsappFixed">
    <img src="{{ asset('web/images/svg/whatsapp.svg') }}" class="img-fluid" alt="WhatsApp">
</a>
@endif
<a href="web/pdf/medicom-catalogue.pdf" download class="brochureFixed">
    <img src="{{ asset('web/images/svg/download.svg') }}" class="img-fluid" alt="">
</a> --}}




<div class="modal fade  enquiryForm" id="enquiryForm" aria-hidden="true" aria-labelledby="enquiryFormLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="enquiryFormClose">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M7.75696 16.2428L16.243 7.75684M16.243 16.2428L7.75696 7.75684" stroke="#414A66" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            
                @include('web.components._form')
            </div>
        </div>
    </div>
</div>



<div class="modal fade  enquiryForm" id="ProductEnquiryForm" aria-hidden="true" aria-labelledby="ProductEnquiryFormLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="ProductEnquiryFormClose">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M7.75696 16.2428L16.243 7.75684M16.243 16.2428L7.75696 7.75684" stroke="#414A66" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <div class="modal-body p-0">
                        <p class="title">Quick Enquiry</p>
                        <form id="ProductEnquiryFormValidation" action="" method="post" enctype="multipart/form-data">
                            <div class="row justify-content-between">
                                  <div class="formGroup col--4">
                                <input type="text" id="name_enquiry" name="name_enquiry" placeholder="Name">
                                <span id="name_enquiryError" class="error-message">Please enter your name</span>
                            </div>
                            <div class="formGroup col--4">
                                <input type="email" id="email_enquiry" name="email_enquiry" placeholder="Email">
                                <span id="email_enquiryError" class="error-message">Please enter a valid email</span>
                            </div>
                            <div class="formGroup col--4">
                                <input type="tel" id="phone_enquiry" name="phone_enquiry" class="phone_number" placeholder="Phone">
                                <span id="phone_enquiryError" class="error-message">Please enter a valid phone number</span>
                            </div>
                            <div class="formGroup col-12">
                                <input type="text" id="product_enquiry" name="product_enquiry" class="product_name" placeholder="Product Name" disabled>
                                <span id="phone_enquiryError" class="error-message">Please enter a product name</span>
                            </div>
                            <div class="formGroup col-12">
                                <textarea id="message_enquiry" name="message_enquiry" rows="" cols="" placeholder="Enquiry"></textarea>
                                <span id="message_enquiryError" class="error-message">Please enter your message</span>
                            </div>
                            <div class="d-flex justify-content-end buttonGroup p-0">
                                <button type="submit" class="btn-theme btnDark"> Submit</button>  
                            <button type="button" class="btn-cancel btn-theme btnBorder" data-bs-dismiss="modal" aria-label="Close" id="ProductEnquiryFormClose">Cancel</button>
                            </div>
                            </div>  
                     </form>
            </div>
        </div>
    </div>
</div>



    <script src="{{ asset('web/js/custom.js') }}"></script>

    <script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>

    <!-- new  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('web/js/lib/countup.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.0/slick.min.js"></script>
    <script src="{{ asset('web/js/lib/jquery.star-rating-svg.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="{{ asset('web/js/lib/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('web/js/script.js') }}"></script>


    
    
    
</body>
</html>

        
