@if($services->isNotEmpty())
    @foreach($services as $service)
        <a href="{{url('service-detail', ['short_url' => $service->short_url]) }}" class="our-services-card">
            <picture>
                <img src="{{asset($service->image_webp ?? $service->image)}}" width="334" height="249" {{$service->image_attribute	}}>
            </picture>
            <div class="our-services-details">
                <h3>{{ \Illuminate\Support\Str::words(strip_tags($service->title ?? $service->sub_title), 5, '...') }}</h3>
                
                <p>{{ \Illuminate\Support\Str::words(strip_tags($service->short_description), 15, '...') }}</p>
            </div>

        </a>
    @endforeach
@endif