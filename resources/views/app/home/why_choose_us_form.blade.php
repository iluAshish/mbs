@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header gloss_breadcrumbs">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Home - {{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active"> {{ $title }}</li>
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Title*</label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control required" autocomplete="off" value="{{ old('title',isset($why_choose_us)?$why_choose_us->title:'') }}" maxlength="50">
                                <div class="help-block with-errors" id="title_error"></div>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- <div class="form-group col-md-6">
                                <label>Sub Title*</label>
                                <input type="text" name="subtitle" id="subtitle" placeholder="Sub Title" class="form-control required" autocomplete="off" value="{{ old('title',isset($why_choose_us)?$why_choose_us->subtitle:'') }}" maxlength="50">
                                <div class="help-block with-errors" id="subtitle_error"></div>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> -->
                        </div>
                          <!-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Image</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept=".jpg,.png">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 230 X 320</span>
                                    <div class="help-block with-errors" id="image_error"></div>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Description*</label>
                                    <textarea name="description" id="description" placeholder="Description" class="required form-control tinyeditor" autocomplete="off">{{ old('description', @$why_choose_us->description) }}</textarea>

                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="help-block with-errors" id="description_error"></div>
                                </div>
                          </div>
                    <div class="card_gloss-footer">
                        <input type="hidden" name="id" id="id" value="{{isset($why_choose_us)?$why_choose_us->id:'0'}}">
                        <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
                    </div>

            </form>
        </div>
    </section>
</div>
   
@endsection
