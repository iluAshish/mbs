@extends('web.layouts.main')
@section('content')
<section class="thankYouPage">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div>
                    <img src="{{ asset('web/images/thank-you.svg')}}" class="img-fluid " alt="">
                    {{-- <p class="code">OmniTest 5 kN</p> --}}
                    <h4>Thank You For Connecting Us</h4>
                    <div class="textWrapper">
                        <p>One of our representatives will get in touch with you shortly regarding your inquiry.</p>
                    </div>
                    <a href="{{url('/')}}" class="primary_btn  ms-auto me-auto mt-40"><span>Back To Home</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
