@foreach($features as $feature)
    <div class="service-col">
        <picture><img src="{{asset($feature->image_webp ?? $feature->image)}}"  width="321" height="226" {{$feature->image_attribute}}></picture>
        <div class="service-description">
            <h3>{{$feature->title ?? ''}}</h3>
            {!! $feature->alternate_description ?? '' !!}
            <a href="{{url($feature->button_url)}}" class="btn-theme btnDark">{{$feature->button_text}}</a>
        </div>
    </div>
@endforeach
