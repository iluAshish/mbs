@extends('web.layouts.main')
@section('content')
@if($type=='news-events')
    <section class="bannerInner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>News Events</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">News Events</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@else
    <section class="bannerInner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Blogs</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endif
<section class="newsBLogList">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 mt-4">
                    <div class="latestNewsCard">
                        <div class="imgBox">
                            {!! Helper::printImage($blog,'image','image_webp','image_attribute','img-fluid w-100') !!}
                            <img src="assets/images/news/news-01.jpg" class="img-fluid w-100" alt="">
                        </div>
                        <div class="blogDetails">
                            @if (@$blog->title != '')
                                            <h6>{!! $blog->title !!}</h6>
                                        @endif

                            <a href="{{ url('/') }}/{{@$type}}/{!! $blog->short_url !!}" class="moreBtn mt-auto">
                                Read More
                                <img src="assets/images/svg/moreIcon.svg" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            <div class="appendHere_{{ $offset }}"></div>
            <div class="more-section-{{ $offset }}"></div>
            <input type="hidden" id="totalBlog" name="total_blog" value="{{ $totalBlog }}">
            <input type="hidden" id="blog_loading_offset" name="offset" value="{{ $offset }}">
            <input type="hidden" id="blog_type" name="type" value="{{@$type}}">
            <input type="hidden" id="blog_loading_limit" name="loading_limit" value="{{ $loading_limit }}">
            @if ($totalBlog > $offset)
                <div class="row py-3 more-section-{{ $offset }}">
                    <div class="col-lg-12 d-flex justify-content-center mt-5">
                        <div class="primaryBtn blog-load" id="btnposition">
                            <div id="slide"></div>
                            <a href="#" class="primary_btn secondary_btn"> Load MORE</a>
                        </div>
                    </div>
                </div>
            @endif
            
        </div>
    </div>
</section>



@endsection
