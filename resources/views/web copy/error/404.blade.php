
@extends('web.layouts.main')
@section('content')
<section class="thankYouPage">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div>
                    <img src="{{asset('web/images/error.svg')}}" class="img-fluid " alt="">
                    <div class="textWrapper mt-20">
                        <p>PAGE NOT FOUND</p>
                    </div>
                    <a href="{{url('/')}}" class="primary_btn  ms-auto me-auto mt-40"><span>Back To Home</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
