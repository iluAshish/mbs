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
                                    href="{{url(Helper::sitePrefix().'success-stories/awards/')}}/{{$success_story_id}}">Success Story Award</a></li>
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
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Title*</label>
                                    <input type="text" name="title" id="title" placeholder="Title" maxlength="70"
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('title', isset($success_award)?$success_award->title:'') }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file"
                                               accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 90 x 90 PX and Size must be less than 100 KB</span>
    
                                    @if(@$key)
                                        @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Attribute</label>
                                    <input type="text" name="image_attribute"
                                           id="image_attribute"
                                           placeholder="Alt='Attribute'"
                                           class="form-control placeholder-cls" autocomplete="off"
                                           value="{{ isset($success_award)?$success_award->image_attribute:'' }}">
                                    @error('image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Short Description</label>
                                    <textarea name="short_description" id="short_description"
                                              placeholder="short description" class="form-control"
                                              autocomplete="off">{{ isset($success_award)?$success_award->short_description:'' }}</textarea>
                                    <div class="help-block with-errors" id="short_description_error"></div>
                                    @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                                   <input type="hidden" name="success_story_id" id="success_story_id" value="{{$success_story_id}}">
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
                allowedFileExtensions: ['jpg','jpeg', 'png'],
                minImageWidth: 90,
                minImageHeight: 90,
                maxImageWidth: 90,
                maxImageHeight: 90,
                showRemove: true,
                @if(isset($success_award) && $success_award->image!=NULL)
                initialPreview: ["{{asset($success_award->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($success_award->image!=NULL)?last(explode('/',$success_award->image)):''}}",
                    width: "120px",
                    key: "{{'Award/image/'.$success_award->id.'/image' }}",
                }],
                @endif
            });

        });
    </script>
@endsection
