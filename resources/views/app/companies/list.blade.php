@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header list_breadcrumb" >
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Home - Companies</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Companies</li>
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
                        <div class="gloss_card-header">
                            <a href="{{url(Helper::sitePrefix().'companies/create')}}" class="btn btn-success pull-right">Add Company <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                        </div>
                    <div class="gloss_card">

                        <div class="gloss_card-body">
                            <table class="dataTable table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Sort Order</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brandsList as $brands)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$brands->title}} </td>
                                        <td>
                                            @if($brands->image)
                                            <img src="{{url($brands->image)}}" width="80"/>
                                            @endif
                                            </td>
                                        <td>
                                            <input type="text" name="sort_order" id="sort_order_{{$loop->iteration}}" data-extra="id" data-extra_key="{{$brands->id}}" data-table="Company" data-id="{{ $brands->id }}" class="common_sort_order" style="width:25%" value="{{$brands->sort_order}}">
                                        </td>

                                        <td>
                                            <label class="switch">
                                                <input id="switch-state" type="checkbox" class="status_check" data-size="mini" data-url="/status-change" data-table="Company" data-field="status" data-pk="{{ $brands->id }}" {{($brands->status=="Active")?'checked':''}}>
                                                <span class="slider"></span>
                                            </label>
                                        </td>
                                        <td>{{ date("d-M-Y", strtotime($brands->created_at)) }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url(Helper::sitePrefix().'companies/edit/'.$brands->id)}}" class="btn btn-success mr-2 tooltips" title="Edit Company"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" title="Delete Company" data-url="companies/delete" data-id="{{$brands->id}}"><i class="fas fa-trash"></i></a>
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
