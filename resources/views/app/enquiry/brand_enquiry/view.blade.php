@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="nav-icon fas fa-bell"></i> View Enquiry </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'enquiry/brand-detail')}}"> Enquiry List</a></li>
              <li class="breadcrumb-item active">Enquiry View</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card gloss-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Basic Informations</a>
                            </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-user mr-1"></i> Name</strong>
                                                <p class="text-muted">
                                                    {{$enquiry->name}}
                                                </p>
                                            <hr>
                                            <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>
                                            <p class="text-muted">{{$enquiry->email}}</p>
                                            <hr>
                                            <strong><i class="fas fa-comment-alt mr-1"></i> Message</strong>
                                                <p class="text-muted">{{$enquiry->message ?? '-NA-'}}</p>
                                            <hr>
                                                         @php
                                            use Carbon\Carbon;
                                            use App\Models\Enquiryconnect;
                                            $datet=Carbon::parse($enquiry->reply_date)->toDateString();
                                            @endphp
                                                       
                                            <strong><i class="fa fa-address-book mr-1"></i>Created Date</strong>
                                            <p class="text-muted"> {{date("d-M-Y", strtotime($enquiry->created_at))}}</p>
                                            <hr>
                                        </div>
                                        <div class="post col-md-6">
                                            <strong><i class="fas fa-phone mr-1"></i>Phone Number</strong>
                                            <p class="text-muted">{{$enquiry->phone}}</p>
                                            <hr>
                                            <strong><i class="fas fa-wrench"></i> Brand Name</strong>
                                            <p class="text-muted">{{ @$enquiry->brand->title }}</p>
                                            <hr>
                                              <strong><i class="fas fa-wrench"></i> Requested Url</strong>
                                            <p class="text-muted"><a href="{{$enquiry->request_url}}" target="_blank" rel="noopener noreferrer">{{$enquiry->request_url}}</a></p>
                                            <hr>
                                          
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
