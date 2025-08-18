@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header gloss_breadcrumbs">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{@$title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>

                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'service/sub-services')}}">Sub Services</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}


                        @if (session('success'))
                        <div class="alert alert-success" user_type="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('success') }}
                        </div>
                        @elseif(session('error'))
                        <div class="alert alert-danger" user_type="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('error') }}
                        </div>
                        @endif


                        @php
                        use App\Models\Service;
                        use App\Models\SubService;


                        @endphp

                        @if($key=='Update')

                        @endif

                        <div class="form-row">
                            <div class="form-group col-md-12 brandProduct">
                                <label> Service*</label>
                               @if($key=='Update')
                               <select class="select2 form-control required" name="parent_id" id="parent_id">
                                    @foreach($parentServices as $sub_list)
                                    <option value="{{$sub_list->id}}" {{$sub_list->id == $sub->parent_id?'selected':''}}>{{$sub_list->title}}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors" id="parent_id_error"></div>
                                @else
                                <select class="select2 form-control required" name="parent_id" id="parent_id">

                                    @foreach($parentServices as $sub_list)
                                    <option value="{{$sub_list->id}}" >{{$sub_list->title}}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors" id="parent_id_error"></div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title">Title *</label>
                                <input type="text" name="title" id="title" placeholder="Title " class="form-control for_canonical_url required" autocomplete="off" value="{{ old('title',isset($sub)?@$sub->title:'') }}" maxlength="230" >
                                <div class="help-block with-errors" id="title_error"></div>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <!-- Service image -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Detail Sub Image*</label>
                                <div class="file-loading">
                                    <input id="image" class="required" name="image" type="file" accept=".jpg,.png" >
                                </div>
                                <span class="caption_note">Note: Image size must be 340 x 410 px and Size
                                    must be less than 256 KB</span>
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Image Attribute*</label>
                                <input type="text" class="form-control placeholder-cls required" id="image_attribute" name="image_attribute" placeholder="Alt='Image Attribute'" value="{{ isset($sub)?$sub->image_attribute:'' }}" >
                                <div class="help-block with-errors" id="image_attribute_error"></div>
                                @error('image_attribute')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="submit" class="btn btn-primary pull-left submitBtn" data-id="{{isset($sub)?$sub->id:''}} value="Submit">
                            <input type="reset" class="btn btn-default" value="Reset">
                            <input type="hidden" name="id" id="id" value="{{ isset($sub)?$sub->id:'0' }}">
                            <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}"
                                 style="display:none;">
                        </div>
                    </div>
                    
            </form>
        </div>
    </section>
</div>



<script type="text/javascript">
    $(document).ready(function() {

    $('#btn_save').click(function() {
      var validateme = ["#title","#image_attribute"];
      console.log('here');
        var flag = false;
        $.each(validateme, function(index, value) {
          var element = $(value).val();
          
          if (element === "<p><br></p>" || element === '' || element === undefined) {
              flag = true;
              console.log('sdafadsf');
              $(value).css('border-color','red');
          }else{
            $(value).css('border-color','#ced4da');
          }
        });
        if(flag){
            return false;
        }
      setTimeout(function() {
        $('#formWizard').submit();
      }, 500);
    });

        // service image
        $("#image").fileinput({
            'theme': 'explorer-fas',
            validateInitialCount: true,
            overwriteInitial: false,
            autoReplace: true,
            initialPreviewShowDelete: false,
            initialPreviewAsData: true,
            dropZoneEnabled: false,
            allowedFileTypes: ['image'],
            minImageWidth: 340,
            minImageHeight: 410,
            required: true,
            maxImageWidth: 340,
            maxImageHeight: 410,
            maxFileSize: 256,
            showRemove: true,
            @if(isset($sub) && $sub -> image != NULL)
             required: false,
            initialPreview: ["{{asset($sub->image)}}"],
            initialPreviewConfig: [{
                caption: "{{last(explode('/',$sub->image))}}",
                width: "120px",
                key: "{{'Service/image/'.$sub->id.'/image_webp' }}",
            }]
            @endif
        });

    });
</script>
@endsection
