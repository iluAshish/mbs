@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header list_breadcrumb">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Services</h1>
                    </div>
{{--                    <div class="col-sm-6">--}}
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            <li class="breadcrumb-item"><a href="">Home</a></li>--}}
{{--                            <li class="breadcrumb-item active">Service List</li>--}}
{{--                        </ol>--}}
{{--                    </div>--}}
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
                                <a href="{{url(Helper::sitePrefix().'service/create')}}" class="btn btn-success pull-right gloss_add_new">Add Service</a>
                            </div>
                        <div class="gloss_card">

                            <div class="gloss_card-body">
                                <table class="dataTable table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Sort Order</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($serviceList as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $service->title }}</td>
                                            <td>
                                                <input type="text" name="sort_order"
                                                       id="sort_order_{{$loop->iteration}}" data-extra="id"
                                                       data-extra_key="{{$service->id}}" data-table="Service"
                                                       data-id="{{ $service->id }}" class="common_sort_order"
                                                       style="width:25%"
                                                       value="{{$service->sort_order}}" maxlength="3">
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input id="switch-state" type="checkbox" class="status_check"
                                                           data-size="mini" data-url="/status-change"
                                                           data-table="Service"
                                                           data-field="status" data-pk="{{ $service->id }}"
                                                        {{($service->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td>{{ date("d-M-Y", strtotime($service->created_at)) }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'service/edit/'.$service->id)}}" class="btn btn-success mr-2 tooltips gloss_edit" title="Edit Service"><i class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips gloss_delete" data-url="service/delete" data-id="{{$service->id}}" title="Delete Service"><i class="fas fa-trash"></i></a>
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
