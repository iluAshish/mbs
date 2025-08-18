@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Administration</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Administration</li>
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
                                <a href="{{url(Helper::sitePrefix().'administration/create')}}"
                                   class="btn btn-success pull-right">Add Admin <i
                                        class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                            </div>
                            <div class="card-body">
                                <table class="dataTable table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Phone Number</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1;use App\Models\User; @endphp @foreach($adminList as $user)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            @php
                                            $getuser=User::where('id',$user->user_id)->first();
                                            
                                            
                                            @endphp
                                            <td>{{ @$getuser->name}}</td>
                                            <td>{{ @$getuser->email}}</td>
                                            <td>{{ @$getuser->username}}</td>
                                            <td>{{ @$getuser->phone }}</td>
                                            <td><label class="switch">
                                                    <input id="switch-state" type="checkbox" class="status_check"
                                                           data-size="mini" data-url="/status-change"
                                                           data-table="User"
                                                           data-field="status" data-pk="{{ $user->user_id }}"
                                                        {{(@$getuser->status == "Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td>{{ date("d-M-Y", strtotime($user->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'administration/edit/'.$user->user_id)}}"
                                                       class="btn btn-success mr-2 tooltips"
                                                       title="Edit {{$user->role}}"><i class="fas fa-edit"></i></a>
                                                    @if($user->role=='Admin' && Auth::user()->admin->role == 'Super Admin')
                                                        <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                           data-url="administration/delete" data-id="{{$user->user_id}}"
                                                           title="Delete {{$user->role}}"><i
                                                                class="fas fa-trash"></i></a>
                                                    @endif
                                                    <a href="{{url(Helper::sitePrefix().'administration/reset-password/'.$user->user_id)}}"
                                                       class="btn btn-primary mr-2 tooltips"
                                                       title="Reset Password {{$user->role}}"><i
                                                            class="fas fa-unlock"></i></a>
                                                    <!-- <a href="{{url(Helper::sitePrefix().'reset-password/'.$user->user_id)}}" class="btn btn-primary mr-2 tooltips" title="Reset Password {{$user->role}}"><i class="fas fa-unlock"></i></a> -->
                                                </div>
                                            </td>
                                        </tr>
                                        @php $i++;@endphp
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
