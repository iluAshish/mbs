@if($projects->isNotEmpty())
    @foreach($projects as $project)
        <div class="project-card">
            <div class="project-image">
                <picture>
                <img src="{{asset($project->webp_image ?? $project->image)}}" width="380" height="220" {{$project->image_attribute}}>
            </picture>
                <div class="logo">
                    <picture>
                        <img src="{{asset($project->logo_web_image ?? $project->logo_image)}}" width="120" height="68 " {{$project->logo_image_attribute}}>
                    </picture>
                </div>
            </div>
            <div class="project-details">
                <h3>{{$project->title ?? ''}}</h3>
                <div class="country d-flex align-items-center">
                    <img src="{{asset('web/images/project/flag.png')}}" width="18" height="18" alt="MBS">
                    {{$project->location ?? ''}}
                </div>
                <div class="description">
                    <p>{{Str::limit(strip_tags($project->description), 50, '...')}}</p>
                </div>
                <a href="{{url('project-detail', ['short_url' => $project->short_url])}}" class="btn-theme  btnDark">Case Study</a>
            </div>
        </div>
    @endforeach

    <!-- load more projects -->
    <div class="appendHere_{{ $offset }}"></div>
    <div class="more-section-{{ $offset }}"></div>
    <input type="hidden" id="total" name="total" value="{{ $total }}">
    <input type="hidden" id="loading_offset" name="offset" value="{{ $offset }}">
    <input type="hidden" id="type" name="type" value="projects">


    <input type="hidden" id="loading_limit" name="loading_limit" value="{{ $loading_limit }}">
    @if ($total > $offset)
    <div class="row justify-content-center mt-3 more-section-{{ $offset }}" width="100%" style=" width: 100%; ">
        <div class="col-md-12 d-flex justify-content-center" style=" width: 250px; ">
        <!-- <a  class="btn commonBtn primary_btn enquiryBtn loadMoreBtn" width="150px"><span>Load More</span></a> -->
        <a role="button" class="load text-ceter w-100 d-flex justify-content-center loadMoreBtn">Load More</a>
        <input type="hidden" name="currentCount" id="currentCount" value="5">
        </div>
    </div>
    @endif
@endif
