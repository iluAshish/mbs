@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Home Video</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Home Video</li>
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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Home Video Form</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Title</label>
                                    <input type="text" name="title" id="title" placeholder="Title"
                                           class="form-control " autocomplete="off"
                                           value="{{ old('title',isset($video)?$video->title:'') }}" maxlength="255">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Video URL*</label>
                                    <input type="text" name="video_url" id="video_url" placeholder="Video URL"
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('video_url',isset($video)?$video->video_url:'') }}" maxlength="255">
                                    <div class="help-block with-errors" id="video_url_error"></div>
                                    @error('video_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 1920 X 814</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Image Attribute *</label>
                                    <input type="text" class="form-control placeholder-cls required"
                                           id="image_attribute"
                                           name="image_attribute" placeholder="Alt='Home Image Attribute'"
                                           value="{{ old('image_attribute',isset($video)?$video->image_meta_tag:'') }}"
                                           maxlength="255">
                                    @error('image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id" id="id" value="{{isset($video)?$video->id:'0'}}">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileTypes: ['image'],
                minImageWidth: 1920,
                minImageHeight: 814,
                maxImageWidth: 1920,
                maxImageHeight: 814,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($video) && $video->image!=NULL)
                initialPreview: ["{{asset($video->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$video->image))}}",
                    width: "120px",
                    key: "{{'HomeVideo/image/'.$video->id.'/webp_image' }}",
                }]
                @endif
            });
        });
    </script>
@endsection
