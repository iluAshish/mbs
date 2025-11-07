@extends('web.layouts.main')
@section('content')
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
                <a href="{{url('/')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path
                            d="M6 14.2496H12M10.0556 1.55964C12.7688 2.76377 14.8252 4.34589 15.8884 5.25977C16.4257 5.72177 16.7254 6.38664 16.7621 7.09427C16.8135 8.06589 16.875 9.58652 16.875 11.2496C16.875 12.5291 16.8386 13.7644 16.7985 14.7345C16.7779 15.2747 16.553 15.7868 16.1693 16.1676C15.7856 16.5483 15.2718 16.7693 14.7315 16.7858C13.434 16.8308 11.5084 16.8746 9 16.8746C6.49162 16.8746 4.56637 16.8304 3.2685 16.7861C2.72823 16.7696 2.21435 16.5487 1.83068 16.1679C1.44702 15.7872 1.22215 15.275 1.2015 14.7349C1.15252 13.5738 1.12702 12.4118 1.125 11.2496C1.125 9.58652 1.18687 8.06589 1.2375 7.09427C1.275 6.38664 1.57425 5.72177 2.11163 5.25977C3.17475 4.34552 5.23162 2.76377 7.94437 1.55964C8.27676 1.41214 8.63636 1.33594 9 1.33594C9.36364 1.33594 9.72324 1.41214 10.0556 1.55964Z"
                            stroke="white" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round" /> </svg>
                </a>
            </li>
            <li>{{$category_products->title}}</li>
        </ul>
    </div>
</section>

<!-- products  -->
<section class=" inner-padding product-category-intro pb-0 position-relative">
    <div class="container-short">

        <div class="product-detail d-flex flex-wrap justify-content-between">
            <div class="gallery">
                <picture>
                    <img src="{{asset($category_products->banner_image_webp ?? $category_products->banner_image)}}" {{$category_products->banner_image_attribute	}}>
                </picture>
            </div>

            <div class="content list d-flex flex-wrap">
                <h1 class="h2">{{$category_products->title}}</h1>
                {!! $category_products->short_description !!}
            </div>
        </div>
    </div>


    <div class="container-short alternate-description commonPadding pt-0">
        {!! $category_products->description !!}
    </div>
</section>

<!-- Brands Slider -->
@if($brands->isNotEmpty())
<section class="brands">
    <div class="container-short">
        <h2>Brands</h2>
        <div class="brands-slider">
            @foreach($brands as $brand)
            <picture>
                <img src="{{asset($brand->banner_image_webp ?? $brand->banner_image)}}" width="168" height="85" class="w-100 " {{$brand->banner_image_attribute	}}>
            </picture>

            @endforeach
            
        </div>
    </div>
</section>

@endif



<section class="sub-category commonPadding pb-0">
    <div class="container-short">
        <h2>Sub Categories</h2>
        <div class="d-flex flex-wrap sub-category-mobile-slider">
            @include('web.components._list_sub_category', ['related_category' => $related_category])
        </div>
    </div>
</section>

<section class="major-products products mt-0 commonPadding">
    <div class="container-short">
        <div class="head position-relative d-flex align-items-center">
            <h2>Major Products</h2>
            <div class="slick-nav d-flex">
                <div class="major-products-slider-prev ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.07957 9.81452C7.18734 9.91494 7.27377 10.036 7.33372 10.1706C7.39368 10.3051 7.42591 10.4504 7.42851 10.5977C7.43111 10.7449 7.40402 10.8912 7.34885 11.0278C7.29368 11.1644 7.21157 11.2885 7.10741 11.3926C7.00326 11.4968 6.87919 11.5789 6.74261 11.6341C6.60603 11.6892 6.45973 11.7163 6.31246 11.7137C6.16518 11.7111 6.01993 11.6789 5.88538 11.6189C5.75083 11.559 5.62974 11.4725 5.52932 11.3648L0.776194 6.61164L-0.000393629 5.83652L0.774731 5.06139L5.52786 0.30827C5.73464 0.108365 6.01166 -0.00232558 6.29926 3.70587e-05C6.58686 0.00239969 6.86202 0.117627 7.06549 0.320902C7.26895 0.524176 7.38444 0.799233 7.38708 1.08683C7.38971 1.37443 7.27928 1.65155 7.07957 1.85852L4.19844 4.73965L19.3777 4.73965C19.6686 4.73965 19.9476 4.85521 20.1533 5.06091C20.359 5.26662 20.4746 5.54561 20.4746 5.83652C20.4746 6.12743 20.359 6.40642 20.1533 6.61213C19.9476 6.81783 19.6686 6.9334 19.3777 6.9334L4.19844 6.9334L7.07957 9.81452Z"
                            fill="#596075" />
                    </svg>
                </div>
                <div class="major-products-slider-next ">

                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.395 1.89935C13.2873 1.79893 13.2008 1.67783 13.1409 1.54328C13.0809 1.40873 13.0487 1.26349 13.0461 1.11621C13.0435 0.968932 13.0706 0.82264 13.1258 0.68606C13.1809 0.54948 13.263 0.425411 13.3672 0.321254C13.4714 0.217096 13.5954 0.134984 13.732 0.0798171C13.8686 0.0246501 14.0149 -0.0024425 14.1622 0.000156044C14.3094 0.00275459 14.4547 0.034991 14.5892 0.0949418C14.7238 0.154893 14.8449 0.24133 14.9453 0.349097L19.6984 5.10222L20.475 5.87735L19.6999 6.65247L14.9468 11.4056C14.74 11.6055 14.463 11.7162 14.1754 11.7138C13.8878 11.7115 13.6126 11.5962 13.4091 11.393C13.2057 11.1897 13.0902 10.9146 13.0875 10.627C13.0849 10.3394 13.1953 10.0623 13.395 9.85535L16.2762 6.97422L1.09688 6.97422C0.805966 6.97422 0.526971 6.85866 0.321267 6.65295C0.115563 6.44725 0 6.16826 0 5.87735C0 5.58644 0.115563 5.30744 0.321267 5.10174C0.526971 4.89604 0.805966 4.78047 1.09688 4.78047L16.2762 4.78047L13.395 1.89935Z"
                            fill="#596075" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="products-slider major-products-slider">
            @foreach($products as $product)            
                <div class="products-slider-item">
                    <picture><img src="{{asset($product->thumbnail_image_webp ?? $brand->thumbnail_image)}}" width="251" height="322" {{$product->thumbnail_image_attribute}}>
                    </picture>
                    <div class="product-description">
                        <h3>{{$product->title ?? ''}}</h3>
                        <p>{{ \Illuminate\Support\Str::words(strip_tags($product->short_description ?? $product->description), 10, '...') }}</p>
                    </div>
                    <a href="{{route('product-detail',['short_url' => $product->short_url])}}" class="arrow-btn btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.9881 8.75252C8.93008 8.80659 8.88353 8.87179 8.85125 8.94424C8.81897 9.01669 8.80161 9.0949 8.80021 9.1742C8.79881 9.25351 8.8134 9.33228 8.84311 9.40582C8.87281 9.47937 8.91703 9.54617 8.97311 9.60226C9.0292 9.65834 9.096 9.70256 9.16955 9.73226C9.24309 9.76197 9.32186 9.77656 9.40117 9.77516C9.48047 9.77376 9.55868 9.7564 9.63113 9.72412C9.70358 9.69184 9.76878 9.64529 9.82285 9.58727L12.3822 7.02789L12.8004 6.61052L12.383 6.19314L9.82364 3.63376C9.7123 3.52612 9.56313 3.46652 9.40827 3.46779C9.25341 3.46907 9.10525 3.53111 8.99569 3.64057C8.88613 3.75002 8.82394 3.89813 8.82252 4.05299C8.82111 4.20785 8.88057 4.35707 8.9881 4.46852L10.5395 6.01989H2.36602C2.20937 6.01989 2.05914 6.08212 1.94838 6.19288C1.83762 6.30364 1.77539 6.45387 1.77539 6.61052C1.77539 6.76716 1.83762 6.91739 1.94838 7.02815C2.05914 7.13891 2.20937 7.20114 2.36602 7.20114H10.5395L8.9881 8.75252Z"
                                fill="white" /> </svg>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>



@endsection
