@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header list_breadcrumb" >
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Home - Clients</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Clients</li>
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
                            <a href="{{url(Helper::sitePrefix().'home/clients/create')}}" class="btn btn-success pull-right">Add Clients <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
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
                                    @foreach($associateList as $associate)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$associate->title}} </td>
                                        <td>
                                            @if($associate->image)
                                            <img src="{{url($associate->image)}}" width="80"/>
                                            @endif
                                            </td>
                                        <td>
                                            <input type="text" name="sort_order" id="sort_order_{{$loop->iteration}}" data-extra="id" data-extra_key="{{$associate->id}}" data-table="GroupCompanies" data-id="{{ $associate->id }}" class="common_sort_order" style="width:25%" value="{{$associate->sort_order}}">
                                        </td>

                                        <td>
                                            <label class="switch">
                                                <input id="switch-state" type="checkbox" class="status_check" data-size="mini" data-url="/status-change" data-table="GroupCompanies" data-field="status" data-pk="{{ $associate->id }}" {{($associate->status=="Active")?'checked':''}}>
                                                <span class="slider"></span>
                                            </label>
                                        </td>
                                        <td>{{ date("d-M-Y", strtotime($associate->created_at)) }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url(Helper::sitePrefix().'home/clients/edit/'.$associate->id)}}" class="btn btn-success mr-2 tooltips" title="Edit Client"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" title="Delete Client" data-url="home/clients/delete" data-id="{{$associate->id}}"><i class="fas fa-trash"></i></a>
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
