@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header gloss_breadcrumbs">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{url('/admin/service')}}">Service</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}


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
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title">Title *</label>
                                <input type="text" name="title" id="title" placeholder="Title " class="form-control for_canonical_url required" autocomplete="off" value="{{ old('title',isset($sector)?@$sector->title:'') }}" maxlength="230" >
                                <div class="help-block with-errors" id="title_error"></div>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label> Short URL*</label>
                                <input type="text" name="short_url" id="short_url" placeholder="Short URL" class="form-control required" autocomplete="off" value="{{old('short_url', @$sector->short_url) }}">
                                <div class="help-block with-errors" id="short_url_error"></div>
                                @error('short_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        

                         <!-- Service image -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Image*</label>
                                <div class="file-loading">
                                    <input id="image" name="image" type="file" accept=".jpg,.png" >
                                </div>
                                <span class="caption_note">Note: Image size must be 650 x 375 px and Size
                                    must be less than 600 KB</span>
                                     <div class="help-block with-errors" id="image_error"></div>
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Image Attribute</label>
                                <input type="text" class="form-control placeholder-cls" id="image_attribute" name="image_attribute" placeholder="Alt='Image Attribute'" value="{{ isset($sector)?$sector->image_attribute:'' }}" >
                                @error('image_attribute')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Service image -->

                        

                    
                       
                        <!-- Service Description -->
                       <div class="form-row">
                            <div class="col-md-12">
                                <label for="description">Description*</label>
                                <textarea class="form-control tinyeditor required" id="description" name="description" placeholder="Description " >
                                {{ old('description',isset($sector)?$sector->description:'') }}</textarea>
                                <div class="help-block with-errors" id="description_error"></div>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> 

                    <div class="card-footer">
                        <input type="submit" id="btn_save" name="btn_save" data-id="{{isset($sector)?$sector->id:''}}" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <input type="hidden" name="id" id="id" value="{{ isset($sector)?$sector->id:'0' }}">
                        <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
                    </div>
            </form>
        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // service image
        $("#image").fileinput({
            'theme': 'explorer-fas',
            validateInitialCount: true,
            overwriteInitial: false,
            autoReplace: true,
            layoutTemplates: {actionDelete: ''},
            initialPreviewShowDelete: false,
            initialPreviewAsData: true,
            dropZoneEnabled: false,
            allowedFileTypes: ['image'],
            // minImageWidth: 650,
            // minImageHeight: 375,
            // maxImageWidth: 650,
            // maxImageHeight: 375,
            // maxFileSize: 600,
            showRemove: true,
            @if(isset($sector) && $sector -> image != NULL)
             required: false,
            initialPreview: ["{{asset($sector->image)}}"],
            initialPreviewConfig: [{
                caption: "{{last(explode('/',$sector->image))}}",
                width: "120px",
                key: "{{'Service/image/'.$sector->id.'/image_webp' }}",
            }]
            @else
             required: true
            @endif
        });
       

    });
</script>
@endsection
