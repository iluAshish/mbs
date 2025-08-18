
@extends('web.layouts.main')
@section('content')

@if(@$product->featured_image != '' || @$product->featured_image != null)
    <section class="w-100">
        {!! Helper::printImage($product,'featured_image','featured_image_webp','featured_image_attribute','w-100 img-fluid ') !!}
    </section>
@else

    <section class="w-100">
        <img src="{{ asset('web/images/productsBanner.jpg')}}" class="w-100 img-fluid" alt="Banner Image">
    </section>
@endif

<section class="productList productDetailsPage">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-between mb-30">
                    <div class="col-md-12 col-lg-12 d-flex align-items-center">
                        <ol class="breadcrumb justify-content-start">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/products')}}">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-30">
            <div class="col-lg-6 pe-lg-4 productSliderSection">
                <div class="slider-for">
                    @if(!$productGalleryList->isEmpty())
                    @foreach($productGalleryList as $productGallery)
                        <div class="item">
                            {!! Helper::printImage($productGallery,'image','image_webp','image_attribute','img-fluid w-100') !!}
                        </div>
                    @endforeach
                    @else
                    {!! Helper::printImage(
                        $product,
                        'thumbnail_image',
                        'thumbnail_image_webp',
                        'thumbnail_image_attribute',
                        'pro-img img-fluid',
                    ) !!}
                    @endif
                </div>
                <div class="slider-nav">
                    @if(!$productGalleryList->isEmpty())
                    @foreach($productGalleryList as $productGallery)
                        <div class="item">
                            {!! Helper::printImage($productGallery,'image','image_webp','image_attribute','img-fluid w-100') !!}
                        </div>
                    @endforeach
                    @else
                    {!! Helper::printImage(
                        $product,
                        'thumbnail_image',
                        'thumbnail_image_webp',
                        'thumbnail_image_attribute',
                        'pro-img img-fluid',
                    ) !!}
                    @endif
                </div>
            </div>
            <div class="col-lg-6 mt-lg-0 mt-4 productDetailsSection">
                <p class="code">{{$product->item_code}}</p>
                @if(@$product->title != '' || @$product->title != null)
                <h4>{{$product->title}}</h4>
                @endif
                 <div class="productMeta">
                <p class="code"><span>Category: </span>{{$product->category->title}}</p>
                <p class="code"><span>Brand: </span>{{$product->brand->title}}</p>
                </div>
                <div class="textWrapper">
                    @if(@$product->short_description != '' || @$product->short_description != null)
                    {!! $product->short_description !!}
                    @endif
                </div>
                <div class="btnWRapper">
                    <a data-bs-toggle="modal" data-bs-target="#enquiryProductModal" class="primary_btn">
                        <span>Quick Enquiry</span>
                    </a>
                    @if(@$product->brochure_link != '' || @$product->brochure_link != null)
                    <a href="{{asset($product->brochure_link)}}" download class="primary_btn secondary_btn">
                        <span>Download Brochure</span>
                    </a>
                    @endif
                </div>
               
                @if(@$product->description != '' || @$product->description != null)
                <div class="featuresArea textWrappe">
                    <h5 class=" fw-bold">Features</h5>
                    <div class="textWrapper">
                        {!! $product->description !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="relatedProducts">
    <div class="container">
        <div class="row">
            <div class="col-8 d-flex align-items-center">
                <h2>Related Products</h2>
            </div>
            <div class="col-4 d-flex align-items-center">
                <div class="slickSliderNav relatedSlider-nav"></div>
            </div>
            <div class="col-12 mt-30">
                <div class="relatedSlider">
                        @foreach($relatedProducts as $related)
                            <a href="{{ url('/product-detail').'/'.$related->short_url }}" class="industriesCard">
                                <div class="imgBox">
                                    {!! Helper::printImage(
                                        $related,
                                        'thumbnail_image',
                                        'thumbnail_image_webp',
                                        'thumbnail_image_attribute',
                                        'pro-img img-fluid',
                                    ) !!}
                                </div>
                                <div class="detailsBox">
                                    <p class="code">{!! $related->item_code !!}</p>
                                    <h6>{!! $related->title !!}</h6>
                                    <div class="moreBtn mt-auto" onclick="{{ url('/product-detail').'/'.$related->short_url }}">
                                        Explore More
                                        <img src="{{ asset('web/images/svg/moreIcon.svg')}}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </a>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade enquiryProductModal" id="enquiryProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-SemiBold" id="exampleModalLabel">Quick Enquiry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="code">{{$product->item_code}}</p>
                <h4>{{$product->title}}</h4>
                <form action="{{url('/')}}/product-enquiry" id="product_form" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fname">Name <sapn>*</sapn></label>
                                <input type="text" class="form-control"name="name" id="fname" placeholder="Enter Name">
                                <div id="error-name" class="medicom_error">Please enter Name</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email <sapn>*</sapn></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                                <div id="error-email" class="medicom_error">Please enter Email</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Phone Number <sapn>*</sapn></label>
                                <input type="text" class="form-control phone_tel" name="phone" id="number" placeholder="Phone Number">
                                <div id="error-number" class="medicom_error">Invalid phone number.</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Product</label>
                                <input type="text" class="form-control" placeholder="Product" value="{{$product->title}}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="msg">Message <sapn>*</sapn></label>
                                <textarea name="message" id="msg" class="form-control" placeholder="Message"></textarea>
                                <div id="error-msg" class="medicom_error">Please enter message.</div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group ">
                                <input type="hidden" name="product_id" value="{{$product->id}}" >
                                <!--    <button class="primary_btn"><span>Send Request</span></button>-->
                                <button href="#" class="primary_btn">
                                    <span>Send Request</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

    document.getElementById('product_form').addEventListener('submit', function(event) {
        event.preventDefault();
        const nameInput = document.getElementById('fname');
        const emailInput = document.getElementById('email');
        const numberInput = document.getElementById('number');
        const message = document.getElementById('msg');
        let formValid = true;

        if (nameInput.value.trim() === '') {
            document.getElementById('error-name').style.display = 'block';
            formValid = false;
        } else {
            document.getElementById('error-name').style.display = 'none';
        }

        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (emailInput.value.trim() === '' || !emailPattern.test(emailInput.value.trim())) {
            document.getElementById('error-email').style.display = 'block';
            formValid = false;
        } else {
            document.getElementById('error-email').style.display = 'none';
        }

        const phonePattern = /^(\+?\d{1,4})?\s?-?\d{9,15}$/;
        if (numberInput.value.trim() === '' || !phonePattern.test(numberInput.value.trim())) {
            document.getElementById('error-number').style.display = 'block';
            formValid = false;
        } else {
            document.getElementById('error-number').style.display = 'none';
        }

        if (message.value.trim() === '') {
            document.getElementById('error-msg').style.display = 'block';
            formValid = false;
        } else {
            document.getElementById('error-msg').style.display = 'none';
        }
        if (!formValid) {
            return false;
        }
        this.submit();
    });
</script>
@endsection
