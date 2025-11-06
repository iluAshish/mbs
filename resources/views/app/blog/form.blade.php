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
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'media/')}}/{{$type}}">{{ucwords(str_replace('-', ' ', $type))}}</a></li>
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
                                    <input type="text" name="title"  id="title" placeholder="Title "
                                           class="form-control required for_canonical_url"
                                           autocomplete="off" value="{{ old('title',isset($blog)?$blog->title:'') }}"
                                           maxlength="255" >
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Canonical URL*</label>
                                    <input type="text" name="short_url" id="short_url" placeholder="Canonical URL"
                                           class="form-control required"
                                           autocomplete="off"
                                           value="{{ old('short_url',isset($blog)?$blog->short_url:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="short_url_error"></div>
                                    @error('short_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
        <!--                     <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Banner Image</label>
                                    <div class="file-loading">
                                        <input id="banner_image" name="banner_image" type="file" accept="banner_image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 1920 x 600 PX and Size must be less than 512 KB</span>
                                    @error('banner_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Banner Image Attribute</label>
                                    <input type="text" name="banner_image_attribute" id="banner_image_attribute"
                                           placeholder="Alt='Banner Attribute'"
                                           class="form-control placeholder-cls" autocomplete="off" maxlength="255"
                                           value="{{ old('banner_image_attribute',isset($blog)?$blog->banner_image_attribute:'') }}">
                                </div>
                            </div> -->
                            <!-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Banner Title</label>
                                    <input type="text" name="banner_title" id="banner_title"
                                           placeholder="Banner Title " class="form-control"
                                           autocomplete="off"
                                           value="{{ old('banner_title',isset($blog)?$blog->banner_title:'') }}"
                                           maxlength="255">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Banner Sub Title</label>
                                    <input type="text" name="banner_sub_title" id="banner_sub_title"
                                           placeholder="Banner Title " class="form-control"
                                           autocomplete="off"
                                           value="{{ old('banner_sub_title',isset($blog)?$blog->banner_sub_title:'') }}"
                                           maxlength="255">
                                </div>
                            </div> -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Posted date* </label>
                                             @php


                                                $dt = Carbon\Carbon::now();
                                               $now= $dt->toDateString();
                                                @endphp

                                    <input type="datetime-local" name="posted_date" id="posted_date" placeholder="Posted Date"
                                           class="form-control required"
                                           autocomplete="off" max="{{$now}}"
                                           value="{{ old('posted_date',isset($blog)?$blog->posted_date:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="posted_date_error"></div>
                                    @error('posted_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Written By</label>
                                    <input type="text" name="written_by" id="written_by" placeholder="Written By "
                                           class="form-control "  onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}
                                           autocomplete="off"
                                           value="{{ old('written_by',isset($blog)?$blog->written_by:'') }}"
                                           maxlength="60">
                                    <div class="help-block with-errors" id="written_by_error"></div>
                                    @error('written_by')
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
                                    <span class="caption_note">Note: Image dimension must be 874 x 421 PX and Size must be less than 512 KB</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Image Attribute</label>
                                    <input type="text" name="image_attribute" id="image_attribute"
                                           placeholder="Alt='Banner Attribute'"
                                           class="form-control placeholder-cls" autocomplete="off" maxlength="255"
                                           value="{{ old('image_attribute',isset($blog)?$blog->image_attribute:'') }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Admin Image</label>
                                    <div class="file-loading">
                                        <input id="admin_image" name="admin_image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 179 x 178 PX and Size must be less than 512 KB</span>
                                    @error('admin_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Admin Image Attribute</label>
                                    <input type="text" name="admin_image_attribute" id="admin_image_attribute"
                                           placeholder="Alt='Banner Attribute'"
                                           class="form-control placeholder-cls" autocomplete="off" maxlength="255"
                                           value="{{ old('admin_image_attribute',isset($blog)?$blog->admin_image_attribute:'') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Description*</label>
                                    <textarea class="form-control tinyeditor required" id="description" name="description"
                                              placeholder="Description ">
                                    {{ old('description',isset($blog)?$blog->description:'') }}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="thumbnail_image">Alternate Image</label>
                                    <div class="file-loading">
                                        <input id="video_thumbnail_image" name="video_thumbnail_image" type="file"
                                               accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 874 x 421 PX and Size must be less than 512 KB</span>
                                    @error('video_thumbnail_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Alternate Image Attribute</label>
                                    <input type="text" class="form-control placeholder-cls" id="video_attribute"
                                           name="video_attribute"
                                           placeholder="Alt='Banner Attribute'" maxlength="255"
                                           value="{{ old('video_attribute',isset($blog)?$blog->video_thumbnail_attribute:'') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Alternate Description </label>
                                    <textarea class="form-control tinyeditor " id="alternate_description"
                                              name="alternate_description" placeholder="Alternate Description ">
                                    {{ old('alternate_description',isset($blog)?$blog->alternate_description:'') }}</textarea>
                                    <div class="help-block with-errors" id="alternate_description_error"></div>
                                    @error('alternate_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>
                            {{-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Video Url</label>
                                    <input type="text" class="form-control" id="video_url"
                                           name="video_url"
                                           placeholder="" maxlength="255"
                                           value="{{ old('video_url',isset($blog)?$blog->video_url:'') }}">
                                </div>
                            </div> --}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Meta Title</label>
                                    <textarea class="form-control" id="meta_title" name="meta_title"
                                              placeholder="Meta Title">{{ old('meta_title',isset($blog)?$blog->meta_title:'') }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description"
                                              placeholder="Meta Description">{{ old('meta_description',isset($blog)?$blog->meta_description:'') }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Meta Keyword</label>
                                    <textarea class="form-control" id="meta_keyword" name="meta_keyword"
                                              placeholder="Meta Keyword">{{ old('meta_keyword',isset($blog)?$blog->meta_keyword:'') }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Other Meta Tag</label>
                                    <textarea class="form-control" id="other_meta_tag" name="other_meta_tag"
                                              placeholder="Other Meta Tag">{{ old('other_meta_tag',isset($blog)?$blog->other_meta_tag:'') }}</textarea>
                                </div>
                            </div>
                        <div class="gloss-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}"
                                 style="display:none;">
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
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                allowedFileTypes: ['image'],
                // minImageWidth: 874,
                // minImageHeight: 421,
                // maxImageWidth: 874,
                // maxImageHeight: 421,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($blog) && $blog->image!=NULL)
                 required: false,
                initialPreview: [
                    "{{asset($blog->image)}}",
                ],
                initialPreviewConfig: [
                    {
                        caption: "{{last(explode('/',$blog->image))}}", width: "120px",
                        key: "{{'Blog/image/'.$blog->id.'/image_webp' }}",
                    }]
                @else
                required: true
                @endif
            });

            $("#video_thumbnail_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                // minImageWidth: 874,
                // minImageHeight: 421,
                // maxImageWidth: 874,
                // maxImageHeight: 421,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($blog) && $blog->video_thumbnail_image!=NULL)
                initialPreview: ["{{asset($blog->video_thumbnail_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$blog->video_thumbnail_image))}}",
                    width: "120px",
                    key: "{{'Blog/video_thumbnail_image/'.$blog->id.'/video_thumbnail_image_webp' }}",
                }]
                @endif
            });

            $("#admin_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                minImageWidth: 100,
                minImageHeight: 100,
                maxImageWidth: 200,
                maxImageHeight: 200,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($blog) && $blog->admin_image!=NULL)
                initialPreview: ["{{asset($blog->admin_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$blog->admin_image))}}",
                    width: "120px",
                    key: "{{'Blog/admin_image/'.$blog->id.'/admin_image_webp' }}",
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
                allowedFileTypes: ['image'],
                // minImageWidth: 874,
                // minImageHeight: 421,
                // maxImageWidth: 874,
                // maxImageHeight: 421,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($blog) && $blog->banner_image!=NULL)
                initialPreview: ["{{asset($blog->banner_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$blog->banner_image))}}",
                    width: "120px",
                    key: "{{'Blog/banner_image/'.$blog->id.'/banner_image_webp' }}",
                }]
                @endif
            });
        });
    </script>
@endsection
