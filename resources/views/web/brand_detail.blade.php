@extends('web.layouts.main')
@section('content')

@php 
$brand_page = isset($brand) ? $brand : null;

@endphp

<picture>
    <img src="{{asset('web/images/inner/bg.webp')}}" alt="">
</picture>
<section class="banner inner-banner position-relative">

    <div class="container-ctn position-relative">

        <div class="banner-image-slider " id="fadeSection">
            <picture>
                <img src="{{asset('web/images/inner/inner.webp')}}" class="img-fluid w-100" width="1366" height="335"
                    alt="Ascentria">
            </picture>
        </div>
    </div>
    <div class="container-short">
        <ul class="breadcrumb d-flex align-items-center">
            <li>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path
                            d="M6 14.2496H12M10.0556 1.55964C12.7688 2.76377 14.8252 4.34589 15.8884 5.25977C16.4257 5.72177 16.7254 6.38664 16.7621 7.09427C16.8135 8.06589 16.875 9.58652 16.875 11.2496C16.875 12.5291 16.8386 13.7644 16.7985 14.7345C16.7779 15.2747 16.553 15.7868 16.1693 16.1676C15.7856 16.5483 15.2718 16.7693 14.7315 16.7858C13.434 16.8308 11.5084 16.8746 9 16.8746C6.49162 16.8746 4.56637 16.8304 3.2685 16.7861C2.72823 16.7696 2.21435 16.5487 1.83068 16.1679C1.44702 15.7872 1.22215 15.275 1.2015 14.7349C1.15252 13.5738 1.12702 12.4118 1.125 11.2496C1.125 9.58652 1.18687 8.06589 1.2375 7.09427C1.275 6.38664 1.57425 5.72177 2.11163 5.25977C3.17475 4.34552 5.23162 2.76377 7.94437 1.55964C8.27676 1.41214 8.63636 1.33594 9 1.33594C9.36364 1.33594 9.72324 1.41214 10.0556 1.55964Z"
                            stroke="white" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round" /> </svg>
                </a>
            </li>
            <li>
                <a href="{{route('brands')}}"> Brands</a>
            </li>
            <li>
                {{ $brand->title ?? 'Brand Detail' }}
            </li>
        </ul>
    </div>
</section>


<section class="brand-details inner-padding product-detail-intro position-relative">
    <div class="container-short">

        <div class="product-detail d-flex flex-wrap justify-content-between">
            <div class="gallery">
                {{-- Brand Logo --}}
                <div class="brand-logo">
                    <img src="{{ asset($brand->featured_image) }}"
                        width="252"
                        height="52"
                        {!! $brand->featured_image_attribute !!}
                    >
                </div>

                {{-- Main Slider --}}
                <div class="product-slider-for">
                    {{-- First: Brand Featured Image --}}
                    <div>
                        <img src="{{ asset($brand->featured_image) }}"
                            width="560"
                            height="357"
                            {!! $brand->featured_image_attribute !!}
                        >
                    </div>

                    {{-- Then: Brand Galleries --}}
                    @foreach($brand->galleries as $gallery)
                        <div>
                            <img src="{{ asset($gallery->image) }}"
                                width="560"
                                height="357"
                                {!! $gallery->image_attribute !!}
                            >
                        </div>
                    @endforeach
                </div>

                {{-- Thumbnail Slider --}}
                <div class="product-slider-nav">
                    {{-- First: Brand Featured Thumbnail --}}
                    <div>
                        <img src="{{ asset($brand->featured_image) }}"
                            width="100"
                            height="70"
                            {!! $brand->featured_image_attribute !!}
                        >
                    </div>

                    {{-- Then: Gallery Thumbnails --}}
                    @foreach($brand->galleries as $gallery)
                        <div>
                            <img src="{{ asset($gallery->image) }}"
                                width="100"
                                height="70"
                                {!! $gallery->image_attribute !!}
                            >
                        </div>
                    @endforeach
                </div>
            </div>


            <div class="content list d-flex flex-wrap">
                <div>
                    <h1 class="h2">{{$brand->title??''}}</h1>
                    {!! $brand->short_description !!}
                </div>
                <div class="highlights d-flex flex-wrap align-items-center">
                    @foreach($brand->icons as $icon)
                        <div >
                            <picture><img src="{{ asset($icon->icon_webp ?? $icon->icon) }}" width="22" height="22" {{$icon->icon_attribute}}></picture>
                           <div> {!! $icon->description ?? '' !!}</div>
                        </div>
                    @endforeach
                </div>

                <div class="detailed-description">
                    {!! $brand->description ?? '' !!}
                </div>
            </div>
        </div>



</section>

@if($products->isNotEmpty())

<section class="brands-other-products why-choose">
    <div class="container-short position-relative">
        <div class="header-slider  d-flex flex-wrap justify-content-between align-items-center">
            <div class="col-left title">
                <h2><span>Our </span> Products</h2>
            </div>
            <div class="col-right">
                {!! $brand->product_short_description !!}
            </div>
        </div>
        <div class="slick-nav ">
            <div class="other-product-prev ">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.07957 9.81452C7.18734 9.91494 7.27377 10.036 7.33372 10.1706C7.39368 10.3051 7.42591 10.4504 7.42851 10.5977C7.43111 10.7449 7.40402 10.8912 7.34885 11.0278C7.29368 11.1644 7.21157 11.2885 7.10741 11.3926C7.00326 11.4968 6.87919 11.5789 6.74261 11.6341C6.60603 11.6892 6.45973 11.7163 6.31246 11.7137C6.16518 11.7111 6.01993 11.6789 5.88538 11.6189C5.75083 11.559 5.62974 11.4725 5.52932 11.3648L0.776194 6.61164L-0.000393629 5.83652L0.774731 5.06139L5.52786 0.30827C5.73464 0.108365 6.01166 -0.00232558 6.29926 3.70587e-05C6.58686 0.00239969 6.86202 0.117627 7.06549 0.320902C7.26895 0.524176 7.38444 0.799233 7.38708 1.08683C7.38971 1.37443 7.27928 1.65155 7.07957 1.85852L4.19844 4.73965L19.3777 4.73965C19.6686 4.73965 19.9476 4.85521 20.1533 5.06091C20.359 5.26662 20.4746 5.54561 20.4746 5.83652C20.4746 6.12743 20.359 6.40642 20.1533 6.61213C19.9476 6.81783 19.6686 6.9334 19.3777 6.9334L4.19844 6.9334L7.07957 9.81452Z"
                        fill="#596075" />
                </svg>
            </div>
            <div class="other-product-next ">

                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.395 1.89935C13.2873 1.79893 13.2008 1.67783 13.1409 1.54328C13.0809 1.40873 13.0487 1.26349 13.0461 1.11621C13.0435 0.968932 13.0706 0.82264 13.1258 0.68606C13.1809 0.54948 13.263 0.425411 13.3672 0.321254C13.4714 0.217096 13.5954 0.134984 13.732 0.0798171C13.8686 0.0246501 14.0149 -0.0024425 14.1622 0.000156044C14.3094 0.00275459 14.4547 0.034991 14.5892 0.0949418C14.7238 0.154893 14.8449 0.24133 14.9453 0.349097L19.6984 5.10222L20.475 5.87735L19.6999 6.65247L14.9468 11.4056C14.74 11.6055 14.463 11.7162 14.1754 11.7138C13.8878 11.7115 13.6126 11.5962 13.4091 11.393C13.2057 11.1897 13.0902 10.9146 13.0875 10.627C13.0849 10.3394 13.1953 10.0623 13.395 9.85535L16.2762 6.97422L1.09688 6.97422C0.805966 6.97422 0.526971 6.85866 0.321267 6.65295C0.115563 6.44725 0 6.16826 0 5.87735C0 5.58644 0.115563 5.30744 0.321267 5.10174C0.526971 4.89604 0.805966 4.78047 1.09688 4.78047L16.2762 4.78047L13.395 1.89935Z"
                        fill="#596075" />
                </svg>
            </div>
        </div>
        <div class="brands-other-products-slider slider-container">
            @foreach($products as $product)
            <a href="{{route('product-detail',['short_url' => $product->short_url])}}" class="other-product-card">
                <picture>
                    <img src="{{asset($product->thumbnail_image_webp ?? $brand->thumbnail_image)}}" width="334" height="249" {{$product->thumbnail_image_attribute}}>
                </picture>
                <div class="other-product-details">
                    <h3>{{$product->title ?? ''}}</h3>
                    <p>{{ \Illuminate\Support\Str::words(strip_tags($product->short_description ?? $product->description), 30, '...') }}</p>

                </div>


            </a>
            @endforeach
           

        </div>
    </div>
</section>
@endif

<!-- services  -->
@if($services->isNotEmpty())
<section class="our-services">
    <div class="container-short position-relative">
        <div class="header-slider position-relative  d-flex flex-wrap justify-content-between align-items-center">
            <div class="col-left title">
                <h2><span>Our </span> Services</h2>
                {!! $brand->service_short_description_one !!}
            </div>
            <div class="col-right">
                {!! $brand->service_short_description_two !!}
            </div>
        </div>

    </div>
    @if($services->isNotEmpty())
   
    <div class="container-short position-relative">
        <div class="slick-nav ">
            <div class="our-services-prev ">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.07957 9.81452C7.18734 9.91494 7.27377 10.036 7.33372 10.1706C7.39368 10.3051 7.42591 10.4504 7.42851 10.5977C7.43111 10.7449 7.40402 10.8912 7.34885 11.0278C7.29368 11.1644 7.21157 11.2885 7.10741 11.3926C7.00326 11.4968 6.87919 11.5789 6.74261 11.6341C6.60603 11.6892 6.45973 11.7163 6.31246 11.7137C6.16518 11.7111 6.01993 11.6789 5.88538 11.6189C5.75083 11.559 5.62974 11.4725 5.52932 11.3648L0.776194 6.61164L-0.000393629 5.83652L0.774731 5.06139L5.52786 0.30827C5.73464 0.108365 6.01166 -0.00232558 6.29926 3.70587e-05C6.58686 0.00239969 6.86202 0.117627 7.06549 0.320902C7.26895 0.524176 7.38444 0.799233 7.38708 1.08683C7.38971 1.37443 7.27928 1.65155 7.07957 1.85852L4.19844 4.73965L19.3777 4.73965C19.6686 4.73965 19.9476 4.85521 20.1533 5.06091C20.359 5.26662 20.4746 5.54561 20.4746 5.83652C20.4746 6.12743 20.359 6.40642 20.1533 6.61213C19.9476 6.81783 19.6686 6.9334 19.3777 6.9334L4.19844 6.9334L7.07957 9.81452Z"
                        fill="#596075" />
                </svg>
            </div>
            <div class="our-services-next ">

                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.395 1.89935C13.2873 1.79893 13.2008 1.67783 13.1409 1.54328C13.0809 1.40873 13.0487 1.26349 13.0461 1.11621C13.0435 0.968932 13.0706 0.82264 13.1258 0.68606C13.1809 0.54948 13.263 0.425411 13.3672 0.321254C13.4714 0.217096 13.5954 0.134984 13.732 0.0798171C13.8686 0.0246501 14.0149 -0.0024425 14.1622 0.000156044C14.3094 0.00275459 14.4547 0.034991 14.5892 0.0949418C14.7238 0.154893 14.8449 0.24133 14.9453 0.349097L19.6984 5.10222L20.475 5.87735L19.6999 6.65247L14.9468 11.4056C14.74 11.6055 14.463 11.7162 14.1754 11.7138C13.8878 11.7115 13.6126 11.5962 13.4091 11.393C13.2057 11.1897 13.0902 10.9146 13.0875 10.627C13.0849 10.3394 13.1953 10.0623 13.395 9.85535L16.2762 6.97422L1.09688 6.97422C0.805966 6.97422 0.526971 6.85866 0.321267 6.65295C0.115563 6.44725 0 6.16826 0 5.87735C0 5.58644 0.115563 5.30744 0.321267 5.10174C0.526971 4.89604 0.805966 4.78047 1.09688 4.78047L16.2762 4.78047L13.395 1.89935Z"
                        fill="#596075" />
                </svg>
            </div>
        </div>
        <div class=" slider-container slider-container-services">

            <div class="our-services-slider">
                @include('web.components._list_services', ['services' => $services])
            </div>
        </div>
    </div>
    @endif
</section>

@endif


<section class="cta m-0">
    <div class="cta-container">
        <h2>Quick Contact</h2>
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="btn-wrap d-flex flex-wrap">
                <a href="tel:+965 22271417">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.73303 2.0433C6.95003 0.833297 8.95403 1.0483 9.97303 2.4103L11.235 4.0943C12.065 5.2023 11.991 6.7503 11.006 7.7293L10.768 7.9673C10.741 8.06721 10.7383 8.17211 10.76 8.2733C10.823 8.6813 11.164 9.5453 12.592 10.9653C14.02 12.3853 14.89 12.7253 15.304 12.7893C15.4083 12.8103 15.5161 12.8072 15.619 12.7803L16.027 12.3743C16.903 11.5043 18.247 11.3413 19.331 11.9303L21.241 12.9703C22.878 13.8583 23.291 16.0823 21.951 17.4153L20.53 18.8273C20.082 19.2723 19.48 19.6433 18.746 19.7123C16.936 19.8813 12.719 19.6653 8.28603 15.2583C4.14903 11.1443 3.35503 7.5563 3.25403 5.7883C3.20403 4.8943 3.62603 4.1383 4.16403 3.6043L5.73303 2.0433ZM8.77303 3.3093C8.26603 2.6323 7.32203 2.5783 6.79003 3.1073L5.22003 4.6673C4.89003 4.9953 4.73203 5.3573 4.75203 5.7033C4.83203 7.1083 5.47203 10.3453 9.34403 14.1953C13.406 18.2333 17.157 18.3543 18.607 18.2183C18.903 18.1913 19.197 18.0373 19.472 17.7643L20.892 16.3513C21.47 15.7773 21.343 14.7313 20.525 14.2873L18.615 13.2483C18.087 12.9623 17.469 13.0563 17.085 13.4383L16.63 13.8913L16.1 13.3593C16.63 13.8913 16.629 13.8923 16.628 13.8923L16.627 13.8943L16.624 13.8973L16.617 13.9033L16.602 13.9173C16.5598 13.9565 16.5143 13.9919 16.466 14.0233C16.386 14.0763 16.28 14.1353 16.147 14.1843C15.877 14.2853 15.519 14.3393 15.077 14.2713C14.21 14.1383 13.061 13.5473 11.534 12.0293C10.008 10.5113 9.41203 9.3693 9.27803 8.5033C9.20903 8.0613 9.26403 7.7033 9.36603 7.4333C9.42216 7.28137 9.50254 7.13953 9.60403 7.0133L9.63603 6.9783L9.65003 6.9633L9.65603 6.9573L9.65903 6.9543L9.66103 6.9523L9.94903 6.6663C10.377 6.2393 10.437 5.5323 10.034 4.9933L8.77303 3.3093Z"
                                fill="white" /> </svg></i>
                    <p>+965 22271417</p>
                </a>
                <a href="mailto:sales@mbs-group.net">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M22.425 5.526L12.9555 13.368C12.6864 13.5909 12.3479 13.7129 11.9985 13.7129C11.6491 13.7129 11.3106 13.5909 11.0415 13.368L1.5765 5.526C1.52571 5.67887 1.49988 5.83892 1.5 6V18C1.5 18.3978 1.65804 18.7794 1.93934 19.0607C2.22064 19.342 2.60218 19.5 3 19.5H21C21.3978 19.5 21.7794 19.342 22.0607 19.0607C22.342 18.7794 22.5 18.3978 22.5 18V6C22.5006 5.839 22.4753 5.67895 22.425 5.526ZM3 3H21C21.7956 3 22.5587 3.31607 23.1213 3.87868C23.6839 4.44129 24 5.20435 24 6V18C24 18.7956 23.6839 19.5587 23.1213 20.1213C22.5587 20.6839 21.7956 21 21 21H3C2.20435 21 1.44129 20.6839 0.87868 20.1213C0.316071 19.5587 0 18.7956 0 18V6C0 5.20435 0.316071 4.44129 0.87868 3.87868C1.44129 3.31607 2.20435 3 3 3ZM2.685 4.5L11.049 11.4045C11.3169 11.6258 11.6533 11.7472 12.0007 11.748C12.3481 11.7488 12.6851 11.629 12.954 11.409L21.402 4.5H2.685Z"
                                fill="white" /> </svg></i>
                    <p>sales@mbs-group.net</p>
                </a>
            </div>

            <button data-bs-toggle="modal" href="#ServiceEnquiryForm" role="button" class="btn-theme">Brand
                Enquiry</button>
        </div>
    </div>
</section>

@endsection