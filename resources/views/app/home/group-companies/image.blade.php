@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> home - Edit Footer Section </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="{{url(Helper::sitePrefix().'home/footersection')}}">Edit Footer Section</a></li>
                            
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
                            <h3 class="card-title">Form</h3>
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
                                    <label>Title</label>
                                   
                                        <input id="title" class="form-control" name="title" type="text" value="{{ old('title',isset($footersec)?$footersec->title:'') }}">
                         
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> 
                                        <div class="form-group col-md-6">
                                    <label>Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept=".jpg,.png*">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 1920 x 920</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                                                 

                            </div>
                                   <div class="form-row">
                      
                        
                                        <div class="form-group col-md-6">
                                    <label>Text</label>
                                      <input id="text" class="form-control" name="text" type="text" value="{{ old('text',isset($footersec)?$footersec->text:'') }}">
                                    @error('text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                         <div class="form-group col-md-6">
                                    <label>Phone Number</label>
                                   
                                         <input id="phone" class="form-control" name="phone" type="text" value="{{ old('phone',isset($footersec)?$footersec->phone:'') }}"  onkeypress="validateInput(event)">
                         
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>                               

                            </div>
                                                        <div class="form-row">
                      
                        
                                        <div class="form-group col-md-6">
                                    <label>Button Text</label>
                                      <input id="button_text" class="form-control" name="button_text" type="text" value="{{ old('button_text',isset($footersec)?$footersec->button_text:'') }}">
                                    @error('button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                         <div class="form-group col-md-6">
                                    <label>Button Url</label>
                                   
                                        <input id="button_url" class="form-control" name="button_url" type="text" value="{{ old('button_url',isset($footersec)?$footersec->button_url:'') }}">
                         
                                    @error('button_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>                               

                            </div>                     
                             <div class="form-row">
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
                overwriteInitial: true,
                autoReplace: true,
                initialPreviewShowDelete: true,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                minImageWidth: 1920,
                minImageHeight: 920,
                maxImageWidth: 1920,
                maxImageHeight: 920,
                showRemove: true,
                maxFileSize: 512,
                
                @if(isset($footersec) && $footersec->image!=NULL)
                initialPreview: ["{{asset($footersec->image)}}"],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$footersec->image))}}",
                    width: "120px",
                    key: "{{'HomeOurService/image/'.$footersec->id.'/image' }}",
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
                minImageWidth: 100,
                minImageHeight: 100,
                maxImageWidth: 100,
                maxImageHeight: 100,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($keyfeature) && $keyfeature->icon_image!=NULL)
                initialPreview: ["{{asset($keyfeature->icon_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($keyfeature->icon_image!=NULL)?$keyfeature->icon_image:''}}",
                    width: "120px",
                    key: "{{'uploads/home/keyfeuture/webp_image/'.$keyfeature->id.'/icon_image_webp' }}",
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
