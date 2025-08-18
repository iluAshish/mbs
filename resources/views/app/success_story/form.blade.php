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
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'success-stories/')}}">Success Stories</a>
                            </li>
                            <li class="breadcrumb-item active">{{@$title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <style>
            button.kv-file-remove.btn.btn-sm.btn-kv.btn-default.btn-outline-secondary {
                display: none;
            }
        </style>
        <section class="content">
            <div class="container-fluid">

                <form role="form" id="formWizard"
                action="{{@$key=='Copy'?url(Helper::sitePrefix().'product/create'):''}}" class="form--wizard"
                enctype="multipart/form-data" method="post">
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
                                <input type="text" name="title" id="title" placeholder="Title" maxlength="70"
                                       class="form-control required" autocomplete="off"
                                       value="{{ old('title', isset($success_story)?$success_story->title:'') }}">
                                <div class="help-block with-errors" id="title_error"></div>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label> Date*</label>
                                <input type="text" name="date" id="date" placeholder="Date" maxlength="70"
                                       class="form-control required" autocomplete="off"
                                       value="{{ old('date', isset($success_story)?$success_story->date:'') }}">
                                <div class="help-block with-errors" id="date_error"></div>
                                @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Image</label>
                                <div class="file-loading">
                                    <input id="image_1" name="image_1" type="file"
                                           accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image dimension must be 556 x 370 PX and Size must be less than 512 KB</span>

                                @if(@$key)
                                    @error('image_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label>Attribute</label>
                                <input type="text" name="image_1_attribute"
                                       id="image_1_attribute"
                                       placeholder="Alt='Attribute'"
                                       class="form-control placeholder-cls" autocomplete="off"
                                       value="{{ isset($success_story)?$success_story->image_1_attribute:'' }}">
                                @error('image_1_attribute')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Image</label>
                                <div class="file-loading">
                                    <input id="image_2" name="image_2" type="file"
                                           accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image dimension must be 556 x 370 PX and Size must be less than 512 KB</span>

                                @if(@$key)
                                    @error('image_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label>Attribute</label>
                                <input type="text" name="image_2_attribute"
                                       id="image_2_attribute"
                                       placeholder="Alt='Attribute'"
                                       class="form-control placeholder-cls" autocomplete="off"
                                       value="{{ isset($success_story)?$success_story->image_2_attribute:'' }}">
                                @error('image_2_attribute')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Image</label>
                                <div class="file-loading">
                                    <input id="image_3" name="image_3" type="file"
                                           accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image dimension must be 556 x 370 PX and Size must be less than 512 KB</span>

                                @if(@$key)
                                    @error('image_3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label>Attribute</label>
                                <input type="text" name="image_3_attribute"
                                       id="image_3_attribute"
                                       placeholder="Alt='Attribute'"
                                       class="form-control placeholder-cls" autocomplete="off"
                                       value="{{ isset($success_story)?$success_story->image_3_attribute:'' }}">
                                @error('image_3_attribute')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                         <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Short Description*</label>
                                <textarea name="short_description" id="short_description"
                                          placeholder="short description" class="form-control"
                                          autocomplete="off">{{ isset($success_story)?$success_story->short_description:'' }}</textarea>
                                <div class="help-block with-errors" id="short_description_error"></div>
                                @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <textarea name="description" id="description"
                                          placeholder="Description" class="form-control  tinyeditor"
                                          autocomplete="off">{{ isset($success_story)?$success_story->description:'' }}</textarea>
                                <div class="help-block with-errors" id="description_error"></div>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="gloss_card-footer">
                            <input type="submit" id="btn_save" name="btn_save"
                                   data-id="{{isset($success_story)?$success_story->id:''}}" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                                   @if(@$key)
                                   <input type="hidden" value="{{@$key}}" name="copy">
                                   <input type="hidden" value="{{@$success_story->id}}" name="copy_product_id">
                               @endif
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <input type="hidden" name="id" id="id" value="{{ isset($success_story)?$success_story->id:'0' }}">
                            <img class="animation__shake loadingImg" src="{{url('backend/dist/img/loading.gif')}}"
                                 style="display:none;">
                        </div>
                </form>
            </div>
        </section>
    </div>
    <script>
        function checkTinyEditorContent() {
            var editorContent = tinyMCE.get('alternate_description').getContent();
            var hasDescriptionError = true;
            var descriptionErrorDiv = document.getElementById('description_error');
            if (editorContent.trim() === '') {
                descriptionErrorDiv.innerHTML = '<p class="text-danger">Description is required.</p>';
                return false;
            } else {
                descriptionErrorDiv.innerHTML = '';
                return true;
            }
        }
        document.getElementById('formWizard').onsubmit = checkTinyEditorContent;
    </script>
    
    <script type="text/javascript">
        
        $(document).ready(function () {
           
            $("#image_1").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                // required: true,
                allowedFileExtensions: ['jpg','jpeg', 'png'],
                minImageWidth: 556,
                minImageHeight: 370,
                maxImageWidth: 556,
                maxImageHeight: 370,
                showRemove: true,
                @if(isset($success_story) && $success_story->image_1!=NULL)
                initialPreview: ["{{asset($success_story->image_1)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($success_story->image_1!=NULL)?last(explode('/',$success_story->image_1)):''}}",
                    width: "120px",
                    key: "{{'Product/image_1/'.$success_story->id.'/image_1' }}",
                }],
                @endif
            });
            $("#image_2").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                // required: true,
                allowedFileExtensions: ['jpg','jpeg', 'png'],
                minImageWidth: 556,
                minImageHeight: 370,
                maxImageWidth: 556,
                maxImageHeight: 370,
                showRemove: true,
                @if(isset($success_story) && $success_story->image_2!=NULL)
                initialPreview: ["{{asset($success_story->image_2)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($success_story->image_2!=NULL)?last(explode('/',$success_story->image_2)):''}}",
                    width: "120px",
                    key: "{{'Product/image_2/'.$success_story->id.'/image_2' }}",
                }],
                @endif
            });
            $("#image_3").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                // required: true,
                allowedFileExtensions: ['jpg','jpeg', 'png'],
                minImageWidth: 556,
                minImageHeight: 370,
                maxImageWidth: 556,
                maxImageHeight: 370,
                showRemove: true,
                @if(isset($success_story) && $success_story->image_3!=NULL)
                initialPreview: ["{{asset($success_story->image_3)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($success_story->image_3!=NULL)?last(explode('/',$success_story->image_3)):''}}",
                    width: "120px",
                    key: "{{'Product/image_3/'.$success_story->id.'/image_3' }}",
                }],
                @endif
            });

        });
    </script>
@endsection
