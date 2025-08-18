@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header gloss_breadcrumbs">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>

                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'service/faq/')}}">FAQ</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                
 
                        @if (session('success'))
                        <div class="alert alert-success" user_type="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('success') }}
                        </div>
                        @elseif(session('error'))
                        <div class="alert alert-danger" user_type="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('error') }}
                        </div>
                        @endif
                               
                        @php
                        use App\Models\ServiceFaq;
                        use App\Models\Service;
                       
                        @endphp
                        <div class="form-row">
                            <div class="form-group col-md-12 brandProduct">
                                <label> Service*</label>
                               @if($key=='Update')
                                @php
                                 $ServiceFaqconnect=ServiceFaq::where('connectid',$faq->id)->get();
                                @endphp
                             <select class="select2 form-control required" name="service_id[]" multiple id="service_id">
                          
       @foreach($ServiceFaqconnect as $service)
                                 @php
                                  $faqname=Service::where('id',$service->service_id)->first();
                                  $fetchfaqname=$faqname->title;
                                 @endphp
                                    <option  hidden value="{{$service->service_id}}" {{$service->connectid == $faq->id?'selected':''}} >{{$fetchfaqname}}</option>
                                    @endforeach
 @foreach($services as $service)
 <option  value="{{$service->id}}" >{{$service->title}}</option>
 @endforeach

                                </select>
                               
                                <div class="help-block with-errors" id="service_id_error"></div>
                                @else
                                <select class="select2 form-control required" name="service_id[]" multiple id="service_id">
                          
        @foreach($services as $service)
                                 
                                    <option value="{{$service->id}}" >{{$service->title}}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors" id="service_id_error"></div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Question*</label>
                                <input type="text" name="question" id="question" placeholder="Question" class="form-control required" autocomplete="off" value="{{ isset($faq)?$faq->question:'' }}" maxlength="230">
                                <div class="help-block with-errors" id="question_error"></div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Answer*</label>
                                <textarea name="answer" id="answer" class="form-control tinyeditor required" placeholder="Answer">{{ isset($faq)?$faq->answer:'' }}</textarea>
                                <div class="help-block with-errors" id="answer_error"></div>
                            </div>
                        </div>


                        <div>
                            <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
                        </div>
            </form>
        </div>
    </section>
</div>

@endsection