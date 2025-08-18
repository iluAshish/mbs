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
                    alt="MBS Brands">
            </picture>
        </div>
    </div>
    <div class="container-short">
        <ul class="breadcrumb d-flex align-items-center">
            <li>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path
                            d="M6 14.2496H12M10.0556 1.55964C12.7688 2.76377 14.8252 4.34589 15.8884 5.25977C16.4257 5.72177 16.7254 6.38664 16.7621 7.09427C16.8135 8.06589 16.875 9.58652 16.875 11.2496C16.875 12.5291 16.8386 13.7644 16.7985 14.7345C16.7779 15.2747 16.553 15.7868 16.1693 16.1676C15.7856 16.5483 15.2718 16.7693 14.7315 16.7858C13.434 16.8308 11.5084 16.8746 9 16.8746C6.49162 16.8746 4.56637 16.8304 3.2685 16.7861C2.72823 16.7696 2.21435 16.5487 1.83068 16.1679C1.44702 15.7872 1.22215 15.275 1.2015 14.7349C1.15252 13.5738 1.12702 12.4118 1.125 11.2496C1.125 9.58652 1.18687 8.06589 1.2375 7.09427C1.275 6.38664 1.57425 5.72177 2.11163 5.25977C3.17475 4.34552 5.23162 2.76377 7.94437 1.55964C8.27676 1.41214 8.63636 1.33594 9 1.33594C9.36364 1.33594 9.72324 1.41214 10.0556 1.55964Z"
                            stroke="white" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round" /> </svg>
                </a>
            </li>
            <li>
                Brands
            </li>
        </ul>
    </div>
</section>



@if($brands->isNotEmpty())
<section class="brandPartner bg-white why-choose inner-padding position-relative">
    <div class="container-short">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div class="col-left title">
                <h2><span>Brand to deal</span>Exclusive Partners</h2>
            </div>
            <div class="col-right">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text</p>
            </div>
        </div>
        <div class="d-flex flex-wrap brandPartner-row">
            @foreach($brands as $brand)
            <div class="brandPartner-card">
                <picture>
                    <img src="{{asset($brand->image_webp ?? $brand->image)}}" width="168" height="85" class="w-100 h-auto" {{$brand->image_attribute ?? ''}}>
                </picture>
                <a href="{{route('brands.brand_detail',['short_url' => $brand->short_url])}}" class="btn product-btn"> View More <i><svg xmlns="http://www.w3.org/2000/svg" width="12" height="7" viewBox="0 0 12 7" fill="none"> <path fill-rule="evenodd" clip-rule="evenodd" d="M7.46955 5.71834C7.41152 5.77241 7.36498 5.83761 7.3327 5.91006C7.30042 5.98251 7.28306 6.06072 7.28166 6.14002C7.28026 6.21933 7.29485 6.2981 7.32455 6.37164C7.35426 6.44519 7.39847 6.51199 7.45456 6.56808C7.51064 6.62416 7.57745 6.66838 7.65099 6.69808C7.72453 6.72779 7.80331 6.74238 7.88261 6.74098C7.96191 6.73958 8.04012 6.72222 8.11257 6.68994C8.18502 6.65766 8.25023 6.61111 8.3043 6.55309L10.8637 3.99371L11.2818 3.57634L10.8645 3.15896L8.30509 0.599585C8.19374 0.491944 8.04458 0.432342 7.88972 0.433614C7.73486 0.434886 7.58669 0.496932 7.47713 0.606387C7.36757 0.715843 7.30539 0.86395 7.30397 1.01881C7.30255 1.17367 7.36201 1.32289 7.46955 1.43434L9.02092 2.98571L0.847461 2.98571C0.690817 2.98571 0.54059 3.04794 0.429826 3.1587C0.319062 3.26946 0.256836 3.41969 0.256836 3.57634C0.256836 3.73298 0.319062 3.88321 0.429826 3.99397C0.54059 4.10473 0.690817 4.16696 0.847461 4.16696H9.02092L7.46955 5.71834Z" fill="white"></path> </svg></i> </a>
            </div>

            @endforeach
            

        </div>
    </div>
</section>
@endif



@endsection