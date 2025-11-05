@extends('web.layouts.main')
@section('content')

  <section class="banner inner-banner position-relative">

        <div class="container-ctn position-relative">

            <div class="banner-image-slider " id="fadeSection">
                <picture>
                    <img src="{{asset($banner->image ?? 'web/images/inner/inner.webp')}}" class="img-fluid w-100" width="1366" height="335" {{$banner->image_attribute ?? $banner->title }}>
                </picture>
            </div>
        </div>
        <div class="container-short">
             <ul class="breadcrumb d-flex align-items-center">
                <li>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"> <path d="M6 14.2496H12M10.0556 1.55964C12.7688 2.76377 14.8252 4.34589 15.8884 5.25977C16.4257 5.72177 16.7254 6.38664 16.7621 7.09427C16.8135 8.06589 16.875 9.58652 16.875 11.2496C16.875 12.5291 16.8386 13.7644 16.7985 14.7345C16.7779 15.2747 16.553 15.7868 16.1693 16.1676C15.7856 16.5483 15.2718 16.7693 14.7315 16.7858C13.434 16.8308 11.5084 16.8746 9 16.8746C6.49162 16.8746 4.56637 16.8304 3.2685 16.7861C2.72823 16.7696 2.21435 16.5487 1.83068 16.1679C1.44702 15.7872 1.22215 15.275 1.2015 14.7349C1.15252 13.5738 1.12702 12.4118 1.125 11.2496C1.125 9.58652 1.18687 8.06589 1.2375 7.09427C1.275 6.38664 1.57425 5.72177 2.11163 5.25977C3.17475 4.34552 5.23162 2.76377 7.94437 1.55964C8.27676 1.41214 8.63636 1.33594 9 1.33594C9.36364 1.33594 9.72324 1.41214 10.0556 1.55964Z" stroke="white" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                    </a>
                </li>
                <li>
                    About
                </li>
            </ul>
        </div>
    </section>

    <section class="mission-vision why-choose commonPadding">
            <div class="container-short">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="col-left title">
                        <h2>{{ $about->title ?? ''}}</h2>
                        {!! $about->short_description !!}
                    </div>
                    <div class="col-right">
                        {!! $about->description !!}
                    </div>
                </div>
<!-- =================Mission Vision=================== -->

                <div class="mission-vision-wrapper d-flex flex-wrap justify-content-between">
                    <div class="mission-vision-wrapper-box">
                        <h3><span>Our</span>Mission</h3>
                        {!! $about->mission_description !!}
                    </div>
                    <div class="mission-vision-wrapper-box">
                        <h3><span>Our</span>Vision</h3>
                        {!! $about->vision_description !!}
                    </div>
                    <picture>
                        <img src="{{asset($about->mission_vision_web_image ?? $about->mission_vision_web_image)}}" width="410" height="371" class="w-100 h-100 " {{$about->mission_vision_image_attribute}}>
                    </picture>
                </div>
                
            </div>
        </section>
        <!-- =================Core Values=================== -->
    <section class="core-values position-relative commonPadding pt-0">
        <div class="container-core me-0">
            <div class=" d-flex flex-wrap justify-content-between">
                <h2><span>Core</span>Values</h2>
                <div class="core-values-box d-flex flex-wrap">
                    <div class="core-values-box-description list">
                        {!! $about->core_value_description ?? '' !!}
                    </div>
                    <picture>
                        <img src="{{asset($about->core_value_web_image ?? $about->core_value_image)}}" width="411" height="314"  class="w-100 h-100" {{$about->core_value_image_attribute}}>
                    </picture>
                </div>
            </div>
        </div>
    </section>

<!-- ====================CEO=============================== -->
    <section class="ceo commonPadding">
        <div class="container-center">
            <div class="d-flex flex-wrap justify-content-between">
                <div class="ceo-image position-relative">
                    <div class="position-relative ceo-image-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none"> <circle cx="25" cy="25" r="21" stroke="#2E3192" stroke-width="8"/> </svg>
                    <picture>
                        <img src="{{asset($about->ceo_web_image ?? $about->ceo_image)}}" width="343" height="347" {{$about->ceo_image_alt}}>
                    </picture> 
                    </div>
                    <div class="ceo-info">
                        <strong>{{$about->ceo_name ?? ''}}</strong>
                        <span>{{$about->designation ?? ''}}</span>
                    </div>
                </div>
                <div class="ceo-description position-relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none"> <path d="M32 6C30.9391 6 29.9217 6.42143 29.1716 7.17157C28.4214 7.92172 28 8.93913 28 10V22C28 23.0609 28.4214 24.0783 29.1716 24.8284C29.9217 25.5786 30.9391 26 32 26C32.5304 26 33.0391 26.2107 33.4142 26.5858C33.7893 26.9609 34 27.4696 34 28V30C34 31.0609 33.5786 32.0783 32.8284 32.8284C32.0783 33.5786 31.0609 34 30 34C29.4696 34 28.9609 34.2107 28.5858 34.5858C28.2107 34.9609 28 35.4696 28 36V40C28 40.5304 28.2107 41.0391 28.5858 41.4142C28.9609 41.7893 29.4696 42 30 42C33.1826 42 36.2348 40.7357 38.4853 38.4853C40.7357 36.2348 42 33.1826 42 30V10C42 8.93913 41.5786 7.92172 40.8284 7.17157C40.0783 6.42143 39.0609 6 38 6H32ZM10 6C8.93913 6 7.92172 6.42143 7.17157 7.17157C6.42143 7.92172 6 8.93913 6 10V22C6 23.0609 6.42143 24.0783 7.17157 24.8284C7.92172 25.5786 8.93913 26 10 26C10.5304 26 11.0391 26.2107 11.4142 26.5858C11.7893 26.9609 12 27.4696 12 28V30C12 31.0609 11.5786 32.0783 10.8284 32.8284C10.0783 33.5786 9.06087 34 8 34C7.46957 34 6.96086 34.2107 6.58579 34.5858C6.21071 34.9609 6 35.4696 6 36V40C6 40.5304 6.21071 41.0391 6.58579 41.4142C6.96086 41.7893 7.46957 42 8 42C11.1826 42 14.2348 40.7357 16.4853 38.4853C18.7357 36.2348 20 33.1826 20 30V10C20 8.93913 19.5786 7.92172 18.8284 7.17157C18.0783 6.42143 17.0609 6 16 6H10Z" stroke="#A5A5DF" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                    <div class="head">
                        <span>Message from</span>
                        <h2>The CEO</h2>
                    </div>
                    <div class="ceo-description-box">
                        {!! $about->ceo_message_description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================Legacy======================= -->
     <section class="legacy commonPadding">
        <div class="container-center">
            <div class="d-flex flex-wrap justify-content-between">
                <div class="legacy-description">
                    <h2>Legacy</h2>
                    {!! $about->legacy_description !!}
                </div>
                <picture>
                    <img src="{{asset($about->legacy_web_image ?? $about->legacy_image)}}" width="573" height="395" {{$about->legacy_image_attribute}}>
                </picture>

            </div>
        </div>
     </section>

    <!-- ===================Regional======================= -->
    <section class="regional commonPadding">
        <div class="container-center">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <picture>
                    <img src="{{asset($about->regional_web_image ?? $about->regional_image)}}" width="533" height="411" class="img-fluid" {{$about->regional_image_attribute}}>
                </picture>
                <div class="regional-description">
                    <div class="heading">
                        <h2><span>Regional</span>Expertise</h2>
                    </div>
                    {!! $about->regional_description !!}
                </div>
            </div>
        </div>
    </section>
    
    <!-- ===================Companies======================= -->


    @if($companies->isNotEmpty())
        <section class="companies pb-0">
            
            <div class="container-companies d-flex flex-wrap justify-content-between commonPadding align-items-center">
            
                    <div class="heading">
                        
                        <h2><span>200+ Companies Satisfied with</span>Our Offerings</h2>
                    </div>
                    <div class="companies-slider-container position-relative">
                            <div class="companies-slider">
                                    
                                    @foreach($companies as $company)
                                        <div class="companies-item">
                                            <picture>
                                                <img src="{{asset($company->image_webp ?? $company->image)}}" width="54" heigh="54" clas="img-fluid" {{$company->image_attribute}}>
                                            </picture>
                                            <div class="companies-description">
                                                <h3>{{\Illuminate\Support\Str::words(strip_tags($company->title ?? ''), 2, '...')}}</h3>
                                                {!! \Illuminate\Support\Str::words(strip_tags($company->description ?? ''), 10, '...') !!}
                                            </div>
                                            @if($company->link)
                                            <a href="{{$company->link}}" target="_blank">
                                                  <picture>
                                                <img src="{{asset($company->image_webp ?? $company->image)}}" width="54" heigh="54" clas="img-fluid" {{$company->image_attribute}}>
                                            </picture>
                                                
                                            Visit Website</a>
                                            @endif
                                        </div>
                                    @endforeach
                                    
                                </div>
                        <div class="slick-nav d-flex">
                            <div class="comapnies-prev ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.07957 9.81452C7.18734 9.91494 7.27377 10.036 7.33372 10.1706C7.39368 10.3051 7.42591 10.4504 7.42851 10.5977C7.43111 10.7449 7.40402 10.8912 7.34885 11.0278C7.29368 11.1644 7.21157 11.2885 7.10741 11.3926C7.00326 11.4968 6.87919 11.5789 6.74261 11.6341C6.60603 11.6892 6.45973 11.7163 6.31246 11.7137C6.16518 11.7111 6.01993 11.6789 5.88538 11.6189C5.75083 11.559 5.62974 11.4725 5.52932 11.3648L0.776194 6.61164L-0.000393629 5.83652L0.774731 5.06139L5.52786 0.30827C5.73464 0.108365 6.01166 -0.00232558 6.29926 3.70587e-05C6.58686 0.00239969 6.86202 0.117627 7.06549 0.320902C7.26895 0.524176 7.38444 0.799233 7.38708 1.08683C7.38971 1.37443 7.27928 1.65155 7.07957 1.85852L4.19844 4.73965L19.3777 4.73965C19.6686 4.73965 19.9476 4.85521 20.1533 5.06091C20.359 5.26662 20.4746 5.54561 20.4746 5.83652C20.4746 6.12743 20.359 6.40642 20.1533 6.61213C19.9476 6.81783 19.6686 6.9334 19.3777 6.9334L4.19844 6.9334L7.07957 9.81452Z"
                                        fill="#596075" />
                                </svg>
                            </div>
                            <div class="comapnies-next ">

                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.395 1.89935C13.2873 1.79893 13.2008 1.67783 13.1409 1.54328C13.0809 1.40873 13.0487 1.26349 13.0461 1.11621C13.0435 0.968932 13.0706 0.82264 13.1258 0.68606C13.1809 0.54948 13.263 0.425411 13.3672 0.321254C13.4714 0.217096 13.5954 0.134984 13.732 0.0798171C13.8686 0.0246501 14.0149 -0.0024425 14.1622 0.000156044C14.3094 0.00275459 14.4547 0.034991 14.5892 0.0949418C14.7238 0.154893 14.8449 0.24133 14.9453 0.349097L19.6984 5.10222L20.475 5.87735L19.6999 6.65247L14.9468 11.4056C14.74 11.6055 14.463 11.7162 14.1754 11.7138C13.8878 11.7115 13.6126 11.5962 13.4091 11.393C13.2057 11.1897 13.0902 10.9146 13.0875 10.627C13.0849 10.3394 13.1953 10.0623 13.395 9.85535L16.2762 6.97422L1.09688 6.97422C0.805966 6.97422 0.526971 6.85866 0.321267 6.65295C0.115563 6.44725 0 6.16826 0 5.87735C0 5.58644 0.115563 5.30744 0.321267 5.10174C0.526971 4.89604 0.805966 4.78047 1.09688 4.78047L16.2762 4.78047L13.395 1.89935Z"
                                        fill="#596075" />
                                </svg>
                            </div>
                        </div>
                    </div>
            
            </div>
        </section>
    @endif

    @if($why_choose_us->isNotEmpty())
    <section class="why-choose commonPadding">

            <div class="container-short">
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="col-left">
                        <span>Why choose us</span>
                        <h2>You made 
                            the right choice!</h2>
                    </div>
                    <div class="col-right">
                        <p>Musaed Bader Al-Sayer & Sons is the region’s leading provider. With close ties to the renowned Al Sayer Group, we place the customer at the heart of all that we do. Having over 25 years of industry experience means our Material Handling Division is built on the principles of Quality and Safety, with a constant emphasis on Innovation.</p>
                        <p>Being the authorised distributor of industry leaders such as Dexion,Assa Abloy,tab25,efficold,HitLine,Frigozika and Kasten is a testament to this. We take pride in offering our clients a fully consultative approach, so you can be assured your project has the premier partner.</p>
                    </div>
                </div>
                <div class="d-flex flex-wrap  justify-content-between">
                    <div class="col-left">
                        <picture>
                            <img src="{{asset('web/images/home/why-choose.jpg')}}" width="346" height="480" alt="">
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


    @if($brands->isNotEmpty())
    <section class="partners commonPadding pb-0">
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
                    @foreach($brands as $brand)
                        <picture>
                            <img src="{{asset($brand->featured_image_webp ?? $brand->featured_image)}}" width="217" height="85" {{$brand->featured_image_attribute}}>
                        </picture>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    @endif

@endsection

