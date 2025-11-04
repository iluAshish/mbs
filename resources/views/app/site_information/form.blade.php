@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header gloss_breadcrumbs">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url(Helper::sitePrefix() . 'dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">

                <form role="form" id="formWizards" class="form--wizard" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <div class="gloss_card-info">
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
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="brand_name">Brand Name*</label>
                                    <input type="text" name="brand_name" id="brand_name" class="form-control required"
                                        placeholder="Brand Name English" maxlength="230"
                                        value="{{ old('brand_name', @$siteInformation->brand_name) }}">
                                    <div class="help-block with-errors" id="brand_name_error"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="email_recipient">Admin Email*</label>
                                    <input type="text" name="email_recipient" id="email_recipient" class="form-control"
                                        placeholder="Admin Email" maxlength="230"
                                        value="{{ old('email_recipient', @$siteInformation->email_recipient) }}">
                                    <div class="help-block with-errors" id="email_recipient_error"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email*</label>
                                    <input type="text" name="email" id="email" class="form-control required"
                                        placeholder="Email" maxlength="230"
                                        value="{{ old('email', @$siteInformation->email) }}">
                                    <div class="help-block with-errors" id="email_error"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="alternate_email">Alternate Email</label>
                                    <input type="text" name="alternate_email" id="alternate_email" class="form-control"
                                        placeholder="Alternate Email" maxlength="230"
                                        value="{{ old('alternate_email', @$siteInformation->alternate_email) }}">
                                    <div class="help-block with-errors" id="alternate_email_error"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="phone">Phone*</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="Phone" maxlength="230"
                                        value="{{ old('phone', @$siteInformation->phone) }}">
                                    <div class="help-block with-errors" id="phone_error"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="landline">Phone 2</label>
                                    <input type="text" name="landline" id="landline" class="form-control required"
                                        placeholder="Phone 2" maxlength="230"
                                        value="{{ old('landline', @$siteInformation->landline) }}">
                                    <div class="help-block with-errors" id="landline_error"></div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="whatsapp_number">Whatsapp Number*</label>
                                    <input type="text" name="whatsapp_number" id="whatsapp_number"
                                        class="form-control required" placeholder="Whatsapp Number" maxlength="230"
                                        value="{{ old('whatsapp_number', @$siteInformation->whatsapp_number) }}">
                                    <div class="help-block with-errors" id="whatsapp_number_error"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="company_info_footer">Company Info in Footer</label>
                                    <textarea name="company_info_footer" id="company_info_footer" placeholder="Copyright Text"
                                        class="form-control required" autocomplete="off">{{ old('company_info_footer', @$siteInformation->company_info_footer) }}</textarea>
                                    <div class="help-block with-errors" id="company_info_footer_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="copyright">Copyright Text </label>
                                    <textarea name="copyright" id="copyright" placeholder="Copyright Text" class="form-control" autocomplete="off">{{ old('copyright', @$siteInformation->copyright) }}</textarea>
                                    <div class="help-block with-errors" id="copyright_error"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="logo"> Logo*</label>
                                    <div class="file-loading">
                                        <input id="logo" name="logo" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 156x152 size will be no more than
                                        100KB</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="logo_meta_tag"> Logo Attribute *</label>
                                    <input type="text" id="logo_attribute" name="logo_attribute"
                                        class="form-control required placeholder-cls" placeholder="Alt='Logo Attribute'"
                                        maxlength="230"
                                        value="{{ old('logo_attribute', @$siteInformation->logo_attribute) }}">
                                    <div class="help-block with-errors" id="logo_attribute_error"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="dashboard_logo"> Dashboard Logo*</label>
                                    <div class="file-loading">
                                        <input id="dashboard_logo" name="dashboard_logo" type="file"
                                            accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 156x152 size will be no more than
                                        100KB</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="logo_meta_tag"> Dashboard Logo Attribute *</label>
                                    <input type="text" id="dashboard_logo_attribute" name="dashboard_logo_attribute"
                                        class="form-control required placeholder-cls" placeholder="Alt='Logo Attribute'"
                                        maxlength="230"
                                        value="{{ old('dashboard_logo_attribute', @$siteInformation->dashboard_logo_attribute) }}">
                                    <div class="help-block with-errors" id="dashboard_logo_attribute_error"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="footer_logo">Footer Logo*</label>
                                    <div class="file-loading">
                                        <input id="footer_logo" name="footer_logo" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 156x152 size will be no more than
                                        100KB</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="footer_logo_attribute">Footer Logo Attribute *</label>
                                    <input type="text" id="footer_logo_attribute" name="footer_logo_attribute"
                                        class="form-control required placeholder-cls" placeholder="Alt='Logo Attribute'"
                                        maxlength="230"
                                        value="{{ old('footer_logo_attribute', @$siteInformation->footer_logo_attribute) }}">
                                    <div class="help-block with-errors" id="footer_logo_attribute_error"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                {{-- <div class="form-group col-md-6">
                                    <label for="working_hours">Working Hours</label>
                                    <textarea name="working_hours" id="working_hours" placeholder="Footer Information" class="form-control"
                                        autocomplete="off">
                                        {{ old('working_hours', @$siteInformation->working_hours) }}</textarea>
                                </div> --}}
                                <div class="form-group col-md-6">
                                    <label for="footer_location">Footer Location</label>
                                    <textarea name="footer_location" id="footer_location" placeholder="Footer Location" class="form-control tinyeditor"
                                        autocomplete="off">{{ old('footer_location', @$siteInformation->footer_location) }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label> Facebook</label>
                                    <input type="text" name="facebook_url" id="facebook_url" class="form-control"
                                        placeholder="Facebook"
                                        value="{{ old('facebook_url', @$siteInformation->facebook_url) }}"
                                        maxlength="230">
                                </div>
                                <div class="form-group col-md-4">
                                    <label> Instagram</label>
                                    <input type="text" name="instagram_url" id="instagram_url" class="form-control"
                                        placeholder="Instagram"
                                        value="{{ old('instagram_url', @$siteInformation->instagram_url) }}"
                                        maxlength="230">
                                </div>
                                <div class="form-group col-md-4">
                                    <label> Twitter</label>
                                    <input type="text" name="twitter_url" id="twitter_url" class="form-control"
                                        placeholder="Twitter"
                                        value="{{ old('twitter_url', @$siteInformation->twitter_url) }}" maxlength="230">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label> Linkedin</label>
                                    <input type="text" name="linkedin_url" id="linkedin_url" class="form-control"
                                        placeholder="Linkedin"
                                        value="{{ old('linkedin_url', @$siteInformation->linkedin_url) }}"
                                        maxlength="230">
                                </div>
                                <div class="form-group col-md-4">
                                    <label> Youtube</label>
                                    <input type="text" name="youtube_url" id="youtube_url" class="form-control"
                                        placeholder="Youtube"
                                        value="{{ old('youtube_url', @$siteInformation->youtube_url) }}" maxlength="230">
                                </div>
                                <div class="form-group col-md-4">
                                    <label> Pinterest</label>
                                    <input type="text" name="pinterest_url" id="pinterest_url" class="form-control"
                                        placeholder="Pinterest"
                                        value="{{ old('pinterest_url', @$siteInformation->pinterest_url) }}"
                                        maxlength="230">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label> Snapchat</label>
                                    <input type="text" name="snapchat_url" id="snapchat_url" class="form-control"
                                        placeholder="Snapchat"
                                        value="{{ old('snapchat_url', @$siteInformation->snapchat_url) }}"
                                        maxlength="230">
                                </div>
                                {{-- <div class="form-group col-md-4">
                                    <label>Telegram</label>
                                    <input type="text" name="telegram_url" id="telegram_url" class="form-control"
                                        placeholder="Snapchat"
                                        value="{{ old('telegram_url', @$siteInformation->telegram_url) }}"
                                        maxlength="230">
                                </div> --}}
                                <div class="form-group col-md-4">
                                    <label>Tiktok</label>
                                    <input type="text" name="tiktok_url" id="tiktok_url" class="form-control"
                                        placeholder="Snapchat"
                                        value="{{ old('tiktok_url', @$siteInformation->tiktok_url) }}" maxlength="230">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="privacy_policy">Privacy Policy</label>
                                    <textarea name="privacy_policy" id="privacy_policy" placeholder="Privacy Policy" class="form-control tinyeditor"
                                        autocomplete="off">
                                            {{ old('privacy_policy', @$siteInformation->privacy_policy) }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="terms_and_conditions">Terms & Conditions </label>
                                    <textarea name="terms_and_conditions" id="terms_and_conditions" placeholder="Terms & Conditions "
                                        class="form-control tinyeditor" autocomplete="off">
                                            {{ old('terms_and_conditions', @$siteInformation->terms_and_conditions) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                class="btn btn-primary pull-left submitBtns">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <input type="hidden" name="id" id="id"
                                value="{{ !empty($siteInformation) ? $siteInformation->id : '0' }}">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {

            $("#logo").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                layoutTemplates: {
                    actionDelete: ''
                },
                required: true,
                allowedFileTypes: ['image'],
                // 156x152
                minImageWidth: 156,
                minImageHeight: 152,
                maxImageWidth: 156,
                maxImageHeight: 152,
                maxFileSize: 100,
                showRemove: true,
                @if (isset($siteInformation) && $siteInformation->logo != null)
                    initialPreview: ["{{ asset($siteInformation->logo) }}", ],
                    initialPreviewConfig: [{
                        caption: "{{ last(explode('/', $siteInformation->logo)) }}",
                        width: "120px",
                        key: "{{ 'SiteInformation/logo/' . $siteInformation->id . '/logo_webp' }}",
                    }]
                @endif
            });
            $("#dashboard_logo").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                layoutTemplates: {
                    actionDelete: ''
                },
                required: true,
                allowedFileTypes: ['image'],
                minImageWidth: 156,
                minImageHeight: 152,
                maxImageWidth: 156,
                maxImageHeight: 152,
                maxFileSize: 100,
                showRemove: true,
                @if (isset($siteInformation) && $siteInformation->dashboard_logo != null)
                    initialPreview: ["{{ asset($siteInformation->dashboard_logo) }}", ],
                    initialPreviewConfig: [{
                        caption: "{{ last(explode('/', $siteInformation->dashboard_logo)) }}",
                        width: "120px",
                        key: "{{ 'SiteInformation/dashboard_logo/' . $siteInformation->id . '/dashboard_logo_webp' }}",
                    }]
                @endif
            });

            $("#footer_logo").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {
                    actionDelete: ''
                },
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                minImageWidth: 156,
                minImageHeight: 152,
                maxImageWidth: 156,
                maxImageHeight: 152,
                maxFileSize: 100,
                showRemove: true,
                @if (isset($siteInformation) && $siteInformation->footer_logo != null)
                    initialPreview: ["{{ asset($siteInformation->footer_logo) }}", ],
                    initialPreviewConfig: [{
                        caption: "{{ last(explode('/', $siteInformation->footer_logo)) }}",
                        width: "120px",
                        key: "{{ 'SiteInformation/footer_logo/' . $siteInformation->id . '/footer_logo_webp' }}",
                    }]
                @endif
            });

            $(".submitBtns").on("click", function(e) {
                e.preventDefault();

                console.log('ok');
                formValid = true;;
                var email_recipient = $('#email_recipient').val();
                var alternate_email = $('#alternate_email').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var whatsapp_number = $('#whatsapp_number').val();
                var landline = $('#landline').val();
                var logo_attribute = $('#logo_attribute').val();
                var footer_logo_attribute = $('#footer_logo_attribute').val();

                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                var alternateRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                var phoneRegex = /^\+[0-9]{8,13}$/;
                var landlineRegex = /^\+[0-9]{8,13}$/;
                var whatsappRegex = /^\+[0-9]{8,13}$/;


                if (email_recipient === '') {
                    $('#email_recipient').css('border-color', 'red');
                    $('#email_recipient_error').text('Email address required.');
                    formValid = false;
                } else {

                    if (!emailRegex.test(email_recipient)) {
                        $('#email_recipient').css('border-color', 'red');
                        $('#email_recipient_error').text('Please enter a valid email address.');
                        formValid = false;
                    } else {
                        $('#email_recipient').css('border-color', '#dbdade');
                        $('#email_recipient_error').text('');
                    }
                }

                if (email === '') {
                    $('#email').css('border-color', 'red');
                    $('#email_error').text('Email address required.');
                    formValid = false;
                } else {
                    if (!emailRegex.test(email)) {
                        $('#email').css('border-color', 'red');
                        $('#email_error').text('Please enter a valid email address.');
                        formValid = false;
                    } else {
                        $('#email').css('border-color', '#dbdade');
                        $('#email_error').text('');
                    }
                }

                if (alternate_email === '') {
                    // $('#alternate_email').css('border-color', 'red');
                    // $('#alternate_email_error').text('Email address required.');
                    // formValid = false;
                } else {
                    if (!alternateRegex.test(alternate_email)) {
                        $('#alternate_email').css('border-color', 'red');
                        $('#alternate_email_error').text('Please enter a valid email address.');
                        formValid = false;
                    } else {
                        $('#alternate_email').css('border-color', '#dbdade');
                        $('#alternate_email_error').text('');
                    }
                }


                if (phone === '') {
                    $('#phone').css('border-color', 'red');
                    $('#phone_error').text('Phone Number is required.');
                    formValid = false;
                } else {
                    if (!phoneRegex.test(phone)) {
                        $('#phone').css('border-color', 'red');
                        $('#phone_error').text('Please enter a valid phone number with country code.');
                        formValid = false;
                    } else {
                        $('#phone').css('border-color', '#dbdade');
                        $('#phone_error').text('');
                    }
                }
                if (whatsapp_number === '') {
                    $('#whatsapp_number').css('border-color', 'red');
                    $('#whatsapp_number_error').text('whatsapp Number is required.');
                    formValid = false;
                } else {
                    if (!whatsappRegex.test(whatsapp_number)) {
                        $('#whatsapp_number').css('border-color', 'red');
                        $('#whatsapp_number_error').text(
                            'Please enter a valid phone number with country code.');
                        formValid = false;
                    } else {
                        $('#whatsapp_number').css('border-color', '#dbdade');
                        $('#whatsapp_number_error').text('');
                    }
                }

                if (landline !== '') { // Check if landline is not empty
                    if (!landlineRegex.test(landline)) { // Validate landline number with regex
                        $('#landline').css('border-color', 'red');
                        $('#landline_error').text('Please enter a valid phone number.');
                        formValid = false; // Set form validity to false if landline is invalid
                    } else {
                        $('#landline').css('border-color', '#dbdade');
                        $('#landline_error').text('');
                    }
                }
                if (formValid) {
                    $('#formWizards').submit();
                }
            });

        });
    </script>

    <style>
        .gloss_body form#formWizards {
            background-clip: padding-box;
            box-shadow: 0 4px 18px rgba(47, 43, 61, .1), 0 0 transparent, 0 0 transparent;
            padding: 50px 50px;
            max-width: 1440px;
            margin-right: auto;
            margin-left: auto;
            margin-top: 50px;
            background-color: #ffffff;
        }
    </style>
@endsection
