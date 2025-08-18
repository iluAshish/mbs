@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i>Case Study</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Case study List</li>
                    </ol>
                </div>
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
          			<div class="card card-success card-outline">
		              	<div class="card-header">
		                	<a href="{{url(Helper::sitePrefix().'home/case-study/create')}}" class="btn btn-success pull-right">Add Case-study <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
		              	</div>
              			<div class="card-body">
                            <table class="table table-bordered table-hover dataTable" width="100%">    
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        
                                        <th>Title</th>
                                        <th>Sort Order</th>
                                        <th>Status </th>
                                        <th>Popular</th>                                   
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1@endphp@foreach($case_studies as $case_study)
                                    
                                        <tr>
                                        <td>{{ $i }}</td>

                                        <td>{{ $case_study->title }}</td>

                                        <td>
                                            <input type="text" name="sort_order" id="sort_order_{{$loop->iteration}}" data-extra="id"
                                                   data-extra_key="{{$case_study->id}}" 
                                                   data-table="CaseStudy"
                                                   data-id="{{ $case_study->id }}" class="common_sort_order" style="width:25%"
                                                   value="{{$case_study->sort_order}}">
                                        </td>
                                        
                                        <td>
                                            <input id="switch-state-{{$i}}" type="checkbox" class="status_check" data-size="mini" title="CaseStudy" ref="{{ $case_study->id}}" <?php if($case_study->status=="Active"){ ?>checked="checked"<?php }?>>
                                        </td>

                                        <td>
                                            <input id="switch-state-{{$i}}" type="checkbox" class="display_to_home" data-url="home/case-study/popular" data-size="mini" title="CaseStudy" data-id="{{ $case_study->id}}" <?php if($case_study->popular=="Yes"){ ?>checked="checked"<?php }?>>
                                        </td>

                                        <td>{{ date("d-M-Y", strtotime($case_study->created_at)) }}</td>

                                        <td class="align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url(Helper::sitePrefix().'home/case-study/edit/'.$case_study->id)}}" class="btn btn-success mr-2 tooltips" title="Edit Case study"><i class="fas fa-edit"></i></a>

                                                <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" data-url="home/case-study/delete" data-id="{{$case_study->id}}" title="Delete case study"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                        </tr>
                                    @php $i++@endphp@endforeach
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