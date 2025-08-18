@extends('web.layouts.main')
@section('content')
<section class="bannerInner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>About Us</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="https://medicom-grp.com">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="aboutUsHome pb-0">
    <div class="shape">
        <img src="{{ asset('web/images/aboutShape-01.svg') }}" class="img-fluid" alt="">
    </div>
    <div class="topSection"></div>
    <div class="container position-relative">
        <div class="row ">
            <div class="col-lg-7 pe-lg-4">
                @if(@$about->sub_title != '' || @$about->sub_title != null)
                    <div class="title">
                        {!! @$about->sub_title !!}
                    </div>
                    @endif

                <h2 class="fw-bold">{{ @$about->title }}</h2>
                <div class="textWrapper mt-30">
                    @if(@$about->short_description != '' || @$about->short_description != null)
                    <p><b>{!! @$about->short_description !!}</b></p>
                    @endif
                    @if(@$about->description != '' || @$about->description != null)
                    {!! @$about->description !!}
                    @endif
                </div>
            </div>
            <div class="col-lg-5 d-flex align-items-center mt-lg-0 mt-5">
                <div class="imgWrapper">
                    {!! Helper::printImage($about,'image','image_webp','image_attribute','img-fluid') !!}
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-30 additionalContentAreaSection">
    <div class="container">
        <div class="textWrapper">
            <div class="row">
                <div class="col-12 additionalContentArea">
                    @if(@$about->alternate_description != '' || @$about->alternate_description != null)
                        {!! @$about->alternate_description !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@if($keyFeatures)
<section class="highlightSection aboutHighlightSection pb-100">
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
<section class="visionMission">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="cardBox">
                    <div class="imgBox">
                        <img src="{{ asset('web/images/icon/icon-01.png') }}" class="img-fluid w-100" alt="">
                    </div>
                    <div class="w-100">
                        <h4 class="fw-SemiBold">{{@$about->vision_title}}</h4>
                        <div class="textWrapper">
                            <p>{{@$about->vision_description}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-lg-0 mt-4">
                <div class="cardBox">
                    <div class="imgBox">
                        <img src="{{ asset('web/images/icon/icon-02.png') }}" class="img-fluid w-100" alt="">
                    </div>
                    <div class="w-100">
                        <h4 class="fw-SemiBold">{{@$about->mission_title}}</h4>
                        <div class="textWrapper">
                            <p>{{@$about->mission_description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="history">
    <div class="container mb-20">
        <div class="row">
            <div class="col-12 d-flex flex-column align-items-center">
                <div class="title">
                    About Us
                </div>
                <h2 class="fw-bold">History Of Success</h2>
            </div>
        </div>
    </div>
    <div class="w-100">
        @if (!$success_stories->isEmpty()) 
        @foreach($success_stories as $story)
        <div class="historyWrapper">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-5 historyInfo pe-lg-3">
                        <div class="w-100">
                            <h6>{{ $story->title }}</h6>
                            <h4>{{ $story->date }}</h4>
                            <div class="textWrapper mt-20">
                                <p>{{ $story->short_description }}</p>
                            </div>
                            <div class="awards">
                                @foreach($story->awards as $award)
                                    <div class="items">
                                        <div class="imgBox">
                                            <img src="{{ asset('web/images/history/award-01.png') }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="w-100">
                                            <h6>{{ $award->title }}</h6>
                                            <p>{{ $award->short_description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 mt-lg-0 mt-4 historyDetails">
                        <div class="textWrapper">
                            {!! $story->description !!}
                        </div>
                        <div class=" imgWrapper">

                            @if($story->image_1)
                            <div class="imgBoxArea">
                                {!! Helper::printImage($story,'image_1','image_1_webp','image_1_attribute','img-fluid',null,'475','370') !!}
                            </div>
                            @endif
                            @if($story->image_2)
                            <div class="imgBoxArea">
                                {!! Helper::printImage($story,'image_2','image_2_webp','image_2_attribute','img-fluid',null,'475','370') !!}
                            </div>
                            @endif
                            @if($story->image_3)
                            <div class="imgBoxArea">
                                {!! Helper::printImage($story,'image_3','image_3_webp','image_3_attribute','img-fluid',null,'475','370') !!}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="historyWrapper">
            <div class="container position-relative">
                <div class="row">
                    No History
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection

