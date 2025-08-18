@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header gloss_breadcrumbs">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>home - {{$title}} </h1>
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
                                    <label for="title">Title*</label>
                                    <input type="text" name="title" id="title" placeholder="Title"
                                           class="form-control required"
                                           autocomplete="off" value="{{old('title',isset($keyfeature)?$keyfeature->title:'')}}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                </div>
                                 <div class="form-group col-md-12 d-none">
                                    <label for="number"> Number*</label>
                                    <input type="number" class="form-control required" min="0" maxlength="3" pattern="\d{3}"
                                           id="number" name="number" placeholder="Number"
                                           value="{{ isset($keyfeature)?$keyfeature->number:'100' }}">
                                    <div class="help-block with-errors" id="number_error"></div>
                                    @error('number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Image*</label>
                                    <div class="file-loading required">
                                        <input id="image" name="image" type="file" accept=".jpg,.png">
                                    </div>
                                     <div class="help-block with-errors" id="image_error"></div>
                                    <span class="caption_note">Note: Image size must be 50 x 50</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row d-none">
                                <div class="form-group col-md-6 d-none">
                                    <label>Description*</label>
                                    <textarea name="description" id="description"
                                              class="form-control required"
                                              placeholder="Description">{{ old('description',isset($keyfeature)?$keyfeature->description:'--') }}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <input type="submit" class="btn btn-success form_submit_btn submitBtn"
                                           value="Submit">
                                    <input type="reset" class="btn btn-default" value="Reset">
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
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                showRemove: false,
                allowedFileTypes: ['image'],
                minImageWidth: 50,
                minImageHeight: 50,
                maxImageWidth: 50,
                maxImageHeight: 50,
                maxFileSize: 100,
                @if(isset($keyfeature) && $keyfeature->image!=NULL)
                required: false,
                initialPreview: ["{{asset($keyfeature->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($keyfeature->image!=NULL)?$keyfeature->title1:''}}",
                    width: "120px",
                    key: "{{($keyfeature->image)}}",
                }]
                @else
                required: true
                @endif
            });

            {{--$("#bg_image").fileinput({--}}
            {{--    'theme': 'explorer-fas',--}}
            {{--    validateInitialCount: true,--}}
            {{--    overwriteInitial: false,--}}
            {{--    autoReplace: true,--}}
            {{--    initialPreviewShowDelete: false,--}}
            {{--    initialPreviewAsData: true,--}}
            {{--    dropZoneEnabled: false,--}}
            {{--    required: true,--}}
            {{--    allowedFileTypes: ['image'],--}}
            {{--    minImageWidth: 100,--}}
            {{--    minImageHeight: 100,--}}
            {{--    maxImageWidth: 100,--}}
            {{--    maxImageHeight: 100,--}}
            {{--    maxFileSize: 512,--}}
            {{--    showRemove: true,--}}
            {{--    @if(isset($slider) && $slider->bg_image!=NULL)--}}
            {{--    initialPreview: ["{{asset($slider->bg_image)}}",],--}}
            {{--    initialPreviewConfig: [{--}}
            {{--        caption: "{{ ($slider->bg_image!=NULL)?$slider->title1:''}}",--}}
            {{--        width: "120px",--}}
            {{--        key: "{{'HomeBanner/bg_image/'.$slider->id.'/bg_image_webp' }}",--}}
            {{--    }]--}}
            {{--    @endif--}}
            {{--});--}}
            $('#number').on('input', function () {
                // Remove any non-digit characters
                var inputValue = $(this).val().replace(/\D/g, '');
    
                // Ensure the value is not empty
                if (inputValue.length > 0) {
                    // Limit the input to 3 digits
                    inputValue = inputValue.slice(0, 3);
    
                    // Update the input field with the cleaned and truncated value
                    $(this).val(inputValue);
                }
            });
        });
        
    </script>
@endsection
