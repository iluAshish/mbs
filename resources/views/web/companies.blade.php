@extends('web.layouts.main')
@section('content')
<section class="bannerInner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Our Companies</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Our Companies</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="privacyTermsSection companyPage">
    <div class="container">
        <div class="row">
                <div class="blogDetails">
                    <!--<h2 class="">Companies</h2>-->
                    <div class="textWrapper mt-20">
                        <section id="clientsList">
                          <div class="container">
                            <div class="MainRow">

                                @if($companies)
                                @foreach($companies as $company)
                                  <div class="item">
                                    <div class="logoSec">
                                      {!! Helper::printImage($company,'image','image_webp','image_attribute','img-fluid w-100',null,'86','100') !!}
                                    </div>
                                    <div class="cntnSec">
                                      <div class="title">{{ @$company->title }}</div>
                                      <p>{!! @$company->description !!}</p>
                                      <img src="https://pentacodesdemos.com/medicom/web/images/footerIcon.svg" alt="">
                                      <div>{!! @$company->link !!}</div>
                                    </div>
                                  </div>
                                @endforeach 
                                @endif
                            </div>
                          </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection