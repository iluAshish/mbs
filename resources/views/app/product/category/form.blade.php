@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header gloss_breadcrumbs">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> {{$title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{url(Helper::sitePrefix().'products/'.$urlType)}}">{{$type}}</a></li>
                            <li class="breadcrumb-item active">{{$key}}</li>
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
                            @php
                            use App\Models\Category;
                            $categories = Category::active()->get();
                            @endphp
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Category</label>
                                    <select name="parent_id" id="parent_id"
                                            class="form-control" >
                                        <option value="">Select Category</option>
                                            @foreach($categories as $category_new)
                                                <option value="{{$category_new->id}}"
                                                    {{ (@$category_new->id==@$category->parent_id)?'selected':'' }}
                                                >{{$category_new->title}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Title*</label>
                                    <input type="text" name="title" id="title" placeholder="Title"
                                           class="form-control for_canonical_url required" autocomplete="off"
                                           value="{{ isset($category)?$category->title:'' }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Short URL*</label>
                                    <input type="text" name="short_url" id="short_url" placeholder="Short URL"
                                           class="form-control required" autocomplete="off"
                                           value="{{ isset($category)?$category->short_url:'' }}">
                                    <div class="help-block with-errors" id="short_url_error"></div>
                                    @error('short_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="form-row" id="">
                                <div class="form-group col-md-6">
                                    <label> Listing Featured Image*</label>
                                    <div class="file-loading">
                                        <input id="featured_image" name="featured_image" type="file"
                                               accept="image/*">
                                    </div>
                                    <span
                                        class="caption_note">Note: Image dimension must be 350 x 300 PX and Size must be less than 512 KB</span>
                                    @error('thumbnail_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Featured Image Attribute</label>
                                    <input type="text" name="featured_image_attribute"
                                           id="featured_image_attribute"
                                           placeholder="Alt='Featured Image Attribute'"
                                           class="form-control placeholder-cls" autocomplete="off"
                                           value="{{ isset($category)?$category->featured_image_attribute:'' }}">
                                    @error('thumbnail_image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}
                            {{-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Product Page Thumbnail Image*</label>
                                    <div class="file-loading">
                                        <input id="thumbnail_image" name="thumbnail_image" type="file"
                                               accept="image/*">
                                    </div>
                                    <span
                                        class="caption_note">Note: Image size should be minimum of 455 x 770</span>
                                    @if(@$key)
                                        @error('thumbnail_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Thumbnail Attribute</label>
                                    <input type="text" name="thumbnail_image_attribute"
                                           id="thumbnail_image_attribute"
                                           placeholder="Alt='Thumbnail Attribute'"
                                           class="form-control placeholder-cls" autocomplete="off"
                                           value="{{ isset($category)?$category->thumbnail_image_attribute:'' }}">
                                    @error('thumbnail_image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="short_description">Short Description</label>
                                    <textarea class="form-control tinyeditor" id="short_description" placeholder="Short Description"
                                              name="short_description">{!! old('short_description', isset($category)?$category->short_description : '') !!}</textarea>
                                              <div class="help-block with-errors" id="short_description_error"></div>
                                              @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Banner Image</label>
                                    <div class="file-loading">
                                        <input id="banner_image" name="banner_image" type="file"
                                               accept="image/*">
                                    </div>
                                    <span
                                        class="caption_note">Note: Image size should be minimum of 1728 x 450</span>
                                    @if(@$key)
                                        @error('banner_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Banner Attribute</label>
                                    <input type="text" name="banner_image_attribute"
                                           id="banner_image_attribute"
                                           placeholder="Alt='Banner Attribute'"
                                           class="form-control placeholder-cls" autocomplete="off"
                                           value="{{ isset($category)?$category->banner_image_attribute:'' }}">
                                    @error('banner_image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Meta Title</label>
                                    <textarea class="form-control" id="meta_title" name="meta_title"
                                              placeholder="Meta Title">{{ isset($category)?$category->meta_title:'' }}</textarea>
                                    @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description"
                                              placeholder="Meta Description">{{ isset($category)?$category->meta_description:'' }}</textarea>
                                    @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Meta Keyword</label>
                                    <textarea class="form-control" id="meta_keyword" name="meta_keyword"
                                              placeholder="Meta Keyword">{{ isset($category)?$category->meta_keyword:'' }}</textarea>
                                    @error('meta_keyword')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Other Meta Tag</label>
                                    <textarea class="form-control" id="other_meta_tag" name="other_meta_tag"
                                              placeholder="Other Meta Tag">{{ isset($category)?$category->other_meta_tag:'' }}</textarea>
                                    @error('other_meta_tag')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> 
                        <div class="gloss_card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <img class="animation__shake loadingImg" src="{{asset('backend/dist/img/loading.gif')}}"
                                 style="display:none;">
                        </div>
                </form>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#thumbnail_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                layoutTemplates: {actionDelete: ''},
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileExtensions: ['jpg','jpeg', 'png'],
                minImageWidth: 770,
                minImageHeight: 455,
                maxImageWidth: 770,
                maxImageHeight: 455,
                maxFilesize: 512,
                showRemove: true,
                @if(isset($category) && $category->thumbnail_image!=NULL)
                initialPreview: ["{{asset($category->thumbnail_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($category->thumbnail_image!=NULL)?last(explode('/',$category->thumbnail_image)):''}}",
                    width: "120px"
                }]
                @endif

            });
            $("#banner_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileExtensions: ['jpg','jpeg', 'png'],
                minImageWidth: 1728,
                minImageHeight: 450,
                maxImageWidth: 1728,
                maxImageHeight: 450,
                maxFilesize: 512,
                showRemove: true,
                @if(isset($category) && $category->banner_image!=NULL)
                initialPreview: ["{{asset($category->banner_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($category->banner_image!=NULL)?last(explode('/',$category->banner_image)):''}}",
                    width: "120px",
                    key: "{{'Category/banner_image/'.$category->id.'/banner_image_webp' }}",
                }]
                @endif

            });

            $("#featured_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                layoutTemplates: {actionDelete: ''},
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileExtensions: ['jpg','jpeg', 'png'],
                minImageWidth: 350,
                minImageHeight: 300,
                maxImageWidth: 350,
                maxImageHeight: 300,
                maxFilesize: 512,
                showRemove: true,
                @if(isset($category) && $category->featured_image!=NULL)
                initialPreview: ["{{asset($category->featured_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($category->featured_image!=NULL)?last(explode('/',$category->featured_image)):''}}",
                    width: "120px"
                }]
                @endif
            });
        });
    </script>
@endsection
