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
                           
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">

                @foreach ($errors->all() as $error)
                    <span class="invalid-feedback" role="alert" style="padding: 10px;text-align: center;">
                    <strong>{{ $error }}</strong></span>
                @endforeach
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
                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div class="gloss_card">
                        
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <h3 class="card-title">Basic Informations</h3>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Name*</label>
                                    <input type="text" class="form-control required nameField" name="name"
                                           placeholder="Name" id="name" autocomplete="off"
                                           value="{{ old('name',isset($admin)?@$admin->name:'') }}" minlength="3"
                                           maxlength="30">
                                    <div class="help-block with-errors" id="name_error"></div>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email*</label>
                                    <input type="email" name="email_id" id="admin_email_id" placeholder="Email ID"
                                           class="form-control required"
                                           autocomplete="off"
                                           value="{{ old('email_id',isset($admin)?@$admin->email:'') }}" minlength="3">
                                    <div class="help-block with-errors" id="admin_email_id_error"></div>
                                    @error('email_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Profile Image</label>
                                    <div class="file-loading">
                                        <input id="profile_image" name="profile_image" type="file">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 300 X 300</span>
                                    @error('profile_image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Phone Number*</label>
                                    <input type="text" class="form-control required phoneField" id="phone"
                                           name="phone" placeholder="Phone Number" autocomplete="off"
                                           value="{{ old('phone',isset($admin)?@$admin->phone:'') }}"
                                           minlength="7" maxlength="17"
                                           min="0">
                                    <div class="help-block with-errors" id="phone_error"></div>
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <h3 class="card-title">Authentication Credentials</h3>
                        </div>
                        <div class="form-group col-md-{{ @$admin?'6':'4' }}">
                            <label for="username">Username*</label>
                            <input type="text" class="form-control required" id="username" name="username"
                                    placeholder="Username"
                                    value="{{ old('username', @$admin->username) }}">
                            <div class="help-block with-errors" id="username_error"></div>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @if(!isset($admin->user))
                            <div class="form-group col-md-4">
                                <label for="password">Password</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="login_password" name="password"
                                            placeholder="Password" minlength="6" maxlength="30">
                                    <div class="input-group-append">
                                    <span class="input-group-text pointer-cls" id="refresh_code"><i
                                            class="fas fa-sync"></i></span>
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <div class="gloss_card-footer">
                                    <input type="submit" name="btn_save" value="Submit"
                                        class="btn btn-primary pull-left submitBtn">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <img class="animation__shake loadingImg" src="{{asset('backend/dist/img/loading.gif')}}"
                                        style="display:none;">
                                </div>
                            </div>
                </form>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#profile_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                removeLabel: "Remove",
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                minImageWidth: 300,
                minImageHeight: 300,
                maxImageWidth: 300,
                maxImageHeight: 300,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($admin) && $admin->profile_image!=NULL)
                initialPreview: ["{{asset($admin->profile_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($admin->profile_image!=NULL)?last(explode('/',$admin->profile_image)):''}}",
                    width: "120px",
                    key: "{{'User/profile_image/'.$admin->id .'/profile_image_webp'}}",
                }]
                @endif
            });
        });
    </script>
@endsection
