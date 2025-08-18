
@extends('web.layouts.main')
@section('content')
@php
    use App\Models\PortfolioGallery;
@endphp
@if(@$banner->image != '')
<section class="bread-nav-wrapper">
    <div class="container-ctn">
        <div class="row align-items-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                @if (@$banner->title)
                    <div class="big-title">{!! $banner->title ?? '' !!}</div>
                @else
                    <div class="big-title">Gallery</div>
                @endif

                <ul class="list-inline bread-nav-action">
                    <li class="list-inline-item">
                        <a href="{{ url('/') }}" class="text-decoration-none">Home</a>
                    </li>
                    <li class="list-inline-item">/</li>
                    <li class="list-inline-item">
                        <a href="{{ url('/portfolio') }}" class="active text-decoration-none">Gallery</a>
                    </li>
                </ul>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 d-flex justify-content-end">
                <div class="brid-right">
                    {!! Helper::printImage($banner, 'image', 'image_webp', 'image_attribute', 'img-fluid') !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(@$banner->image == '')
    <section class="bread-crumb-only bread-nav-wrapper">
        <div class="container-ctn">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <ul class="list-inline bread-nav-action">
                        <li class="list-inline-item">
                            <a href="{{url('/')}}" class="text-decoration-none">Home</a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            <a href="{{url('/portfolio')}}" class="active text-decoration-none">Gallery</a>
                        </li>
                    </ul>
                </div>
              
            </div>
        </div>
    </section>
@endif

<section class="portfolio-wrapper">
    <div class="container-ctn">
        <div class="blogs-title text-center">
            <p class="small-title">
                GALLERY
            </p>
            <h1 class="big-title">Our Gallery</h1>
        </div>
    </div>
    <div class="container-ctn">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            
            @if(@$portfolios)
                @php $count  = 1; @endphp
                @foreach(@$portfolios as $key => $portfolio)
                    <li class="nav-item" role="presentation">
                        <button onclick="scrollToLeft()" class="btn @if ($loop->first) active @endif" id="cat-{{$count}}-tab" data-bs-toggle="pill" data-bs-target="#cat-{{$count}}" type="button" role="tab" aria-controls="cat-{{$count}}" aria-selected="false">{{$portfolio->title}}</button>
                    </li>
                    @php $count++; @endphp
                @endforeach
            @endif
            <li class="nav-item" role="presentation">
                <button onclick="scrollToLeft()" class="btn" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            @if(@$portfolios)
               
                @php $count  = 1; @endphp
                @foreach(@$portfolios as $portfolio)
                <div class="tab-pane fade @if ($loop->first) show active @endif" id="cat-{{$count}}" role="tabpanel" aria-labelledby="cat-{{$count}}-tab">
                    <div class="row">
                        @php
                            if($portfolio->id){
                                $portfolioGalleryList = PortfolioGallery::active()->orderBy('sort_order')->where('portfolio_id', $portfolio->id)->take(8)->get();
                                $totalportfolioGallerys = PortfolioGallery::active()->where('portfolio_id', $portfolio->id)->count();
                                $offset = $portfolioGalleryList->count();
                                $loading_limit = 8;
                            }
                        @endphp
                        @foreach(@$portfolioGalleryList as $gallery)
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                            <a href="@if($gallery->video_url) {{$gallery->video_url}} @else {!! $gallery->image_webp !!} @endif" class="text-decoration-none" data-fancybox="gallery">
                                <div class="portfolio-img">
                                    {!! Helper::printImage($gallery, 'image', 'image_webp', 'image_attribute', 'img-fluid') !!}
                                    @if($gallery->video_url)
                                    <div class="video-wrap">
                                        <div class="play-btn" data-bs-toggle="modal" data-bs-target="#vidModal">
                                            <img src="{{ asset('web/images/icons/play-btn.svg')}}" alt="" />
                                        </div>
                                    </div>
                                    @endif
                                      @if($gallery->title)
                                       <h2>{{$gallery->title}}</h2>
                                     @endif

                                </div>
                            </a>
                        </div>
                        @endforeach
                    <div class="appendHere_{{$portfolio->id}}_{{ $offset }}"></div>
                    </div>
                <input type="hidden" class="totalPortfolio_{{$portfolio->id}}" name="totalPortfolio" value="{{$totalportfolioGallerys}}">
                <input type="hidden" class="portfolio_loading_offset_{{$portfolio->id}}" name="portfolio_loading_offset" value="{{$offset}}">
                <input type="hidden" class="portfolio_loading_limit_{{$portfolio->id}}" name="portfolio_loading_limit" value="{{$loading_limit}}">
                <input type="hidden" class="portfolio_id" name="portfolio_id" value="{{$portfolio->id}}">
                @if($totalportfolioGallerys>$offset)
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center more-section-{{$portfolio->id}}-{{$offset}}">
                            <div class="primaryBtn" id="btnposition">
                                <div id="slide"></div>
                                <a  class="text-decoration-none load-more-portfolio-button" data-id="{{$portfolio->id}}"> Load More</a>
                            </div>
                        </div>
                    </div>
                @endif
                    

                </div>
                @php $count++; @endphp
                @endforeach
                 <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="row">
                                 
                        @php
                        $portfolioGalleryList = PortfolioGallery::active()->orderBy('sort_order')->take(8)->get();
                        $totalportfolioGallerys = PortfolioGallery::active()->count();
                        $offset = $portfolioGalleryList->count();
                        $loading_limit = 8;
                                
                        @endphp
                        @foreach(@$portfolioGalleryList as $gallery)
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                            <a href="@if($gallery->video_url) {{$gallery->video_url}} @else {!! $gallery->image_webp !!} @endif" class="text-decoration-none" data-fancybox="gallery">
                                <div class="portfolio-img">
                                    {!! Helper::printImage($gallery, 'image', 'image_webp', 'image_attribute', 'img-fluid') !!}
                                    @if($gallery->video_url)
                                    <div class="video-wrap">
                                        <div class="play-btn" data-bs-toggle="modal" data-bs-target="#vidModal">
                                            <img src="{{ asset('web/images/icons/play-btn.svg')}}" alt="" />
                                        </div>
                                    </div>
                                    @endif
                                    @if($gallery->title)
                                       <h2>{{$gallery->title}}</h2>
                                     @endif
                                </div>
                            </a>
                        </div>
                        @endforeach
                        
                    <div class="appendHere_0_{{ $offset }}"></div>
                    <input type="hidden" class="totalPortfolio_0" name="totalPortfolio" value="{{$totalportfolioGallerys}}">
                    <input type="hidden" class="portfolio_loading_offset_0" name="portfolio_loading_offset" value="{{$offset}}">
                    <input type="hidden" class="portfolio_loading_limit_0" name="portfolio_loading_limit" value="{{$loading_limit}}">
                    </div>
                    @if($totalportfolioGallerys>$offset)
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center more-section-0-{{$offset}}">
                                <div class="primaryBtn" id="btnposition">
                                    <div id="slide"></div>
                                    <a  class="text-decoration-none load-more-portfolio-button" data-id="0"> Load More</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
