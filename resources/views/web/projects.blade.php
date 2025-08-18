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
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path
                            d="M6 14.2496H12M10.0556 1.55964C12.7688 2.76377 14.8252 4.34589 15.8884 5.25977C16.4257 5.72177 16.7254 6.38664 16.7621 7.09427C16.8135 8.06589 16.875 9.58652 16.875 11.2496C16.875 12.5291 16.8386 13.7644 16.7985 14.7345C16.7779 15.2747 16.553 15.7868 16.1693 16.1676C15.7856 16.5483 15.2718 16.7693 14.7315 16.7858C13.434 16.8308 11.5084 16.8746 9 16.8746C6.49162 16.8746 4.56637 16.8304 3.2685 16.7861C2.72823 16.7696 2.21435 16.5487 1.83068 16.1679C1.44702 15.7872 1.22215 15.275 1.2015 14.7349C1.15252 13.5738 1.12702 12.4118 1.125 11.2496C1.125 9.58652 1.18687 8.06589 1.2375 7.09427C1.275 6.38664 1.57425 5.72177 2.11163 5.25977C3.17475 4.34552 5.23162 2.76377 7.94437 1.55964C8.27676 1.41214 8.63636 1.33594 9 1.33594C9.36364 1.33594 9.72324 1.41214 10.0556 1.55964Z"
                            stroke="white" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round" /> </svg>
                </a>
            </li>
            <li>
               Projects
            </li>
        </ul>
    </div>
</section>



@if($projects->isNotEmpty())
<section class=" project bg-white why-choose inner-padding position-relative">
    <div class="container-short">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div class="col-left title">
                <h2><span>Our</span>Projects</h2>
            </div>
         
        </div>
        <div class="d-flex flex-wrap project-row">
            @include('web.components._list_projects', ['projects' => $projects])
        </div>

    </div>
</section>
@endif
@endsection