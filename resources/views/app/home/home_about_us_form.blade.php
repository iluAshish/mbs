@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header gloss_breadcrumbs">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Home - About Us</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">About-us</li>
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
                                    <label> Experience*</label>
                                    <input type="text" name="title" id="title" placeholder="Title"
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('title',isset($about)?$about->title:'') }}" maxlength="255">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Title*</label>
                                    <input type="text" name="sub_title" id="sub_title" placeholder="Title"
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('sub_title',isset($about)?$about->sub_title:'') }}" maxlength="50">
                                    <div class="help-block with-errors" id="sub_title_error"></div>
                                    @error('sub_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label> Years of Experience*</label>
                                    <input type="text" name="years_of_experience" id="years_of_experience" placeholder="Title"
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('years_of_experience',isset($about)?$about->years_of_experience:'') }}" maxlength="50">
                                    <div class="help-block with-errors" id="years_of_experience_error"></div>
                                    @error('years_of_experience')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Short Description*</label>
                                    <textarea name="short_description" id="short_description"
                                              class="form-control tinyeditor required"
                                              placeholder="Description">{{ old('short_description',isset($about)?$about->short_description:'') }}</textarea>
                                    <div class="help-block with-errors" id="short_description_error"></div>
                                    @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Image *</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept=".png,.jpg">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 786 X 612</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Image Attribute*</label>
                                    <input type="text" class="form-control placeholder-cls required"
                                           id="image_attribute"
                                           name="image_attribute" placeholder="Alt='Image Attribute'"
                                           value="{{ old('image_attribute',isset($about)?$about->image_attribute:'') }}"
                                           maxlength="255">
                                            <div class="help-block with-errors" id="image_attribute_error"></div>
                                    @error('image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label> Button Text</label>
                                    <input type="text" name="button_text" id="button_text" placeholder="Button Text"
                                           class="form-control" autocomplete="off"
                                           value="{{ old('button_text',isset($about)?$about->button_text:'') }}"
                                           maxlength="255">

                                    @error('button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label> Button URL</label>
                                    <input type="text" name="button_url" id="button_url" placeholder="Button URL"
                                           class="form-control" autocomplete="off"
                                           value="{{ old('button_url',isset($about)?$about->button_url:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="button_url_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="gloss_card-footer">
                            <input type="hidden" name="id" id="id" value="{{isset($about)?$about->id:'0'}}">

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
            $("#image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                // minImageWidth: 459,
                // minImageHeight: 489,
                // maxImageWidth: 459,
                // maxImageHeight: 489,
                maxFileSize: 512,
                showRemove: false,
                @if(isset($about) && $about->image!=NULL)
                initialPreview: ["{{asset($about->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$about->image))}}",
                    width: "120px",
                    key: "{{'HomeAboutUs/sideimage/'.$about->id.'/image_webp' }}",
                }]
                @endif
            });
        });
    </script>
@endsection
