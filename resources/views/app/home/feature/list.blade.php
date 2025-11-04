@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header list_breadcrumb">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Home - {{$title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Feature</li>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="gloss_card-header">
                            <a href="{{url(Helper::sitePrefix().'home/features/create')}}"
                               class="btn btn-success pull-right">Add {{ucwords(str_replace('-', ' ', $title))}} <i
                                    class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                        </div>
                    <div class="gloss_card">
                           <div class="gloss_card-body">
                                <table id="recordsListView" class="table table-bordered table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Display Home</th>
                                            <th class="not-sortable">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach($featureList as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $list->title }}</td>
                                                <td>
                                                    <label class="switch">
                                                        <input id="switch-state" type="checkbox" class="status_check"
                                                               data-size="mini" data-url="/status-change"
                                                               data-table="Feature"
                                                               data-field="status" data-pk="{{ $list->id }}"
                                                            {{($list->status=="Active")?'checked':''}}>
                                                        <span class="slider"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" class="bool_status"
                                                            data-url='/change-bool-status' data-table="Feature"
                                                            data-id="{{$list->id}}" data-field="display_to_home" data-pk="{{ $list->id}}"
                                                            {{($list->display_to_home == "Yes")?'checked':''}}>
                                                        <span class="slider"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <a href="{{url(Helper::sitePrefix().'home/features/edit/'.$list->id)}}" title="Edit"><i
                                                            class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       title="Delete" data-url="home/features/delete"
                                                       data-id="{{$list->id}}"><i class="fas fa-trash"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                            @php $i++ @endphp
                                        @endforeach
                                    
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
