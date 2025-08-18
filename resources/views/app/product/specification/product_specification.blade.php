@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header gloss_breadcrumbs">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> {{$title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{url(Helper::sitePrefix().'containers/specification/')}}/{{$product_id}}">Product Specification</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('error') }}
                    </div>
                @endif
                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div class="gloss_card card-info">
                    <pre>
                        
                    </pre>
                        <div class="gloss_card-body">
                                <div class="form-row" id="append_result">
                                    <div class="form-group col-md-3">
                                        <label for="inputPassword4">Title*</label>
                                        <input type="text" class="form-control required" name="title"
                                               id="title" placeholder="Title " value="{{ isset($ProductSpecification)?$ProductSpecification->title:'' }}">
                                        <div class="help-block with-errors" id="title_error"></div>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="inputPassword4">Description*</label>
                                        <textarea type="text" class="form-control required tinyeditor" name="value"
                                               id="value" placeholder="Value" maxlength="230">{{ isset($ProductSpecification)?$ProductSpecification->description:'' }}</textarea>
                                        <div class="help-block with-errors" id="value_error"></div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                                   <input type="hidden" name="product_id" id="product_id" value="{{$product_id}}">
                            <img class="animation__shake loadingImg" src="{{url('web/dist/img/loading.gif')}}"
                                 style="display:none;">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <style>

        hr {
            border-top: 2px solid #17a2b8;
        }
    </style>
@endsection
