@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Home - Group Accreditation and Companies</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'testimonial')}}">Associates
                                    List</a></li>
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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Basic Informations </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
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
                            <div class="form-group col-md-4">
                                    <label for="title">Name *</label>
                                    <input type="text" name="title" id="title" placeholder="Name "
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('title',isset($associate)?$associate->title:'') }}"
                                           maxlength="100">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image">Image</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 253 X 180 PX and Size must be less than 512 KB</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image_meta_tag">Image Meta Tag</label>
                                    <input type="text" name="image_attribute" id="image_attribute"
                                           placeholder="Image Alternate Text" class="form-control placeholder-cls"
                                           required autocomplete="off"
                                           value="{{ isset($associate)?$associate->image_attribute:'' }}"
                                           maxlength="255">
                                    @error('image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="submit" class="btn btn-primary pull-left submitBtn" value="Submit">
                                    <input type="reset" class="btn btn-default" value="Reset">
                                    <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}"
                                         style="display:none;">
                                </div>
                            </div>
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
                required: false,
                allowedFileTypes: ['image'],
                minImageWidth: 253,
                minImageHeight: 180,
                maxImageWidth: 253,
                maxImageHeight: 180,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($associate) && $associate->image!=NULL)
                initialPreview: ["{{asset($associate->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$associate->image))}}",
                    width: "120px",
                    key: "{{'Associate/image/'.$associate->id.'/webp_image' }}",
                }]
                @endif
            });

        });
    </script>
@endsection
