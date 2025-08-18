@foreach ($products as $key => $product)
<div class=" mt-30 colIndustries">
    <a href="{{ url('/product-detail').'/'.$product->short_url }}" class="industriesCard">
        <div class="imgBox">
            {!! Helper::printImage(
                $product,
                'thumbnail_image',
                'thumbnail_image_webp',
                'thumbnail_image_attribute',
                'pro-img img-fluid',
            ) !!}
        </div>
        <div class="detailsBox">
            <p class="code">{!! $product->item_code !!}</p>
            <h6>{!! $product->title !!}</h6>
            <div class="moreBtn mt-auto" onclick="{{ url('/product-detail').'/'.$product->short_url }}">
                Explore More
                <img src="{{ asset('web/images/svg/moreIcon.svg')}}" class="img-fluid" alt="">
            </div>
        </div>
    </a>
</div>
@endforeach
<div class="appendHere_{{ $offset }}"></div>
<input type="hidden" class="product_total" id="product_total" name="total" value="{{ $totalProducts }}">
<input type="hidden" class="product_offset" id="product_offset" name="offset" value="{{ $offset }}">
<input type="hidden" class="product_limit" id="product_limit" name="limit" value="{{ $limit }}">
<input type="hidden" class="product_id" id="product_id" name="product_id" value="{{ $product->id ??'' }}">

@if ($totalProducts > $offset)
    <div class="row py-3 more-section-{{ $offset }}">
        <div class="col-12 d-flex justify-content-center">
            <div class="primaryBtn load-product-button product_{{ $offset }}_load-more-product-button" data-type="{{$type}}" data-type-id="{{$type_id}}" id="btnposition">
                <div id="slide"></div>
                <a href="#" class="primary_btn secondary_btn mt-40"><span>Load More</span></a>
            </div>
        </div>

    </div>
@endif
