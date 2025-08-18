@extends('web.layouts.main')
@section('content')

    @if(@$banner)
        @include('web.includes.banner',['type'=>'Testimonials'])
    @endif

    <section class="" id="testtmonialpageSection">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    @if(@$heading->sub_title != '' || @$heading->sub_title != null)
                        <span class="sub-head">{{ @$heading->sub_title }}</span>
                    @endif
                    <h2 class="section-title">{{ @$heading->title1 }}</h2>
                </div>
            </div>
            <!-- ---latest slider testimonial----  -->
            @if(@$textTestimonials->isNotEmpty())
                <div class="testimonial-box">
                    <div class="owl-carousel owl-theme">
                        @foreach($textTestimonials as $textTestimonial)
                            @include('web.includes.testimonial_card', ['testimonialData' => $textTestimonial])
                        @endforeach
                    </div>
                </div>
            @endif
            @if(@$videoTestimonials->isNotEmpty())
                <div class="row expand-card-row">
                    <!--style="background: url(assets/images/testimonial/video-test.png);"-->
                    @foreach($videoTestimonials as $videoTestimonial)
                        <div class="slide card p-0 slide-card ">
{{--                            <img src="{{asset($videoTestimonial->image) }}" class="card-img-top v-image"  alt="">--}}
                            {!! Helper::printImage($videoTestimonial, 'image', 'webp_image', 'image_attribute',
                                                           'card-img-top v-image') !!}
                            <a href="{{ @$videoTestimonial->video_url }}" class="youtube-icn popup-youtube"> <img
                                    src="{{ asset('web/images/icons/testimonial-playbtn.svg') }}" class="icon-tes-yoy"
                                    alt=""></a>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="container">
                <div class="row">
                    @include('web.includes._testimonial_list')
                </div>
            </div>
        </div>
    </section>
@endsection
