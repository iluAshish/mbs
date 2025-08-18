@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> home - {{$title}} </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'home/key-feature')}}">Key Features
                                    List</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form role="form" action="image/create" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Key Feature Form</h3>
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
                        
                                        <div class="form-group col-md-6">
                                    <label>Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept=".jpg,.png">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 1920 x 871</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                                                <div class="form-group col-md-6">
                                    <input type="submit" class="btn btn-success form_submit_btn submitBtn"
                                           value="Submit" style="margin-top:31px;">
                                    <input type="reset" class="btn btn-default" value="Reset" style="margin-top:31px;">
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
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                showRemove: false,
                allowedFileTypes: ['image'],
                minImageWidth: 1920,
                minImageHeight: 871,
                maxImageWidth: 1920,
                maxImageHeight: 871,
                maxFileSize: 1024,
                @if(isset($keyfeature) && $keyfeature->image!=NULL)
                initialPreview: ["{{asset($keyfeature->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($keyfeature->image!=NULL)?$keyfeature->image:''}}",
                    width: "120px",
                    key: "{{($keyfeature->image)}}",
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
                minImageWidth: 1920,
                minImageHeight: 871,
                maxImageWidth: 1920,
                maxImageHeight: 871,
                maxFileSize: 1024,
                showRemove: true,
                @if(isset($slider) && $slider->bg_image!=NULL)
                initialPreview: ["{{asset($slider->bg_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($slider->bg_image!=NULL)?$slider->title1:''}}",
                    width: "120px",
                    key: "{{'HomeBanner/bg_image/'.$slider->id.'/bg_image_webp' }}",
                }]
                @endif
            });
        });
    </script> 
@endsection
