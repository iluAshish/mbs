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

                                        <div class="accordion-item ">
                                        @foreach($categories_menu as $category)
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
                                        @endforeach
                                        </div>

                                        <!-- <div class="accordion-item">
                                        <button class="accordion-toggle">
                                            <span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"> <path d="M15.6535 0.900024H2.34633C1.54877 0.900024 0.899902 1.54889 0.899902 2.34645V14.7857C0.899902 15.3773 1.25775 15.8856 1.76776 16.1095V16.8107C1.76776 16.9704 1.89707 17.1 2.05705 17.1H3.21419C3.37416 17.1 3.50347 16.9704 3.50347 16.8107V16.2322H14.4963V16.8107C14.4963 16.9704 14.6256 17.1 14.7856 17.1H15.9428C16.1027 17.1 16.232 16.9704 16.232 16.8107V16.1095C16.7421 15.8856 17.0999 15.3773 17.0999 14.7857V2.34645C17.0999 1.54889 16.451 0.900024 15.6535 0.900024ZM16.5213 2.34645V11.3143H9.28919V1.4786H15.6535C16.132 1.4786 16.5213 1.86797 16.5213 2.34645ZM2.34633 1.4786H8.71062V11.3143H1.47847V2.34645C1.47847 1.86797 1.86785 1.4786 2.34633 1.4786ZM2.9249 16.5215H2.34633V16.2322H2.9249V16.5215ZM15.6535 16.5215H15.0749V16.2322H15.6535V16.5215ZM15.6535 15.6536H2.34633C1.86785 15.6536 1.47847 15.2642 1.47847 14.7857V11.8929H16.5213V14.7857C16.5213 15.2642 16.132 15.6536 15.6535 15.6536ZM2.63562 10.4465H5.52847C5.68845 10.4465 5.81776 10.3169 5.81776 10.1572V4.95002C5.81776 4.79034 5.68845 4.66074 5.52847 4.66074H2.63562C2.47564 4.66074 2.34633 4.79034 2.34633 4.95002V10.1572C2.34633 10.3169 2.47564 10.4465 2.63562 10.4465ZM2.9249 5.23931H5.23919V9.86788H2.9249V5.23931ZM7.55347 9.00002V4.37145C7.55347 4.21177 7.68278 4.08217 7.84276 4.08217C8.00273 4.08217 8.13205 4.21177 8.13205 4.37145V9.00002C8.13205 9.15971 8.00273 9.28931 7.84276 9.28931C7.68278 9.28931 7.55347 9.15971 7.55347 9.00002ZM9.86776 9.00002V4.37145C9.86776 4.21177 9.99707 4.08217 10.157 4.08217C10.317 4.08217 10.4463 4.21177 10.4463 4.37145V9.00002C10.4463 9.15971 10.317 9.28931 10.157 9.28931C9.99707 9.28931 9.86776 9.15971 9.86776 9.00002ZM12.5561 5.03478L12.6608 4.93006C12.5506 4.88899 12.4713 4.78513 12.4713 4.66074C12.4713 4.53635 12.5506 4.43249 12.6608 4.39141L12.5561 4.28669C12.443 4.17358 12.443 3.99075 12.5561 3.87764C12.6692 3.76453 12.852 3.76453 12.9651 3.87764L13.459 4.37145H13.6285V4.20193L13.1347 3.70812C13.0216 3.59501 13.0216 3.41218 13.1347 3.29907C13.2478 3.18596 13.4306 3.18596 13.5437 3.29907L13.6484 3.40379C13.6895 3.29357 13.7931 3.21431 13.9178 3.21431C14.0424 3.21431 14.146 3.29357 14.1871 3.40379L14.2918 3.29907C14.4049 3.18596 14.5877 3.18596 14.7009 3.29907C14.814 3.41218 14.814 3.59501 14.7009 3.70812L14.207 4.20193V4.37145H14.3766L14.8704 3.87764C14.9835 3.76453 15.1663 3.76453 15.2794 3.87764C15.3925 3.99075 15.3925 4.17358 15.2794 4.28669L15.1747 4.39141C15.2849 4.4322 15.3642 4.53635 15.3642 4.66074C15.3642 4.78513 15.2849 4.88927 15.1747 4.93006L15.2794 5.03478C15.3925 5.1479 15.3925 5.33072 15.2794 5.44384C15.223 5.50025 15.149 5.5286 15.0749 5.5286C15.0008 5.5286 14.9268 5.50025 14.8704 5.44384L14.3766 4.95002H14.207V5.11955L14.7009 5.61336C14.814 5.72647 14.814 5.9093 14.7009 6.02241C14.6444 6.07882 14.5704 6.10717 14.4963 6.10717C14.4223 6.10717 14.3482 6.07882 14.2918 6.02241L14.1871 5.91769C14.146 6.0279 14.0424 6.10717 13.9178 6.10717C13.7931 6.10717 13.6895 6.0279 13.6484 5.91769L13.5437 6.02241C13.4306 6.13552 13.2478 6.13552 13.1347 6.02241C13.0216 5.9093 13.0216 5.72647 13.1347 5.61336L13.6285 5.11955V4.95002H13.459L12.9651 5.44384C12.9087 5.50025 12.8347 5.5286 12.7606 5.5286C12.6866 5.5286 12.6125 5.50025 12.5561 5.44384C12.443 5.33072 12.443 5.1479 12.5561 5.03478ZM13.0499 13.05V13.3393C13.0499 13.499 12.9206 13.6286 12.7606 13.6286H5.23919C5.07921 13.6286 4.9499 13.499 4.9499 13.3393V13.05C4.9499 12.8903 5.07921 12.7607 5.23919 12.7607C5.39916 12.7607 5.52847 12.8903 5.52847 13.05H12.4713C12.4713 12.8903 12.6006 12.7607 12.7606 12.7607C12.9206 12.7607 13.0499 12.8903 13.0499 13.05Z" fill="#323C59" stroke="#323C59" stroke-width="0.3"/> </svg>
                                            </span> Refrigeration
                                      
                                        </button>
                                        <ul class="submenu">
                                            <li>Cold Rooms</li>
                                            <li>Freezers</li>
                                        </ul>
                                        </div>

                                        <div class="accordion-item">
                                        <button class="accordion-toggle">
                                            <span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="18" viewBox="0 0 12 18" fill="none"> <path d="M0.75 1.5H9C9.59674 1.5 10.169 1.73705 10.591 2.15901C11.0129 2.58097 11.25 3.15326 11.25 3.75V14.25C11.25 14.4489 11.171 14.6397 11.0303 14.7803C10.8897 14.921 10.6989 15 10.5 15H8.25" stroke="#323C59" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path d="M6 9V10.5M0.75 1.5L6.441 2.6385C6.951 2.74044 7.40993 3.0159 7.73974 3.41805C8.06955 3.82019 8.24986 4.32416 8.25 4.84425V15.585C8.24993 15.6959 8.22526 15.8054 8.17777 15.9057C8.13028 16.0059 8.06115 16.0944 7.97535 16.1647C7.88956 16.235 7.78924 16.2854 7.68162 16.3122C7.574 16.3391 7.46177 16.3417 7.353 16.32L1.956 15.2415C1.61583 15.1735 1.30975 14.9897 1.08985 14.7214C0.869964 14.4531 0.749863 14.1169 0.75 13.77V1.5Z" stroke="#323C59" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                                            </span> Doors & Dock Levers
                                        
                                        </button>
                                        <ul class="submenu">
                                            <li>Dock Doors</li>
                                            <li>Levellers</li>
                                        </ul>
                                        </div> -->
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
            <form class="subscribe-form">
                <strong>Newsletter</strong>
                <p>Sign up to receive news, app updates, and other exclusive info via email</p>
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <label>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.7836 4.15231L10.6815 10.0338C10.4797 10.201 10.2258 10.2925 9.96372 10.2925C9.70164 10.2925 9.44778 10.201 9.24597 10.0338L2.14722 4.15231C2.10913 4.26696 2.08976 4.387 2.08984 4.50781V13.5078C2.08984 13.8062 2.20837 14.0923 2.41935 14.3033C2.63033 14.5143 2.91648 14.6328 3.21484 14.6328H16.7148C17.0132 14.6328 17.2994 14.5143 17.5103 14.3033C17.7213 14.0923 17.8398 13.8062 17.8398 13.5078V4.50781C17.8403 4.38706 17.8213 4.26703 17.7836 4.15231ZM3.21484 2.25781H16.7148C17.3116 2.25781 17.8839 2.49487 18.3058 2.91682C18.7278 3.33878 18.9648 3.91108 18.9648 4.50781V13.5078C18.9648 14.1045 18.7278 14.6768 18.3058 15.0988C17.8839 15.5208 17.3116 15.7578 16.7148 15.7578H3.21484C2.61811 15.7578 2.04581 15.5208 1.62385 15.0988C1.2019 14.6768 0.964844 14.1045 0.964844 13.5078V4.50781C0.964844 3.91108 1.2019 3.33878 1.62385 2.91682C2.04581 2.49487 2.61811 2.25781 3.21484 2.25781ZM2.97859 3.38281L9.25159 8.56119C9.4525 8.72713 9.70479 8.81818 9.96536 8.8188C10.2259 8.81942 10.4787 8.72955 10.6803 8.56456L17.0163 3.38281H2.97859Z"
                                fill="#818DA6" /> </svg>
                        <input type="email" id="email-subscribe" placeholder="Email address" />
                    </label>
                    <button type="submit" class="btn-theme btnLight">Subscribe</button>
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
                        <li><a href="products-details.php">Heavy Duty Cantilever</a></li>
                        <li><a href="products-details.php">Light Duty Cantilever</a></li>
                        <li><a href="products-details.php">Rollrack</a></li>
                    </ul>

                    <strong>Mezzanine Floors & Partitioning</strong>
                    <ul>
                        <li><a href="products-details.php">Mezzanine floor System</a></li>
                        <li><a href="products-details.php">Wiremesh Decking & Shelving</a></li>
                        <li><a href="products-details.php">Anti Collapse Mesh</a></li>
                        <li><a href="products-details.php">Sign & Marketing System</a></li>
                        <li><a href="products-details.php">Storage Cabinets</a></li>
                    </ul>
                </div>
                <div>
                    <strong>Doors & Dock Leveller in Middle East</strong>
                    <ul>
                        <li><a href="products-details.php">Industrial Doors</a></li>
                        <li><a href="products-details.php">Overhead sectional doors</a></li>
                        <li><a href="products-details.php">High-Performance doors</a></li>
                        <li><a href="products-details.php">Mega Doors</a></li>
                        <li><a href="products-details.php">Loading Dock Equipment</a></li>
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
        <a href="{{ url('/') }}" class=""><img src="asset('web/images/logo.png')}}" alt="MBS Group" width="84" height="84"
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
                              <li><a href="products-details.php">Mobile Pallet racking</a></li>
                        <li><a href="products-details.php">Multi-Tier Pallet racking</a></li>


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
                                 <li><a href="products-details.php">Mobile Pallet racking</a></li>
                        <li><a href="products-details.php">Multi-Tier Pallet racking</a></li>
                        <li><a href="products-details.php">Narrow Aisle racking</a></li>


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

        
