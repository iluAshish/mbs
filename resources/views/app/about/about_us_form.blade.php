@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header gloss_breadcrumbs">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>About Us</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">About Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">

                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
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
                                    <label> Title*</label>
                                    <input type="text" name="title" id="title" placeholder="Title"
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('title',isset($about)?$about->title:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Sub Title</label>
                                    <input type="text" name="sub_title" id="sub_title"
                                           placeholder="Sub Title"
                                           class="form-control " autocomplete="off"
                                           value="{{ old('sub_title',isset($about)?$about->sub_title:'') }}"
                                           maxlength="255">
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
                                              placeholder="Short Description"
                                    >{{ old('short_description',isset($about)?$about->short_description:'') }}</textarea>
                                    <div class="help-block with-errors" id="short_description_error"></div>
                                    @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label> Description*</label>
                                    <textarea name="description" id="description"
                                              class="form-control tinyeditor required"
                                              placeholder="Description"
                                    >{{ old('description',isset($about)?$about->description:'') }}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" class="" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 250 X 251</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>

                                    @enderror
                                    <div class="help-block with-errors" id="image_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Image Attribute *</label>
                                    <input type="text" class="form-control placeholder-cls required"
                                           id="image_attribute"
                                           name="image_attribute" placeholder="Alt='Home Image Attribute'"
                                           value="{{ old('image_attribute',isset($about)?$about->image_attribute:'') }}"
                                           maxlength="255">
                                           <div class="help-block with-errors" id="image_attribute_error"></div>
                                    @error('image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Alternate Description</label>
                                    <textarea name="alternate_description" id="alternate_description"
                                              class="form-control tinyeditor "
                                              placeholder="Alternate Description"
                                    >{{ old('alternate_description',isset($about)?$about->alternate_description:'') }}</textarea>
                                    <div class="help-block with-errors" id="alternate_description_error"></div>
                                    @error('alternate_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- // mission and vision section -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Mission Title*</label>
                                    <input type="text" name="mission_title" id="mission_title" placeholder="Mission Title"
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('mission_title',isset($about)?$about->mission_title:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="mission_title_error"></div>
                                    @error('mission_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Mission Description</label>
                                    <textarea name="mission_description" id="mission_description"
                                              class="form-control tinyeditor"
                                              placeholder="Mission Description"
                                    >{{ old('mission_description',isset($about)?$about->mission_description:'') }}</textarea>
                                    <div class="help-block with-errors" id="mission_description_error"></div>
                                    @error('mission_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Vision Title*</label>
                                    <input type="text" name="vision_title" id="vision_title" placeholder="Vision Title"
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('vision_title',isset($about)?$about->vision_title:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="vision_title_error"></div>
                                    @error('vision_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Vision Description</label>
                                    <textarea name="vision_description" id="vision_description"
                                              class="form-control tinyeditor"
                                              placeholder="Vision Description"
                                    >{{ old('vision_description',isset($about)?$about->vision_description:'') }}</textarea>
                                    <div class="help-block with-errors" id="vision_description_error"></div>
                                    @error('vision_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Mission/Vision Image</label>
                                    <div class="file-loading">
                                        <input id="mission_vision_image" name="mission_vision_image" class="" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 500 X 400</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>

                                    @enderror
                                    <div class="help-block with-errors" id="image_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mission/Vision Image Attribute *</label>
                                    <input type="text" class="form-control placeholder-cls"
                                           id="mission_vision_image_attribute"
                                           name="mission_vision_image_attribute" placeholder="Alt='Home Image Attribute'"
                                           value="{{ old('mission_vision_image_attribute',isset($about)?$about->mission_vision_image_attribute:'') }}"
                                           maxlength="255">
                                           <div class="help-block with-errors" id="mission_vision_image_attribute_error"></div>
                                    @error('mission_vision_image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <!-- // mission and vision section end -->

                            <!-- core value is here -->

                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label> Core Valuee description</label>
                                    <textarea name="core_value_description" id="core_value_description"
                                              class="form-control tinyeditor"
                                              placeholder="core value Description"
                                    >{{ old('core_value_description',isset($about)?$about->core_value_description:'') }}</textarea>
                                    <div class="help-block with-errors" id="core_value_description_error"></div>
                                    @error('core_value_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Core Value Image</label>
                                    <div class="file-loading">
                                        <input id="core_value_image" name="core_value_image" class="" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 500 X 400</span>
                                    @error('core_value_image')
                                    <div class="invalid-feedback">{{ $message }}</div>

                                    @enderror
                                    <div class="help-block with-errors" id="image_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Core Value Image Attribute</label>
                                    <input type="text" class="form-control placeholder-cls"
                                           id="core_value_image_attribute"
                                           name="core_value_image_attribute" placeholder="Alt='Home Image Attribute'"
                                           value="{{ old('core_value_image_attribute',isset($about)?$about->core_value_image_attribute:'') }}"
                                           maxlength="255">
                                           <div class="help-block with-errors" id="core_value_image_attribute_error"></div>
                                    @error('core_value_image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <!-- core value end here  -->

                            <!-- ceo section start here -->

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label> CEO Name*</label>
                                    <input type="text" name="ceo_name" id="ceo_name" placeholder="ceo_name"
                                           class="form-control" autocomplete="off"
                                           value="{{ old('ceo_name',isset($about)?$about->ceo_name:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="ceo_name_error"></div>
                                    @error('ceo_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label> Designation Title*</label>
                                    <input type="text" name="designation" id="designation" placeholder="designation"
                                           class="form-control" autocomplete="off"
                                           value="{{ old('designation',isset($about)?$about->designation:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="designation_error"></div>
                                    @error('designation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>CEO description</label>
                                    <textarea name="ceo_description" id="ceo_description"
                                              class="form-control tinyeditor"
                                              placeholder="Mission Description"
                                    >{{ old('ceo_description',isset($about)?$about->ceo_message_description:'') }}</textarea>
                                    <div class="help-block with-errors" id="ceo_description_error"></div>
                                    @error('ceo_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>CEO Image</label>
                                    <div class="file-loading">
                                        <input id="ceo_image" name="ceo_image" class="" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 500 X 400</span>
                                    @error('ceo_image')
                                    <div class="invalid-feedback">{{ $message }}</div>

                                    @enderror
                                    <div class="help-block with-errors" id="image_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>CEO Attribute</label>
                                    <input type="text" class="form-control placeholder-cls"
                                           id="ceo_image_attribute"
                                           name="ceo_image_attribute" placeholder="Alt='Home Image Attribute'"
                                           value="{{ old('ceo_image_attribute',isset($about)?$about->ceo_image_alt:'') }}"
                                           maxlength="255">
                                           <div class="help-block with-errors" id="ceo_image_attribute_error"></div>
                                    @error('ceo_image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <!-- ceo section end here -->

                            <!-- legacy section start here -->

                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label>Legacy description</label>
                                    <textarea name="legacy_description" id="legacy_description"
                                              class="form-control tinyeditor"
                                              placeholder="Mission Description"
                                    >{{ old('legacy_description',isset($about)?$about->legacy_description:'') }}</textarea>
                                    <div class="help-block with-errors" id="legacy_description_error"></div>
                                    @error('legacy_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Legacy Image</label>
                                    <div class="file-loading">
                                        <input id="legacy_image" name="legacy_image" class="" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 500 X 400</span>
                                    @error('legacy_image')
                                    <div class="invalid-feedback">{{ $message }}</div>

                                    @enderror
                                    <div class="help-block with-errors" id="image_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Legacy Attribute</label>
                                    <input type="text" class="form-control placeholder-cls"
                                           id="legacy_image_attribute"
                                           name="legacy_image_attribute" placeholder="Alt='Home Image Attribute'"
                                           value="{{ old('legacy_image_attribute',isset($about)?$about->legacy_image_attribute:'') }}"
                                           maxlength="255">
                                           <div class="help-block with-errors" id="legacy_image_attribute_error"></div>
                                    @error('legacy_image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <!-- legacy section end here -->

                            <!-- reginal section start here -->

                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label>Regional description</label>
                                    <textarea name="regional_description" id="regional_description"
                                              class="form-control tinyeditor"
                                              placeholder="Regional Description"
                                    >{{ old('regional_description',isset($about)?$about->regional_description:'') }}</textarea>
                                    <div class="help-block with-errors" id="regional_description_error"></div>
                                    @error('regional_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Reginal Image</label>
                                    <div class="file-loading">
                                        <input id="regional_image" name="reginal_image" class="" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 500 X 400</span>
                                    @error('reginal_image')
                                    <div class="invalid-feedback">{{ $message }}</div>

                                    @enderror
                                    <div class="help-block with-errors" id="image_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Reginal Attribute</label>
                                    <input type="text" class="form-control placeholder-cls"
                                           id="regional_image_attribute"
                                           name="regional_image_attribute" placeholder="Alt='Home Image Attribute'"
                                           value="{{ old('regional_image_attribute',isset($about)?$about->regional_image_attribute:'') }}"
                                           maxlength="255">
                                           <div class="help-block with-errors" id="regional_image_attribute_error"></div>
                                    @error('regional_image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <!-- reginal section end here  -->

                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id" id="id" value="{{isset($about)?$about->id:'0'}}">
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
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                // minImageWidth: 786,
                // minImageHeight: 612,
                // maxImageWidth: 786,
                // maxImageHeight: 612,
                // maxFileSize: 512,
                showRemove: true,
                @if(isset($about) && $about->image!=NULL)
                initialPreview: ["{{asset($about->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$about->image))}}",
                    width: "120px",
                    key: "{{'AboutUs/image/'.$about->id.'/webp_image' }}",
                }]
                @endif
            });
        });

        $(document).ready(function () {
            $("#regional_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                // minImageWidth: 400,
                // minImageHeight: 500,
                // maxImageWidth: 786,
                // maxImageHeight: 612,
                // maxFileSize: 512,
                showRemove: true,
                @if(isset($about) && $about->regional_image!=NULL)
                initialPreview: ["{{asset($about->regional_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$about->regional_image))}}",
                    width: "120px",
                    key: "{{'AboutUs/image/'.$about->id.'/webp_image' }}",
                }]
                @endif
            });
        });

        $(document).ready(function () {
            $("#ceo_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                // minImageWidth: 400,
                // minImageHeight: 500,
                // maxImageWidth: 786,
                // maxImageHeight: 612,
                // maxFileSize: 512,
                showRemove: true,
                @if(isset($about) && $about->ceo_image!=NULL)
                initialPreview: ["{{asset($about->ceo_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$about->ceo_image))}}",
                    width: "120px",
                    key: "{{'AboutUs/image/'.$about->id.'/webp_image' }}",
                }]
                @endif
            });
        });

        $(document).ready(function () {
            $("#mission_vision_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                // minImageWidth: 400,
                // minImageHeight: 500,
                // maxImageWidth: 786,
                // maxImageHeight: 612,
                // maxFileSize: 512,
                showRemove: true,
                @if(isset($about) && $about->mission_vision_image!=NULL)
                initialPreview: ["{{asset($about->mission_vision_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$about->mission_vision_image))}}",
                    width: "120px",
                    key: "{{'AboutUs/image/'.$about->id.'/webp_image' }}",
                }]
                @endif
            });
        });

        $(document).ready(function () {
            $("#core_value_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                // minImageWidth: 400,
                // minImageHeight: 500,
                // maxImageWidth: 786,
                // maxImageHeight: 612,
                // maxFileSize: 512,
                showRemove: true,
                @if(isset($about) && $about->core_value_image!=NULL)
                initialPreview: ["{{asset($about->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$about->core_value_image))}}",
                    width: "120px",
                    key: "{{'AboutUs/core_value_image/'.$about->id.'/webp_image' }}",
                }]
                @endif
            });
        });

        $(document).ready(function () {
            $("#legacy_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                // minImageWidth: 400,
                // minImageHeight: 500,
                // maxImageWidth: 786,
                // maxImageHeight: 612,
                // maxFileSize: 512,
                showRemove: true,
                @if(isset($about) && $about->legacy_image!=NULL)
                initialPreview: ["{{asset($about->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$about->legacy_image))}}",
                    width: "120px",
                    key: "{{'AboutUs/legacy_image/'.$about->id.'/webp_image' }}",
                }]
                @endif
            });
        });

    </script>
@endsection
