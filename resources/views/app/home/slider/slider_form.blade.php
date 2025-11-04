@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header gloss_breadcrumbs">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Home - {{$title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'home/slider')}}">Slider</a></li>
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
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" placeholder="Title" class="form-control"
                                    autocomplete="off" value="{{old('title',isset($slider)?$slider->title:'')}}">
                            <div class="help-block with-errors" id="title_error"></div>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- <div class="form-group col-md-6">
                            <label for="title">Sub Title</label>
                            <input type="text" name="sub_title" id="sub_title" placeholder="Sub Title" class="form-control"
                                    autocomplete="off" value="{{old('sub_title',isset($slider)?$slider->sub_title:'')}}">
                            <div class="help-block with-errors" id="sub_title_error"></div>
                            @error('sub_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> -->
                    </div>

                    <!-- <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Slider Image</label>
                            <div class="file-loading">
                                <input id="image" name="image" type="file" accept=".jpg,.png">
                            </div>
                            <span class="caption_note">Note: Image size must be 579 x 658</span>
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image_attribute">Image Meta Tag</label>
                            <input type="text" name="image_attribute" id="image_attribute"
                                    placeholder="Image Meta Tag"
                                    class="form-control isset($slider->image_attribute)?'':'placeholder-cls'" autocomplete="off"
                                    value="{{ isset($slider)?$slider->image_attribute:'' }}" maxlength="255">
                            <div class="help-block with-errors" id="image_attribute_error"></div>
                            @error('image_attribute')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Slider Banner Image*</label>
                            <div class="file-loading">
                                <input id="bg_image" name="bg_image" type="file" accept=".jpg,.png">
                            </div>
                            <span class="caption_note">Note: Image size must be 1367 x 677</span>
                            @error('bg_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bg_image_attribute">Image Meta Tag</label>
                            <input type="text" name="bg_image_attribute" id="bg_image_attribute"
                                    placeholder="Image Meta Tag"
                                    class="form-control isset($slider->bg_image_attribute)?'':'placeholder-cls'" autocomplete="off"
                                    value="{{ isset($slider)?$slider->bg_image_attribute:'' }}" maxlength="255">
                            <div class="help-block with-errors" id="bg_image_attribute_error"></div>
                            @error('bg_image_attribute')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- <div class="form-group col-md-6">
                            <label>Button Text </label>
                            <input type="text" class="form-control" id="button_text" name="button_text" placeholder="Button Text"
                                    value="{{ old('button_text',isset($slider)?$slider->button_txt:'') }}" maxlength="255">
                            @error('button_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> -->
                        <div class="form-group col-md-6">
                            <label> URL </label>
                            <input type="text" class="form-control" id="button_url" name="button_url" placeholder="Redirect URL"
                                    value="{{ old('button_url',isset($slider)?$slider->button_url:'') }}" maxlength="255">
                            @error('button_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="submit" class="btn btn-success form_submit_btn submitBtn"
                                    value="Submit">
                            <input type="reset" class="btn btn-default" value="Reset">
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
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                // required: true,
                allowedFileTypes: ['image'],
                minImageWidth: 579,
                minImageHeight: 658,
                maxImageWidth: 579,
                maxImageHeight: 658,
                maxFileSize: 1024,
                showRemove: true,
                @if(isset($slider) && $slider->image!=NULL)
                initialPreview: ["{{asset($slider->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($slider->image!=NULL)?$slider->title1:''}}",
                    width: "120px",
                    key: "{{'HomeBanner/image/'.$slider->id.'/image_webp' }}",
                }]
                @endif
            });
            $("#bg_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileTypes: ['image'],
                minImageWidth: 1367,
                minImageHeight: 677,
                maxImageWidth: 1367,
                maxImageHeight: 677,
                maxFileSize: 2024,
                showRemove: true,
                @if(isset($slider) && $slider->bg_image!=NULL)
                initialPreview: ["{{asset($slider->bg_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($slider->bg_image!=NULL)?$slider->title1:''}}",
                    width: "120px",
                    key: "{{'HomeBanner/image/'.$slider->id.'/bg_image_webp' }}",
                }]
                @endif
            });
        });
    </script>
@endsection