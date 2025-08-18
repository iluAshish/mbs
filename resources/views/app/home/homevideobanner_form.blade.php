@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
    <section class="content-header gloss_breadcrumbs">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Home - Video Banner</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Video Banner</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
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
                    {{csrf_field()}}
                    <div class="gloss_card">
                        <div class="gloss_card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Title</label>
                                    <input type="text" name="title" id="title" placeholder="Title"
                                           class="form-control" autocomplete="off"
                                           value="{{ old('title',isset($video_banner)?$video_banner->title:'') }}" maxlength="255">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Sub Title</label>
                                    <input type="text" name="sub_title" id="sub_title" placeholder="Title"
                                           class="form-control" autocomplete="off"
                                           value="{{ old('sub_title',isset($video_banner)?$video_banner->sub_title:'') }}" maxlength="50">
                                    <div class="help-block with-errors" id="sub_title_error"></div>
                                    @error('sub_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Short Description</label>
                                    <textarea name="short_description" id="short_description"
                                              class="form-control"
                                              placeholder="Description">{{ old('short_description',isset($video_banner)?$video_banner->short_description:'') }}</textarea>
                                    <div class="help-block with-errors" id="short_description_error"></div>
                                    @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Video*</label>
                                    <div class="file-loading">
                                        <input id="video" type="file" name="video" accept="video/*">
                                    </div>
                                    <span class="caption_note">Note: Accepted formats - Videos (.mp4, .avi, .mov)</span>
                                    @error('video')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Image</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept=".png,.jpg">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 786 X 612</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label> Button Text</label>
                                    <input type="text" name="button_text" id="button_text" placeholder="Button Text"
                                           class="form-control" autocomplete="off"
                                           value="{{ old('button_text',isset($video_banner)?$video_banner->button_text:'') }}"
                                           maxlength="255">

                                    @error('button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label> Button URL</label>
                                    <input type="text" name="button_url" id="button_url" placeholder="Button URL"
                                           class="form-control" autocomplete="off"
                                           value="{{ old('button_url',isset($video_banner)?$video_banner->button_url:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="button_url_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="gloss_card-footer">
                            <input type="hidden" name="id" id="id" value="{{isset($video_banner)?$video_banner->id:'0'}}">

                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                                   <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            // $("#image").fileinput({
            //     'theme': 'explorer-fas',
            //     validateInitialCount: true,
            //     overwriteInitial: false,
            //     autoReplace: true,
            //     layoutTemplates: {actionDelete: ''},
            //     initialPreviewShowDelete: false,
            //     initialPreviewAsData: true,
            //     dropZoneEnabled: false,
            //     required: false,
            //     allowedFileTypes: ['image'],
            //     minImageWidth: 786,
            //     minImageHeight: 612,
            //     maxImageWidth: 786,
            //     maxImageHeight: 612,
            //     maxFileSize: 512,
            //     showRemove: false,
            //     @if(isset($video_banner) && $video_banner->image!=NULL)
            //     initialPreview: ["{{asset($video_banner->image)}}",],
            //     initialPreviewConfig: [{
            //         caption: "{{last(explode('/',$video_banner->image))}}",
            //         width: "120px",
            //         key: "{{'HomeAboutUs/sideimage/'.$video_banner->id.'/image_webp' }}",
            //     }]
            //     @endif
            // });
            $("#video").fileinput({
                theme: "fas",
                allowedFileExtensions: ["mp4", "mov", "avi", "wmv"],
                maxFileCount: 1, // Limit to one file
                overwriteInitial: false,
                layoutTemplates: {actionDelete: ''},
                showUpload: false, // Disable upload button (you can enable it if needed)
                showRemove: false, // Disable remove button (you can enable it if needed)
                showCaption: false, // Hide the caption
                browseClass: "btn btn-primary",
                browseLabel: "Pick Video",
                removeClass: "btn btn-danger",
                removeLabel: "Remove",
                cancelClass: "btn btn-secondary",
                cancelLabel: "Cancel",
                @if(isset($video_banner) && $video_banner->video!=NULL)
                    initialPreview: ['<video id="videoPreview" width="320" height="240" controls src="{{ asset($video_banner->video) }}">Your browser does not support the video tag.</video>',],
                    initialPreviewConfig: [{
                        caption: "{{ ($video_banner->title)}}",
                        width: "120px",
                        key: "{{'HomeVideoBanner/video/'.$video_banner->id.'/video' }}",
                    }]
                    @endif
            });
        });
    </script>
    <style>
        .krajee-default.file-preview-frame .kv-file-content{
            width: auto;
        }
    </style>
@endsection
