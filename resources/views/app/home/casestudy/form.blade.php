@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fa fa-building"></i> {{$title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>
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
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Case Form</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                         </div>
                    </div>
                    <div class="card-body">
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Name*</label>
                                <input type="text" name="title" id="title" placeholder="Enter Title" class="form-control for_canonical_url required" autocomplete="off" value="{{ old('title', isset($case_study)?$case_study->title:'') }}" maxlength="230">
                                <div class="help-block with-errors" id="title_error"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Canonical URL*</label>
                                <input type="text" name="short_url" id="short_url" placeholder="Canonical URL" class="form-control required" autocomplete="off" value="{{ old('short_url', isset($case_study)?$case_study->short_url:'') }}" maxlength="230">
                                <div class="help-block with-errors" id="short_url_error"></div>
                            </div>
                            

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Image</label>
                                <div class="file-loading">
                                    <input id="image" name="image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 345 x 225</span>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label> Image Attribute</label>
                                <input type="text" name="image_attribute" id="image_attribute" placeholder="Image Attribute" class="form-control placeholder-cls" autocomplete="off"  value="{{ old('image_attribute', isset($case_study)?$case_study->image_attribute:'') }}" maxlength="230">
                            </div>
                            
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Description</label>
                                <textarea name="description" id="description" class="form-control tinyeditor" placeholder="Enter case study description">{{ old('description', isset($case_study)?$case_study->description:'') }}</textarea>
                                <div class="help-block with-errors" id="description_error"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Alternate description</label>
                                <textarea name="alternate_description" id="alternate_description" class="form-control tinyeditor" placeholder="Alternate description">{{ old('alternate_description', isset($case_study)?$case_study->alternate_description:'') }}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <input type="submit" id="btn_save" name="btn_save" data-id="{{isset($case_study)?$case_study->id:''}}" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <input type="hidden" name="id" id="id" value="{{ old('id', isset($case_study)?$case_study->id:'0') }}">
                        <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<script type="text/javascript">
$(document).ready(function(){

    $("#image").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Remove",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        allowedFileExtensions: ["webp","jpg","jpeg","png"],
        // minImageWidth: 340,
        // minImageHeight: 220,
        // maxImageWidth: 350,
        // maxImageHeight: 230,
        showRemove: true,
        @if(isset($case_study) && $case_study->image!=NULL)
            initialPreview: [
                "{{asset($case_study->image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{{ ($case_study->image!=NULL)?$case_study->title:'';}}", width: "120px"}
            ]
        @endif
    });

});
</script>

@endsection
