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
                            <li class="breadcrumb-item active">{{$title}}</li>
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
                    {{csrf_field()}}

                    <div class="gloss_card">
                        <div class="gloss_card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Banner Title*</label>
                                    <input type="text" class="form-control required" name="title"
                                           placeholder="Banner Title"
                                           id="title"
                                           value="{{ old('title',isset($banner)?$banner->title:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- <div class="form-group col-md-6">
                                    <label for="inputPassword4">Banner Sub Title</label>
                                    <input type="text" class="form-control" name="sub_title"
                                           placeholder="Banner Sub Title"
                                           id="sub_title"
                                           value="{{ old('sub_title',isset($banner)?$banner->sub_title:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="sub_title_error"></div>
                                    @error('sub_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> -->
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept=".jpg,.png">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 400 X 400</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Image Attribute *</label>
                                    <input type="text" class="form-control placeholder-cls required"
                                           id="image_attribute"
                                           name="image_attribute" placeholder="Alt='Home Image Attribute'"
                                           value="{{ old('image_attribute',isset($banner)?$banner->image_attribute:'') }}"
                                           maxlength="255">
                                           <div class="help-block with-errors" id="image_attribute_error">
                                    @error('image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id" id="id" value="{{ isset($banner)?$banner->id:'0' }}">
                            <input type="hidden" name="type" id="type" value="{{ $type }}">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
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
                //layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                showRemove: false,
                minImageWidth: 400,
                minImageHeight: 400,
                maxImageWidth: 400,
                maxImageHeight: 400,
                maxFileSize: 650,
                    <?php if (isset($banner) && $banner->image != NULL){ ?> initialPreview: ["{{asset($banner->image)}}"],
                initialPreviewConfig: [{
                    caption: "{{ ($banner->image!=NULL)?$banner->title:''}}",
                    width: "120px",
                    key: "{{'Banner/image/'.$banner->id.'/webp_image' }}",
                }]
                <?php } ?>
            });
        });
    </script>
@endsection
