@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header gloss_breadcrumbs">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> {{$title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{url(Helper::sitePrefix().'products/'.$urlType)}}">{{$type}}</a></li>
                            <li class="breadcrumb-item active">{{$key}}</li>
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
                            @php
                            use App\Models\ProductBrands;
                            $brands = ProductBrands::active()->get();
                            @endphp
                            {{-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Brands</label>
                                    <select name="parent_id" id="parent_id"
                                            class="form-control" >
                                        <option value="">Select Brand</option>
                                            @foreach($brands as $brand_new)
                                                <option value="{{$brand_new->id}}"
                                                    {{ (@$brand_new->id==@$brand->parent_id)?'selected':'' }}
                                                >{{$brand_new->title}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>--}}
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Brand Name*</label>
                                    <input type="text" name="brand_name" id="brand_name" placeholder="Enter Brand Name"
                                           class="form-control required" autocomplete="off"
                                           value="{{ isset($brand)?$brand->brand_name:'' }}">
                                    <div class="help-block with-errors" id="brand_name_error"></div>
                                    @error('brand_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Title*</label>
                                    <input type="text" name="title" id="title" placeholder="Enter title"
                                           class="form-control for_canonical_url required" autocomplete="off"
                                           value="{{ isset($brand)?$brand->title:'' }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Sub Title</label>
                                    <input type="text" name="sub_title" id="sub_title" placeholder="Enter sub title"
                                           class="form-control" autocomplete="off"
                                           value="{{ isset($brand)?$brand->sub_title:'' }}">
                                    <div class="help-block with-errors" id="sub_title_error"></div>
                                    @error('sub_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Short URL*</label>
                                    <input type="text" name="short_url" id="short_url" placeholder="Short URL"
                                           class="form-control required" autocomplete="off"
                                           value="{{ isset($brand)?$brand->short_url:'' }}">
                                    <div class="help-block with-errors" id="short_url_error"></div>
                                    @error('short_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Select products</label>
                                    <select name="product_ids[]" id="product_ids" class="form-control select2" multiple search>
                                        @php
                                            use App\Models\Product;
                                           if (isset($brand) && isset($brand->id)) {
                                                $allProducts = Product::select('id', 'title')
                                                    ->where('brand_id', $brand->id)
                                                    ->active()
                                                    ->get();
                                            } else {
                                                $allProducts = Product::select('id', 'title')
                                                    ->active()
                                                    ->get();
                                            }

                                            $selectedProducts = isset($brand) && !empty($brand->product_ids)
                                                ? json_decode($brand->product_ids, true)
                                                : [];

                                        @endphp
                                        @foreach($allProducts as $product)
                                            <option value="{{ $product->id }}" {{ in_array($product->id, $selectedProducts) ? 'selected' : '' }}>
                                                {{ $product->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="status_error"></div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="product_short_description">Product Short Description </label>
                                    <textarea class="form-control tinyeditor" id="product_short_description" placeholder="Short Description"
                                              name="product_short_description">{!! old('product_short_description', isset($brand)?$brand->product_short_description : '') !!}</textarea>
                                              <div class="help-block with-errors" id="product_short_description_error"></div>
                                              @error('product_short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row" id="">
                                <div class="form-group col-md-6">
                                    <label>Select services</label>
                                    <select name="service_ids[]" id="service_ids" class="form-control select2" multiple search>
                                        @php
                                            use App\Models\Service;
                                           
                                            $allServices = Service::select('id', 'title')
                                                ->active()
                                                ->get();
                                            

                                            $selectedServices = isset($brand) && !empty($brand->service_ids)
                                                ? json_decode($brand->service_ids, true)
                                                : [];
                                         

                                        @endphp
                                        @foreach($allServices as $service)
                                            <option value="{{ $service->id }}" {{ in_array($service->id, $selectedServices) ? 'selected' : '' }}>
                                                {{ $service->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="service_ids_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="service_short_description_one">Service Short Description one </label>
                                    <textarea class="form-control tinyeditor" id="service_short_description_one" placeholder="Service Short Description one"
                                              name="service_short_description_one">{!! old('service_short_description_one', isset($brand)?$brand->service_short_description_one : '') !!}</textarea>
                                              <div class="help-block with-errors" id="service_short_description_one_error"></div>
                                              @error('service_short_description_one')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="service_short_description_two">service Short Description two </label>
                                    <textarea class="form-control tinyeditor" id="service_short_description_two" placeholder="Service Short Description one"
                                              name="service_short_description_two">{!! old('service_short_description_two', isset($brand)?$brand->service_short_description_two : '') !!}</textarea>
                                              <div class="help-block with-errors" id="service_short_description_two_error"></div>
                                              @error('service_short_description_two')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row" id="">
                                <div class="form-group col-md-6">
                                    <label>Image*</label>
                                    <div class="file-loading">
                                        <input id="featured_image" name="featured_image" type="file"
                                               accept="image/*">
                                    </div>
                                    <span
                                        class="caption_note">Note: Image dimension must be 400 x 200 PX and Size must be less than 512 KB</span>
                                    @error('thumbnail_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Image Attribute</label>
                                    <input type="text" name="featured_image_attribute"
                                           id="featured_image_attribute"
                                           placeholder="Alt='Image Attribute'"
                                           class="form-control placeholder-cls" autocomplete="off"
                                           value="{{ isset($brand)?$brand->featured_image_attribute:'' }}">
                                    @error('thumbnail_image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Product Page Thumbnail Image*</label>
                                    <div class="file-loading">
                                        <input id="thumbnail_image" name="thumbnail_image" type="file"
                                               accept="image/*">
                                    </div>
                                    <span
                                        class="caption_note">Note: Image size should be minimum of 455 x 770</span>
                                    @if(@$key)
                                        @error('thumbnail_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Thumbnail Attribute</label>
                                    <input type="text" name="thumbnail_image_attribute"
                                           id="thumbnail_image_attribute"
                                           placeholder="Alt='Thumbnail Attribute'"
                                           class="form-control placeholder-cls" autocomplete="off"
                                           value="{{ isset($brand)?$brand->thumbnail_image_attribute:'' }}">
                                    @error('thumbnail_image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="short_description">Short Description</label>
                                    <textarea class="form-control tinyeditor" id="short_description" placeholder="Short Description"
                                              name="short_description">{!! old('short_description', isset($brand)?$brand->short_description : '') !!}</textarea>
                                              <div class="help-block with-errors" id="short_description_error"></div>
                                              @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Description</label>
                                    <textarea name="description" id="description"
                                              class="form-control tinyeditor"
                                              placeholder="Description"
                                    >{{ old('description',isset($brand)?$brand->description:'') }}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="alternate_description">Alternate Description</label>
                                    <textarea class="form-control tinyeditor" id="alternate_description" placeholder="Alternate Description"
                                              name="alternate_description">{!! old('alternate_description', isset($brand)?$brand->alternate_description : '') !!}</textarea>
                                              <div class="help-block with-errors" id="alternate_description_error"></div>
                                              @error('alternate_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Banner Image</label>
                                    <div class="file-loading">
                                        <input id="banner_image" name="banner_image" type="file"
                                               accept="image/*">
                                    </div>
                                    <span
                                        class="caption_note">Note: Image size should be minimum of 1728 x 450</span>
                                    @if(@$key)
                                        @error('banner_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Banner Attribute</label>
                                    <input type="text" name="banner_image_attribute"
                                           id="banner_image_attribute"
                                           placeholder="Alt='Banner Attribute'"
                                           class="form-control placeholder-cls" autocomplete="off"
                                           value="{{ isset($brand)?$brand->banner_image_attribute:'' }}">
                                    @error('banner_image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Meta Title</label>
                                    <textarea class="form-control" id="meta_title" name="meta_title"
                                              placeholder="Meta Title">{{ isset($brand)?$brand->meta_title:'' }}</textarea>
                                    @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description"
                                              placeholder="Meta Description">{{ isset($brand)?$brand->meta_description:'' }}</textarea>
                                    @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Meta Keyword</label>
                                    <textarea class="form-control" id="meta_keyword" name="meta_keyword"
                                              placeholder="Meta Keyword">{{ isset($brand)?$brand->meta_keyword:'' }}</textarea>
                                    @error('meta_keyword')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Other Meta Tag</label>
                                    <textarea class="form-control" id="other_meta_tag" name="other_meta_tag"
                                              placeholder="Other Meta Tag">{{ isset($brand)?$brand->other_meta_tag:'' }}</textarea>
                                    @error('other_meta_tag')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> 

                        <div class="gloss_card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <img class="animation__shake loadingImg" src="{{asset('backend/dist/img/loading.gif')}}"
                                 style="display:none;">
                        </div>
                </form>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#thumbnail_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                layoutTemplates: {actionDelete: ''},
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileExtensions: ['jpg','jpeg', 'png'],
                // minImageWidth: 770,
                // minImageHeight: 455,
                // maxImageWidth: 770,
                // maxImageHeight: 455,
                maxFilesize: 512,
                showRemove: true,
                @if(isset($brand) && $brand->thumbnail_image!=NULL)
                initialPreview: ["{{asset($brand->thumbnail_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($brand->thumbnail_image!=NULL)?last(explode('/',$brand->thumbnail_image)):''}}",
                    width: "120px"
                }]
                @endif

            });
            $("#banner_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileExtensions: ['jpg','jpeg', 'png'],
                // minImageWidth: 1728,
                // minImageHeight: 450,
                // maxImageWidth: 1728,
                // maxImageHeight: 450,
                maxFilesize: 512,
                showRemove: true,
                @if(isset($brand) && $brand->banner_image!=NULL)
                initialPreview: ["{{asset($brand->banner_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($brand->banner_image!=NULL)?last(explode('/',$brand->banner_image)):''}}",
                    width: "120px",
                    key: "{{'brand/banner_image/'.$brand->id.'/banner_image_webp' }}",
                }]
                @endif

            });

            $("#featured_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                layoutTemplates: {actionDelete: ''},
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileExtensions: ['jpg','jpeg', 'png'],
                // minImageWidth: 400,
                // minImageHeight: 200,
                // maxImageWidth: 400,
                // maxImageHeight: 200,
                maxFilesize: 512,
                showRemove: true,
                @if(isset($brand) && $brand->featured_image!=NULL)
                initialPreview: ["{{asset($brand->featured_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($brand->featured_image!=NULL)?last(explode('/',$brand->featured_image)):''}}",
                    width: "120px"
                }]
                @endif
            });
        });
    </script>
@endsection
