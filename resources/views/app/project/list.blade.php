@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header list_breadcrumb">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage {{$type}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>
                </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
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


                        <div class="gloss_card-header">
                            <a href="{{url(Helper::sitePrefix().'project/create')}}"
                               class="btn btn-success pull-right">Add {{$type}} <i
                                    class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                        </div>
                        <div class="gloss_card">
                            <div class="gloss_card-body">
                                <table class="table table-bordered table-hover dataTable" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                         <!-- <th>Category</th> -->
                                         <!-- <th>Brand</th> -->
                                         <th>Sort Order</th> 
                                        <th>Status</th>
                                       <th>Display to Home</th>
                                       <th>Case Study</th>
                                       <th>Gallery</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($projectList as $project)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $project->title }}</td>
                                             
                                            
                                            <td>
                                                <input type="text" name="sort_order"
                                                       id="sort_order_{{$loop->iteration}}" data-extra="id"
                                                       data-extra_key="{{$project->id}}" data-table="Project"
                                                       data-id="{{ $project->id }}" class="common_sort_order"
                                                       style="width:25%"
                                                       value="{{$project->sort_order}}" maxlength="10">
                                            </td>
                                            
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/status-change" data-table="Project"
                                                           data-field="status" data-pk="{{ $project->id}}"
                                                        {{($project->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="bool_status"
                                                           data-url='/change-bool-status' data-table="Project"
                                                           data-id="{{$project->id}}" data-field="display_to_home" data-pk="{{ $project->id}}"
                                                        {{($project->display_to_home == "Yes")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>

                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="bool_status"
                                                           data-url='/case-bool-status' data-table="Project"
                                                           data-id="{{$project->id}}" data-field="case_study_status" data-pk="{{ $project->id}}"
                                                        {{($project->case_study_status == "Yes")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>

                                            <td><a href="{{url(Helper::sitePrefix().'project/gallery/'.$project->id)}}"
                                                   class="btn btn-sm btn-primary mr-2 tooltips" title="Add Gallery">Gallery</a>
                                            </td>

                                            <td class="text-right py-0 align-middle">

                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'project/edit/'.$project->id)}}"
                                                       class="btn btn-success mr-2 tooltips" title="Edit project"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       data-url="project/delete" data-id="{{$project->id}}"
                                                       title="Delete project"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
