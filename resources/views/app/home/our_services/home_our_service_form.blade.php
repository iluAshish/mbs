@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Home - Our Services</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Home - Our Services</li>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" id="formWizard" class="form--wizard" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Home - Our Services Form</h3>
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
                                           value="{{ old('title',isset($about)?$about->title:'') }}" maxlength="255">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Sub Title*</label>
                                    <input type="text" name="sub_title" id="sub_title" placeholder="Title"
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('sub_title',isset($about)?$about->sub_title:'') }}" maxlength="50">
                                    <div class="help-block with-errors" id="sub_title_error"></div>
                                    @error('sub_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        <!--     <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Short Description*</label>
                                    <textarea name="short_description" id="short_description"
                                              class="form-control tinyeditor required"
                                              placeholder="Description">{{ old('description',isset($about)?$about->short_description:'') }}</textarea>
                                    <div class="help-block with-errors" id="short_description_error"></div>
                                    @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->                            
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Description*</label>
                                    <textarea name="description" id="description"
                                              class="form-control tinyeditor required"
                                              placeholder="Description">{{ old('description',isset($about)?$about->description:'') }}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Button Text*</label>
                                    <input type="text" name="button_text" id="button_text" placeholder="Button Text"
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('button_text',isset($about)?$about->button_text:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="button_text_error"></div>
                                    @error('button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Button URL</label>
                                    <input type="text" name="button_url" id="button_url" placeholder="Button URL"
                                           class="form-control" autocomplete="off"
                                           value="{{ old('button_url',isset($about)?$about->button_url:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="button_url_error"></div>
                                </div>
                            </div>
                                                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Contact Person</label>
                                    <input type="text" name="contactperson" id="contactperson" placeholder="Contact Person" class="form-control required" autocomplete="off" value="{{ old('contactperson',isset($about)?$about->contactperson:'') }}" maxlength="255" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}">
                                    <div class="help-block with-errors" id="button_text_error"></div>
                                    @error('contactperson')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Designation</label>
                                    <input type="text" name="designation" id="designation" placeholder="Designation"
                                           class="form-control" autocomplete="off"
                                           value="{{ old('designation',isset($about)?$about->designation:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="button_url_error"></div>
                                </div>
                            </div>
                                                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Image</label>
                                   <div class="file-loading">
                                       <input id="image" name="image" type="file" accept=".jpg,.png">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 100 x 100</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Phone Number</label>
                                    <input type="text" name="phone" id="phone" placeholder="phone"
                                           class="form-control" autocomplete="off"
                                           value="{{ old('button_url',isset($about)?$about->phone:'') }}"
                                           maxlength="255"  onkeypress="validateInput(event)">
                                    <div class="help-block with-errors" id="button_url_error"></div>
                                </div>
                            </div>
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
                overwriteInitial: true,
                autoReplace: true,
                initialPreviewShowDelete: true,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                allowedFileTypes: ['image'],
                minImageWidth: 100,
                minImageHeight: 100,
                maxImageWidth: 100,
                maxImageHeight: 100,
                showRemove: true,
                maxFileSize: 512,
                
                @if(isset($about) && $about->image!=NULL)
                initialPreview: ["{{asset($about->image)}}"],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$about->image))}}",
                    width: "120px",
                    key: "{{'GroupCompanies/image/'.$about->id.'/image' }}",
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
