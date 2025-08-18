@extends('web.layouts.main')
@section('content')
@if(@$banner)
        @include('web.includes.banner',['type'=>'Services'])
@endif
<section class="medicomScientific">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @foreach ($services as $service)
                <div id="{{ $service->id }}" class="medicomScientificWrapper">
                    <div class="row position-relative">
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="infoWrap">
                                {!! Helper::printImage($service,'alternate_image','alternate_image_webp','alternate_image_attribute','img-fluid') !!}
                                @if (@$service->title != '')
                                        <h4>{!! $service->title !!}</h4>
                                    @endif
                                <div class="textWrapper">
                                    @if (@$service->short_description != '')
                                        <p>{!! $service->short_description !!}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            {!! Helper::printImage($service, 'image', 'image_webp', 'image_attribute', 'img-fluid w-100') !!}
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="appendHere_{{ $offset }}"></div>
                <input type="hidden" id="totalBlog" name="total_blog" value="{{ $totalServices }}">
                <input type="hidden" id="blog_loading_offset" name="blog_loading_offset" value="{{ $offset }}">
                <input type="hidden" id="blog_loading_limit" name="blog_loading_limit" value="{{ $loading_limit }}">
                @if ($totalServices > $offset)
                    <div class="row py-3 more-section-{{ $offset }}">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="primaryBtn load-more-services-button" id="btnposition">
                                <div id="slide"></div>
                                <a href="#" class="text-decoration-none"> Load MORE</a>
                            </div>
                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
