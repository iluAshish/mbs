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
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'project/')}}">Project</a>
                            </li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <style>
            button.kv-file-remove.btn.btn-sm.btn-kv.btn-default.btn-outline-secondary {
                display: none;
            }
        </style>
        <section class="content">
            <div class="container-fluid">

                <form role="form" id="formWizard"
                action="{{@$key=='Copy'?url(Helper::sitePrefix().'project/create'):''}}" class="form--wizard"
                enctype="multipart/form-data" method="post">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
                                <input type="text" name="title" id="title" placeholder="Title" maxlength="100"
                                       class="form-control required for_canonical_url" autocomplete="off"
                                       value="{{ old('title', isset($project)?$project->title:'') }}">
                                <div class="help-block with-errors" id="title_error"></div>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label> Short URL *</label>
                                <input type="text" name="short_url" id="short_url" placeholder="Short URL"
                                       class="form-control required" autocomplete="off"
                                       value="{{ isset($project)?$project->short_url:'' }}">
                                <div class="help-block with-errors" id="short_url_error"></div>
                                @error('short_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Starting Date</label>
                                <input type="number" name="starting_year" id="starting_year" placeholder="1998"
                                    class="form-control" autocomplete="off"
                                    pattern="\d{4}" title="Enter a valid 4-digit year (e.g., 1998)"
                                    value="{{ old('starting_year', isset($project)?$project->start_year:'') }}">

                                <div class="help-block with-errors" id="starting_year_error"></div>
                                @error('starting_year')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label> Ending Year</label>
                                <input type="number" name="ending_year" id="ending_year" placeholder="2025"
                                    class="form-control" autocomplete="off"
                                    value="{{ old('ending_year', isset($project) ? $project->end_year : '') }}"
                                    min="1900" max="{{ date('Y') + 20 }}" step="1">

                                <div class="help-block with-errors" id="ending_year_error"></div>
                                @error('ending_year')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label> Location</label>
                                <input type="text" name="location" id="location" placeholder="Enter location name"
                                       class="form-control" autocomplete="off"
                                       value="{{ old('location', isset($project)?$project->location:'') }}">
                                <div class="help-block with-errors" id="location_error"></div>
                                @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label> Staff count</label>
                                <input type="text" name="staff_count" id="staff_count" placeholder="Enter number of staff"
                                       class="form-control" autocomplete="off"
                                       value="{{ old('staff_count', isset($project)?$project->staff_count:'') }}">
                                <div class="help-block with-errors" id="staff_count_error"></div>
                                @error('staff_count')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Project Image*</label>
                                <div class="file-loading">
                                    <input id="project_image" name="project_image" type="file"
                                           accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image dimension must be 538 x 429 PX and Size must be less than 512 KB</span>

                                @if(@$key)
                                    @error('project_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label>Image Attribute</label>
                                <input type="text" name="project_image_attribute"
                                       id="project_image_attribute"
                                       placeholder="Alt=Project Attribute'"
                                       class="form-control placeholder-cls" autocomplete="off"
                                       value="{{ old( 'project_image_attribute', isset($project)?$project->image_attribute:'') }}">
                                @error('project_image_attribute')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Logo Image*</label>
                                <div class="file-loading">
                                    <input id="logo_image" name="logo_image" type="file"
                                           accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image dimension must be 538 x 429 PX and Size must be less than 512 KB</span>

                                @if(@$key)
                                    @error('logo_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label>Logo Image Attribute</label>
                                <input type="text" name="logo_image_attribute"
                                       id="logo_image_attribute"
                                       placeholder="Alt=Project Attribute'"
                                       class="form-control placeholder-cls" autocomplete="off"
                                       value="{{ old( 'logo_image_attribute', isset($project)?$project->logo_image_attribute:'') }}">
                                @error('logo_image_attribute')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Short Description</label>
                                <textarea name="short_description" id="short_description"
                                          placeholder="Description" class="form-control  tinyeditor"
                                          autocomplete="off">{{ old ('short_description', isset($project)?$project->short_description:'') }}</textarea>
                                <div class="help-block with-errors" id="short_description_error"></div>
                                @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <textarea name="description" id="description"
                                          placeholder="Description" class="form-control  tinyeditor"
                                          autocomplete="off">{{ old ('description', isset($project)?$project->description:'') }}</textarea>
                                <div class="help-block with-errors" id="description_error"></div>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Challenges</label>
                                <textarea name="challenges" id="challenges"
                                          placeholder="Challenges" class="form-control  tinyeditor"
                                          autocomplete="off">{{ old ('challenges', isset($project)?$project->challenges:'') }}</textarea>
                                <div class="help-block with-errors" id="challenges_error"></div>
                                @error('challenges')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Services Delivered</label>
                                <textarea name="services_delivered" id="services_delivered"
                                          placeholder="Services delivered" class="form-control  tinyeditor"
                                          autocomplete="off">{{ old ('services_delivered', isset($project)?$project->services_delivered:'') }}</textarea>
                                <div class="help-block with-errors" id="services_delivered_error"></div>
                                @error('services_delivered')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Approach</label>
                                <textarea name="approach" id="approach"
                                          placeholder="Approach" class="form-control  tinyeditor"
                                          autocomplete="off">{{ old ('approach', isset($project)?$project->approach:'') }}</textarea>
                                <div class="help-block with-errors" id="approach_error"></div>
                                @error('approach')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Result archieved</label>
                                <textarea name="result_archieved" id="result_archieved"
                                          placeholder="Result archieved" class="form-control  tinyeditor"
                                          autocomplete="off">{{ old ('result_archieved', isset($project)?$project->result_archieved:'') }}</textarea>
                                <div class="help-block with-errors" id="result_archieved_error"></div>
                                @error('result_archieved')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Conclusion</label>
                                <textarea name="conclusion" id="conclusion"
                                          placeholder="Conclusion" class="form-control  tinyeditor"
                                          autocomplete="off">{{ old ('conclusion', isset($project)?$project->conclusion:'') }}</textarea>
                                <div class="help-block with-errors" id="conclusion_error"></div>
                                @error('conclusion')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                       
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Meta Title</label>
                                <textarea class="form-control" id="meta_title" name="meta_title"
                                          placeholder="Meta Title">{{ old ('meta_title', isset($project)?$project->meta_title:'') }}</textarea>
                                @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label> Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description"
                                          placeholder="Meta Description">{{ old ('meta_description', isset($project)?$project->meta_description:'') }}</textarea>
                                @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Meta Keyword</label>
                                <textarea class="form-control" id="meta_keyword" name="meta_keyword"
                                          placeholder="Meta Keyword">{{ old ('meta_keyword', isset($project)?$project->meta_keywords:'') }}</textarea>
                                @error('meta_keyword')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label> Other Meta Tag</label>
                                <textarea class="form-control" id="other_meta_tag" name="other_meta_tag"
                                          placeholder="Other Meta Tag">{{ old ('other_meta_tag', isset($project)?$project->other_meta_tag:'') }}</textarea>
                                @error('other_meta_tag')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="gloss_card-footer">
                            <input type="submit" id="btn_save" name="btn_save"
                                   data-id="{{isset($project)?$project->id:''}}" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                                   @if(@$key)
                                   <input type="hidden" value="{{@$key}}" name="copy">
                                   <input type="hidden" value="{{@$project->id}}" name="copy_project_id">
                               @endif
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <input type="hidden" name="id" id="id" value="{{ isset($project)?$project->id:'0' }}">
                            <img class="animation__shake loadingImg" src="{{url('backend/dist/img/loading.gif')}}"
                                 style="display:none;">
                        </div>
                </form>
            </div>
        </section>
    </div>
    <script>
        function checkTinyEditorContent() {
            var editorContent = tinyMCE.get('alternate_description').getContent();
            var hasDescriptionError = true;
            var descriptionErrorDiv = document.getElementById('description_error');
            if (editorContent.trim() === '') {
                descriptionErrorDiv.innerHTML = '<p class="text-danger">Description is required.</p>';
                return false;
            } else {
                descriptionErrorDiv.innerHTML = '';
                return true;
            }
        }
        document.getElementById('formWizard').onsubmit = checkTinyEditorContent;
    </script>
    
    <script type="text/javascript">
        
        $(document).ready(function () {
            let type = '{{$title}}';
            
            $("#project_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileExtensions: ['jpg','jpeg', 'png'],
                minImageWidth: 381,
                minImageHeight: 220,
                maxImageWidth: 381,
                maxImageHeight: 220,
                showRemove: true,
                @if(isset($project) && $project->image!=NULL)
                initialPreview: ["{{asset($project->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($project->image!=NULL)?last(explode('/',$project->image)):''}}",
                    width: "120px",
                    key: "{{'project$project/project_image/'.$project->id.'/project_image' }}",
                }],
                @endif
            });

            $("#logo_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileExtensions: ['jpg','jpeg', 'png'],
                minImageWidth: 120,
                minImageHeight: 68,
                maxImageWidth: 120,
                maxImageHeight: 68,
                showRemove: true,
                @if(isset($project) && $project->logo_image!=NULL)
                initialPreview: ["{{asset($project->logo_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($project->logo_image!=NULL)?last(explode('/',$project->logo_image)):''}}",
                    width: "120px",
                    key: "{{'project$project/logo_image/'.$project->id.'/logo_image' }}",
                }],
                @endif
            });

        });
    </script>
@endsection
