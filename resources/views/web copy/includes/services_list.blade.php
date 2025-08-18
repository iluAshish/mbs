@foreach ($services as $service)
    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
        <a href="{{ url('/') }}/service/{!! $service->short_url !!}">
            <div class="service-box">
                {{-- <img src="web/images/service-1.png" class="img-fluid" width="521" height="461" alt="service slider" /> --}}
                {!! Helper::printImage($service, 'image', 'image_webp', 'image_attribute', 'img-fluid') !!}
                <div class="slider-content">
                    @if (@$service->title != '')
                        <h2>{!! $service->title !!}</h2>
                    @endif
                    <div class="discription">
                        @if (@$service->short_description != '')
                            <p>{!! $service->short_description !!}</p>
                        @endif
                    </div>
                    <div class="read-more">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                fill="none">
                                <g clip-path="url(#clip0_13_136)">
                                    <path
                                        d="M23.75 0H6.25C2.80375 0 0 2.80375 0 6.25V23.75C0 27.1963 2.80375 30 6.25 30H23.75C27.1963 30 30 27.1963 30 23.75V6.25C30 2.80375 27.1963 0 23.75 0ZM20 16.25H16.25V20C16.25 20.6912 15.69 21.25 15 21.25C14.31 21.25 13.75 20.6912 13.75 20V16.25H10C9.31 16.25 8.75 15.6912 8.75 15C8.75 14.3088 9.31 13.75 10 13.75H13.75V10C13.75 9.30875 14.31 8.75 15 8.75C15.69 8.75 16.25 9.30875 16.25 10V13.75H20C20.69 13.75 21.25 14.3088 21.25 15C21.25 15.6912 20.69 16.25 20 16.25Z"
                                        fill="#E9651B" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_13_136">
                                        <rect width="30" height="30" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                        <span class="action-title">Read More</span>
                    </div>
                </div>
            </div>
        </a>
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
