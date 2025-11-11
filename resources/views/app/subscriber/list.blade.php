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
                            <li class="breadcrumb-item active">{{$type}}</li>
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


                        {{-- <div class="gloss_card-header">
                            <a href="{{url(Helper::sitePrefix().'success-stories/create')}}"
                               class="btn btn-success pull-right">Add {{$type}} <i
                                    class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                        </div> --}}
                        <div class="gloss_card">
                            <div class="gloss_card-body">
                                <table class="table table-bordered table-hover dataTable" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Email</th>
                                        
                                        <th>Status</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subscriberList as $subscriber)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $subscriber->email }}</td>
                                            
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/status-change" data-table="Subscriber"
                                                           data-field="status" data-pk="{{ $subscriber->id}}"
                                                        {{$subscriber->status == "Active" ?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>

                                            <td class="text-right py-0 align-middle">

                                                <div class="btn-group btn-group-sm">
                                                    
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       data-url="subscription/delete" data-id="{{$subscriber->id}}"
                                                       title="Delete Success Story"><i class="fas fa-trash"></i></a>
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
