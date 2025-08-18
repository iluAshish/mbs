@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Home Contact Us</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Home Contact Us</li>
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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Home Contact Us Form</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Title*</label>
                                    <input type="text" name="title" id="title" placeholder="Title"
                                           class="form-control required" autocomplete="off"
                                           value="{{ isset($contact)?$contact->title:'' }}" maxlength="255">
                                    <div class="help-block with-errors" id="title_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Second Title*</label>
                                    <input type="text" name="second_title" id="second_title" placeholder="Second Title"
                                           class="form-control" autocomplete="off"
                                           value="{{ isset($contact)?$contact->second_title:'' }}" maxlength="255">
                                    <div class="help-block with-errors" id="second_title_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Sub Title*</label>
                                    <input type="text" name="sub_title" id="sub_title" placeholder="Sub Title"
                                           class="form-control" autocomplete="off"
                                           value="{{ isset($contact)?$contact->sub_title:'' }}" maxlength="255">
                                    <div class="help-block with-errors" id="sub_title_error"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Description*</label>
                                    <textarea name="description" id="description"
                                              class="form-control tinyeditor required"
                                              placeholder="Description">{{ isset($contact)?$contact->description:'' }}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                </div>
                            </div>
                            {{--                            <div class="form-row">--}}
                            {{--                                <div class="form-group col-md-4">--}}
                            {{--                                    <label> Image*</label>--}}
                            {{--                                    <div class="file-loading">--}}
                            {{--                                        <input id="image" name="image" type="file" accept="image/*">--}}
                            {{--                                    </div>--}}
                            {{--                                    <span class="caption_note">Note: Image size must be 1301 X 504</span>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="form-group col-md-4">--}}
                            {{--                                    <label> Image(Webp)</label>--}}
                            {{--                                    <div class="file-loading">--}}
                            {{--                                        <input id="webp_image" name="webp_image" type="file" accept="image/*">--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="form-group col-md-4">--}}
                            {{--                                    <label> Image Attribute *</label>--}}
                            {{--                                    <input type="text" class="form-control placeholder-cls" id="image_attribute" name="image_attribute" placeholder="Alt='Home Image Attribute'" value="{{ isset($contact)?$contact->image_attribute:'' }}" maxlength="255">--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Button Text*</label>
                                    <input type="text" name="button_text" id="button_text" placeholder="Button Text"
                                           class="form-control required" autocomplete="off"
                                           value="{{ isset($contact)?$contact->button_text:'' }}" maxlength="255">
                                    <div class="help-block with-errors" id="button_text_error"></div>
                                </div>
                                {{--                                <div class="form-group col-md-6">--}}
                                {{--                                    <label> Button URL</label>--}}
                                {{--                                    <input type="text" name="button_url" id="button_url" placeholder="Button URL" class="form-control" autocomplete="off" value="{{ isset($contact)?$contact->button_url:'' }}" maxlength="255">--}}
                                {{--                                    <div class="help-block with-errors" id="button_url_error"></div>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id" id="id" value="{{isset($contact)?$contact->id:'0'}}">
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
                required: true,
                allowedFileTypes: ['image'],
                minImageWidth: 1301,
                minImageHeight: 504,
                maxImageWidth: 1301,
                maxImageHeight: 504,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($contact) && $contact->image!=NULL)
                initialPreview: [
                    "{{asset($contact->image)}}",
                ],
                initialPreviewConfig: [
                    {caption: "{!! ($contact->image!=NULL)?$contact->title:'';!!}", width: "120px"}
                ]
                @endif
            });

            $("#webp_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileExtensions: ["webp"],
                maxFileSize: 512,
                showRemove: true,
                @if(isset($contact) && $contact->webp_image!=NULL)
                initialPreview: [
                    "{{asset($contact->webp_image)}}",
                ],
                initialPreviewConfig: [
                    {caption: "{!! ($contact->webp_image!=NULL)?$contact->title:'';!!}", width: "120px"},
                ]
                @endif
            });
        });
    </script>
@endsection
