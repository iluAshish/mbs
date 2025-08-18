@php
    $count_num = $count ?? 5;

@endphp
@foreach($categories as $key => $product_category)

    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 product-box">
        <div class="product-img">
            <a href="product/{!! $product_category->short_url !!}" class="text-decoration-none">
                {!! Helper::printImage($product_category,'featured_image','featured_image_webp','featured_image_attribute','pro-img img-fluid') !!}
            </a>
        </div>
        <div class="product-title">
            <a href="product/{!! $product_category->short_url !!}" class="text-decoration-none"><span class="big">{{ str_pad($count_num++, 2, "0", STR_PAD_LEFT) }}</span><span class="small">{!! $product_category->title !!}</span></a>
        </div>
    </div>
@endforeach
@if($totalproducts >=$offset)
<div class="appendHere_{{ $offset }}"></div>
<div class="more-section-{{ $offset }}"></div>
<input type="hidden" id="count" name="count" value="{{ $count_num }}">
<input type="hidden" id="totalCategory" name="total_project" value="{{ $totalproducts }}">
<input type="hidden" id="category_loading_offset" name="offset" value="{{ $offset }}">
<input type="hidden" id="category_loading_limit" name="loading_limit" value="{{ $loading_limit }}">
<div class="col-12">
    <div class="more-load">
        <div class="quick-enq-wrapper">
            <a href="#" class="quick-enq text-decoration-none m-auto">
                <div class="btn-icon">
                    <img src="{{ asset('web/images/icons/more.svg') }}" class="img-fluid" alt="button" />
                </div>
                <div class="btn-title">
                    <p>Load More</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endif
