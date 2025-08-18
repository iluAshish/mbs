@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header gloss_breadcrumbs">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-address-book"></i> {{$title}}</h1>
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

            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="gloss_card">
                    <div class="gloss_card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
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
                        <div class="form-row d-none">
                            <div class="form-group col-md-6">
                                <label> Title*</label>
                                <input type="text" name="title" id="title" class="form-control required" placeholder="Title" value="{{ old('title', @$contact->contact_title) }}" maxlength="230">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Sub Title*</label>
                                <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="Title" value="{{ old('sub_title', @$contact->contact_sub_title) }}" maxlength="230">
                            </div>
                        </div>

                        <!-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Mobile Number*</label>
                                <input type="text" name="phone" id="phone" placeholder="Phone Number" class="form-control required" autocomplete="off" value="{{ old('phone', @$contact->phone) }}" minlength="7"  maxlength="15" >
                                <div class="help-block with-errors" id="phone_error"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Landline*</label>
                                <input type="text" name="landline" id="landline" placeholder="Landline" class="form-control required" autocomplete="off" value="{{ old('land_line', @$contact->landline) }}" minlength="7"  maxlength="15" >
                                <div class="help-block with-errors" id="landline_error"></div>
                            </div>

                        </div> -->
                        <!-- <div class="form-group col-md-4">
                            <label>Short Description</label>
                            <input type="text" name="desc" id="desc" placeholder="Short Description" class="form-control" autocomplete="off" value="{{ old('desc', @$contact->desc) }}" minlength="7" >
                        </div> -->
                        <!-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Email*</label>
                                <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="email" class="form-control required" placeholder="Email" value="{{ old('email', @$contact->email) }}" maxlength="230">
                                <div class="help-block with-errors" id="email_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Alternate Email</label>
                                <input type="email" name="alternate_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="alternate_email" class="form-control" placeholder="Alternate Email" value="{{ old('alternate_email', @$contact->alternate_email) }}" maxlength="230">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Admin Email*</label>
                                <input type="text" name="email_recipient" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="email_recipient" class="form-control required" placeholder="Email Recipient Name" value="{{ old('email_recipient', @$contact->email_recipient) }}" maxlength="230">
                                <div class="help-block with-errors" id="email_recipient_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Whatsapp Number</label>
                                <input type="text" name="whatsapp_number"  id="whatsapp_number" class="form-control" placeholder="Whatsapp Number" value="{{ old('whatsapp_number', @$contact->whatsapp_number) }}" minlength="9" maxlength="15" >
                                <div class="help-block with-errors" id="whatsapp_number_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                             <div class="form-group col-md-6">
                                    <label>Business Hours </label>
                                    <textarea name="working_hours" id="working_hours" placeholder="Working "
                                              class="form-control tinyeditor"
                                              autocomplete="off">{{ old('working_hours', @$contact->working_hours) }}</textarea>
                                </div> -->
                             <!-- <div class="form-group col-md-12">
                                <label for="footer_location">Footer Location</label>
                                <textarea name="footer_location" id="footer_location" placeholder="Location" class="form-control tinyeditor" autocomplete="off">
                                {{ old('footer_location', @$contact->footer_location) }}</textarea>
                            </div> -->
                        </div>
                        <!-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Facebook</label>
                                <input type="text" name="facebook_url" id="facebook_url" class="form-control" placeholder="Facebook" value="{{ old('facebook_url', @$contact->facebook_url) }}" maxlength="230">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Instagram</label>
                                <input type="text" name="instagram_url" id="instagram_url" class="form-control" placeholder="Instagram" value="{{ old('instagram_url', @$contact->instagram_url) }}" maxlength="230">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Twitter</label>
                                <input type="text" name="twitter_url" id="twitter_url" class="form-control" placeholder="Twitter" value="{{ old('twitter_url', @$contact->twitter_url) }}" maxlength="230">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Linkedin</label>
                                <input type="text" name="linkedin_url" id="linkedin_url" class="form-control" placeholder="Linkedin" value="{{ old('linkedin_url', @$contact->linkedin_url) }}" maxlength="230">
                            </div>
                        </div> -->
            <!--             <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Youtube</label>
                                <input type="text" name="youtube_url" id="youtube_url" class="form-control" placeholder="Youtube" value="{{ old('youtube_url', @$contact->youtube_url) }}" maxlength="230">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Pinterest</label>
                                <input type="text" name="pinterest_url" id="pinterest_url" class="form-control" placeholder="Pinterest" value="{{ old('pinterest_url', @$contact->pinterest_url) }}" maxlength="230">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Snapchat</label>
                                <input type="text" name="snapchat_url" id="snapchat_url" class="form-control" placeholder="Snapchat" value="{{ old('snapchat_url', @$contact->snapchat_url) }}" maxlength="230">
                            </div>
                        </div> -->
                         <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-group">
                                    <label for="google_map"> Google Map</label>
                                    <textarea rows="3" name="google_map" id="google_map"
                                              class="form-control"
                                              placeholder="Google Map">{{ old('google_map', @$contact->google_map) }}</textarea>
                                    <span
                                        style='color:green;font-size:14px;'>Note: src from google map iframe</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gloss_card-footer">
                        <input type="submit" name="btn_save" id="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <input type="hidden" name="id" id="id" value="{{ !empty($contact)?$contact->id:'0' }}">
                        <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>


<script type="text/javascript">
    $(document).ready(function() {

    $('#btn_save').click(function() {
      var validateme = ["#title","#sub_title"];
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
        console.log('sdafadsf');
      setTimeout(function() {
        $('form').submit();
      }, 500);
    });
    });
</script>
@endsection

