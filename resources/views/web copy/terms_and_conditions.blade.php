@extends('web.layouts.main')
@section('content')
@if(@$banner->image != '')
<section class="w-100">
    {!! Helper::printImage($banner,'image','image_webp','image_attribute','img-fluid') !!}
</section>
@else
<img src="assets/images/productsBanner.jpg" class="w-100 img-fluid" alt="">
@endif
<section class="privacyTermsSection">
    <div class="container">
        <div class="row">
                <div class="blogDetails">
                    <h2 class="">Terms And Conditions</h2>
                    <div class="textWrapper mt-20">
                        {!! $siteInformation->terms_and_conditions??'' !!}
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
