<div class="card card-info col-md-12 collapsed-card p-0">
    <div class="card-header">
        <h3 class="card-title">Heading Form</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form role="form" id="homeHeadingForm" class="form--wizard" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title1">Title *</label>
                    <input type="text" class="form-control required" id="title1" name="title1" placeholder="Title " value="{{@$heading->title1}}">
                    <div class="help-block with-errors" id="title1_error"></div>
                    @error('title1')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="sub_title">Sub Title </label>
                    <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Sub Title " value="{{@$heading->sub_title}}">
                    <div class="help-block with-errors" id="sub_title_error"></div>
                    @error('sub_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label> Description</label>
                    <textarea name="description" id="description" class="form-control tinyeditor" placeholder="Alternate Description">{{ old('heading',
                                                @$heading->description) }}</textarea>
                    <div class="help-block with-errors" id="description_error"></div>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <input type="hidden" name="type" value="{{ @$heading->type ?? $type }}">
    </div>
    <div class="card-footer">
        <input type="button" data-type="{{ @$heading->type ?? $type }}" name="btn_save" data-form-id="homeHeadingForm" data-url="/section-heading" value="Submit" class="btn btn-primary pull-left headingSubmit">
        <button type="reset" class="btn btn-default">Cancel</button>
        <img class="animation__shake loadingImg" src="{{asset('app/dist/img/loading.gif')}}" style="display:none;">
    </div>
    </form>
</div>