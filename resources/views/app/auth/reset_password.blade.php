<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="{{asset('app/images/favicon.svg')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | Reset Password</title>
    <link rel="stylesheet" href="{{asset('app/dist/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/dist/css/sweetalert-overrides.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app/dist/css/login.css?v=1.0')}}">
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
input#c_password,input#confirm_password {
    max-width: 320px;
    width: 100%;
    height: 40px;
    border-radius: 0;
    background-color: #ffff;
}

input#password_reset {
    max-width: 320px;
    width: 100%;
    height: 44px !important;
    border-radius: 0;
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
   
    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
        var token = "{{ csrf_token() }}";
    </script>
</head>
<body>
<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true">
    <div class=" alignText">
        <img class="animation__shake logo" src="{{Helper::getLogo()}}" alt="{{@$siteInformation->brand_name}}">
    </div>
    <div class="signup login-show password-reset-page">
        <div class="container">
        <form method="post">
            @csrf
            <label for="chk" aria-hidden="true">Reset-Password</label>
            @if ($errors->any())
                @error('username')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            @endif
            <input type="text" name="c_password" class="@error('password') is-invalid @enderror" id="c_password"
                   placeholder="Password">
                   <div class="input-group-append" id="refresh_code_box" style="display: none;">
                                        <span class="input-group-text pointer-cls"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="refresh_code"><i class="fas fa-sync"></i></span>
                                    </div>
               <div id="message">
              <h6>Password must contain the following:</h6>
              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
              <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
              <p id="number" class="invalid">A <b>number</b></p>
              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
              <p id="spec" class="invalid">A <b>Special </b> character</p>
            </div>
            <input type="hidden" name="token" id="token" value="{{$user->token}}">
            <input type="hidden" name="id" id="id" value="{{$user->id}}">
            <input type="password" name="confirm_password" class="@error('confirm_password') is-invalid @enderror"
                   id="confirm_password" placeholder="Confirm Password">
            <input type="submit" value="Reset Password" class="login-btn" id="password_reset" style="height:35px;">
        </form>
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('app/dist/js/sweetalert.min.js')}}"></script>
<script src="{{asset('app/dist/js/sweetalert-init.js')}}"></script>
<script src="{{url('app/dist/js/custom.js?v=1.0')}}"></script>
<script>
    
var myInput = document.getElementById("c_password");
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
</body>
</html>
