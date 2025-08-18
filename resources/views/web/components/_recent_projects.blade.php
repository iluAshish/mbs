@if($recentProjects->isNotEmpty())

@foreach($recentProjects as $project)
    <div class="recent-project-item">
        <picture>
            <img src="{{asset($project->webp_image ?? $project->image)}}" width="413" height="176" {{$project->image_attribute}}>
        </picture>
        <div class="project-details">
            <h3>{{$project->title ?? ''}}</h3>
            <div class="country d-flex align-items-center">
                <img src="{{asset('web/images/project/flag.png')}}" width="18" height="18" alt="">
                Kuwait
            </div>
            <div class="description">
              <p>{{Str::limit(strip_tags($project->description), 50, '...')}}</p>
            </div>
            <a href="{{url('project-detail', ['short_url' => $project->short_url])}}" class="btn-theme  btnDark">Case Study</a>
        </div>
    </div>
@endforeach

@endif
