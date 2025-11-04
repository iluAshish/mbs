@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header gloss_breadcrumbs">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Home - Company</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'companies')}}">Companies
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
                    <div class="gloss_card card-info">
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
                             
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="title">Name *</label>
                                    <input type="text" name="title" id="title" placeholder="Name "
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('title',isset($brands)?$brands->title:'') }}"
                                           maxlength="100">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image">Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 400 X 200 PX and Size must be less than 100 KB</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image_meta_tag">Image Meta Tag</label>
                                    <input type="text" name="image_attribute" id="image_attribute"
                                           placeholder="Image Alternate Text" class="form-control placeholder-cls"
                                           required autocomplete="off"
                                           value="{{ isset($brands)?$brands->image_attribute:'' }}"
                                           maxlength="255">
                                    @error('image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="link">Link </label>
                                    <input type="text" name="link" id="link" placeholder="Enter your link "
                                           class="form-control" autocomplete="off"
                                           value="{{ old('link',isset($brands)?$brands->link:'') }}"
                                           maxlength="100">
                                    <div class="help-block with-errors" id="link_error"></div>
                                    @error('link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> 
                            
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description *</label>
                                    <input type="text" name="description" id="description" placeholder="Name "
                                           class="form-control tinyeditor" autocomplete="off"
                                           value="{{ old('description',isset($brands)?$brands->description:'') }}"
                                           maxlength="100">
                                    <div class="help-block with-errors" id="link_error"></div>
                                    @error('description')
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
                required: true,
                allowedFileTypes: ['image'],
                minImageWidth: 400,
                minImageHeight: 200,
                maxImageWidth: 400,
                maxImageHeight: 200,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($brands) && $brands->image!=NULL)
                initialPreview: ["{{asset($brands->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$brands->image))}}",
                    width: "120px",
                    key: "{{'GroupCompanies/image/'.$brands->id.'/image_webp' }}",
                }]
                @endif
            });

        });
    </script>
    <script>
        function validateInput(event) {
            const charCode = event.which ? event.which : event.keyCode;
            if (charCode !== 43 && (charCode < 48 || charCode > 57)) {
                event.preventDefault();
            }
        }
    </script>
@endsection
