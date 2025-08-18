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
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'home/testimonial')}}">Testimonials
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

                            @php
                            use App\Models\Testimonial;
                            use App\Models\Service;

                            @endphp
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="author_name">Name *</label>
                                    <input type="text" name="author_name" id="author_name" placeholder="Name "
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('name',isset($testimonial)?$testimonial->name:'') }}"
                                           maxlength="60" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}">
                                    <div class="help-block with-errors" id="author_name_error"></div>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="designation">Designation*</label>
                                    <input type="text" name="designation" id="desigantion" placeholder="Designation "
                                           class="form-control" autocomplete="off"
                                           value="{{ old('designation',isset($testimonial)?$testimonial->designation:'') }}"
                                           maxlength="60">
                                    <div class="help-block with-errors" id="name_error"></div>
                                    @error('designation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                                 <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Review Type*</label>
                                    <select class="form-control required" name="review_type" id="review_type">
                                        @foreach(["Normal", "Google", "Facebook", "Instagram"] AS $review_type)
                                            <option value="{{ $review_type }}"
                                                {{ (old("review_type", @$testimonial->review_type) == $review_type)? "selected" : "" }}>
                                                {{ $review_type }}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="tax_error"></div>
                                </div>
                                                           <div class="form-group col-md-6">
                                    <label> Rating*</label>
                                    <select class="form-control required" name="rating" id="rating">
                                        @foreach(["1", "2", "3", "4", "5"] AS $review_type)
                                            <option value="{{$review_type }}"
                                                {{ (old("rating", @$testimonial->rating) == $review_type)? "selected" : "" }}>
                                                {{ $review_type }}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="rating_error"></div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="author_image">Image*</label>
                                    <div class="file-loading">
                                        <input id="author_image" name="author_image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 100 X 100 PX and Size must be less than 100 KB</span>
                                    @error('author_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Message *</label>
                                    <textarea class="form-control tinyeditor required" id="message"
                                              name="message">{{ old('message',isset($testimonial)?$testimonial->message:'') }}</textarea>
                                    <div class="help-block with-errors" id="message_error"></div>
                                    @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="help-block with-errors" id="message_error"></div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="submit" class="btn btn-primary pull-left submitBtn" value="Submit">
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
            $("#author_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                minImageWidth: 100,
                minImageHeight: 100,
                maxImageWidth: 100,
                maxImageHeight: 100,
                maxFileSize: 100,
                showRemove: true,
                @if(isset($testimonial) && $testimonial->author_image!=NULL)
                initialPreview: ["{{asset($testimonial->author_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$testimonial->author_image))}}",
                    width: "120px",
                    key: "{{'Testimonial/author_image/'.$testimonial->id.'/author_image_webp' }}",
                }]
                @endif
            });
        });
    </script>
@endsection
