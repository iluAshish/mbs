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
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'media')}}">media</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
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
                                <div class="form-group col-md-6">
                                    <label> Title*</label>
                                    <input type="text" name="title" id="title"
                                           placeholder="Title"
                                           class="form-control required for_canonical_url" autocomplete="off" maxlength="255"
                                           value="{{ old('title',isset($media)?$media->title:'') }}">
                                           <div class="help-block with-errors" id="title_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Short URL *</label>
                                    <input type="text" name="short_url" id="short_url" placeholder="Short URL"
                                        class="form-control required" autocomplete="off"
                                        value="{{ old('short_url',isset($media)?$media->short_url:'')}}">
                                    <div class="help-block with-errors" id="short_url_error"></div>
                                    @error('short_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Image</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file"
                                            accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 1728 x 450</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Image Attribute</label>
                                    <input type="text" name="image_attribute"
                                        id="image_attribute"
                                        placeholder="Alt='Image Attribute'"
                                        class="form-control placeholder-cls" autocomplete="off"
                                        value="{{ old('image_attribute',isset($media)?$media->image_attribute:'') }}">
                                    @error('image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Description</label>
                                    <textarea name="description" id="description"
                                            placeholder="Description" class="form-control  tinyeditor"
                                            autocomplete="off">{{ old('description',isset($media)?$media->description:'') }}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Meta Title</label>
                                    <textarea class="form-control" id="meta_title" name="meta_title"
                                            placeholder="Meta Title">{{ old('meta_title',isset($media)?$media->meta_title:'') }}</textarea>
                                    @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description"
                                            placeholder="Meta Description">{{ old('meta_description',isset($media)?$media->meta_description:'') }}</textarea>
                                    @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Meta Keyword</label>
                                    <textarea class="form-control" id="meta_keyword" name="meta_keyword"
                                            placeholder="Meta Keyword">{{ old('meta_keyword',isset($media)?$media->meta_keyword:'') }}</textarea>
                                    @error('meta_keyword')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Other Meta Tag</label>
                                    <textarea class="form-control" id="other_meta_tag" name="other_meta_tag"
                                            placeholder="Other Meta Tag">{{ old('other_meta_tag',isset($media)?$media->other_meta_tag:'') }}</textarea>
                                    @error('other_meta_tag')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <div class="gloss_card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}"
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
                initialPreviewShowDelete: true,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileExtensions: ['jpg','jpeg', 'png'],
                // minImageWidth: 1728,
                // minImageHeight: 450,
                // maxImageWidth: 1728,
                // maxImageHeight: 450,
                // maxFilesize: 512,
                showRemove: true,
                @if(isset($media) && $media->image!=NULL)
                initialPreview: ["{{asset($media->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($media->image!=NULL)?last(explode('/',$media->image)):''}}",
                    width: "120px",
                    key: "{{'media/image/'.$media->id.'/image_webp' }}",
                }]
                @endif

            });


    
        });
    </script>
@endsection
