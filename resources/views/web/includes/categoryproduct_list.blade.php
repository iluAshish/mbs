
@foreach($products as $product)
    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="product-other-box">
            <div class="product-img">
                <a href="{{url('/')}}/products/{!!$product->short_url !!}" class="text-decoration-none">
                    {!! Helper::printImage($product,'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','img-fluid ') !!}
                </a>
            </div>
            <div class="product-title">
                <a href="{{url('/')}}/products/{!!$product->short_url !!}" class="text-decoration-none">
                    <p>{!!$product->title !!}</p>
                </a>
            </div>
            <div class="prodct-action">
                <div class="view">
                    <a href="{{url('/')}}/products/{!!$product->short_url !!}" class="text-decoration-none">
                        <!-- data-fancybox="gallery" -->
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="icon">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="25.000000pt" height="25.000000pt" viewBox="0 0 25.000000 25.000000" preserveAspectRatio="xMidYMid meet">
                                        <g transform="translate(0.000000,25.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                            <path
                                                d="M12 238 c-7 -7 -12 -39 -12 -74 0 -56 3 -64 32 -93 30 -29 36 -31 109 -31 110 0 109 -1 109 84 0 66 -2 75 -28 99 -26 25 -34 27 -113 27 -53 0 -90 -5 -97 -12z m153 -8 c-30 -8 -29 -8 10 -11 24 -1 6 -5 -45 -8 l-85 -6 -6 -65 -6 -65 1 70 1 70 40 6 40 7 -45 -2 -45 -1 -6 -65 -6 -65 -1 66 c-1 36 1 69 5 72 3 4 45 6 92 6 61 -1 77 -4 56 -9z m72 -102 l2 -68 -90 0 c-87 0 -89 1 -89 23 0 13 11 34 25 47 l25 24 41 -40 c22 -21 39 -33 37 -25 -2 8 8 17 22 21 16 4 21 8 13 13 -7 5 -22 3 -33 -3 -18 -10 -24 -7 -41 14 -24 30 -45 33 -71 9 -23 -21 -27 -16 -21 25 l5 33 87 -3 86 -3 2 -67z"
                                            />
                                            <path d="M177 174 c-14 -15 -6 -34 14 -34 14 0 19 5 17 17 -3 18 -20 27 -31 17z" />
                                        </g>
                                    </svg>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <p>View</p>
                            </li>
                        </ul>
                    </a>
                </div>
                <div class="enquiry">
                    <a href="javascript:;" data-id="{!!$product->id !!}"  data-name="{!!$product->title !!}" class="text-decoration-none enquiry_product_cat" data-bs-toggle="modal" data-bs-target="#product-enquiry-modal">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="icon">
                                    <img src="{{ asset('web/images/icons/pro-enq.svg') }}" class="img-fluid" alt="view" />
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <p>ENQUIRY</p>
                            </li>
                        </ul>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
@if($totalProducts >=$offset)
    <div class="appendHere_{{ $offset }}"></div>
    <div class="more-section-{{ $offset }}"></div>
    <input type="hidden" id="totalProduct" name="total_project" value="{{ $totalProducts }}">
    <input type="hidden" id="product_loading_offset" name="offset" value="{{ $offset }}">
    <input type="hidden" id="product_loading_limit" name="loading_limit" value="{{ $loading_limit }}">
    <div class="col-12">
        <div class="single-more-load">
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
