@extends('web.layouts.main') 
@section('content')
<article>
    @if($homeBanners)
    <section class="banner">
        <div class="homeBannerSlider">
            @foreach($homeBanners as $slider)
            <div class="slider">
                {{-- {!! Helper::printImage($slider,'bg_image','bg_image_webp','bg_image_attribute','img-fluid w-100 sliderBgImage',null,'521','461') !!} --}}
                <img src="{!! $slider->bg_image_webp !!}" class="img-fluid w-100 sliderBgImage" {!! $slider->bg_image_attribute !!}>
                <div class="overlayBg">
                    {{-- {!! Helper::printImage($slider,'bg_image','bg_image_webp','bg_image_attribute','img-fluid w-100 sliderBgImage',null,'521','461') !!} --}}
                    {{-- {!! Helper::printImage($slider,'image','image_webp','image_attribute','img-fluid w-100 sliderBgImage',null,'521','461') !!} --}}
                    <img src="{{ asset('web/images/slider/sliderLogo.svg') }}" class="img-fluid" alt="">
                </div>
                <div class="contentWrapper">
                    <div class="container h-auto">
                        <div class="row h-auto">
                            <div class="col-md-7 contentArea">
                                <div class="w-100 h-auto">
                                    <h1>{!! $slider->title !!}</h1>
                                    <p>{!! $slider->sub_title !!}</p>
                                    @if(@$slider->button_url != '')
                                    <a href="{{@$slider->button_url}}" class="primary_btn aos-init aos-animate"><span>{{@$slider->button_txt}}</span></a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-5 ps-lg-5 d-flex align-items-center justify-content-center mt-md-0 mt-5">
                                @if(@$slider->image_webp != '')
                                <img src="{!! $slider->image_webp !!}" class="img-fluid  sliderSingleImg" {!! $slider->image_attribute !!}">
                                @endif
                                {{-- {!! Helper::printImage($slider,'image','image_webp','image_attribute','img-fluid  sliderBgImage',null,'521','461') !!} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
    
    @if($homeAbout)
    
    <section class="aboutUsHome">
        <div class="shape">
            <img src="{{ asset('web/images/aboutShape-01.svg') }}" class="img-fluid" alt="">
        </div>
        <div class="topSection"></div>
        <div class="bottomSection"></div>
        <div class="container position-relative">
            <div class="row ">
                <div class="col-lg-7 pe-lg-4">
                    <div class="title" data-aos="fade-up">
                        {!! $homeAbout->title !!}
                    </div>
                    <h2 data-aos="fade-up" data-aos-duration="1000" class="fw-bold">{!! $homeAbout->title !!}</h2>
                    <div class="textWrapper mt-30" data-aos="fade-up" data-aos-duration="2000">
                        {!! $homeAbout->short_description !!}
                    </div>
                    @if(@$homeAbout->button_url != '')
                    <a href="{{@$homeAbout->button_url}}"  data-aos="fade-up" data-aos-duration="3000" class="primary_btn secondary_btn mt-40"><span>{{@$homeAbout->button_text}}</span></a>
                    @endif

                </div>
                <div class="col-lg-5 d-flex align-items-end mt-lg-0 mt-5">
                    <div class="imgWrapper" data-aos="zoom-in" data-aos-duration="3000">
                        {!! Helper::printImage($homeAbout,'image','image_webp','image_attribute','img-fluid',null,'521','461') !!}
                        {{-- <img src="assets/images/home_about.jpg" class="img-fluid" alt=""> --}}
                    </div>
                </div>
                <div class="col-lg-12 d-flex flex-md-row flex-column align-items-md-center mt-70" data-aos="fade-up" data-aos-duration="2000">
                    <span class="counter">17</span>
                    <div>
                        <h2 class="font55">Years Of Experience</h2>
                        <h4>Master Distributors</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service slider -->
    @endif
    @if($keyFeatures)
    <section class="highlightSection">
        <div class="container position-relative">
            <div class="row">
                <div class="col-12">
                    <div class="highlightWrapper">
                        @foreach($keyFeatures as $keyFeature)
                        <div class="item" data-aos="fade-up"  >
                            {!! Helper::printImage($keyFeature,'image','image_webp','image_attribute','img-fluid',null,'50','50') !!}
                            <h6>{{@$keyFeature->title}}</h6>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($services && $services->isNotEmpty())
    <section class="weDo" >
        <div class="container position-relative">
            <div class="row" >
                <div class="col-sm-8" data-aos="fade-up" data-aos-duration="2000">
                    <div class="title">
                        What we do
                    </div>
                    <h2 class="fw-bold">Our Expertise</h2>
                </div>
                <div class="col-sm-4 mt-sm-0 mt-3" data-aos="fade-up" data-aos-duration="2000">
                    <div class="slickSliderNav weDoSlider-nav"></div>
                </div>
                <div class="col-12 mt-30" data-aos="fade-up" data-aos-duration="2000">
                    <div class="weDoSlider">
                        @foreach($services as $service)
                        <div class="weDoCard">
                            {!! Helper::printImage($service,'alternate_image','alternate_image_webp','alternate_image_attribute','img-fluid cardImg',null,'100','100') !!}
                            @if(@$service->title != '')
                                <h6>{!! $service->title !!}</h6>
                                @endif
                            <div class="h-auto mt-auto">
                                @if(@$service->short_description != '')
                                <p>{!! implode(' ', array_slice(explode(' ', strip_tags($service->short_description)), 0, 9)) . '...' !!}
                                </p>
                                @endif
                                <a href="{{url('/medicom-scientific')}}/#{{ $service->id }}" class="moreBtn">
                                    Explore More
                                    <img src="{{ asset('web/images/svg/moreIcon.svg') }}" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="mapSection" data-aos="fade-up" data-aos-duration="2000">
            <img src="{{ asset('web/images/mapImage.jpg') }}" class="img-fluid w-100 d-md-block d-none" alt="">
            <img src="{{ asset('web/images/mapImage02.jpg') }}" class="img-fluid w-100 d-md-none d-block" alt="">
        </div>
    </section>
 @endif
 
    @if($companies && $companies->isNotEmpty())
    <section class="clientSection" data-aos="fade-up" data-aos-duration="2000">
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-4 d-flex align-items-center">
                    <div class="w-100">
                        <div class="title">
                            Medicom Group
                        </div>
                        <h2 class="fw-bold">Our Company</h2>
                        <div class="textWrapper mt-20">
                            <p>All over UAE and expanding more.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-center mt-lg-0 mt-4">
                    <div class="w-100">
                        <div class="clientSlider">
                            @if($companies)
                                @foreach($companies as $company)
                            <div class="clientCard">
                                {!! Helper::printImage($company,'image','image_webp','image_attribute','img-fluid',null,'86','100') !!}
                            </div>
                            @endforeach 
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif  
    
    @if($categories_home && $categories_home->isNotEmpty())
    <section class="homeIndustriesList" data-aos="fade-up" data-aos-duration="2000">
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center">
                    <div>
                        <div class="title">
                            What We Offer
                        </div>
                        <h2 class="fw-bold">Industries</h2>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center mt-lg-0 mt-3">
                    <div class="textWrapper">
                        <p>We Offer The Most Advanced, High-Quality Equipment.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-20">
                @foreach ($categories_home as $key => $product)
                <div class="col-6 col-lg-4 col-xl-3 mt-30 colIndustries">
                    <a href="{{ url('/products/category/').'/'.$product->short_url }}" class="industriesCard">
                        <div class="imgBox">
                            {!! Helper::printImage(
                                $product,
                                'banner_image',
                                'banner_image_webp',
                                'banner_image_attribute',
                                'pro-img img-fluid',
                            ) !!}
                        </div>
                        <div class="detailsBox">
                            <p class="code">{!! $product->item_code !!}</p>
                            <h6>{!! $product->title !!}</h6>
                            <div class="moreBtn mt-auto" onclick="{{ url('/products').'/'.$product->short_url }}">
                                Explore More
                                <img src="{{ asset('web/images/svg/moreIcon.svg')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="col-12 d-flex align-items-center justify-content-center mt-50">
                    <a href="{{ url('/products') }}" class="primary_btn secondary_btn"><span>View All Products</span></a>
                </div>
            </div>
        </div>
    </section>
    @endif
    
 @if($partners && $partners->isNotEmpty())
    <section class="brands" data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <div class="row">
                <div class="col-8 d-flex align-items-center">
                    <h2 class="fw-bold">Our Brands</h2>
                </div>
                <div class="col-4 d-flex align-items-center">
                    <div class="slickSliderNav brandsSlider-nav"></div>
                </div>
                <div class="col-lg-12 mt-50">
                    <div class="brandsSlider">
                        @foreach($partners as $brand)
                            <div class="item">
                                {!! Helper::printImage($brand,'image','image_webp','image_attribute','img-fluid',null,'86','100') !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    
    @if($testimonials && $testimonials->isNotEmpty())
    <section class="testimonial" data-aos="fade-up" data-aos-duration="2000">
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-3 d-flex align-items-center">
                    <div class="row w-100">
                        <div class="col-8 col-lg-12">
                            <div class="title">
                                TESTIMONIALS
                            </div>
                            <h2 class="fw-bold">our client Words</h2>
                        </div>
                        <div class="col-4 col-lg-12 mt-lg-4 mt-0 d-lg-block d-flex align-items-center pe-0">
                            <div class="slickSliderNav testimonialSlider-nav justify-content-lg-start "></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 mt-lg-0 mt-4 ">
                    <div class="testimonialSlider">
                        @foreach($testimonials as $testimonial)
                        <div class="testimonialCard">
                            <div class="testimonialImage">
                                <img src="{{asset($testimonial->author_image_webp)}}" class="img-fluid w-100" alt="{{ @$testimonial->name }}">
                            </div>
                            <h5>{{ @$testimonial->name }}</h5>
                            <div class="position">{{ @$testimonial->designation }}</div>
                            {!!$testimonial->message!!}
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($clients && $clients->isNotEmpty())
    <section class="clientSection" data-aos="fade-up" data-aos-duration="2000">
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-4 d-flex align-items-center">
                    <div class="w-100">
                        <div class="title">
                            Clients
                        </div>
                        <h2 class="fw-bold">Our Clients</h2>
                        <div class="textWrapper mt-20">
                            <p>We Offer The Most Advanced, High-Quality Equipment.</p>
                        </div>
                        <div class="slickSliderNav clientSlider-nav justify-content-start mt-30"></div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-center mt-lg-0 mt-4">
                    <div class="w-100">
                        <div class="clientSlider">
                            @foreach($clients as $client)
                            <div class="clientCard">
                                {!! Helper::printImage($client,'image','image_webp','image_attribute','img-fluid',null,'86','100') !!}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($blogs && $blogs->isNotEmpty())
    <section class="latestNewsSection" data-aos="fade-up" data-aos-duration="2000">
        <div class="shape">
            <img src="{{ asset('web/assets/images/newsShape-01.svg')}}" class="img-fluid" alt="">
        </div>
        <div class="container position-relative">
            <div class="row">
                <div class="col-8">
                    <div class="title">
                        News & Events
                    </div>
                    <h2 class="fw-bold">Latest Updates</h2>
                </div>
                <div class="col-4 d-flex align-items-center">
                    <div class="slickSliderNav latestNewsSlider-nav"></div>
                </div>
                <div class="col-12 mt-30">
                    <div class="latestNewsSlider">
                        
                        @foreach($blogs as $blog)
                        <div class="latestNewsCard">
                            <div class="imgBox">
                                {!! Helper::printImage($blog,'image','image_webp','image_attribute','img-fluid w-100',null,'86','100') !!}
                            </div>
                            <div class="blogDetails">
                                <h6>{{ @$blog->title }}</h6>
                                <a href="{{ url('/') }}/blog/{!! $blog->short_url !!}" class="moreBtn mt-auto">
                                    Read More
                                    <img src="{{ asset('web/images/svg/moreIcon.svg') }}" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center mt-40">
                    <a href="{{ url('/blogs') }}" class="primary_btn secondary_btn"><span>View All Blogs</span></a>
                </div>
            </div>
        </div>
    </section>
    @endif
  
</article>
@endsection
