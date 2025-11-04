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
                        <h3 class="card-title">Feature Form</h3>
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
                                <label> Title*</label>
                                <input type="text" name="title" id="title" placeholder="Enter title" class="form-control for_canonical_url required" autocomplete="off" value="{{ old('title', isset($feature)?$feature->title:'') }}" maxlength="230">
                                <div class="help-block with-errors" id="title_error"></div>
                            </div>

                            <!-- <div class="form-group col-md-6">
                                <label>Canonical URL*</label>
                                <input type="text" name="short_url" id="short_url" placeholder="Canonical URL" class="form-control required" autocomplete="off" value="{{ old('short_url', isset($feature)?$feature->short_url:'') }}" maxlength="230">
                                <div class="help-block with-errors" id="short_url_error"></div>
                            </div> -->
                            

                        </div>

                        <!-- <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Description*</label>
                                <textarea name="description" id="description"
                                            class="form-control tinyeditor required"
                                            placeholder="Description">{{ old('description',isset($feature)?$feature->description:'') }}</textarea>
                                <div class="help-block with-errors" id="description_error"></div>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label> Short Description*</label>
                                <textarea name="alternate_description" id="alternate_description"
                                            class="form-control tinyeditor required"
                                            placeholder="Description">{{ old('alternate_description',isset($feature)?$feature->alternate_description:'') }}</textarea>
                                <div class="help-block with-errors" id="alternate_description_error"></div>
                                @error('alternate_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> -->

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Image</label>
                                <div class="file-loading">
                                    <input id="image" name="image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 321 X 226</span>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label> Image Attribute</label>
                                <input type="text" name="image_attribute" id="image_attribute" placeholder="Image Attribute" class="form-control placeholder-cls" autocomplete="off"  value="{{ old('image_attribute', isset($feature)?$feature->image_attribute:'') }}" maxlength="230">
                            </div>
                            
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Description</label>
                                <textarea name="description" id="description" class="form-control tinyeditor" placeholder="Enter case study description">{{ old('description', isset($feature)?$feature->description:'') }}</textarea>
                                <div class="help-block with-errors" id="description_error"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Alternate description</label>
                                <textarea name="alternate_description" id="alternate_description" class="form-control tinyeditor" placeholder="Alternate description">{{ old('alternate_description', isset($feature)?$feature->alternate_description:'') }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Button Text</label>
                                <input type="text" name="button_text" id="button_text" placeholder="Enter button_text" class="form-control for_canonical_url required" autocomplete="off" value="{{ old('button_text', isset($feature)?$feature->button_text:'') }}" maxlength="230">
                                <div class="help-block with-errors" id="button_text_error"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label> Button URL</label>
                                <input type="text" name="button_url" id="button_url" placeholder="Enter button_url" class="form-control for_canonical_url required" autocomplete="off" value="{{ old('button_url', isset($feature)?$feature->button_url:'') }}" maxlength="230">
                                <div class="help-block with-errors" id="button_url_error"></div>
                            </div>

                            <!-- <div class="form-group col-md-6">
                                <label>Canonical URL*</label>
                                <input type="text" name="short_url" id="short_url" placeholder="Canonical URL" class="form-control required" autocomplete="off" value="{{ old('short_url', isset($feature)?$feature->short_url:'') }}" maxlength="230">
                                <div class="help-block with-errors" id="short_url_error"></div>
                            </div> -->
                            

                        </div>

                    </div>
                    <div class="card-footer">
                        <input type="submit" id="btn_save" name="btn_save" data-id="{{isset($feature)?$feature->id:''}}" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <input type="hidden" name="id" id="id" value="{{ old('id', isset($feature)?$feature->id:'0') }}">
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
        // minImageWidth: 320,
        // minImageHeight: 220,
        // maxImageWidth: 340,
        // maxImageHeight: 230,
        showRemove: true,
        @if(isset($feature) && $feature->image!=NULL)
            initialPreview: [
                "{{asset($feature->image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{{ ($feature->image!=NULL)?$feature->title:'';}}", width: "120px"}
            ]
        @endif
    });

});
</script>

@endsection
