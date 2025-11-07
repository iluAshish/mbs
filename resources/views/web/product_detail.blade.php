
@extends('web.layouts.main')
@section('content')

<picture>
    <img src="{{asset('web/images/inner/bg.webp')}}" alt="">
</picture>
<section class="banner inner-banner position-relative">

    <div class="container-ctn position-relative">

        <div class="banner-image-slider " id="fadeSection">
            <picture>
                <img src="{{asset('web/images/inner/inner.webp')}}" class="img-fluid w-100" width="1366" height="335"
                    alt="MBS">
            </picture>
        </div>
    </div>
    <div class="container-short">
        <ul class="breadcrumb d-flex align-items-center">
            <li>
                <a href="{{url('/')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path
                            d="M6 14.2496H12M10.0556 1.55964C12.7688 2.76377 14.8252 4.34589 15.8884 5.25977C16.4257 5.72177 16.7254 6.38664 16.7621 7.09427C16.8135 8.06589 16.875 9.58652 16.875 11.2496C16.875 12.5291 16.8386 13.7644 16.7985 14.7345C16.7779 15.2747 16.553 15.7868 16.1693 16.1676C15.7856 16.5483 15.2718 16.7693 14.7315 16.7858C13.434 16.8308 11.5084 16.8746 9 16.8746C6.49162 16.8746 4.56637 16.8304 3.2685 16.7861C2.72823 16.7696 2.21435 16.5487 1.83068 16.1679C1.44702 15.7872 1.22215 15.275 1.2015 14.7349C1.15252 13.5738 1.12702 12.4118 1.125 11.2496C1.125 9.58652 1.18687 8.06589 1.2375 7.09427C1.275 6.38664 1.57425 5.72177 2.11163 5.25977C3.17475 4.34552 5.23162 2.76377 7.94437 1.55964C8.27676 1.41214 8.63636 1.33594 9 1.33594C9.36364 1.33594 9.72324 1.41214 10.0556 1.55964Z"
                            stroke="white" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round" /> </svg>
                </a>
            </li>
            <li>
                {{ $product->title ?? '' }}
            </li>
        </ul>
    </div>
</section>


<section class=" inner-padding product-detail-intro position-relative">
    <div class="container-short">

        <div class="product-detail d-flex flex-wrap justify-content-between">
            @if($productGalleryList->isNotEmpty() || $product->thumbnail_image_webp || $product->thumbnail_image)
                <div class="gallery">
                    {{-- Main Slider --}}
                    <div class="product-slider-for">
                        {{-- Add thumbnail first (if exists) --}}
                        @if($product->thumbnail_image_webp || $product->thumbnail_image)
                            <div>
                                <img src="{{ asset($product->thumbnail_image_webp ?? $product->thumbnail_image) }}"
                                    width="560" height="357" alt="Product Thumbnail">
                            </div>
                        @endif

                        {{-- Add gallery images --}}
                        @foreach($productGalleryList as $gallery)
                            <div>
                                <img src="{{ asset($gallery->image_webp ?? $gallery->image) }}"
                                    width="560" height="357"
                                    {!! $gallery->image_attribute !!}>
                            </div>
                        @endforeach
                    </div>

                    {{-- Thumbnail Nav Slider --}}
                    <div class="product-slider-nav">
                        {{-- Add thumbnail first (if exists) --}}
                        @if($product->thumbnail_image_webp || $product->thumbnail_image)
                            <div>
                                <img src="{{ asset($product->thumbnail_image_webp ?? $product->thumbnail_image) }}"
                                    width="100" height="70" alt="Product Thumbnail">
                            </div>
                        @endif

                        {{-- Add gallery thumbnails --}}
                        @foreach($productGalleryList as $gallery)
                            <div>
                                <img src="{{ asset($gallery->image_webp ?? $gallery->image) }}"
                                    width="100" height="70"
                                    {!! $gallery->image_attribute !!}>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif



            <div class="content list d-flex flex-wrap">
                <div>
                    <h1 class="h2">{{$product->title ?? ''}}</h1>
                    <div class="meta d-flex align-items-center">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                fill="none">
                                <path
                                    d="M13.584 7.16797C15.1028 7.16797 16.334 5.93675 16.334 4.41797C16.334 2.89919 15.1028 1.66797 13.584 1.66797C12.0652 1.66797 10.834 2.89919 10.834 4.41797C10.834 5.93675 12.0652 7.16797 13.584 7.16797Z"
                                    stroke="#596075" stroke-width="1.375" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M4.41699 16.3359C5.93578 16.3359 7.16699 15.1047 7.16699 13.5859C7.16699 12.0672 5.93578 10.8359 4.41699 10.8359C2.89821 10.8359 1.66699 12.0672 1.66699 13.5859C1.66699 15.1047 2.89821 16.3359 4.41699 16.3359Z"
                                    stroke="#596075" stroke-width="1.375" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M10.8337 10.8346H16.3337V15.418C16.3337 15.6611 16.2371 15.8942 16.0652 16.0662C15.8933 16.2381 15.6601 16.3346 15.417 16.3346H11.7503C11.5072 16.3346 11.2741 16.2381 11.1021 16.0662C10.9302 15.8942 10.8337 15.6611 10.8337 15.418V10.8346ZM1.66699 1.66797H7.16699V6.2513C7.16699 6.49442 7.07042 6.72757 6.89851 6.89948C6.7266 7.07139 6.49344 7.16797 6.25033 7.16797H2.58366C2.34054 7.16797 2.10739 7.07139 1.93548 6.89948C1.76357 6.72757 1.66699 6.49442 1.66699 6.2513V1.66797Z"
                                    stroke="#596075" stroke-width="1.375" stroke-linecap="round"
                                    stroke-linejoin="round" /> </svg>
                            {{ $product->category->title ?? '' }}
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                                fill="none">
                                <path
                                    d="M2.74967 7.33333H19.2497C19.7997 7.33333 20.1663 6.96667 20.1663 6.41667C20.1663 5.86667 19.7997 5.5 19.2497 5.5H2.74967C2.19967 5.5 1.83301 5.86667 1.83301 6.41667C1.83301 6.96667 2.19967 7.33333 2.74967 7.33333ZM11.9163 14.6667H2.74967C2.19967 14.6667 1.83301 15.0333 1.83301 15.5833C1.83301 16.1333 2.19967 16.5 2.74967 16.5H11.9163C12.4663 16.5 12.833 16.1333 12.833 15.5833C12.833 15.0333 12.4663 14.6667 11.9163 14.6667ZM19.2497 10.0833H2.74967C2.19967 10.0833 1.83301 10.45 1.83301 11C1.83301 11.55 2.19967 11.9167 2.74967 11.9167H19.2497C19.7997 11.9167 20.1663 11.55 20.1663 11C20.1663 10.45 19.7997 10.0833 19.2497 10.0833Z"
                                    fill="#596075" /> </svg>
                            
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                                fill="none">
                                <path
                                    d="M11 13.2688L12.7417 14.3229C12.9097 14.4299 13.0778 14.4262 13.2458 14.3119C13.4139 14.1976 13.475 14.0409 13.4292 13.8417L12.9708 11.8479L14.5292 10.4958C14.6819 10.3583 14.7278 10.1943 14.6667 10.0036C14.6056 9.81292 14.4681 9.70964 14.2542 9.69375L12.2146 9.53333L11.4125 7.65417C11.3361 7.47083 11.1986 7.37917 11 7.37917C10.8014 7.37917 10.6639 7.47083 10.5875 7.65417L9.78542 9.53333L7.74583 9.69375C7.53194 9.70903 7.39444 9.81231 7.33333 10.0036C7.27222 10.1949 7.31806 10.3589 7.47083 10.4958L9.02917 11.8479L8.57083 13.8417C8.525 14.0403 8.58611 14.197 8.75417 14.3119C8.92222 14.4268 9.09028 14.4305 9.25833 14.3229L11 13.2688ZM7.92917 18.3333H5.5C4.99583 18.3333 4.56439 18.154 4.20567 17.7953C3.84694 17.4365 3.66728 17.0048 3.66667 16.5V14.0708L1.90208 12.2833C1.73403 12.1 1.60417 11.8977 1.5125 11.6765C1.42083 11.4553 1.375 11.2298 1.375 11C1.375 10.7702 1.42083 10.545 1.5125 10.3244C1.60417 10.1038 1.73403 9.90122 1.90208 9.71667L3.66667 7.92917V5.5C3.66667 4.99583 3.84633 4.56439 4.20567 4.20567C4.565 3.84694 4.99644 3.66728 5.5 3.66667H7.92917L9.71667 1.90208C9.9 1.73403 10.1026 1.60417 10.3244 1.5125C10.5462 1.42083 10.7714 1.375 11 1.375C11.2286 1.375 11.4541 1.42083 11.6765 1.5125C11.8989 1.60417 12.1012 1.73403 12.2833 1.90208L14.0708 3.66667H16.5C17.0042 3.66667 17.4359 3.84633 17.7953 4.20567C18.1546 4.565 18.3339 4.99644 18.3333 5.5V7.92917L20.0979 9.71667C20.266 9.9 20.3958 10.1026 20.4875 10.3244C20.5792 10.5462 20.625 10.7714 20.625 11C20.625 11.2286 20.5792 11.4541 20.4875 11.6765C20.3958 11.8989 20.266 12.1012 20.0979 12.2833L18.3333 14.0708V16.5C18.3333 17.0042 18.154 17.4359 17.7953 17.7953C17.4365 18.1546 17.0048 18.3339 16.5 18.3333H14.0708L12.2833 20.0979C12.1 20.266 11.8977 20.3958 11.6765 20.4875C11.4553 20.5792 11.2298 20.625 11 20.625C10.7702 20.625 10.545 20.5792 10.3244 20.4875C10.1038 20.3958 9.90122 20.266 9.71667 20.0979L7.92917 18.3333ZM8.70833 16.5L11 18.7917L13.2917 16.5H16.5V13.2917L18.7917 11L16.5 8.70833V5.5H13.2917L11 3.20833L8.70833 5.5H5.5V8.70833L3.20833 11L5.5 13.2917V16.5H8.70833Z"
                                    fill="#596075" /> </svg>
                            {{ $product->brand->title ?? '' }}
                        </span>
                    </div>
                   {!! $product->description ?? '' !!}
                </div>
                <div class="btn-group">
                    <a href="#ProductEnquiryForm" class="btn-theme btnDark" data-bs-toggle="modal" href="#enquiryForm" role="button" >Quick Enquiry</a>
                    <a href="{{ asset($product->brochure_link ?? '') }}" class="btn-theme btnBorder" download>
                        Download Brochure
                    </a>
                </div>
                 </div>
    </div>
    </div>
    

    <div class="container-short product-main-description">
            <!-- Nav tabs -->
        <ul class="nav nav-tabs " id="productTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active " 
                    id="key-tab" data-bs-toggle="tab" data-bs-target="#key" type="button" role="tab">
            Key Features
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link " 
                    id="video-tab" data-bs-toggle="tab" data-bs-target="#video" type="button" role="tab">
            Product Video
            </button>
        </li>
        </ul>

        <!-- Tab content -->
        <div class="tab-content ">
        <div class="tab-pane fade show active list" id="key" role="tabpanel">
                <div class="tab-container">
                    {!! $product->key_features ?? '' !!}
                </div>
        
        </div>
        <div class="tab-pane fade list" id="video" role="tabpanel">
            <div id="playerWrapper" class="position-relative yt-video">
    <iframe
      id="ytPlayer"
      width="560"
      height="315"
      src="https://www.youtube.com/embed/vrssjWvQMEc?enablejsapi=1"
      frameborder="0"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      allowfullscreen>
    </iframe>
  <div id="controls" class="controls">
      <button id="playBtn">
        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="36" viewBox="0 0 33 36" fill="none"> <path fill-rule="evenodd" clip-rule="evenodd" d="M0.825001 2.7008C0.881264 2.22776 1.0471 1.77436 1.30934 1.37666C1.57157 0.978961 1.92297 0.647918 2.33559 0.409851C2.74821 0.171784 3.21068 0.0332571 3.68624 0.00528466C4.16179 -0.0226878 4.63731 0.0606648 5.075 0.248716C7.2875 1.19455 12.2458 3.44247 18.5375 7.07372C24.8312 10.707 29.2583 13.88 31.1812 15.3195C32.8229 16.5508 32.8271 18.9925 31.1833 20.2279C29.2792 21.6591 24.9062 24.7904 18.5375 28.4695C12.1625 32.1487 7.2625 34.3696 5.07083 35.3029C3.18333 36.1091 1.07083 34.8862 0.825001 32.8508C0.537501 30.4716 0 25.0695 0 17.7737C0 10.482 0.535417 5.08205 0.825001 2.7008Z" fill="#2E3192"/> </svg>
      </button>
      <button id="pauseBtn" style="display:none;">
        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none"> <path d="M0 8.33333C0 4.40417 -1.24176e-07 2.44167 1.22083 1.22083C2.44167 -1.24176e-07 4.40417 0 8.33333 0C12.2625 0 14.225 -1.24176e-07 15.4458 1.22083C16.6667 2.44167 16.6667 4.40417 16.6667 8.33333V33.3333C16.6667 37.2625 16.6667 39.225 15.4458 40.4458C14.225 41.6667 12.2625 41.6667 8.33333 41.6667C4.40417 41.6667 2.44167 41.6667 1.22083 40.4458C-1.24176e-07 39.225 0 37.2625 0 33.3333V8.33333Z" fill="#2E3192"/> <path opacity="0.5" d="M25 8.33333C25 4.40417 25 2.44167 26.2208 1.22083C27.4417 -1.24176e-07 29.4042 0 33.3333 0C37.2625 0 39.225 -1.24176e-07 40.4458 1.22083C41.6667 2.44167 41.6667 4.40417 41.6667 8.33333V33.3333C41.6667 37.2625 41.6667 39.225 40.4458 40.4458C39.225 41.6667 37.2625 41.6667 33.3333 41.6667C29.4042 41.6667 27.4417 41.6667 26.2208 40.4458C25 39.225 25 37.2625 25 33.3333V8.33333Z" fill="#2E3192"/> </svg>
      </button>
    </div>
    </div>



  <script>
    const iframe = document.getElementById('ytPlayer');
    const playBtn = document.getElementById('playBtn');
    const pauseBtn = document.getElementById('pauseBtn');

    function sendCommand(funcName) {
      iframe.contentWindow.postMessage(JSON.stringify({
        event: 'command',
        func: funcName,
        args: []
      }), '*');
    }

    playBtn.addEventListener('click', () => {
      sendCommand('playVideo');
      playBtn.style.display = 'none';
      pauseBtn.style.display = 'inline-block';
    });

    pauseBtn.addEventListener('click', () => {
      sendCommand('pauseVideo');
      pauseBtn.style.display = 'none';
      playBtn.style.display = 'inline-block';
    });

    window.addEventListener('message', (event) => {
      try {
        const data = JSON.parse(event.data);

        if (data.event === 'onStateChange') {
          if (data.info === 1) { 
            pauseBtn.style.display = 'none';
            playBtn.style.display = 'inline-block';
          } else if (data.info === 2 || data.info === 0) { 
            playBtn.style.display = 'none';
            pauseBtn.style.display = 'inline-block';
          }
        }
      } catch (e) {
      }
    });
  </script>
        </div>
        </div>

    </div>
</section>
@if($brandsList->isNotEmpty())
<section class="brands">
    <div class="container-short">
        <h2>Brands</h2>
        <div class="brands-slider">
            @foreach($brandsList as $brand)
            <picture>
                <img src="{{asset($brand->featured_image_webp ?? $brand->featured_image)}}" width="168" height="85" class="w-100" {{$brand->featured_image_attribute}}>
            </picture>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($relatedProducts->isNotEmpty())
<section class="other-products commonPadding pb-0">
    <div class="container-short">
        <h2>Other Products</h2>
        <div class="other-products-slider">
                @include('web.components._list_our_product', ['ourProducts'=> $relatedProducts])
        </div>
    </div>
</section>
@endif
@endsection
