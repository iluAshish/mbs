@extends('web.layouts.main') 
@section('content')

    <section class="banner home-banner">

        <div class="container-ctn position-relative">

            <div class="banner-image-slider" id="fadeSection">
                @foreach($homeBanners as $banner)
                    <div class="slide">
                        <a href="{{ $banner->button_url ?? '#' }}" class="slide-link" aria-label="MBSGroup banner">
                            <picture>
                                <img  src="{{ asset($banner->bg_image) }}"
                                    width="1367" height="676"
                                    alt="MBSGroup">
                            </picture>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="banner-text-slider">
                @foreach($homeBanners as $banner)
                    <div class="banner-text-slide">
                        <h1>{{ $banner->title }}</h1>
                    </div>
                @endforeach
            </div>

            <div class="slick-nav d-flex">
                <div class="prev ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.07957 9.81452C7.18734 9.91494 7.27377 10.036 7.33372 10.1706C7.39368 10.3051 7.42591 10.4504 7.42851 10.5977C7.43111 10.7449 7.40402 10.8912 7.34885 11.0278C7.29368 11.1644 7.21157 11.2885 7.10741 11.3926C7.00326 11.4968 6.87919 11.5789 6.74261 11.6341C6.60603 11.6892 6.45973 11.7163 6.31246 11.7137C6.16518 11.7111 6.01993 11.6789 5.88538 11.6189C5.75083 11.559 5.62974 11.4725 5.52932 11.3648L0.776194 6.61164L-0.000393629 5.83652L0.774731 5.06139L5.52786 0.30827C5.73464 0.108365 6.01166 -0.00232558 6.29926 3.70587e-05C6.58686 0.00239969 6.86202 0.117627 7.06549 0.320902C7.26895 0.524176 7.38444 0.799233 7.38708 1.08683C7.38971 1.37443 7.27928 1.65155 7.07957 1.85852L4.19844 4.73965L19.3777 4.73965C19.6686 4.73965 19.9476 4.85521 20.1533 5.06091C20.359 5.26662 20.4746 5.54561 20.4746 5.83652C20.4746 6.12743 20.359 6.40642 20.1533 6.61213C19.9476 6.81783 19.6686 6.9334 19.3777 6.9334L4.19844 6.9334L7.07957 9.81452Z"
                            fill="#596075" />
                    </svg>
                </div>
                <div class="next ">

                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.395 1.89935C13.2873 1.79893 13.2008 1.67783 13.1409 1.54328C13.0809 1.40873 13.0487 1.26349 13.0461 1.11621C13.0435 0.968932 13.0706 0.82264 13.1258 0.68606C13.1809 0.54948 13.263 0.425411 13.3672 0.321254C13.4714 0.217096 13.5954 0.134984 13.732 0.0798171C13.8686 0.0246501 14.0149 -0.0024425 14.1622 0.000156044C14.3094 0.00275459 14.4547 0.034991 14.5892 0.0949418C14.7238 0.154893 14.8449 0.24133 14.9453 0.349097L19.6984 5.10222L20.475 5.87735L19.6999 6.65247L14.9468 11.4056C14.74 11.6055 14.463 11.7162 14.1754 11.7138C13.8878 11.7115 13.6126 11.5962 13.4091 11.393C13.2057 11.1897 13.0902 10.9146 13.0875 10.627C13.0849 10.3394 13.1953 10.0623 13.395 9.85535L16.2762 6.97422L1.09688 6.97422C0.805966 6.97422 0.526971 6.85866 0.321267 6.65295C0.115563 6.44725 0 6.16826 0 5.87735C0 5.58644 0.115563 5.30744 0.321267 5.10174C0.526971 4.89604 0.805966 4.78047 1.09688 4.78047L16.2762 4.78047L13.395 1.89935Z"
                            fill="#596075" />
                    </svg>
                </div>
            </div>

        </div>
    </section>

    <section class="about">
        <div class="container-ctn">
            <div class="d-flex flex-wrap commonPadding">
                <div class="about-image">
                    <picture>
                        <img  loading="lazy" src="{{asset($homeAbout->webp_image ?? $homeAbout->image)}}" width="458" height="488" {{$homeAbout->image_attribute}}>
                    </picture>
                    <div class="about-image-text counter ">
                        <strong  class="timer" data-to="{{$homeAbout->years_of_experience}}" data-speed="1000">{{$homeAbout->years_of_experience}}</strong>
                        <p>{{$homeAbout->title}}</p>
                    </div>
                </div>
                <div class="about-description">
                    <h2>{{$homeAbout->sub_title}}</h2>
                    <h3p>{!!$homeAbout->short_description!!}</p>
                    <a href="{{ $homeAbout->button_url ?? '#' }}" class="btn-theme btnDark">Read More</a>
                </div>
            </div>

            @if($features->isNotEmpty())
                <div class="service container-box">
                    @include('web.components._feature', ['features' => $features])
                </div>
            @endif
        </div>
    </section>

    @if($products->isNotEmpty())
    <section class="products">
        <div class="container-ctn">
            <div class="row head  justify-content-between">
                <h2>our <strong>products</strong></h2>
                <div class="products-wrapper position-relative">
                    <div class="products-main-description">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled
                    </div>

                    
                    <div class="products-slider-init products-slider">
                        @include('web.components._list_product_slider', ['products' => $products])
                    </div>
                </div>
            </div>



        </div>
    </section>
    @endif

    <!-- dynamic done  -->
    @if($why_choose_us->isNotEmpty())
    <section class="why-choose commonPadding">

            <div class="container-short">
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="col-left">
                        <h2>Why choose us</h2>
                        <a href="{{ url('/about-us') }}" class="btn-theme btnDark">Read More</a>

                    </div>
                    <div class="col-right">
                        @php
                            $content = \App\Models\CommonContent::where('type', 'why_choose_us')->first(['content_description']);
                        @endphp

                        <p>{!! $content->content_description ?? '' !!}</p>
                    </div>
                </div>
                <div class="d-flex flex-wrap  justify-content-between">
                    <div class="col-left">
                        <picture>
                            <img  loading="lazy" src="{{asset('web/images/home/why-choose.jpg')}}" width="346" height="480" alt="">
                        </picture>
                    </div>
                    <div class="col-right">
                        <ul>
                            @foreach($why_choose_us as $item)
                                <li>
                                    <strong>{{$item->title}}</strong>
                                    {!!$item->description!!}
                                </li>

                            @endforeach                           
                        </ul>
                    </div>
                </div>
            </div>
    
    </section>
    @endif

    <!-- dynamic done -->
    @if($brands_menu->isNotEmpty())
    <section class="partners commonPadding">
        <div class="container-short">
            <div class="d-flex flex-wrap justify-content-between">
                <div class="partners-description ">
                    <h2>Brand to deal
                        exclusive partners</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book.</p>
                </div>
                <div class="partners-logos d-flex flex-wrap justify-content-between">
                    @foreach($brands_menu as $brand)
                        <picture>
                            <img  loading="lazy" src="{{asset($brand->featured_image_webp ?? $brand->featured_image)}}" width="217" height="85" {{$brand->featured_image_attribute}}>
                        </picture>
                    @endforeach
                    
                    
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($sectors->isNotEmpty())
    <section class="industries position-relative">
        <div class="container-short">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="head">
                    <h2>Industries We Serve</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text</p>
                </div>
                <ul class="industries-list d-flex flex-wrap justify-content-lg-end">
                    @foreach($sectors as $sector)
                        <li>
                            <picture>
                                <img  loading="lazy" src="{{asset($sector->webp_image ?? $sector->image)}}" width="42" height="42" {{$sector->image_attribute}}>
                            </picture>
                            <p>{{$sector->title}}</p>
                        </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
    </section>
    @endif

    
    <!-- making dynamic -->
    @if($caseStudies->isNotEmpty())
    <section class="caseStudies commonPadding">
        <div class="container-short text-center">
            <h2>Case Studies</h2>
            <p>From comprehensive racking systems to detailed storage room amenities, the fruits of our passionate
                efforts cater to a wide spectrum of customers around the world, empowering them day after day to face
                the challenges of modern-day production and logistics. Our services are accessible to businesses of all
                sizes including healthcare, textiles, food retail, and several other industries.</p>
        </div>
        <div class="slick-nav d-flex justify-content-center m-auto">
            <div class="caseStudies-slider-prev ">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.07957 9.81452C7.18734 9.91494 7.27377 10.036 7.33372 10.1706C7.39368 10.3051 7.42591 10.4504 7.42851 10.5977C7.43111 10.7449 7.40402 10.8912 7.34885 11.0278C7.29368 11.1644 7.21157 11.2885 7.10741 11.3926C7.00326 11.4968 6.87919 11.5789 6.74261 11.6341C6.60603 11.6892 6.45973 11.7163 6.31246 11.7137C6.16518 11.7111 6.01993 11.6789 5.88538 11.6189C5.75083 11.559 5.62974 11.4725 5.52932 11.3648L0.776194 6.61164L-0.000393629 5.83652L0.774731 5.06139L5.52786 0.30827C5.73464 0.108365 6.01166 -0.00232558 6.29926 3.70587e-05C6.58686 0.00239969 6.86202 0.117627 7.06549 0.320902C7.26895 0.524176 7.38444 0.799233 7.38708 1.08683C7.38971 1.37443 7.27928 1.65155 7.07957 1.85852L4.19844 4.73965L19.3777 4.73965C19.6686 4.73965 19.9476 4.85521 20.1533 5.06091C20.359 5.26662 20.4746 5.54561 20.4746 5.83652C20.4746 6.12743 20.359 6.40642 20.1533 6.61213C19.9476 6.81783 19.6686 6.9334 19.3777 6.9334L4.19844 6.9334L7.07957 9.81452Z"
                        fill="#596075" />
                </svg>
            </div>
            <div class="caseStudies-slider-next ">

                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.395 1.89935C13.2873 1.79893 13.2008 1.67783 13.1409 1.54328C13.0809 1.40873 13.0487 1.26349 13.0461 1.11621C13.0435 0.968932 13.0706 0.82264 13.1258 0.68606C13.1809 0.54948 13.263 0.425411 13.3672 0.321254C13.4714 0.217096 13.5954 0.134984 13.732 0.0798171C13.8686 0.0246501 14.0149 -0.0024425 14.1622 0.000156044C14.3094 0.00275459 14.4547 0.034991 14.5892 0.0949418C14.7238 0.154893 14.8449 0.24133 14.9453 0.349097L19.6984 5.10222L20.475 5.87735L19.6999 6.65247L14.9468 11.4056C14.74 11.6055 14.463 11.7162 14.1754 11.7138C13.8878 11.7115 13.6126 11.5962 13.4091 11.393C13.2057 11.1897 13.0902 10.9146 13.0875 10.627C13.0849 10.3394 13.1953 10.0623 13.395 9.85535L16.2762 6.97422L1.09688 6.97422C0.805966 6.97422 0.526971 6.85866 0.321267 6.65295C0.115563 6.44725 0 6.16826 0 5.87735C0 5.58644 0.115563 5.30744 0.321267 5.10174C0.526971 4.89604 0.805966 4.78047 1.09688 4.78047L16.2762 4.78047L13.395 1.89935Z"
                        fill="#596075" />
                </svg>
            </div>
        </div>
        <div class="container-caseStudies">
            <div class="caseStudies-slider">
                @foreach($caseStudies as $caseStudy)
                    <div class="caseStudies-slider-item">
                        <picture>
                            <img  loading="lazy" src="{{asset($caseStudy->webp_image ?? $caseStudy->image)}}" width="474" height="474" {{$caseStudy->image_attribute}}>
                        </picture>
                        <div class="caseStudies-slider-item-title">


                            <a href="{{url('project-detail', ['short_url' => $caseStudy->short_url])}}" tabindex="0">
                                <h3>{{$caseStudy->title}}</h3>
                                <i class="arrow-btn btn"> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13"
                                        viewBox="0 0 14 13" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.9881 8.75252C8.93008 8.80659 8.88353 8.87179 8.85125 8.94424C8.81897 9.01669 8.80161 9.0949 8.80021 9.1742C8.79881 9.25351 8.8134 9.33228 8.84311 9.40582C8.87281 9.47937 8.91703 9.54617 8.97311 9.60226C9.0292 9.65834 9.096 9.70256 9.16955 9.73226C9.24309 9.76197 9.32186 9.77656 9.40117 9.77516C9.48047 9.77376 9.55868 9.7564 9.63113 9.72412C9.70358 9.69184 9.76878 9.64529 9.82285 9.58727L12.3822 7.02789L12.8004 6.61052L12.383 6.19314L9.82364 3.63376C9.7123 3.52612 9.56313 3.46652 9.40827 3.46779C9.25341 3.46907 9.10525 3.53111 8.99569 3.64057C8.88613 3.75002 8.82394 3.89813 8.82252 4.05299C8.82111 4.20785 8.88057 4.35707 8.9881 4.46852L10.5395 6.01989H2.36602C2.20937 6.01989 2.05914 6.08212 1.94838 6.19288C1.83762 6.30364 1.77539 6.45387 1.77539 6.61052C1.77539 6.76716 1.83762 6.91739 1.94838 7.02815C2.05914 7.13891 2.20937 7.20114 2.36602 7.20114H10.5395L8.9881 8.75252Z"
                                            fill="white"></path>
                                    </svg></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($testimonials->isNotEmpty())
    <section class="testimonial position-relative">
        <svg xmlns="http://www.w3.org/2000/svg" width="255" height="255" viewBox="0 0 255 255" fill="none">
            <path d="M169.99 32.5566C164.376 32.5566 158.992 34.7867 155.022 38.7562C151.053 42.7257 148.823 48.1096 148.823 53.7233V117.223C148.823 122.837 151.053 128.221 155.022 132.19C158.992 136.16 164.376 138.39 169.99 138.39C172.796 138.39 175.488 139.505 177.473 141.49C179.458 143.475 180.573 146.166 180.573 148.973V159.557C180.573 165.17 178.343 170.554 174.373 174.524C170.404 178.493 165.02 180.723 159.406 180.723C156.599 180.723 153.907 181.838 151.923 183.823C149.938 185.808 148.823 188.5 148.823 191.307V212.473C148.823 215.28 149.938 217.972 151.923 219.957C153.907 221.942 156.599 223.057 159.406 223.057C176.247 223.057 192.399 216.366 204.308 204.458C216.216 192.549 222.906 176.398 222.906 159.557V53.7233C222.906 48.1096 220.676 42.7257 216.707 38.7562C212.737 34.7867 207.353 32.5566 201.74 32.5566H169.99ZM53.5729 32.5566C47.9592 32.5566 42.5753 34.7867 38.6058 38.7562C34.6363 42.7257 32.4063 48.1096 32.4062 53.7233V117.223C32.4063 122.837 34.6363 128.221 38.6058 132.19C42.5753 136.16 47.9592 138.39 53.5729 138.39C56.3798 138.39 59.0717 139.505 61.0565 141.49C63.0412 143.475 64.1562 146.166 64.1562 148.973V159.557C64.1562 165.17 61.9262 170.554 57.9567 174.524C53.9872 178.493 48.6033 180.723 42.9896 180.723C40.1827 180.723 37.4908 181.838 35.506 183.823C33.5213 185.808 32.4063 188.5 32.4062 191.307V212.473C32.4063 215.28 33.5213 217.972 35.506 219.957C37.4908 221.942 40.1827 223.057 42.9896 223.057C59.8308 223.057 75.9823 216.366 87.8909 204.458C99.7994 192.549 106.49 176.398 106.49 159.557V53.7233C106.49 48.1096 104.26 42.7257 100.29 38.7562C96.3205 34.7867 90.9367 32.5566 85.3229 32.5566H53.5729Z" stroke="#A5A5DF" stroke-opacity="0.06" stroke-width="21.1667" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        <div class="container-ctn">
            <div class="d-flex flex-wrap justify-content-between align-items-end">
                <div class="testimonial-head">
                    <h2>Testimonials</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text</p>
                    <div class="slick-nav d-flex justify-content-center ">
                        <div class="testimonial-slider-prev ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.07957 9.81452C7.18734 9.91494 7.27377 10.036 7.33372 10.1706C7.39368 10.3051 7.42591 10.4504 7.42851 10.5977C7.43111 10.7449 7.40402 10.8912 7.34885 11.0278C7.29368 11.1644 7.21157 11.2885 7.10741 11.3926C7.00326 11.4968 6.87919 11.5789 6.74261 11.6341C6.60603 11.6892 6.45973 11.7163 6.31246 11.7137C6.16518 11.7111 6.01993 11.6789 5.88538 11.6189C5.75083 11.559 5.62974 11.4725 5.52932 11.3648L0.776194 6.61164L-0.000393629 5.83652L0.774731 5.06139L5.52786 0.30827C5.73464 0.108365 6.01166 -0.00232558 6.29926 3.70587e-05C6.58686 0.00239969 6.86202 0.117627 7.06549 0.320902C7.26895 0.524176 7.38444 0.799233 7.38708 1.08683C7.38971 1.37443 7.27928 1.65155 7.07957 1.85852L4.19844 4.73965L19.3777 4.73965C19.6686 4.73965 19.9476 4.85521 20.1533 5.06091C20.359 5.26662 20.4746 5.54561 20.4746 5.83652C20.4746 6.12743 20.359 6.40642 20.1533 6.61213C19.9476 6.81783 19.6686 6.9334 19.3777 6.9334L4.19844 6.9334L7.07957 9.81452Z"
                                    fill="#596075" />
                            </svg>
                        </div>
                        <div class="testimonial-slider-next ">

                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.395 1.89935C13.2873 1.79893 13.2008 1.67783 13.1409 1.54328C13.0809 1.40873 13.0487 1.26349 13.0461 1.11621C13.0435 0.968932 13.0706 0.82264 13.1258 0.68606C13.1809 0.54948 13.263 0.425411 13.3672 0.321254C13.4714 0.217096 13.5954 0.134984 13.732 0.0798171C13.8686 0.0246501 14.0149 -0.0024425 14.1622 0.000156044C14.3094 0.00275459 14.4547 0.034991 14.5892 0.0949418C14.7238 0.154893 14.8449 0.24133 14.9453 0.349097L19.6984 5.10222L20.475 5.87735L19.6999 6.65247L14.9468 11.4056C14.74 11.6055 14.463 11.7162 14.1754 11.7138C13.8878 11.7115 13.6126 11.5962 13.4091 11.393C13.2057 11.1897 13.0902 10.9146 13.0875 10.627C13.0849 10.3394 13.1953 10.0623 13.395 9.85535L16.2762 6.97422L1.09688 6.97422C0.805966 6.97422 0.526971 6.85866 0.321267 6.65295C0.115563 6.44725 0 6.16826 0 5.87735C0 5.58644 0.115563 5.30744 0.321267 5.10174C0.526971 4.89604 0.805966 4.78047 1.09688 4.78047L16.2762 4.78047L13.395 1.89935Z"
                                    fill="#596075" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Main Testimonial slider - (active slides show here) -->

                <div class="slider slider-for">

                    @foreach($testimonials as $testimonial)
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                                <path
                                    d="M32 6C30.9391 6 29.9217 6.42143 29.1716 7.17157C28.4214 7.92172 28 8.93913 28 10V22C28 23.0609 28.4214 24.0783 29.1716 24.8284C29.9217 25.5786 30.9391 26 32 26C32.5304 26 33.0391 26.2107 33.4142 26.5858C33.7893 26.9609 34 27.4696 34 28V30C34 31.0609 33.5786 32.0783 32.8284 32.8284C32.0783 33.5786 31.0609 34 30 34C29.4696 34 28.9609 34.2107 28.5858 34.5858C28.2107 34.9609 28 35.4696 28 36V40C28 40.5304 28.2107 41.0391 28.5858 41.4142C28.9609 41.7893 29.4696 42 30 42C33.1826 42 36.2348 40.7357 38.4853 38.4853C40.7357 36.2348 42 33.1826 42 30V10C42 8.93913 41.5786 7.92172 40.8284 7.17157C40.0783 6.42143 39.0609 6 38 6H32ZM10 6C8.93913 6 7.92172 6.42143 7.17157 7.17157C6.42143 7.92172 6 8.93913 6 10V22C6 23.0609 6.42143 24.0783 7.17157 24.8284C7.92172 25.5786 8.93913 26 10 26C10.5304 26 11.0391 26.2107 11.4142 26.5858C11.7893 26.9609 12 27.4696 12 28V30C12 31.0609 11.5786 32.0783 10.8284 32.8284C10.0783 33.5786 9.06087 34 8 34C7.46957 34 6.96086 34.2107 6.58579 34.5858C6.21071 34.9609 6 35.4696 6 36V40C6 40.5304 6.21071 41.0391 6.58579 41.4142C6.96086 41.7893 7.46957 42 8 42C11.1826 42 14.2348 40.7357 16.4853 38.4853C18.7357 36.2348 20 33.1826 20 30V10C20 8.93913 19.5786 7.92172 18.8284 7.17157C18.0783 6.42143 17.0609 6 16 6H10Z"
                                    stroke="#A5A5DF" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            {!! $testimonial->message !!}
                            <div class="testimonial-profile ">
                                <picture>
                                    <img  loading="lazy" src="{{asset($testimonial->author_image_webp ?? author_image)}}" width="58" height="58" {{$testimonial->author_image_attribute}}>
                                </picture>
                                <div class="testimonial-profile-details">
                                      <div class="social-media d-flex flex-wrap"> <p>{{$testimonial->name}}</p>
                                       <!-- <picture><img  loading="lazy" src="{{ asset('web/images/icons/google.webp')}}" width="30" height="30" alt=""></picture> -->
                                       <picture><img  loading="lazy" src="{{ asset('web/images/icons/facebook.webp')}}" width="30" height="30" alt=""></picture>
                                <!-- <picture><img  loading="lazy" src="{{ asset('web/images/icons/instagram.webp')}}" width="30" height="30" alt=""></picture> -->
                            </div>
                                    <span>{{$testimonial->designation}}</span>
                                </div>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Navigation Slider - (nav for Main Testimonial slider keep same values) -->
                
                <div class="slider slider-nav">

                    @foreach($testimonials as $testimonial)
                    <div>
                        {!! $testimonial->message !!}
                        <div class="testimonial-profile ">
                            <picture>
                                <img  loading="lazy" src="{{asset($testimonial->author_image_webp ?? author_image)}}" width="58" height="58" {{$testimonial->author_image_attribute}}>
                            </picture>
                               <div class="testimonial-profile-details">
                                      <div class="social-media d-flex flex-wrap"> <p>{{$testimonial->name}}</p>
                                       <!-- <picture><img  loading="lazy" src="{{ asset('web/images/icons/google.webp')}}" width="30" height="30" alt=""></picture> -->
                                       <picture><img  loading="lazy" src="{{ asset('web/images/icons/facebook.webp')}}" width="30" height="30" alt=""></picture>
                                <!-- <picture><img  loading="lazy" src="{{ asset('web/images/icons/instagram.webp')}}" width="30" height="30" alt=""></picture> -->
                            </div>
                                    <span>{{$testimonial->designation}}</span>
                                </div>

                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    @endif


    @if($projects->isNotEmpty())
    <section class="clients">
        <div class="container-fluid p-0">
            <div class="clients-slider">
                @foreach($projects as $project)
                <picture>
                    <img  loading="lazy" src="{{asset($project->logo_web_image ?? $project->logo_image)}}" width="150" height="78" {{$project->logo_image_attribute}} class="img-fluid w-100">
                </picture>
                @endforeach
                
            </div>
        </div>
    </section>
    @endif


    @if($blogs->isNotEmpty())
    <section class="articles commonPadding">
        <div class="container-short">
            <div class="d-flex">
                <div class="head">
                    <h2>Recent Articles</h2>
                    <p>The way we see it, every project</p>
                </div>
                <div class="slick-nav d-flex justify-content-center">
                        <div class="articles-slider-prev ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.07957 9.81452C7.18734 9.91494 7.27377 10.036 7.33372 10.1706C7.39368 10.3051 7.42591 10.4504 7.42851 10.5977C7.43111 10.7449 7.40402 10.8912 7.34885 11.0278C7.29368 11.1644 7.21157 11.2885 7.10741 11.3926C7.00326 11.4968 6.87919 11.5789 6.74261 11.6341C6.60603 11.6892 6.45973 11.7163 6.31246 11.7137C6.16518 11.7111 6.01993 11.6789 5.88538 11.6189C5.75083 11.559 5.62974 11.4725 5.52932 11.3648L0.776194 6.61164L-0.000393629 5.83652L0.774731 5.06139L5.52786 0.30827C5.73464 0.108365 6.01166 -0.00232558 6.29926 3.70587e-05C6.58686 0.00239969 6.86202 0.117627 7.06549 0.320902C7.26895 0.524176 7.38444 0.799233 7.38708 1.08683C7.38971 1.37443 7.27928 1.65155 7.07957 1.85852L4.19844 4.73965L19.3777 4.73965C19.6686 4.73965 19.9476 4.85521 20.1533 5.06091C20.359 5.26662 20.4746 5.54561 20.4746 5.83652C20.4746 6.12743 20.359 6.40642 20.1533 6.61213C19.9476 6.81783 19.6686 6.9334 19.3777 6.9334L4.19844 6.9334L7.07957 9.81452Z"
                                    fill="#596075" />
                            </svg>
                        </div>
                        <div class="articles-slider-next ">

                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.395 1.89935C13.2873 1.79893 13.2008 1.67783 13.1409 1.54328C13.0809 1.40873 13.0487 1.26349 13.0461 1.11621C13.0435 0.968932 13.0706 0.82264 13.1258 0.68606C13.1809 0.54948 13.263 0.425411 13.3672 0.321254C13.4714 0.217096 13.5954 0.134984 13.732 0.0798171C13.8686 0.0246501 14.0149 -0.0024425 14.1622 0.000156044C14.3094 0.00275459 14.4547 0.034991 14.5892 0.0949418C14.7238 0.154893 14.8449 0.24133 14.9453 0.349097L19.6984 5.10222L20.475 5.87735L19.6999 6.65247L14.9468 11.4056C14.74 11.6055 14.463 11.7162 14.1754 11.7138C13.8878 11.7115 13.6126 11.5962 13.4091 11.393C13.2057 11.1897 13.0902 10.9146 13.0875 10.627C13.0849 10.3394 13.1953 10.0623 13.395 9.85535L16.2762 6.97422L1.09688 6.97422C0.805966 6.97422 0.526971 6.85866 0.321267 6.65295C0.115563 6.44725 0 6.16826 0 5.87735C0 5.58644 0.115563 5.30744 0.321267 5.10174C0.526971 4.89604 0.805966 4.78047 1.09688 4.78047L16.2762 4.78047L13.395 1.89935Z"
                                    fill="#596075" />
                            </svg>
                        </div>
                    </div>
                </div>
            <div class="articles-slider">
                @foreach($blogs as $blog)
                    <a href="{{route('blogs.blog_detail',['short_url' => $blog->short_url])}}" class="articles-slider-item">
                        <picture>
                            <img  loading="lazy" src="{{asset($blog->image_webp ?? $blog->image)}}" width="365" height="214" {{$blog->image_attribute}} >
                        </picture>
                        <div class="articles-slider-info d-flex">
                            <div class="date">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none"> <path d="M12.4023 3.87891V2.37891M5.65234 3.87891V2.37891M2.46484 6.12891H15.5898M2.27734 7.66191C2.27734 6.07566 2.27734 5.28216 2.60434 4.67616C2.90003 4.13564 3.35884 3.70228 3.91534 3.43791C4.55734 3.12891 5.39734 3.12891 7.07734 3.12891H10.9773C12.6573 3.12891 13.4973 3.12891 14.1393 3.43791C14.7041 3.70941 15.1623 4.14291 15.4503 4.67541C15.7773 5.28291 15.7773 6.07641 15.7773 7.66266V11.3467C15.7773 12.9329 15.7773 13.7264 15.4503 14.3324C15.1547 14.8729 14.6958 15.3063 14.1393 15.5707C13.4973 15.8789 12.6573 15.8789 10.9773 15.8789H7.07734C5.39734 15.8789 4.55734 15.8789 3.91534 15.5699C3.35895 15.3057 2.90015 14.8726 2.60434 14.3324C2.27734 13.7249 2.27734 12.9314 2.27734 11.3452V7.66191Z" stroke="#596075" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                               {{ \Carbon\Carbon::parse($blog->posted_date)->format('F j, Y') }}
                            </div>
                            <div class="time">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none"> <path d="M10.2793 5.51562C10.2793 5.36644 10.22 5.22337 10.1145 5.11788C10.0091 5.01239 9.86598 4.95312 9.7168 4.95312C9.56761 4.95312 9.42454 5.01239 9.31905 5.11788C9.21356 5.22337 9.1543 5.36644 9.1543 5.51562V9.26562C9.15426 9.36099 9.17846 9.45481 9.22465 9.53825C9.27083 9.62169 9.33747 9.69202 9.4183 9.74262L11.6683 11.1489C11.7948 11.228 11.9476 11.2537 12.093 11.2202C12.165 11.2037 12.2331 11.1731 12.2933 11.1302C12.3534 11.0873 12.4046 11.033 12.4438 10.9704C12.483 10.9077 12.5095 10.838 12.5217 10.7651C12.534 10.6922 12.5317 10.6177 12.5152 10.5457C12.4986 10.4736 12.468 10.4056 12.4251 10.3454C12.3822 10.2852 12.3279 10.2341 12.2653 10.1949L10.2793 8.95362V5.51562Z" fill="#596075"/> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.7168 2.70312C7.97631 2.70313 6.30712 3.39453 5.07641 4.62524C3.8457 5.85594 3.1543 7.52514 3.1543 9.26562C3.1543 11.0061 3.8457 12.6753 5.07641 13.906C6.30712 15.1367 7.97631 15.8281 9.7168 15.8281C11.4573 15.8281 13.1265 15.1367 14.3572 13.906C15.5879 12.6753 16.2793 11.0061 16.2793 9.26562C16.2793 7.52514 15.5879 5.85594 14.3572 4.62524C13.1265 3.39453 11.4573 2.70313 9.7168 2.70312ZM4.2793 9.26562C4.2793 8.55156 4.41994 7.84449 4.6932 7.18478C4.96646 6.52508 5.36699 5.92565 5.8719 5.42073C6.37682 4.91581 6.97625 4.51529 7.63596 4.24203C8.29566 3.96877 9.00273 3.82812 9.7168 3.82812C10.4309 3.82812 11.1379 3.96877 11.7976 4.24203C12.4573 4.51529 13.0568 4.91581 13.5617 5.42073C14.0666 5.92565 14.4671 6.52508 14.7404 7.18478C15.0137 7.84449 15.1543 8.55156 15.1543 9.26562C15.1543 10.7077 14.5814 12.0908 13.5617 13.1105C12.542 14.1302 11.1589 14.7031 9.7168 14.7031C8.27468 14.7031 6.89163 14.1302 5.8719 13.1105C4.85217 12.0908 4.2793 10.7077 4.2793 9.26562Z" fill="#596075"/> </svg>
                               {{ \Carbon\Carbon::parse($blog->posted_date)->format('h.i A') }}

                            </div>
                        </div>
                        <div class="articles-slider-content">
                            <h3>{{$blog->title}}</h3>
                            <p>{{ \Illuminate\Support\Str::words(strip_tags($blog->description), 30, '...') }}</p>

                        </div>
                    </a>

                @endforeach
                
            </div>
        </div>
    </section>
    @endif
    

@endsection
