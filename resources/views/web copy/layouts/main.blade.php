<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{ asset('web/images/svg/favicon.svg') }}" />
    <meta name="title" content="{!! isset($meta_data) ? $meta_data->meta_title : '' !!}" />
    <meta name="description" content="{!! isset($meta_data) ? $meta_data->meta_description : '' !!}" />
    <meta name="keywords" content="{!! isset($meta_data) ? $meta_data->meta_keyword : '' !!}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{!! @$meta_data->meta_title !!}</title>
    {!! isset($meta_data) ? $meta_data->other_meta_tag : '' !!} {!! isset($siteInformation) ? $siteInformation->header_tag : '' !!}

    
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

    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/style.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/custom_animation.min.css') }}" />
    <style>
        .medicom_error{
            display: none;
            color: #e2251d;
        }
        .testimonial .testimonialCard .position {

    text-align: center;
}
    </style>
    <script>
        var base_url = "{{ url('/') }}";
        var token = "{{ csrf_token() }}";
        </script>
</head>

<body id="home">
    {!! isset($siteInformation) ? $siteInformation->body_tag : '' !!}
    <div class="topHeader">
        <div class="container">
            <div class="row">
                <div class="col-4 col-md-8 d-flex align-items-center ">
                    <div class="info">
                        @if (@$siteInformation->phone != '' || @$siteInformation->phone != null)
                        <a href="tel:+97167454194">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_194_115)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.70688 9.56565e-10H4.61348C4.45203 0.00512905 4.29268 0.038169 4.1425 0.0976562L4.10109 0.114063C3.45367 0.37043 1.54441 1.07691 1.07375 1.54766C0.37129 2.25 0.0485943 3.12227 0.0056255 4.10914C-0.0423433 5.21187 0.268282 6.35977 0.678243 7.37402C1.71731 9.94477 3.66817 12.4379 5.61555 14.3854C7.56293 16.3328 10.0561 18.2838 12.6269 19.3229C13.5772 19.707 14.6344 20 15.6663 20C15.7415 20 15.8168 19.9984 15.892 19.9952C16.8788 19.9523 17.7514 19.6296 18.4534 18.9273C18.9349 18.4458 19.6292 16.5621 19.8855 15.9043L19.9017 15.8628C20.0257 15.5518 20.0333 15.2066 19.923 14.8905C19.8128 14.5744 19.5921 14.3088 19.3015 14.1425L15.8812 12.168C15.5606 11.9836 15.18 11.9338 14.8227 12.0296C14.4655 12.1253 14.1607 12.3587 13.9752 12.6787C13.6369 13.2646 13.1246 13.7399 12.444 13.879C12.1241 13.9488 11.7928 13.9478 11.4734 13.8761C11.1539 13.8043 10.854 13.6636 10.5948 13.4636C9.83512 12.8936 9.11063 12.2324 8.43938 11.5613C7.76813 10.8902 7.10735 10.1658 6.53731 9.40629C6.33735 9.147 6.19655 8.8471 6.12478 8.52763C6.053 8.20816 6.052 7.87685 6.12184 7.55695C6.26094 6.87668 6.73653 6.36406 7.32235 6.0257C7.64204 5.83999 7.87522 5.53526 7.9709 5.17813C8.06659 4.821 8.017 4.44052 7.83297 4.11984L5.8584 0.69957C5.74211 0.494389 5.57524 0.322385 5.37368 0.199932C5.17211 0.0774784 4.94256 0.00865054 4.70688 9.56565e-10ZM10.1455 0.797656C10.1455 0.692901 10.1662 0.589173 10.2062 0.492394C10.2463 0.395616 10.3051 0.307681 10.3792 0.233612C10.4533 0.159543 10.5412 0.100789 10.638 0.060706C10.7348 0.0206228 10.8385 -5.12893e-06 10.9432 9.56565e-10C12.1326 -1.02596e-05 13.3103 0.234241 14.409 0.689379C15.5078 1.14452 16.5062 1.81163 17.3472 2.65262C18.1882 3.49361 18.8553 4.49201 19.3104 5.59082C19.7655 6.68963 19.9997 7.86731 19.9997 9.05664C19.9997 9.26819 19.9156 9.47108 19.766 9.62067C19.6164 9.77026 19.4135 9.8543 19.202 9.8543C18.9904 9.8543 18.7876 9.77026 18.638 9.62067C18.4884 9.47108 18.4043 9.26819 18.4043 9.05664C18.4044 8.07684 18.2114 7.10662 17.8365 6.20139C17.4615 5.29616 16.912 4.47365 16.2192 3.78081C15.5263 3.08797 14.7038 2.53838 13.7986 2.16342C12.8934 1.78846 11.9232 1.59547 10.9434 1.59547C10.8386 1.59549 10.7349 1.57488 10.638 1.53479C10.5412 1.49471 10.4533 1.43594 10.3792 1.36186C10.3051 1.28777 10.2463 1.19981 10.2062 1.103C10.1661 1.0062 10.1455 0.902437 10.1455 0.797656ZM10.1455 4.02941C10.1455 3.92465 10.1661 3.82092 10.2062 3.72413C10.2463 3.62734 10.305 3.53939 10.3791 3.46531C10.4532 3.39122 10.5411 3.33245 10.6379 3.29236C10.7347 3.25226 10.8384 3.23161 10.9432 3.2316C11.7081 3.23157 12.4656 3.38221 13.1723 3.67492C13.879 3.96764 14.5212 4.39669 15.062 4.93759C15.6029 5.47849 16.032 6.12064 16.3247 6.82736C16.6174 7.53408 16.7681 8.29154 16.768 9.05648C16.7665 9.26707 16.6818 9.46854 16.5324 9.61693C16.383 9.76532 16.1809 9.8486 15.9703 9.8486C15.7597 9.8486 15.5577 9.76532 15.4083 9.61693C15.2588 9.46854 15.1741 9.26707 15.1727 9.05648C15.1727 8.50107 15.0633 7.95108 14.8507 7.43794C14.6382 6.9248 14.3267 6.45854 13.9339 6.0658C13.5412 5.67306 13.0749 5.36153 12.5618 5.14898C12.0486 4.93644 11.4987 4.82705 10.9432 4.82707C10.8385 4.82708 10.7348 4.80645 10.638 4.76636C10.5412 4.72628 10.4533 4.66753 10.3792 4.59346C10.3051 4.51939 10.2463 4.43145 10.2062 4.33468C10.1662 4.2379 10.1455 4.13417 10.1455 4.02941ZM10.1455 7.26098C10.1455 7.04942 10.2296 6.84654 10.3792 6.69696C10.5288 6.54738 10.7317 6.46335 10.9432 6.46336C11.2838 6.46334 11.621 6.53041 11.9356 6.66072C12.2502 6.79103 12.5361 6.98204 12.7769 7.22284C13.0177 7.46364 13.2087 7.74951 13.339 8.06413C13.4693 8.37875 13.5363 8.71595 13.5363 9.05648C13.5363 9.26805 13.4522 9.47094 13.3027 9.62054C13.1531 9.77014 12.9502 9.85418 12.7386 9.85418C12.527 9.85418 12.3241 9.77014 12.1745 9.62054C12.0249 9.47094 11.9409 9.26805 11.9409 9.05648C11.9409 8.92545 11.9151 8.7957 11.865 8.67464C11.8149 8.55357 11.7414 8.44357 11.6488 8.35091C11.5561 8.25825 11.4461 8.18474 11.3251 8.13459C11.204 8.08444 11.0743 8.05863 10.9432 8.05863C10.8385 8.05864 10.7348 8.03801 10.638 7.99793C10.5412 7.95784 10.4533 7.89909 10.3792 7.82502C10.3051 7.75095 10.2463 7.66302 10.2062 7.56624C10.1662 7.46946 10.1455 7.36573 10.1455 7.26098Z" fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_194_115">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <span>{{ @$siteInformation->phone }}</span>
                        </a>
                        @endif
                        @if (@$siteInformation->email != '' || @$siteInformation->email != null)
                            <a href="mailto:{{ @$siteInformation->email }}">
                                <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.8027 3.71094H2.19727C0.983252 3.71094 0 4.70029 0 5.9082V19.0918C0 20.3069 0.990479 21.2891 2.19727 21.2891H22.8027C24.0066 21.2891 25 20.311 25 19.0918V5.9082C25 4.70244 24.0207 3.71094 22.8027 3.71094ZM22.495 5.17578C22.0461 5.62231 14.3205 13.3073 14.0537 13.5726C13.6387 13.9876 13.0869 14.2162 12.5 14.2162C11.9131 14.2162 11.3613 13.9876 10.9449 13.5712C10.7655 13.3928 3.12515 5.79268 2.50498 5.17578H22.495ZM1.46484 18.7937V6.20728L7.79482 12.5039L1.46484 18.7937ZM2.50591 19.8242L8.8334 13.537L9.9105 14.6084C10.6022 15.3001 11.5218 15.681 12.5 15.681C13.4782 15.681 14.3978 15.3001 15.0881 14.6098L16.1666 13.537L22.4941 19.8242H2.50591ZM23.5352 18.7937L17.2052 12.5039L23.5352 6.20728V18.7937Z" fill="white"/>
                                </svg>
                                <span>{{ @$siteInformation->email }}</span>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-8 col-md-4 d-flex align-items-center justify-content-end">
                    <div class="social">
                        @if (@$siteInformation->facebook_url != '' || @$siteInformation->facebook_url != null)
                        <a href="{{ @$siteInformation->facebook_url }}" target="_blank">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.9996 0.00416134L12.406 0C9.49227 0 7.60926 1.9319 7.60926 4.92203V7.19141H5.00156C4.77622 7.19141 4.59375 7.37409 4.59375 7.59943V10.8875C4.59375 11.1128 4.77643 11.2953 5.00156 11.2953H7.60926V19.5922C7.60926 19.8175 7.79174 20 8.01707 20H11.4194C11.6447 20 11.8272 19.8173 11.8272 19.5922V11.2953H14.8762C15.1015 11.2953 15.284 11.1128 15.284 10.8875L15.2853 7.59943C15.2853 7.49123 15.2422 7.38762 15.1658 7.31105C15.0895 7.23448 14.9854 7.19141 14.8772 7.19141H11.8272V5.26763C11.8272 4.34298 12.0475 3.87358 13.252 3.87358L14.9992 3.87295C15.2243 3.87295 15.4068 3.69027 15.4068 3.46514V0.411972C15.4068 0.187052 15.2245 0.00457747 14.9996 0.00416134Z" fill="white"></path>
                            </svg>
                        </a>
                        @endif
                        @if (@$siteInformation->instagram_url != '' || @$siteInformation->instagram_url != null)
                        <a href="{{ @$siteInformation->instagram_url }}" target="_blank">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_194_135)">
                                    <path d="M14.9999 0H5.00012C2.25043 0 0.000244141 2.25019 0.000244141 4.99988V15.0001C0.000244141 17.7491 2.25043 20 5.00012 20H14.9999C17.7496 20 19.9998 17.7491 19.9998 15.0001V4.99988C19.9998 2.25019 17.7496 0 14.9999 0ZM18.333 15.0001C18.333 16.8376 16.8384 18.3333 14.9999 18.3333H5.00012C3.16242 18.3333 1.66695 16.8376 1.66695 15.0001V4.99988C1.66695 3.16193 3.16242 1.66671 5.00012 1.66671H14.9999C16.8384 1.66671 18.333 3.16193 18.333 4.99988V15.0001Z" fill="white"></path>
                                    <path d="M15.4172 5.83295C16.1075 5.83295 16.6672 5.27332 16.6672 4.58298C16.6672 3.89264 16.1075 3.33301 15.4172 3.33301C14.7269 3.33301 14.1672 3.89264 14.1672 4.58298C14.1672 5.27332 14.7269 5.83295 15.4172 5.83295Z" fill="white"></path>
                                    <path d="M10.0002 5C7.2383 5 5.00037 7.23818 5.00037 9.99988C5.00037 12.7606 7.2383 15.0002 10.0002 15.0002C12.7614 15.0002 15.0001 12.7606 15.0001 9.99988C15.0001 7.23818 12.7614 5 10.0002 5ZM10.0002 13.3335C8.15952 13.3335 6.66707 11.8411 6.66707 9.99988C6.66707 8.15866 8.15952 6.66671 10.0002 6.66671C11.841 6.66671 13.3334 8.15866 13.3334 9.99988C13.3334 11.8411 11.841 13.3335 10.0002 13.3335Z" fill="white"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_194_135">
                                        <rect width="20" height="20" fill="white" transform="translate(0.000244141)"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        @endif
                        @if (@$siteInformation->linkedin_url != '' || @$siteInformation->linkedin_url != null)
                        <a href="{{ @$siteInformation->linkedin_url }}" target="_blank">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_194_146)">
                                    <path d="M19.9953 19.9999L20.0003 19.999V12.664C20.0003 9.07569 19.2278 6.31152 15.0328 6.31152C13.0161 6.31152 11.6628 7.41819 11.1103 8.46736H11.052V6.64652H7.07446V19.999H11.2161V13.3874C11.2161 11.6465 11.5461 9.96319 13.702 9.96319C15.8261 9.96319 15.8578 11.9499 15.8578 13.499V19.9999H19.9953Z" fill="white"></path>
                                    <path d="M0.3302 6.64746H4.47687V20H0.3302V6.64746Z" fill="white"></path>
                                    <path d="M2.40191 0C1.07608 0 0.000244141 1.07583 0.000244141 2.40167C0.000244141 3.7275 1.07608 4.82583 2.40191 4.82583C3.72774 4.82583 4.80358 3.7275 4.80358 2.40167C4.80274 1.07583 3.72691 0 2.40191 0Z" fill="white"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_194_146">
                                        <rect width="20" height="20" fill="white" transform="translate(0.000244141)"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        @endif
                        @if (@$siteInformation->twitter_url != '' || @$siteInformation->twitter_url != null)
                        <a href="{{ @$siteInformation->twitter_url }}" target="_blank">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_194_151)">
                                    <path d="M11.862 8.46864L19.1473 0H17.4209L11.0951 7.3532L6.04262 0H0.21521L7.85551 11.1193L0.21521 20H1.9417L8.62199 12.2348L13.9578 20H19.7852L11.8616 8.46864H11.862ZM9.49732 11.2173L8.7232 10.1101L2.56378 1.29967H5.21558L10.1863 8.40994L10.9604 9.51718L17.4218 18.7594H14.77L9.49732 11.2177V11.2173Z" fill="white"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_194_151">
                                        <rect width="20" height="20" fill="white" transform="translate(0.000244141)"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img class="img-fluid" src="{{ Helper::getLogo() }}" alt="">
                        </a>
    
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav ms-auto">
                                <!--<li class="nav-item ">
                                    <a class="nav-link" id="homeMenu" href="{{ url('/') }}"> Home </a>
                                </li>-->
                                <li class="nav-item ">
                                    <a class="nav-link" id="aboutUsMenu" href="{{ url('about') }}"> About Us </a>
                                </li>
                                @if($companyCount > 0)
                                 <li class="nav-item ">
                                    <a class="nav-link" id="contactMenu" href="{{ url('companies') }}"> Our Companies </a>
                                </li>
                                @endif
                                <li class="nav-item dropdown has-megamenu" id="myDropdown">
                                    <a class="nav-link dropdown-toggle" id="industriesMenu" href="#" data-bs-toggle="dropdown">
                                        Industries
                                        <svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_3_17590)">
                                                <path d="M11.56 1L7.21333 5.34667C6.7 5.86 5.86 5.86 5.34667 5.34667L1 1" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_3_17590">
                                                    <rect width="13" height="7" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu2">
                                        <div class="leftList">
                                            <p class="fw-bold">Industries</p>
                                            @foreach($categories_menu->whereNull('parent_id') as $key => $categoryitem)
                                            <li>
                                                <a id="productsMenu{{$key}}" class="dropdown-item" href="{{ url('/products').'/category/'.$categoryitem->short_url }}">
                                                    {{ $categoryitem->title }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </div>
                                        <div class="rightBrands">
                                            <p class="fw-bold">Top Brands</p>
                                            <div class="logoWrapper">
                                             
                                            @foreach($brands_menu as $key => $brand)
                                            <a href="{{ url('/products').'/brand/'.$brand->short_url }}" class="items">
                                                {!! Helper::printImage(
                                                    $brand,
                                                    'featured_image',
                                                    'featured_image_webp',
                                                    'featured_image_attribute',
                                                    'pro-img img-fluid',
                                                ) !!}
                                                
                                            </a>
                                            @endforeach
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                @if($servicesCount > 0)
                                <li class="nav-item ">
                                    <a class="nav-link" id="scientificMenu" href="{{ url('medicom-scientific') }}"> Our Expertise </a>
                                </li>
                                @endif
                                <!--<li class="nav-item ">-->
                                <!--    <a class="nav-link" id="newsMenu" href="{{ url('news-events') }}"> News & Events </a>-->
                                <!--</li>-->
                                <!--<li class="nav-item ">-->
                                <!--    <a class="nav-link" id="blogMenu" href="{{ url('blogs') }}"> Blogs </a>-->
                                <!--</li>-->
                                <li class="nav-item ">
                                    <a class="nav-link" id="contactMenu" href="{{ url('contact') }}"> Contact Us </a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="mobile_right">
                            <!--    <a href="" target="_blank" class="primary_btn" ><span>Get a Quote</span></a>-->
                            <a data-bs-toggle="modal" data-bs-target="#enquiryModal" class="primary_btn aos-init aos-animate"><span>Quick Enquiry</span></a>
                            <a class="hamburgerMenu" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="offcanvasRight">
                                <img src="{{ asset('web/images/svg/hamburgerMenu.svg') }}" alt="">
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header section -->
    <!-- end of header section -->
    <div class="offcanvas offcanvas-end mobileMenu" tabindex="-1" id="mobileMenu" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <a class="" href="index.php">
                <img class="img-fluid logo" src="assets/images/logo.svg" alt="">
            </a>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul>
    
                <!--<li>
                    <a id="homeMobileMenu" href="{{ url('/') }}">
                        <h6>Home</h6>
                    </a>
                </li>-->
                <li>
                    <a id="aboutMobileMenu" href="{{ url('about') }}">
                        <h6>About Us</h6>
                    </a>
                </li>
                @if($companyCount > 0)
                 <li class="nav-item ">
                    <a id="contactMenu" href="{{ url('companies') }}"> <h6>Our Companies</h6> </a>
                </li>
                @endif

                <li>
                    <a id="industriesMobileMenu" data-bs-toggle="offcanvas" data-bs-target="#mobileProductMenu" aria-controls="offcanvasRight" href="{{ url('/products')}}">
                        <h6 class="w-100 d-flex justify-content-between">
                            Industries
                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.873836 1.37516C2.44306 2.94439 4.01229 4.48285 5.58152 6.05207C5.67383 6.14438 5.73537 6.20592 5.82767 6.29823C4.41229 7.71361 2.99691 9.12899 1.55076 10.5751C1.33537 10.7905 1.08922 11.0367 0.873836 11.2521C0.319991 11.8059 1.18153 12.6982 1.73537 12.1136L6.44306 7.40592L7.11998 6.729C7.36613 6.48284 7.36613 6.08284 7.11998 5.86746C5.55075 4.29823 4.01229 2.729 2.44306 1.15977C2.22768 0.944391 1.98153 0.698237 1.76614 0.482853C1.2123 -0.0709923 0.319991 0.790545 0.873836 1.37516Z" fill="white"/>
                            </svg>
                        </h6>
                    </a>
                </li>
                @if($servicesCount > 0)
                <li>
                    <a id="scientificMobileMenu" href="{{ url('medicom-scientific') }}">
                        <h6>Our Expertise</h6>
                    </a>
                </li>
                @endif
                @if($blogCount > 0)
                <li>
                    <a id="newsMobileMenu" href="{{ url('news-events') }}">
                        <h6>News & Events</h6>
                    </a>
                </li>
                @endif
                @if($blogCount > 0)
                <li>
                    <a id="blogMobileMenu" href="{{ url('blogs') }}">
                        <h6>Blogs</h6>
                    </a>
                </li>
                @endif
                <li>
                    <a id="contactMobileMenu" href="{{ url('contact') }}">
                        <h6>Contact Us</h6>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="offcanvas offcanvas-end mobileMenu" tabindex="-1" id="mobileProductMenu" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <a class="" href="index.php">
                <img class="img-fluid logo" src="assets/images/logo.svg" alt="">
            </a>
            <button type="button" class="btn-close text-reset" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="offcanvasRight"></button>
        </div>
        <div class="offcanvas-body">
            <h5 data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="offcanvasRight" class="color_white fw-SemiBold">Industries</h5>
            <ul class="mt-30">
                @foreach($categories_menu->whereNull('parent_id') as $key => $categoryitem)
                <li>
                    <a href="{{ url('/products').'/category/'.$categoryitem->short_url }}"><h6>{{ $categoryitem->title }}</h6></a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

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
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-12 col-xl-4 infoDiv">
                @if (@$siteInformation->footer_logo != '' || @$siteInformation->footer_logo != null)
                    <div class="foot-logo">
                        <img src="{{ url('/') }}/{{ @$siteInformation->footer_logo }}"
                            class="img-fluid" width="202" height="81" {!! @$siteInformation->footer_logo_attribute !!} />
                    </div>
                @endif
                @if (@$siteInformation->company_info_footer != '' || @$siteInformation->company_info_footer != null)
                    <p class="color_white">{!! isset($siteInformation) ? $siteInformation->company_info_footer : '' !!}</p>
                @endif
                <div class="social">
                    @if (@$siteInformation->facebook_url != '' || @$siteInformation->facebook_url != null)
                    <a href="{{ @$siteInformation->facebook_url }}" target="_blank">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.9996 0.00416134L12.406 0C9.49227 0 7.60926 1.9319 7.60926 4.92203V7.19141H5.00156C4.77622 7.19141 4.59375 7.37409 4.59375 7.59943V10.8875C4.59375 11.1128 4.77643 11.2953 5.00156 11.2953H7.60926V19.5922C7.60926 19.8175 7.79174 20 8.01707 20H11.4194C11.6447 20 11.8272 19.8173 11.8272 19.5922V11.2953H14.8762C15.1015 11.2953 15.284 11.1128 15.284 10.8875L15.2853 7.59943C15.2853 7.49123 15.2422 7.38762 15.1658 7.31105C15.0895 7.23448 14.9854 7.19141 14.8772 7.19141H11.8272V5.26763C11.8272 4.34298 12.0475 3.87358 13.252 3.87358L14.9992 3.87295C15.2243 3.87295 15.4068 3.69027 15.4068 3.46514V0.411972C15.4068 0.187052 15.2245 0.00457747 14.9996 0.00416134Z" fill="white"></path>
                        </svg>
                    </a>
                    @endif
                    @if (@$siteInformation->instagram_url != '' || @$siteInformation->instagram_url != null)
                    <a href="{{ @$siteInformation->instagram_url }}" target="_blank">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_194_135)">
                                <path d="M14.9999 0H5.00012C2.25043 0 0.000244141 2.25019 0.000244141 4.99988V15.0001C0.000244141 17.7491 2.25043 20 5.00012 20H14.9999C17.7496 20 19.9998 17.7491 19.9998 15.0001V4.99988C19.9998 2.25019 17.7496 0 14.9999 0ZM18.333 15.0001C18.333 16.8376 16.8384 18.3333 14.9999 18.3333H5.00012C3.16242 18.3333 1.66695 16.8376 1.66695 15.0001V4.99988C1.66695 3.16193 3.16242 1.66671 5.00012 1.66671H14.9999C16.8384 1.66671 18.333 3.16193 18.333 4.99988V15.0001Z" fill="white"></path>
                                <path d="M15.4172 5.83295C16.1075 5.83295 16.6672 5.27332 16.6672 4.58298C16.6672 3.89264 16.1075 3.33301 15.4172 3.33301C14.7269 3.33301 14.1672 3.89264 14.1672 4.58298C14.1672 5.27332 14.7269 5.83295 15.4172 5.83295Z" fill="white"></path>
                                <path d="M10.0002 5C7.2383 5 5.00037 7.23818 5.00037 9.99988C5.00037 12.7606 7.2383 15.0002 10.0002 15.0002C12.7614 15.0002 15.0001 12.7606 15.0001 9.99988C15.0001 7.23818 12.7614 5 10.0002 5ZM10.0002 13.3335C8.15952 13.3335 6.66707 11.8411 6.66707 9.99988C6.66707 8.15866 8.15952 6.66671 10.0002 6.66671C11.841 6.66671 13.3334 8.15866 13.3334 9.99988C13.3334 11.8411 11.841 13.3335 10.0002 13.3335Z" fill="white"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_194_135">
                                    <rect width="20" height="20" fill="white" transform="translate(0.000244141)"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    @endif
                    @if (@$siteInformation->linkedin_url != '' || @$siteInformation->linkedin_url != null)
                    <a href="{{ @$siteInformation->linkedin_url }}" target="_blank">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_194_146)">
                                <path d="M19.9953 19.9999L20.0003 19.999V12.664C20.0003 9.07569 19.2278 6.31152 15.0328 6.31152C13.0161 6.31152 11.6628 7.41819 11.1103 8.46736H11.052V6.64652H7.07446V19.999H11.2161V13.3874C11.2161 11.6465 11.5461 9.96319 13.702 9.96319C15.8261 9.96319 15.8578 11.9499 15.8578 13.499V19.9999H19.9953Z" fill="white"></path>
                                <path d="M0.3302 6.64746H4.47687V20H0.3302V6.64746Z" fill="white"></path>
                                <path d="M2.40191 0C1.07608 0 0.000244141 1.07583 0.000244141 2.40167C0.000244141 3.7275 1.07608 4.82583 2.40191 4.82583C3.72774 4.82583 4.80358 3.7275 4.80358 2.40167C4.80274 1.07583 3.72691 0 2.40191 0Z" fill="white"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_194_146">
                                    <rect width="20" height="20" fill="white" transform="translate(0.000244141)"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    @endif
                    @if (@$siteInformation->twitter_url != '' || @$siteInformation->twitter_url != null)
                    <a href="{{ @$siteInformation->twitter_url }}" target="_blank">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_194_151)">
                                <path d="M11.862 8.46864L19.1473 0H17.4209L11.0951 7.3532L6.04262 0H0.21521L7.85551 11.1193L0.21521 20H1.9417L8.62199 12.2348L13.9578 20H19.7852L11.8616 8.46864H11.862ZM9.49732 11.2173L8.7232 10.1101L2.56378 1.29967H5.21558L10.1863 8.40994L10.9604 9.51718L17.4218 18.7594H14.77L9.49732 11.2177V11.2173Z" fill="white"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_194_151">
                                    <rect width="20" height="20" fill="white" transform="translate(0.000244141)"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-sm-6 col-lg-5 col-xl-3 info mt-xl-0 mt-lg-5 mt-sm-0 mt-5">
                <h5>Get In Touch</h5>
                <img src="{{ asset('web/images/footerIcon.svg') }}" alt="">
                <ul>
                    @if (@$siteInformation->footer_location != '' || @$siteInformation->footer_location != null)
                    <li>
                        <img src="{{ asset('web/images/svg/footerLocation.svg') }}" class="img-fluid" alt="">
                        <div>
                            {!! @$siteInformation->footer_location !!}
                        </div>
                    </li>
                    @endif

                    @if (@$siteInformation->phone != '' || @$siteInformation->phone != null)
                    <li>
                        <img src="{{ asset('web/images/svg/footerCall.svg') }}" class="img-fluid" alt="">
                        <div>
                            <p>
                                <a href="{{ @$siteInformation->phone }}">{{ @$siteInformation->phone }}</a>
                            </p>
                        </div>
                    </li>
                    @endif
                    @if (@$siteInformation->email != '' || @$siteInformation->email != null)
                    <li>
                        <img src="{{ asset('web/images/svg/footerMail.svg') }}" class="img-fluid" alt="">
                        <div>
                            <p>
                                <a href="mailto:{{ @$siteInformation->email }}">{{ @$siteInformation->email }}</a>
                            </p>
                        </div>
                    </li>
                    @endif

                    
                </ul>
            </div>
            <div class="col-5 col-sm-6 col-lg-3 col-xl-2 links mt-xl-0 mt-5">
                <h5>Quick Link</h5>
                <img src="{{ asset('web/images/footerIcon.svg') }}" alt="">
                <ul>
                    <li><a id="homeFooterMenu" href="{{ url('/') }}">Home</a></li>
                    <li><a id="aboutFooterMenu" href="{{ url('/about') }}">About Us</a></li>
                    @if($companyCount > 0)
                    <li><a id="contactMenu" href="{{ url('companies') }}"> Our Companies </a></li>
                    @endif
                    <li><a id="industriesFooterMenu" href="{{ url('/products')}}">Industries</a></li>
                    @if($servicesCount > 0)
                    <li><a id="scientificMobileMenu" href="{{ url('medicom-scientific') }}">Our Expertise</a></li>
                    @endif
                    @if($blogCount > 0)
                    <li><a id="newsFooterMenu" href="{{ url('news-events') }}">News & Events</a></li>
                    <li><a id="blogFooterMenu" href="{{ url('/blogs') }}">Blogs</a></li>
                    @endif
                    <li><a id="contactFooterMenu" href="{{ url('/contact') }}">Contact Us</a></li>
                    @if (@$siteInformation->privacy_policy != '' || @$siteInformation->privacy_policy != null)
                    <li>
                        <a href="{{ url('privacy-policy') }}">Privacy Policy</a>
                    </li>
                    @endif
                    @if (@$siteInformation->terms_and_conditions != '' || @$siteInformation->terms_and_conditions != null)
                    <li>
                        <a href="{{ url('terms-and-conditions') }}">Terms & Conditions</a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="col-7 col-sm-6 col-lg-4 col-xl-3 links mt-xl-0 mt-5">
                @if($menu && $menu->isNotEmpty())
                <h5>Medicom Group</h5>
                <img src="{{ asset('web/images/footerIcon.svg') }}" alt="">
                <ul>
                    @foreach ($menu as $service_item)
                        <li><a href="{{ url('/') }}/medicom-scientific#{!! $service_item->id !!}" >{!! $service_item->title !!}</a></li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</footer>
<div class="copy">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if (@$siteInformation->copyright != '' || @$siteInformation->copyright != null)
                    {!! isset($siteInformation) ? $siteInformation->copyright : '' !!}
                @endif
            </div>
            <div class="col-lg-4 privacyTerms">
                @if (@$siteInformation->privacy_policy != '' || @$siteInformation->privacy_policy != null)
                        <a id="privacyMenu" href="{{ url('privacy-policy') }}">Privacy Policy</a>
                    @endif
                    @if (@$siteInformation->terms_and_conditions != '' || @$siteInformation->terms_and_conditions != null)
                        <a id="termsConditionsMenu" href="{{ url('terms-and-conditions') }}">Terms & Conditions</a>
                    @endif
            </div>
        </div>
    </div>
</div>
@if (@$siteInformation->whatsapp_number != '' || @$siteInformation->whatsapp_number != null)
<a href="https://wa.me/{{$siteInformation->whatsapp_number}}" class="whatsappFixed">
    <img src="{{ asset('web/images/svg/whatsapp.svg') }}" class="img-fluid" alt="WhatsApp">
</a>
@endif
<a href="web/pdf/medicom-catalogue.pdf" download class="brochureFixed">
    <img src="{{ asset('web/images/svg/download.svg') }}" class="img-fluid" alt="">
</a>
<style>
    input.phone_tel {
    padding-left: 75px !important;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    var base_url = "{{ url('/') }}";
    </script>
    {!! isset($siteInformation) ? $siteInformation->footer_tag : '' !!}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>

    <!-- tel with country code -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
    <script src="assets/js/form-select2_new.js"></script>

    <script src="https://kit.fontawesome.com/99358fb784.js"></script>

    <script src="assets/js/jquery.star-rating-svg.js"></script>

    <!--Fancy Box-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <script src="{{ asset('web/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('web/js/counter/jquery.countup.js') }}"></script>

    <script src="{{ asset('web/js/scripts.js') }}"></script>
    <script src="{{ asset('web/js/custom.js') }}"></script>

    <script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>

    <script>
        document.getElementById('enquiry_form').addEventListener('submit', function(event) {


            event.preventDefault();

            const nameInput = document.getElementById('enquiry_fname');
            const emailInput = document.getElementById('enquiry_email');
            const numberInput = document.getElementById('enquiry_number');
            const messageInput = document.getElementById('enquiry_msg');
            const companyInput = document.getElementById('enquiry_company');
            let formValid = true;

            if (nameInput.value.trim() === '') {
                document.getElementById('enquiry_error-name').style.display = 'block';
                formValid = false;
            } else {
                document.getElementById('enquiry_error-name').style.display = 'none';
            }
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (emailInput.value.trim() === '' || !emailPattern.test(emailInput.value.trim())) {
                document.getElementById('enquiry_error-email').style.display = 'block';
                formValid = false;
            } else {
                document.getElementById('enquiry_error-email').style.display = 'none';
            }

            const phonePattern = /^(\+?\d{1,4})?\s?-?\d{9,15}$/;
            if (numberInput.value.trim() === '' || !phonePattern.test(numberInput.value.trim())) {
                document.getElementById('enquiry_error-number').style.display = 'block';
                formValid = false;
            } else {
                document.getElementById('enquiry_error-number').style.display = 'none';
            }

            if (messageInput.value.trim() === '') {
                document.getElementById('enquiry_error-msg').style.display = 'block';
                formValid = false;
            } else {
                document.getElementById('enquiry_error-msg').style.display = 'none';
            }

            if (companyInput.value.trim() === '') {
                document.getElementById('enquiry_error-company').style.display = 'block';
                formValid = false;
            } else {
                document.getElementById('enquiry_error-company').style.display = 'none';
            }

            if (formValid) {
                this.submit();
            }
        });

    </script>
    <script>


        // tel with country code
        // $(".phone_tel").intlTelInput({
        //     initialCountry: "ae",
        //     separateDialCode: true,
        //     utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
        // });
        
        // function initializePhoneInput(selector) {	
        //   const shippingFormWrapper = document.querySelector(selector + ' .phone_tel');	
        //   if (shippingFormWrapper !== null) {	
        //       const phoneInput = window.intlTelInput(shippingFormWrapper, {	
        //           preferredCountries: ["ae", "in"],	
        //           excludeCountries: ["ru", "cu", "sy", "ir", "sd", "ss", "kp", "ye", "KR", "UA"],	
        //           utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",	
        //       });	
        //       $(selector + ' .phone_tel').on('blur', function () {	
        //           contactPhone(selector, phoneInput);	
        //       });	
        //   }	
        // }	
        // function contactPhone(selector, phoneInput) {	
        //   const phoneNumber = phoneInput.getNumber();	
        //   $(selector + ' .phone_tel').val(phoneNumber);	
        // }	
        	
        // initializePhoneInput("#contact_form");	
        // initializePhoneInput("#enquiryModal");	
        // initializePhoneInput("#enquiryProductModal");



// function initializePhoneInput(selector) {
//     const phoneInputElements = document.querySelectorAll(selector + ' .phone_tel');

//     phoneInputElements.forEach(phoneInputElement => {
//         if (phoneInputElement) {
//             const phoneInput = window.intlTelInput(phoneInputElement, {
//                 preferredCountries: ["ae", "in"],
//                 excludeCountries: ["ru", "cu", "sy", "ir", "sd", "ss", "kp", "ye", "KR", "UA"],
//                 // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
//             });

//             phoneInputElement.addEventListener('blur', function () {
//                 const phoneNumber = phoneInput.getNumber();
//                 phoneInputElement.value = phoneNumber;  // Directly set the value
//             });
//         }
//     });
// }

// document.addEventListener('DOMContentLoaded', function() {
//     initializePhoneInput("#contact_form");
//     initializePhoneInput("#enquiryModal");
//     initializePhoneInput("#enquiryProductModal");
// });

        $(document).ready(function(){
            $(".filter-button").click(function(){
                var value = $(this).attr('data-filter');
                console.log('yes');
                if(value == "all")
                {
                    //$('.filter').removeClass('hidden');
                    $('.filter').show('1000');
                }
                else
                {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                    $(".filter").not('.'+value).hide('3000');
                    $('.filter').filter('.'+value).show('3000');

                }
                if ($(".filter-button").removeClass("active")) {
                    $(this).removeClass("active");
                }
                $(this).addClass("active");
            });
        });


        $('.counter').countUp(
            {
                delay: 5,
                time: 1500
            }
        );

        $(document).ready(function() {
            $('[data-fancybox]').fancybox({
                buttons : [
                    "zoom",
                    // "share",
                    "slideShow",
                    "fullScreen",
                    // "download",
                    "thumbs",
                    "close"
                ],
                thumbs : {
                    autoStart   : true,
                },
                fullScreen : {
                    requestOnStart : true
                }
            });
        });


        $('document').ready(function(){

            var $file = $('#file-input'),
                $label = $file.next('label'),
                $labelText = $label.find('span'),
                $labelRemove = $('i.remove'),
                labelDefault = $labelText.text();

            // on file change
            $file.on('change', function(event){
                var fileName = $file.val().split( '\\' ).pop();
                if( fileName ){
                    console.log($file)
                    $labelText.text(fileName);
                    $labelRemove.show();
                }else{
                    $labelText.text(labelDefault);
                    $labelRemove.hide();
                }
            });
        })

    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
        })
    </script>
    
    
    <script>
    function initializePhoneInput(selector) {
        const phoneInputElements = document.querySelectorAll(selector);

        phoneInputElements.forEach(phoneInputElement => {
            if (phoneInputElement) {
                const phoneInput = window.intlTelInput(phoneInputElement, {
                    preferredCountries: ["ae", "in"],
                    excludeCountries: ["ru", "cu", "sy", "ir", "sd", "ss", "kp", "ye", "KR", "UA"],
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                });

                phoneInputElement.addEventListener('blur', function () {
                    const phoneNumber = phoneInput.getNumber();
                    phoneInputElement.value = phoneNumber;
                    console.log("Phone Number:", phoneNumber); // Check the output in the console
                });
            }
        });
    }


    document.addEventListener('DOMContentLoaded', function() {
        initializePhoneInput(".phone_tel"); // Initialize all phone inputs
    });

</script>
    
    
</body>
</html>
<script src="{{ asset('web/js/active-home-menu.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6Lewbc0qAAAAACIgW3L1mqD5rS4Uh8I6CF9AX3XE"></script>
        <script>

            document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('form');
        
            // Add hidden reCAPTCHA input field to each form
            forms.forEach(form => {
                const recaptchaResponse = document.createElement('input');
                recaptchaResponse.setAttribute('type', 'hidden');
                recaptchaResponse.setAttribute('name', 'recaptcha_response');
                recaptchaResponse.setAttribute('class', 'recaptchaResponse');
                form.appendChild(recaptchaResponse);
            });
        
            grecaptcha.ready(function() {
                grecaptcha.execute('6Lewbc0qAAAAACIgW3L1mqD5rS4Uh8I6CF9AX3XE', {action: 'submit'}).then(function(token) {
                    forms.forEach(form => {
                        form.querySelector('.recaptchaResponse').value = token;
                    });
                });
            });
        });
        
        </script>


        
