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
                <a href="{{url('projects')}}">Projects</a>
            </li>
            <li>
                {{$project->title ?? 'Project Detail'}}
            </li>
        </ul>
        
    </div>
</section>



<section class="projects-details inner-padding position-relative">
    <div class="container-short">
        <div class="d-flex flex-wrap justify-content-between">
            <div class="projects-slider-container position-relative">
                <div class="slider">
                    @if($projectGalleryList->isNotEmpty())
                        @foreach($projectGalleryList as $gallery)
                            <picture>
                                <img src="{{asset($gallery->image_webp ?? $gallery->image)}}" width="495" height="477" {{$gallery->image_attribute}}>
                            </picture>
                        @endforeach
                    @else
                        <picture>
                            <img src="{{asset($project->webp_image ?? $project->image)}}" width="495" height="477" {{$project->image_attribute}}>
                        </picture>
                    @endif

                    <!-- <picture>
                        <img src="{{asset('web/images/project/project.jpg')}}" width="495" height="477" alt="">
                    </picture>
                    <picture>
                        <img src="{{asset('web/images/project/project.jpg')}}" width="495" height="477" alt="">
                    </picture> -->
                    
                </div>
                <div class="slick-nav d-flex">
                    <div class="projects-details-prev ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M10.5 5.25L6.75 9L10.5 12.75" stroke="#B5B7BD" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Prev
                    </div>
                    <div class="projects-details-next ">
                        Next
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M7.5 5.25L11.25 9L7.5 12.75" stroke="#B5B7BD" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="description list">
                <picture>
                    <img src="{{asset($project->logo_web_image ?? $project->logo_image)}}" width="150" height="86" {{$project->logo_image_attribute}}>
                </picture>
                <h2>{{$project->title ?? ''}}</h2>
                <div class="project-info" >
                    <div>
                        <img src="{{asset('web/images/project/flag.png')}}" width="18" height="18" alt="">
                        {{$project->location ?? ''}}
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.18525 15.7267C10.0478 14.944 10.8462 14.0933 11.5725 13.1827C13.1025 11.2605 14.0332 9.36525 14.0963 7.68C14.1212 6.9951 14.0078 6.31219 13.7629 5.67209C13.518 5.03198 13.1466 4.4478 12.6709 3.95444C12.1951 3.46109 11.6249 3.06868 10.9941 2.80065C10.3633 2.53263 9.68498 2.39449 8.99963 2.39449C8.31427 2.39449 7.63594 2.53263 7.00516 2.80065C6.37439 3.06868 5.8041 3.46109 5.32838 3.95444C4.85265 4.4478 4.48125 5.03198 4.23634 5.67209C3.99144 6.31219 3.87807 6.9951 3.903 7.68C3.96675 9.36525 4.89825 11.2605 6.4275 13.1827C7.15385 14.0933 7.95217 14.944 8.81475 15.7267C8.89775 15.8018 8.9595 15.8562 9 15.8903L9.18525 15.7267ZM8.4465 16.6005C8.4465 16.6005 3 12.0135 3 7.5C3 5.9087 3.63214 4.38258 4.75736 3.25736C5.88258 2.13214 7.4087 1.5 9 1.5C10.5913 1.5 12.1174 2.13214 13.2426 3.25736C14.3679 4.38258 15 5.9087 15 7.5C15 12.0135 9.5535 16.6005 9.5535 16.6005C9.2505 16.8795 8.75175 16.8765 8.4465 16.6005ZM9 9.6C9.55695 9.6 10.0911 9.37875 10.4849 8.98492C10.8788 8.5911 11.1 8.05695 11.1 7.5C11.1 6.94305 10.8788 6.4089 10.4849 6.01508C10.0911 5.62125 9.55695 5.4 9 5.4C8.44305 5.4 7.9089 5.62125 7.51508 6.01508C7.12125 6.4089 6.9 6.94305 6.9 7.5C6.9 8.05695 7.12125 8.5911 7.51508 8.98492C7.9089 9.37875 8.44305 9.6 9 9.6ZM9 10.5C8.20435 10.5 7.44129 10.1839 6.87868 9.62132C6.31607 9.05871 6 8.29565 6 7.5C6 6.70435 6.31607 5.94129 6.87868 5.37868C7.44129 4.81607 8.20435 4.5 9 4.5C9.79565 4.5 10.5587 4.81607 11.1213 5.37868C11.6839 5.94129 12 6.70435 12 7.5C12 8.29565 11.6839 9.05871 11.1213 9.62132C10.5587 10.1839 9.79565 10.5 9 10.5Z"
                                fill="#818DA6" />
                        </svg>
                        Location
                    </div>
                </div>
                        {!! $project->description ?? '' !!}
                <div class="heighlights d-flex flex-wrap">
                    <div>
                        <picture><img src="{{asset('web/images/project/icons/1.png')}}" widthg="32" height="32" alt=""></picture>
                        <div>
                            <span>Status</span>
                        <strong>
                            @if(empty($project->end_year) || $project->end_year >= now()->year - 1)
                                On Going
                            @else
                                Closed
                            @endif
                        </strong>
                        </div>
                    </div>
                    <div>
                        <picture><img src="{{asset('web/images/project/icons/2.png')}}" widthg="32" height="32" alt=""></picture>
                        <div>
                            <span>No of staff</span>
                        <strong>{{$project->staff_count}}</strong>
                        </div>
                    </div>
                    <div>
                        <picture><img src="{{asset('web/images/project/icons/3.png')}}" widthg="32" height="32" alt=""></picture>
                        <div>
                            <span>Start Date</span>
                        <strong>{{$project->start_year ?? ''}}</strong>
                        </div>
                    </div>
                    <div>
                        <picture><img src="{{asset('web/images/project/icons/4.png')}}" widthg="32" height="32" alt=""></picture>
                        <div>
                            <span>End Date</span>
                            @if(empty($project->end_year) || $project->end_year >= now()->year - 1)
                                <strong>Not Applicable</strong>
                            @else
                                <strong>Active</strong>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- ============Case Study Cards=============================== -->
        <div class="case-study  d-flex flex-wrap ">
            <div class="case-card">
                <picture>
                    <img src="{{asset('web/images/project/icons/a.png')}}" width="54" height="54" alt="">
                </picture>
                <div class="case-card-description">
                    <h3>Challenges Faced</h3>
                     {!! $project->challenges ?? '' !!}
                </div>
            </div>
            <div class="case-card">
                <picture>
                    <img src="{{asset('web/images/project/icons/b.png')}}" width="54" height="54" alt="">
                </picture>
                <div class="case-card-description">
                    <h3>Services Delivered</h3>
                    {!! $project->services_delivered ?? '' !!}
                </div>
            </div>
            <div class="case-card">
                <picture>
                    <img src="{{asset('web/images/project/icons/c.png')}}" width="54" height="54" alt="">
                </picture>
                <div class="case-card-description">
                    <h3>Approach</h3>
                    {!! $project->approach ?? '' !!}
                </div>
            </div>
            <div class="case-card">
                <picture>
                    <img src="{{asset('web/images/project/icons/d.png')}}" width="54" height="54" alt="">
                </picture>
                <div class="case-card-description">
                    <h3>Result Archieved</h3>
                    {!! $project->result_archieved ?? '' !!}
                
                </div>
            </div>
            <div class="case-card">
                <picture>
                    <img src="{{asset('web/images/project/icons/a.png')}}" width="54" height="54" alt="">
                </picture>
                <div class="case-card-description">
                    <h3>Conclusion</h3>
                    {!! $project->conclusion ?? '' !!}
                </div>
            </div>
        </div>
<!-- ============Case Study Cards End=============================== -->

    </div>
</section>

@if($relatedProjects->isNotEmpty())
    <section class="recent-projects header-section">
        <div class="container-short">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="col-left title">
                        <h2> <span>Recent projects</span></h2>

                    </div>
                    <div class="col-right">
                        <div class="slick-nav ">
                            <div class="recent-project-prev ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.07957 9.81452C7.18734 9.91494 7.27377 10.036 7.33372 10.1706C7.39368 10.3051 7.42591 10.4504 7.42851 10.5977C7.43111 10.7449 7.40402 10.8912 7.34885 11.0278C7.29368 11.1644 7.21157 11.2885 7.10741 11.3926C7.00326 11.4968 6.87919 11.5789 6.74261 11.6341C6.60603 11.6892 6.45973 11.7163 6.31246 11.7137C6.16518 11.7111 6.01993 11.6789 5.88538 11.6189C5.75083 11.559 5.62974 11.4725 5.52932 11.3648L0.776194 6.61164L-0.000393629 5.83652L0.774731 5.06139L5.52786 0.30827C5.73464 0.108365 6.01166 -0.00232558 6.29926 3.70587e-05C6.58686 0.00239969 6.86202 0.117627 7.06549 0.320902C7.26895 0.524176 7.38444 0.799233 7.38708 1.08683C7.38971 1.37443 7.27928 1.65155 7.07957 1.85852L4.19844 4.73965L19.3777 4.73965C19.6686 4.73965 19.9476 4.85521 20.1533 5.06091C20.359 5.26662 20.4746 5.54561 20.4746 5.83652C20.4746 6.12743 20.359 6.40642 20.1533 6.61213C19.9476 6.81783 19.6686 6.9334 19.3777 6.9334L4.19844 6.9334L7.07957 9.81452Z"
                                        fill="#596075" />
                                </svg>
                            </div>
                            <div class="recent-project-next ">

                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.395 1.89935C13.2873 1.79893 13.2008 1.67783 13.1409 1.54328C13.0809 1.40873 13.0487 1.26349 13.0461 1.11621C13.0435 0.968932 13.0706 0.82264 13.1258 0.68606C13.1809 0.54948 13.263 0.425411 13.3672 0.321254C13.4714 0.217096 13.5954 0.134984 13.732 0.0798171C13.8686 0.0246501 14.0149 -0.0024425 14.1622 0.000156044C14.3094 0.00275459 14.4547 0.034991 14.5892 0.0949418C14.7238 0.154893 14.8449 0.24133 14.9453 0.349097L19.6984 5.10222L20.475 5.87735L19.6999 6.65247L14.9468 11.4056C14.74 11.6055 14.463 11.7162 14.1754 11.7138C13.8878 11.7115 13.6126 11.5962 13.4091 11.393C13.2057 11.1897 13.0902 10.9146 13.0875 10.627C13.0849 10.3394 13.1953 10.0623 13.395 9.85535L16.2762 6.97422L1.09688 6.97422C0.805966 6.97422 0.526971 6.85866 0.321267 6.65295C0.115563 6.44725 0 6.16826 0 5.87735C0 5.58644 0.115563 5.30744 0.321267 5.10174C0.526971 4.89604 0.805966 4.78047 1.09688 4.78047L16.2762 4.78047L13.395 1.89935Z"
                                        fill="#596075" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="recent-project-slider">
                   @include('web.components._recent_projects', ['recentProjects' => $relatedProjects])
                </div>
        </div>
    </section>

@endif

@endsection