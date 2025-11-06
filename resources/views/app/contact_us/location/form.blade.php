@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header gloss_breadcrumbs">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> {{$title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'contact/location')}}">
                                    Location</a></li>
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
                    <div class="gloss_card">
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
                            {{-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 512 x 512 PX and Size must be less than 512 KB</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="location"> Location*</label>
                                    <input type="text" name="location" id="location" placeholder="Location"
                                           class="form-control required" autocomplete="off"
                                           value="{{ isset($location)?$location->location:'' }}">
                                    <div class="help-block with-errors" id="location_error"></div>
                                    @error('$location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group col-md-6">
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control required"
                                           id="name" name="name" placeholder="Name"
                                           value="{{ isset($location)?$location->name:'' }}">
                                    <div class="help-block with-errors" id="name_error"></div>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                                
                             <!--    <div class="form-group col-md-3">
                                    <label for="land_phone"> Fax</label>
                                    <input type="text" name="fax" id="fax" placeholder="Fax Number"
                                           class="form-control" autocomplete="off"
                                           value="{{ isset($location)?$location->fax:'' }}">
                                    <div class="help-block with-errors" id="fax_error"></div>
                                    @error('$land_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> -->
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone_number">Mobile Phone Number*</label>
                                    <input type="text" class="form-control required"
                                           id="phone_number" name="phone_number" minlength="9" maxlength="15" placeholder="Phone Number"
                                           value="{{ isset($location)?$location->phone_number:'' }}">
                                    <div class="help-block with-errors" id="phone_number_error"></div>
                                    @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone_number2">Secondary Phone Number </label>
                                    <input type="text" class="form-control "
                                           id="phone_number2" name="phone_number2" minlength="9" maxlength="15" placeholder="Phone Number"
                                           value="{{ isset($location)?$location->phone_number2:'' }}">
                                    <div class="help-block with-errors" id="phone_number2_error"></div>
                                    @error('phone_number2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group col-md-6">
                                    <label for="land_phone"> Land Phone Number</label>
                                    <input type="text" name="land_phone" id="land_phone" placeholder="Land Phone Number"
                                           class="form-control" autocomplete="off"
                                           value="{{ isset($location)?$location->land_phone:'' }}">
                                    <div class="help-block with-errors" id="land_phone_error"></div>
                                    @error('land_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email"> Email*</label>
                                    <input type="text" name="email" id="email" placeholder="Email"
                                           class="form-control required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autocomplete="off"
                                           value="{{ isset($location)?$location->email:'' }}">
                                    <div class="help-block with-errors" id="email_error"></div>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group col-md-6">
                                    <label for="alternate_email">Alternate Email </label>
                                    <input type="text" class="form-control" id="alternate_email" name="alternate_email" placeholder="Alternate Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="{{ isset($location)?$location->alternate_email:'' }}">
                                    <div class="help-block with-errors" id="alternate_email_error"></div>
                                    @error('alternate_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                                
                            </div>
                           <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Working Hours</label>
                                    <textarea name="working_hours" id="working_hours" placeholder="Working hours "
                                                class="form-control tinyeditor"
                                                autocomplete="off">{{ @$location->working_hours }}</textarea>
                                    <div class="help-block with-errors" id="working_hours_error"></div>
                                    @error('working_hours')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>       
                                
                            </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Office Address*</label>
                                        <textarea rows="7" name="office_address" id="office_address" placeholder="Office Address "
                                                  class="form-control required"
                                                  autocomplete="off">{{ @$location->office_address }}</textarea>
                                        <div class="help-block with-errors" id="office_address_error"></div>
                                        @error('office_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="google_map"> Google Map*</label>
                                        <textarea rows="7" name="google_map" id="google_map"
                                                  class="form-control required"
                                                  placeholder="Google Map">{{ !empty($location)?$location->google_map:'' }}</textarea>
                                        <div class="help-block with-errors" id="google_map_error"></div>
                                        <span
                                            style='color:green;font-size:14px;'>Note: src from google map iframe</span>

                                    </div>

                                </div>

                        </div>
                        <div class="gloss_card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Cancel</button>
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
                initialPreviewShowDelete: false,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                allowedFileTypes: ['image'],
                minImageWidth: 512,
                minImageHeight: 512,
                maxImageWidth: 512,
                maxImageHeight: 512,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($location) && $location->image!=NULL)
                 required: false,
                initialPreview: [
                    "{{asset($location->image)}}",
                ],
                initialPreviewConfig: [
                    {
                        caption: "{{last(explode('/',$location->image))}}", width: "120px",
                    }]
                @else
                required: true
                @endif
            });
        });
    </script>
@endsection
