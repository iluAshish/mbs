
<form id="{{ $prefix }}Form" role="form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-between">
        <div class="formGroup col--4">
            <input type="text" class="form-control {{ $prefix }}-required" placeholder="Name" 
                id="{{ $prefix }}_name" name="{{ $prefix }}_name">
            <span id="{{ $prefix }}_name_error" class="error-message">Please enter your name</span>
            
        </div>
        <div class="formGroup col--4">
            <input type="email" class="form-control {{ $prefix }}-required" placeholder="Email" 
                id="{{ $prefix }}_email" name="{{ $prefix }}_email">
            <span id="{{ $prefix }}_email_error" class="error-message">Please enter a valid email</span>
        </div>
        <div class="formGroup col--4">
            <input type="tel" class="form-control {{ $prefix }}-required phone_number" placeholder="Phone" 
                id="{{ $prefix }}_phone" name="{{ $prefix }}_phone">
            <span id="{{ $prefix }}_phone_error" class="error-message">Please enter a valid phone number</span>
            <!-- <input type="tel" id="phone_enquiry" name="phone_enquiry" class="phone_number" placeholder="Phone">
            <span id="phone_enquiryError" class="error-message">Please enter a valid phone number</span> -->
        </div>
        <div class="formGroup col-12">
            <textarea class="form-control {{ $prefix }}-required" placeholder="Enquiry" 
                id="{{ $prefix }}_message" name="{{ $prefix }}_message"></textarea>
            <span id="{{ $prefix }}_message_error" class="error-message">Please enter your message</span>
        </div>
        <input type="hidden" name="prefixKey" id="{{$prefix}}" value="{{$prefix}}">
        <input type="hidden" name="type" id="{{$prefix}}" value="{{$prefix}}">
        
        <!-- aditional hidden fields to capture product, service, brand IDs if available -->

        <input type="hidden" name="{{ $prefix }}_product_id" id="{{ $prefix }}_product_id" value="{{ isset($product_page) ? $product_page->id : '' }}">
        <input type="hidden" name="{{ $prefix }}_service_id" id="{{ $prefix }}_service_id" value="{{ isset($service_page) ? $service_page->id : '' }}">
        <input type="hidden" name="{{ $prefix }}_brand_id" id="{{ $prefix }}_brand_id" value="{{ isset($brand_page) ? $brand_page->id : '' }}">

        <div class="d-flex justify-content-end buttonGroup p-0">
            <button type="submit" 
                    class="btn-theme btnDark submit-form-btn" 
                    data-flag="{{$prefix}}"
                    data-url="enquiry">
                Submit
            </button> 
            <button type="button" class="btn-cancel btn-theme btnBorder" data-bs-dismiss="modal" aria-label="Close" id="enquiryFormClose">Cancel</button>
        </div>
    </div>  
</form>
