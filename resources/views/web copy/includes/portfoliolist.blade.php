@if(@$portfolios)
    @foreach(@$portfolios as $portfolio)
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
            <a href="@if($portfolio->video_url) {{$portfolio->video_url}} @else {!! $portfolio->image_webp !!} @endif" class="text-decoration-none" data-fancybox="gallery">
                <div class="portfolio-img">
                    {!! Helper::printImage($portfolio, 'image', 'image_webp', 'image_attribute', 'img-fluid') !!}
                    @if($portfolio->video_url)
                    <div class="video-wrap">
                        <div class="play-btn" data-bs-toggle="modal" data-bs-target="#vidModal">
                            <img src="{{ asset('web/images/icons/play-btn.svg')}}" alt="" />
                        </div>
                    </div>
                    @endif
                    @if($portfolio->title)
                       <h2>{{$portfolio->title}}</h2>
                     @endif
                </div>
            </a>
        </div>
    @endforeach
@endif

<div class="appendHere_{{$portfolio_id}}_{{ $offset }}"></div>

<input type="hidden" class="totalPortfolio_{{$portfolio_id}}" name="total_project" value="{{ $totalportfolio }}">
<input type="hidden" class="portfolio_loading_offset_{{$portfolio_id}}" name="offset" value="{{ $offset }}">
<input type="hidden" class="portfolio_loading_limit_{{$portfolio_id}}" name="loading_limit" value="{{ $loading_limit }}">

@if($totalportfolio>$offset)

                       <div class="col-12 d-flex justify-content-center more-section-{{$portfolio_id}}-{{$offset}}">

                           
                            <div class="primaryBtn" id="btnposition">
                                <div id="slide"></div>
                                <a  class="text-decoration-none load-more-portfolio-button" data-id="{{$portfolio_id}}"> > Load More</a>
                            </div>
                        </div>
                    </div>
@endif

 