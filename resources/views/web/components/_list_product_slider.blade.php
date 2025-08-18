@if($products->isNotEmpty())
    @foreach($products as $product)
        <div class="products-slider-item">
            <picture><img src="{{asset($product->thumbnail_image_webp ?? $product->thumbnail_image)}}" width="251" height="322" {{$product->thumbnail_image_attribute}}>
            </picture>
            <div class="product-description">
                <h3>{{ \Illuminate\Support\Str::words(strip_tags($product->title ?? ''), 4, '...') }}</h3>
                <p>{{ \Illuminate\Support\Str::words(strip_tags($product->short_description ?? $product->description), 5, '...') }}</p>
            </div>
            <a href="{{url('product-detail', ['short_url' => $product->short_url])}}" class="arrow-btn btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.9881 8.75252C8.93008 8.80659 8.88353 8.87179 8.85125 8.94424C8.81897 9.01669 8.80161 9.0949 8.80021 9.1742C8.79881 9.25351 8.8134 9.33228 8.84311 9.40582C8.87281 9.47937 8.91703 9.54617 8.97311 9.60226C9.0292 9.65834 9.096 9.70256 9.16955 9.73226C9.24309 9.76197 9.32186 9.77656 9.40117 9.77516C9.48047 9.77376 9.55868 9.7564 9.63113 9.72412C9.70358 9.69184 9.76878 9.64529 9.82285 9.58727L12.3822 7.02789L12.8004 6.61052L12.383 6.19314L9.82364 3.63376C9.7123 3.52612 9.56313 3.46652 9.40827 3.46779C9.25341 3.46907 9.10525 3.53111 8.99569 3.64057C8.88613 3.75002 8.82394 3.89813 8.82252 4.05299C8.82111 4.20785 8.88057 4.35707 8.9881 4.46852L10.5395 6.01989H2.36602C2.20937 6.01989 2.05914 6.08212 1.94838 6.19288C1.83762 6.30364 1.77539 6.45387 1.77539 6.61052C1.77539 6.76716 1.83762 6.91739 1.94838 7.02815C2.05914 7.13891 2.20937 7.20114 2.36602 7.20114H10.5395L8.9881 8.75252Z"
                        fill="white" /> </svg>
            </a>
        </div>
    @endforeach
@endif
    