@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> {{$title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'media')}}">Media</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{url(Helper::sitePrefix().'media/gallery/'.$mediaData->id)}}">{{ $mediaData->title }} - Gallery</a></li>
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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Gallery Form</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <div class="card-body">
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
                            <div class="form-row">
                                <!-- <div class="form-group col-md-12">
                                    <label> Title </label>
                                    <input type="text" class="form-control"
                                           id="title" name="title"
                                           placeholder="Title"
                                           value="{{ old('title',isset($media_gallery)?$media_gallery->title:'') }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> -->

                                <div class="form-group col-md-6">
                                    <label> Media Type *</label>
                                    <select name="media_type" id="media_type" class="form-control select2">
                                        @foreach(["Image"] AS $media_type)
                                            <option value="{{ $media_type }}"
                                                {{ old("media_type", @$media_gallery->media_type) == $media_type ? "selected" : "" }}>{{ $media_type }}</option>
                                        @endforeach
                                    </select>
                                    @error('media_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Image*</label>
                                    <div class="file-loading">
                                        @isset($media_gallery)
                                            <input type="file" name="image" id="image" accept=".jpeg, .png, .jpg" multiple>
                                        @else
                                            <input type="file" name="image[]" id="image" accept=".jpeg, .png, .jpg" multiple>
                                        @endisset
                                    </div>
                                    <span class="caption_note">Note: Image size should be width 1200 and minimum height 400</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Image Attribute *</label>
                                    <input type="text" class="form-control required placeholder-cls"
                                           id="image_attribute" name="image_attribute"
                                           placeholder="Alt='Banner Attribute'"
                                           value="{{ old('image_attribute',isset($media_gallery)?$media_gallery->image_attribute:'') }}">
                                    <div class="help-block with-errors" id="image_attribute_error"></div>
                                    @error('image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label> Video URL </label>
                                    <input type="text" class="form-control"
                                           id="video_url" name="video_url"
                                           placeholder="Video URL"
                                           value="{{ old('video_url',isset($media_gallery)?$media_gallery->video_url:'') }}">
                                    <div class="help-block with-errors" id="video_url_error"></div>
                                    @error('video_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <input type="hidden" name="media_id" id="media_id" value="{{$mediaData->id}}">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <img class="animation__shake loadingImg" src="{{url('backend/dist/img/loading.gif')}}"
                                 style="display:none;">
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
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileTypes: ['image'],
                allowedFileExtensions: ['jpg', 'jpeg', 'png'], // Add allowed file extensions here
                // minImageWidth: 1200,
                // minImageHeight: 400,
                // maxImageWidth: 1200,
                showRemove: true,
                // maxFileSize: 512,
                @if(isset($media_gallery) && $media_gallery->image!=NULL)
                initialPreview: ["{{asset($media_gallery->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($media_gallery->image!=NULL)?last(explode('/',$media_gallery->image)):''}}",
                    width: "120px"
                }]
                @endif
            });
        });
    </script>
@endsection
