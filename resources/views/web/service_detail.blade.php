@extends('web.layouts.main')
@section('content')
<picture>
    <img src="{{asset('web/images/inner/bg.webp')}}" alt="">
</picture>
<section class="banner inner-banner position-relative">

    <div class="container-ctn position-relative">

        <div class="banner-image-slider " id="fadeSection">
            <picture>
                <img src="{{asset('web/images/inner/inner.webp')}}" class="img-fluid w-100" width="1366" height="335"
                    alt="Ascentria">
            </picture>
        </div>
    </div>
    <div class="container-short">
        <ul class="breadcrumb d-flex align-items-center">
            <li>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path
                            d="M6 14.2496H12M10.0556 1.55964C12.7688 2.76377 14.8252 4.34589 15.8884 5.25977C16.4257 5.72177 16.7254 6.38664 16.7621 7.09427C16.8135 8.06589 16.875 9.58652 16.875 11.2496C16.875 12.5291 16.8386 13.7644 16.7985 14.7345C16.7779 15.2747 16.553 15.7868 16.1693 16.1676C15.7856 16.5483 15.2718 16.7693 14.7315 16.7858C13.434 16.8308 11.5084 16.8746 9 16.8746C6.49162 16.8746 4.56637 16.8304 3.2685 16.7861C2.72823 16.7696 2.21435 16.5487 1.83068 16.1679C1.44702 15.7872 1.22215 15.275 1.2015 14.7349C1.15252 13.5738 1.12702 12.4118 1.125 11.2496C1.125 9.58652 1.18687 8.06589 1.2375 7.09427C1.275 6.38664 1.57425 5.72177 2.11163 5.25977C3.17475 4.34552 5.23162 2.76377 7.94437 1.55964C8.27676 1.41214 8.63636 1.33594 9 1.33594C9.36364 1.33594 9.72324 1.41214 10.0556 1.55964Z"
                            stroke="white" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round" /> </svg>
                </a>
            </li>
            <li>
                <a href="{{route('services')}}">Services</a>
   
            </li>
            <li>
                {{$service_details->title ?? $service_details->sub_title}}
            </li>
        </ul>
    </div>
</section>


<section class="services-detail product-sort inner-padding position-relative">
    <div class="container-short list">
        <div class="d-flex flex-wrap justify-content-between ">
            <div class="services-detail-left">
                <h2>{{$service_details->title}}</h2>
                <picture>
                    <img src="{{asset($service_details->image_webp ?? $service_details->image)}}" class="w-100 h-auto" width="488" height="424" {{$service_details->image_attribute}}>
                </picture>
            </div>
            
            <div class="services-detail-right">
                {!!$service_details->description ?? $service_details->short_description !!}
            </div>
    
        </div>
        <strong>Benefits of AMC:</strong>
        {!! $service_details->benefits ?? '' !!}
    </div>
</section>

<section class="services-mid commonPadding">
    <div class="container-short">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div class="services-mid-left">
            <h2>{{$service_details->sub_title ?? ''}}</h2>
            {!! $service_details->alternate_description ?? $service_details->alternate_short_description !!}
        </div>
        <picture>
            <img src="{{asset($service_details->alternate_image_webp ?? $service_details->alternate_image)}}" width="448" height="332" class="w-100 h-auto" {{$service_details->alternate_image_attribute}}>
        </picture>
        </div>
    </div>
</section>


<section class="cta">
    <div class="cta-container">
        <h2>Quick Contact</h2>
        <div class="d-flex flex-wrap align-items-end align-items-md-center justify-content-between">
            <div class="btn-wrap d-flex flex-wrap">
                <a href="tel:+965 22271417">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.73303 2.0433C6.95003 0.833297 8.95403 1.0483 9.97303 2.4103L11.235 4.0943C12.065 5.2023 11.991 6.7503 11.006 7.7293L10.768 7.9673C10.741 8.06721 10.7383 8.17211 10.76 8.2733C10.823 8.6813 11.164 9.5453 12.592 10.9653C14.02 12.3853 14.89 12.7253 15.304 12.7893C15.4083 12.8103 15.5161 12.8072 15.619 12.7803L16.027 12.3743C16.903 11.5043 18.247 11.3413 19.331 11.9303L21.241 12.9703C22.878 13.8583 23.291 16.0823 21.951 17.4153L20.53 18.8273C20.082 19.2723 19.48 19.6433 18.746 19.7123C16.936 19.8813 12.719 19.6653 8.28603 15.2583C4.14903 11.1443 3.35503 7.5563 3.25403 5.7883C3.20403 4.8943 3.62603 4.1383 4.16403 3.6043L5.73303 2.0433ZM8.77303 3.3093C8.26603 2.6323 7.32203 2.5783 6.79003 3.1073L5.22003 4.6673C4.89003 4.9953 4.73203 5.3573 4.75203 5.7033C4.83203 7.1083 5.47203 10.3453 9.34403 14.1953C13.406 18.2333 17.157 18.3543 18.607 18.2183C18.903 18.1913 19.197 18.0373 19.472 17.7643L20.892 16.3513C21.47 15.7773 21.343 14.7313 20.525 14.2873L18.615 13.2483C18.087 12.9623 17.469 13.0563 17.085 13.4383L16.63 13.8913L16.1 13.3593C16.63 13.8913 16.629 13.8923 16.628 13.8923L16.627 13.8943L16.624 13.8973L16.617 13.9033L16.602 13.9173C16.5598 13.9565 16.5143 13.9919 16.466 14.0233C16.386 14.0763 16.28 14.1353 16.147 14.1843C15.877 14.2853 15.519 14.3393 15.077 14.2713C14.21 14.1383 13.061 13.5473 11.534 12.0293C10.008 10.5113 9.41203 9.3693 9.27803 8.5033C9.20903 8.0613 9.26403 7.7033 9.36603 7.4333C9.42216 7.28137 9.50254 7.13953 9.60403 7.0133L9.63603 6.9783L9.65003 6.9633L9.65603 6.9573L9.65903 6.9543L9.66103 6.9523L9.94903 6.6663C10.377 6.2393 10.437 5.5323 10.034 4.9933L8.77303 3.3093Z" fill="white"/> </svg></i>
                    <p>+965 22271417</p>
                </a>
                <a href="mailto:sales@mbs-group.net">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"> <path fill-rule="evenodd" clip-rule="evenodd" d="M22.425 5.526L12.9555 13.368C12.6864 13.5909 12.3479 13.7129 11.9985 13.7129C11.6491 13.7129 11.3106 13.5909 11.0415 13.368L1.5765 5.526C1.52571 5.67887 1.49988 5.83892 1.5 6V18C1.5 18.3978 1.65804 18.7794 1.93934 19.0607C2.22064 19.342 2.60218 19.5 3 19.5H21C21.3978 19.5 21.7794 19.342 22.0607 19.0607C22.342 18.7794 22.5 18.3978 22.5 18V6C22.5006 5.839 22.4753 5.67895 22.425 5.526ZM3 3H21C21.7956 3 22.5587 3.31607 23.1213 3.87868C23.6839 4.44129 24 5.20435 24 6V18C24 18.7956 23.6839 19.5587 23.1213 20.1213C22.5587 20.6839 21.7956 21 21 21H3C2.20435 21 1.44129 20.6839 0.87868 20.1213C0.316071 19.5587 0 18.7956 0 18V6C0 5.20435 0.316071 4.44129 0.87868 3.87868C1.44129 3.31607 2.20435 3 3 3ZM2.685 4.5L11.049 11.4045C11.3169 11.6258 11.6533 11.7472 12.0007 11.748C12.3481 11.7488 12.6851 11.629 12.954 11.409L21.402 4.5H2.685Z" fill="white"/> </svg></i>
                    <p>sales@mbs-group.net</p>
                </a>
            </div>
            
            <button  data-bs-toggle="modal" href="#ServiceEnquiryForm" role="button" class="btn-theme">Service Enquiry</button>
        </div>
    </div>
</section>


<section class="quick-contact commonPadding pb-0">
    <div class="container-short">
        <h2>Quick Contact</h2>
              <form id="quickContact" action="" method="post" enctype="multipart/form-data">
                            <div class="row justify-content-between">
                                  <div class="formGroup col--6">
                                <input type="text" id="name_enquiry" name="name_enquiry" placeholder="Name">
                                <span id="name_enquiryError" class="error-message">Please enter your name</span>
                            </div>
                            <div class="formGroup col--6">
                                <input type="email" id="email_enquiry" name="email_enquiry" placeholder="Email">
                                <span id="email_enquiryError" class="error-message">Please enter a valid email</span>
                            </div>
                            <div class="formGroup col--6">
                                <input type="tel" id="phone_enquiry" name="phone_enquiry" class="phone_number" placeholder="Phone">
                                <span id="phone_enquiryError" class="error-message">Please enter a valid phone number</span>
                            </div>
                            <div class="formGroup col--6">
                                <input type="text" id="product_enquiry" name="product_enquiry" class="product_name" placeholder="Service Name">
                                <span id="phone_enquiryError" class="error-message">Please enter a service name</span>
                            </div>
                            <div class="formGroup col-12">
                                <textarea id="message_enquiry" name="message_enquiry" rows="" cols="" placeholder="Enquiry"></textarea>
                                <span id="message_enquiryError" class="error-message">Please enter your message</span>
                            </div>
                            <div class="d-flex justify-content-center justify-md-content-end buttonGroup">
                                <button type="submit" class="btn-theme btnDark"> Submit</button>  
                            <button type="button" class="btn-cancel btn-theme btnBorder" data-bs-dismiss="modal" aria-label="Close" id="ProductEnquiryFormClose">Cancel</button>
                            </div>
                            </div>  
                     </form>
    </div>
</section>

@if($other_services->isNotEmpty())
<section class="sub-category">
    <div class="product-sort mission-vision why-choose inner-padding">
        <div class="container-short">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="col-left title">
                    <h2>Other Services</h2>
                </div>
        
            </div>
    
        </div>
    </div>
    <div class="container-short">
        <div class=" other-services-slider">
            @include('web.components._list_other_service', ['services' => $other_services])
            
        </div>
    </div>
</section>
@endif
<!-- end of service slider -->

@endsection
