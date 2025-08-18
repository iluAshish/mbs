@foreach($products as $product)
<div class="product-card">
    <picture>
        <img src="{{asset($product->thumbnail_image_webp ?? $product->thumbnail_image)}}" width="245px" height="161" {{$product->thumbnail_image_attribute}}>
    </picture>
    <div class="product-details">
        <h3>{{$product->title ?? ''}}</h3>
        <div class="d-flex flex-wrap product-taxonomies">
            <a href="">{{$product->category->title ?? ''}}</a>
            <a href="">{{$product->brand->title ?? ''}}</a>
        </div>
        {!! \Illuminate\Support\Str::words(strip_tags($product->short_description ?? $product->description), 10, '...') !!}
    </div>
    <a href="{{route('product-detail',['short_url' => $product->short_url])}}" class="btn product-btn">
        View More
        <i><svg xmlns="http://www.w3.org/2000/svg" width="12" height="7" viewBox="0 0 12 7" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M7.46955 5.71834C7.41152 5.77241 7.36498 5.83761 7.3327 5.91006C7.30042 5.98251 7.28306 6.06072 7.28166 6.14002C7.28026 6.21933 7.29485 6.2981 7.32455 6.37164C7.35426 6.44519 7.39847 6.51199 7.45456 6.56808C7.51064 6.62416 7.57745 6.66838 7.65099 6.69808C7.72453 6.72779 7.80331 6.74238 7.88261 6.74098C7.96191 6.73958 8.04012 6.72222 8.11257 6.68994C8.18502 6.65766 8.25023 6.61111 8.3043 6.55309L10.8637 3.99371L11.2818 3.57634L10.8645 3.15896L8.30509 0.599585C8.19374 0.491944 8.04458 0.432342 7.88972 0.433614C7.73486 0.434886 7.58669 0.496932 7.47713 0.606387C7.36757 0.715843 7.30539 0.86395 7.30397 1.01881C7.30255 1.17367 7.36201 1.32289 7.46955 1.43434L9.02092 2.98571L0.847461 2.98571C0.690817 2.98571 0.54059 3.04794 0.429826 3.1587C0.319062 3.26946 0.256836 3.41969 0.256836 3.57634C0.256836 3.73298 0.319062 3.88321 0.429826 3.99397C0.54059 4.10473 0.690817 4.16696 0.847461 4.16696H9.02092L7.46955 5.71834Z"
                    fill="white" /> </svg></i>
    </a>

</div>
@endforeach
 <!-- load more projects -->
<div class="appendHere_{{ $offset }}"></div>
<div class="more-section-{{ $offset }}"></div>
<input type="hidden" id="total" name="total" value="{{ $total }}">
<input type="hidden" id="loading_offset" name="offset" value="{{ $offset }}">
<input type="hidden" id="type" name="type" value="products">


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