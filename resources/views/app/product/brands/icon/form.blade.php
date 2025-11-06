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
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'products/brand')}}">Brand</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{url(Helper::sitePrefix().'products/brand/icon/'.$brand_id)}}">Icon</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
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
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Icon*</label>
                                <div class="file-loading">
                                   <input type="file" name="icon" id="icon" accept="image/*">
                                </div>
                                <span
                                    class="caption_note">Note: Icon size must be 538 x 429</span>
                                @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label> Icon Attribute *</label>
                                <input type="text" class="form-control required placeholder-cls"
                                        id="icon_attribute" name="icon_attribute"
                                        placeholder="Alt='Icon Attribute'"
                                        value="{{ isset($brand_icon)?$brand_icon->icon_attribute:'' }}">
                                <div class="help-block with-errors" id="icon_attribute_error"></div>
                                @error('icon_attribute')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="description">Description</label>
                                <textarea class="form-control tinyeditor" id="description" placeholder="Short Description"
                                            name="description">{!! old('description', isset($brand_icon)?$brand_icon->description : '') !!}</textarea>
                                            <div class="help-block with-errors" id="description_error"></div>
                                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <input type="hidden" name="brand_id" id="brand_id" value="{{$brand_id}}">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <img class="animation__shake loadingImg" src="{{url('backend/dist/img/loading.gif')}}"
                                 style="display:none;">
                        </div>
                </form>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#icon").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileExtensions: ['jpg','jpeg', 'png'],
                // minImageWidth: 538,
                // minImageHeight: 429,
                // maxImageWidth: 538,
                // maxImageHeight: 429,
                maxFilesize: 10240,
                showRemove: true,
                @if(isset($brand_icon) && $brand_icon->icon!=NULL)
                initialPreview: ["{{asset($brand_icon->icon)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($brand_icon->icon!=NULL)?last(explode('/',$brand_icon->icon)):''}}",
                    width: "120px"
                }]
                @endif
            });
        });
    </script>
@endsection
