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
        <div class="col-12 d-flex justify-content-center">
            <div class="primaryBtn blog-load" id="btnposition">
                <div id="slide"></div>
                <a href="#" class="text-decoration-none"> Load MORE</a>
            </div>
        </div>
    </div>
@endif
