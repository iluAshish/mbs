@extends('web.layouts.main')
@section('content')

  <!-- breadcumbs -->
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
                            @if(@$category_products->title != '' || @$category_products->title != null)
                            <h2>{{$category_products->title}}</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if(@$category_products->banner_image != '')
            <div class="right-img">
                <div class="mask-img">
                    {!! Helper::printImage($category_products,'banner_image','banner_image_webp','banner_image_attribute','img-fluid') !!}
                </div>
            </div>
            @endif
            <div class="bread-action">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="{{url('/')}}/" class="text-decoration-none">Home</a>
                    </li>
                    <li class="list-inline-item">/</li>
                    <li class="list-inline-item">
                        <a href="{{url('/')}}/product" class="active text-decoration-none">Products</a>
                    </li>
                    <li class="list-inline-item">/</li>
                    <li class="list-inline-item">
                        <a href="#" class="active text-decoration-none">{{$category_products->title}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end of breadcumbs -->

        <!-- welcome section -->
        <section class="category-detail-wrapper">
            <div class="container-ctn">
                <div class="row">
                    <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="left-content">
                            <div class="welcome-img-mask">
                                {!! Helper::printImage($category_products,'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','img-fluid') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-7 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="green-grad-border">
                            <div class="right-content">
                                <div class="larg-txt">
                                    @if(@$category_products->title != '' || @$category_products->title != null)
                                    <h2>{{$category_products->title}}</h2>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="discription">
                            @if(@$category_products->short_description != '' || @$category_products->short_description != null)
                            {!!$category_products->short_description !!}
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="discription d-more mt-5">
                            <div class="pro-list">
                                 @if(@$category_products->description != '' || @$category_products->description != null)
                            {!!$category_products->description !!}
                            @endif
                            </div>
                        </div>
                    </div>
                <!-- other product -->
                <div class="others-products">
                    <div class="row">
                        
                             @foreach($products as $product)
                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="product-other-box">
                                        <div class="product-img">
                                            <a href="{{url('/')}}/products/{!!$product->short_url !!}" class="text-decoration-none">
                                                {!! Helper::printImage($product,'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','img-fluid ') !!}
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a href="{{url('/')}}/products/{!!$product->short_url !!}" class="text-decoration-none">
                                                <p>{!!$product->title !!}</p>
                                            </a>
                                        </div>
                                        <div class="prodct-action">
                                            <div class="view">
                                                <a href="{{url('/')}}/products/{!!$product->short_url !!}" class="text-decoration-none">
                                                    <!-- data-fancybox="gallery" -->
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item">
                                                            <div class="icon">
                                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="25.000000pt" height="25.000000pt" viewBox="0 0 25.000000 25.000000" preserveAspectRatio="xMidYMid meet">
                                                                    <g transform="translate(0.000000,25.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                                                        <path
                                                                            d="M12 238 c-7 -7 -12 -39 -12 -74 0 -56 3 -64 32 -93 30 -29 36 -31 109 -31 110 0 109 -1 109 84 0 66 -2 75 -28 99 -26 25 -34 27 -113 27 -53 0 -90 -5 -97 -12z m153 -8 c-30 -8 -29 -8 10 -11 24 -1 6 -5 -45 -8 l-85 -6 -6 -65 -6 -65 1 70 1 70 40 6 40 7 -45 -2 -45 -1 -6 -65 -6 -65 -1 66 c-1 36 1 69 5 72 3 4 45 6 92 6 61 -1 77 -4 56 -9z m72 -102 l2 -68 -90 0 c-87 0 -89 1 -89 23 0 13 11 34 25 47 l25 24 41 -40 c22 -21 39 -33 37 -25 -2 8 8 17 22 21 16 4 21 8 13 13 -7 5 -22 3 -33 -3 -18 -10 -24 -7 -41 14 -24 30 -45 33 -71 9 -23 -21 -27 -16 -21 25 l5 33 87 -3 86 -3 2 -67z"
                                                                        />
                                                                        <path d="M177 174 c-14 -15 -6 -34 14 -34 14 0 19 5 17 17 -3 18 -20 27 -31 17z" />
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <p>View</p>
                                                        </li>
                                                    </ul>
                                                </a>
                                            </div>
                                            <div class="enquiry">
                                                <a href="javascript:;" data-id="{!!$product->id !!}"  data-name="{!!$product->title !!}" class="text-decoration-none enquiry_product_cat" data-bs-toggle="modal" data-bs-target="#product-enquiry-modal">
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item">
                                                            <div class="icon">
                                                                <img src="{{ asset('web/images/icons/pro-enq.svg') }}" class="img-fluid" alt="view" />
                                                            </div>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <p>ENQUIRY</p>
                                                        </li>
                                                    </ul>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="appendHere_{{ $offset }}"></div>
                            <div class="more-section-{{ $offset }}"></div>
                            <input type="hidden" id="count" name="count" value="4">
                            <input type="hidden" id="totalProduct" name="total_project" value="{{ $totalProducts }}">
                            <input type="hidden" id="product_loading_offset" name="offset" value="{{ $offset }}">
                            <input type="hidden" id="category_id" name="category_id" value="{{ $category_products->id }}">
                            <input type="hidden" id="product_loading_limit" name="loading_limit" value="{{ $loading_limit }}">
                            <div class="col-12">
                                @if(@$totalProducts != $offset)
                                <div class="single-more-load">
                                    <div class="quick-enq-wrapper">
                                        <a href="#" class="quick-enq text-decoration-none m-auto">
                                            <div class="btn-icon">
                                                <img src="{{ asset('web/images/icons/more.svg') }}" class="img-fluid" alt="button" />
                                            </div>
                                            <div class="btn-title">
                                                <p>Load More</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                
                                @endif
                            </div>
                    </div>
                </div>
                <!-- end of other product -->
            </div>
        </section>

        <section class="other-slider-wrapper">
            <div class="container-ctn">
                <div class="green-grad-border">
                    <div class="right-content">
                        <div class="small-title">
                            <h3>Products</h3>
                        </div>
                        <div class="larg-txt">
                            <h2>Other Products</h2>
                        </div>
                    </div>
                </div>
                <div class="product-other-slider">
                    @foreach($related_category as $related)
                    <div class="product-box">
                        <div class="product-img">
                            <a href="{{url('/')}}/product/{{$related->short_url}}" class="text-decoration-none">
                                {!! Helper::printImage($related,'featured_image','featured_image_webp','featured_image_attribute','img-fluid ') !!}
                            </a>
                        </div>
                        <div class="product-title">

                            <a href="{{ url('/') }}/product/{{ $related->short_url }}" class="text-decoration-none">
                                <span class="big">{{ str_pad($loop->iteration, 2, "0", STR_PAD_LEFT) }}</span>
                                <span class="small">{!! Illuminate\Support\Str::limit(@$related->title, $limit = 20, $end = '...') !!}</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- footer section -->

@endsection
