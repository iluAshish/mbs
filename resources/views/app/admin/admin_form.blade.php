@extends('app.layouts.main')
@section('content')
<style>
/* Style all input fields */
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

/* Style the submit button */


/* Style the container for inputs */


/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
  margin-bottom: 10px;
}

#message p {
  padding: 2px 20px;
  font-size: 10px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> {{$title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'administration')}}">Admin
                                list</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">

            {{-- @foreach ($errors->all() as $error)--}}
            {{-- <span class="invalid-feedback" role="alert" style="padding: 10px;text-align: center;"><strong>{{ $error }}</strong></span>--}}
            {{-- @endforeach--}}

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
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Basic Informations</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Name*</label>
                                <input type="text" class="form-control required nameField" name="name" placeholder="Name" id="name" autocomplete="off" value="{{ old('name',isset($admin)?@$admin->name:'') }}" minlength="3" maxlength="30">
                                <div class="help-block with-errors" id="name_error"></div>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email*</label>
                                <input type="email" name="email_id" id="admin_email_id" placeholder="Email ID" class="form-control required" autocomplete="off" value="{{ old('email_id',isset($admin)?@$admin->email:'') }}" minlength="3">
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
                            </div>
                            <div class="form-group col-md-6">
                                <label>Phone Number*</label>
                                <input type="text" class="form-control required " id="phone" name="phone" placeholder="Phone Number" autocomplete="off" value="{{ old('phone',isset($admin)?@$admin->phone:'') }}" minlength="7" maxlength="25" min="0">
                                <div class="help-block with-errors" id="phone_error"></div>
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card card-success">--}}
                {{-- <div class="card-header">--}}
                {{-- <h3 class="card-title">Authentication Credentials</h3>--}}
                {{-- <div class="card-tools">--}}
                {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
                {{-- <i class="fas fa-minus"></i>--}}
                {{-- </button>--}}
                {{-- </button>--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- <div class="card-body">--}}
                {{-- <div class="form-row">--}}
                {{-- <div class="form-group col-md-6">--}}
                {{-- <label>Username*</label>--}}
                {{-- <input type="text" class="form-control required" id="username" name="username"--}}
                {{-- placeholder="Username"--}}
                {{-- value="{{ old('username',isset($admin)?@$admin->username:'') }}"--}}
                {{-- minlength="6" maxlength="30">--}}
                {{-- <div class="help-block with-errors" id="username_error"></div>--}}
                {{-- @error('username')--}}
                {{-- <div class="invalid-feedback">--}}
                {{-- {{ $message }}--}}
                {{-- </div>--}}
                {{-- @enderror--}}
                {{-- </div>--}}
                {{-- @if(!isset($admin))--}}
                {{-- <div class="form-group col-md-6">--}}
                {{-- <label>Password*</label>--}}
                {{-- <div class="input-group mb-3">--}}
                {{-- <input type="text" class="form-control" id="login_password" name="password"--}}
                {{-- placeholder="Password" minlength="6" maxlength="30">--}}
                {{-- <div class="input-group-append">--}}
                {{-- <span class="input-group-text pointer-cls" id="refresh_code"><i--}}
                {{-- class="fas fa-sync"></i></span>--}}
                {{-- </div>--}}
                {{-- @error('password')--}}
                {{-- <div class="invalid-feedback">--}}
                {{-- {{ $message }}--}}
                {{-- </div>--}}
                {{-- @enderror--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- @endif--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- <div class="card-footer">--}}
                {{-- <input type="submit" name="btn_save" value="Submit"--}}
                {{-- class="btn btn-primary pull-left submitBtn">--}}
                {{-- <button type="reset" class="btn btn-default">Cancel</button>--}}
                {{-- <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}"--}}
                {{-- style="display:none;">--}}
                {{-- </div>--}}
                {{-- </div>--}}
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Authentication Credentials</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-{{ isset($admin)?'6':'4' }}">
                                <label for="role">Role*</label>
                                <select class="form-control required" name="role" id="role">
                                    <option value="">Select Role</option>
                                    @foreach(["Admin", "Super Admin"] AS $role)
                                    <option value="{{ $role }}" {{ (old("role", @$admin->admin->role) == $role)? "selected" : "" }}>
                                        {{ $role }}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors" id="role_error"></div>
                                @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-{{ @$admin?'6':'4' }}">
                                <label for="username">Username*</label>
                                <input type="text" class="form-control required" id="username" name="username" placeholder="Username" value="{{ old('username', @$admin->username) }}">
                                <div class="help-block with-errors" id="username_error"></div>
                                @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @if(!isset($admin->user))
                            <!-- <div class="form-group col-md-6">
                                <label for="password">Password*</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control required" id="login_password" name="password" placeholder="Password" minlength="6" maxlength="30">
                                    <div class="input-group-append">
                                        <span class="input-group-text pointer-cls" id="refresh_code"><i class="fas fa-sync"></i></span>
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div> -->
                            <div class="col-lg-6">
                                
                            <label for="password">Generate Password <small>(Generate password and submit)</small></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <input type="checkbox" name="changePassword" id="changePassword">
                                        </span>
                                    </div>
                                    <input type="text" disabled class="form-control" id="login_password" name="password" placeholder="Password" minlength="6" maxlength="30">
                                    <div class="input-group-append" id="refresh_code_box" style="display: none;">
                                        <span class="input-group-text pointer-cls"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="refresh_code"><i class="fas fa-sync"></i></span>
                                    </div>
                                </div>
                                <div id="message">
  <h6>Password must contain the following:</h6>
  <p id="letter" class="valid">A <b>lowercase</b> letter</p>
  <p id="capital" class="valid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="valid">A <b>number</b></p>
  <p id="length" class="valid">Minimum <b>8 characters</b></p>
   <p id="spec" class="valid">A <b>Special </b> character</p>
</div>
                                <div class="help-block with-errors" id="password_error"></div>
                                @error('password_error')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @endif
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" id="btnsave" value="Submit" class="btn btn-primary pull-left submitBtn">
                            <input type="button" id="btnnotsave" value="Submit" class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <img class="animation__shake loadingImg" src="{{asset('app/dist/img/loading.gif')}}" style="display:none;">
                        </div>
                    </div>
            </form>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function() {
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
            @if(isset($admin) && $admin -> profile_image != NULL)
            initialPreview: ["{{asset($admin->profile_image)}}", ],
            initialPreviewConfig: [{
                caption: "{{ ($admin->profile_image!=NULL)?$admin->profile_image:''}}",
                width: "120px",
                key: "{{'User/profile_image/'.$admin->id .'/profile_image_webp'}}",
            }]
            @endif
        });
    });

</script>
<script>
var myInput = document.getElementById("login_password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var spec = document.getElementById("spec");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers

  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
    var specs = /[!@#$%^&*]/g;
  if(myInput.value.match(specs)) {  
    spec.classList.remove("invalid");
    spec.classList.add("valid");
  } else {
    spec.classList.remove("valid");
    spec.classList.add("invalid");
  }
}
</script>
<script>
$(document).ready(function()
{
   $('#btnsave').hide(); 
         $('#btnnotsave').show(); 
});
    $('#changePassword').click(function()
    {
        if( $('#changePassword').is(':checked'))
        {
        $('#btnsave').show();
        $('#btnnotsave').hide();
        }
        else
        {
         $('#btnsave').hide(); 
         $('#btnnotsave').show();
        }
        
    });
        $('#btnnotsave').click(function()
    {
        $("#password_error").text('Fill All details and Generate Password');
    });

</script>
@endsection