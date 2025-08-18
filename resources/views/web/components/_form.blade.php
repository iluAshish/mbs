<form id="{{ $prefix }}Form" role="form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="d-flex flex-wrap justify-content-between">
        
        <div class="col--4">
            <input type="text" class="form-control {{ $prefix }}-required" placeholder="Name" 
                   id="{{ $prefix }}_name" name="{{ $prefix }}_name">
            <span id="{{ $prefix }}_name_error" class="error-message">Please enter your name</span>
        </div>

        <div class="col--4">
            <input type="email" class="form-control {{ $prefix }}-required" placeholder="Email" 
                   id="{{ $prefix }}_email" name="{{ $prefix }}_email">
            <span id="{{ $prefix }}_email_error" class="error-message">Please enter a valid email</span>
        </div>

        <div class="col--4">
            <input type="tel" class="form-control {{ $prefix }}-required phone_number" placeholder="Phone" 
                   id="{{ $prefix }}_phone" name="{{ $prefix }}_phone">
            <span id="{{ $prefix }}_phone_error" class="error-message">Please enter a valid phone number</span>
        </div>

        <div class="col-12">
            <textarea class="form-control {{ $prefix }}-required" placeholder="Enquiry" 
                      id="{{ $prefix }}_message" name="{{ $prefix }}_message"></textarea>
            <span id="{{ $prefix }}_message_error" class="error-message">Please enter your message</span>
        </div>
        <input type="hidden" name="prefixKey" id="{{$prefix}}" value="{{$prefix}}">
        <input type="hidden" name="type" id="{{$prefix}}" value="{{$prefix}}">

        <div class="d-flex buttonGroup p-0 w-100">
            <button type="submit" 
                    class="btn-theme btnDark submit-form-btn" 
                    data-flag="{{$prefix}}"
                    data-url="enquiry">
                Submit
            </button>  
        </div>

    </div>
</form>
