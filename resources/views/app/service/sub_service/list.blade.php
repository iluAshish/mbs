@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
<section class="content-header list_breadcrumb">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Sub Services</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Sub Service</li>
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
                    <div class="gloss_card-header ">
                        <a href="{{url(Helper::sitePrefix().'service/sub-services/create/')}}" class="mb-2 btn btn-success pull-right">Add Sub Service</a>
                    </div>
                    <div class="gloss_card">
                        <div class="gloss_card-body">
                            <table class="table table-bordered table-hover myDataTable">
                            <thead>
                                    <tr>
                                        <th>ID</th>
                                        
                                        <th>Service</th>
                                        <th>Sub Service</th>
                                        <th>Sort order</th>
                                        <!--<th>Recent Status</th>-->
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @php $i=1;
                                   use App\Models\Service;
                                   @endphp 
                                   @foreach($subserviceList as $sub_services)
                                   @php 
                                   $parent_service = Service::where('id', $sub_services->parent_id)->get()->first();
                                   @endphp 
                                        <tr>
                                            <td>{{ $i }}</td>
                                            
                                            <td>{{$parent_service->title}}</td>
                                            <td>{{$sub_services->title}}</td>
                                            <td>
                                                <input type="text" name="sort_order"
                                                       id="sort_order_{{$loop->iteration}}" data-extra="program_id"
                                                       data-extra_key="{{$sub_services->id}}" data-table="Service"
                                                       data-id="{{ $sub_services->id }}" class="common_sort_order"
                                                       style="width:25%"
                                                       value="{{$sub_services->sort_order}}" maxlength="10">
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input id="switch-state" type="checkbox" class="status_check"
                                                           data-size="mini" data-url="/status-change"
                                                           data-table="Service"
                                                           data-field="status" data-pk="{{ $sub_services->id }}"
                                                        {{($sub_services->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>

                                            <td>{{ date("d-M-Y", strtotime($sub_services->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                <a href="{{url(Helper::sitePrefix().'service/sub-services/edit/'.$sub_services->id)}}" class="btn btn-success mr-2 tooltips" title="Edit Sub Service"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" title="Delete Sub Service" data-url="service/sub-services/delete" data-id="{{$sub_services->id}}"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @php $i++;@endphp@endforeach
                                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
$(document).ready(function() {
    $('.gloss_card-body .myDataTable').DataTable().destroy();
    // $('.gloss_card-body .myDataTable').DataTable({
    //     "language": {
    //         "searchPlaceholder": "Search.."
    //     },
    //     "lengthChange": false
    // });
});
</script>
@endsection
