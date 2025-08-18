@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header list_breadcrumb">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Awards</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url(Helper::sitePrefix() . 'dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url(Helper::sitePrefix() . 'success-stories') }}">Success Stories</a></li>
                            <li class="breadcrumb-item active">Awards</li>
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

                        <div class="gloss_card">
                            <div class="card-body">
                                <div class="gloss_card-header">
                                    <a href="{{ url(Helper::sitePrefix() . 'success-stories/awards/create/' . $success_story_id) }}"
                                        class="btn btn-success pull-right">Add Award
                                        <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i>
                                    </a>
                                </div>
                                <table class="table table-bordered table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Award</th>
                                            <th>Sort Order</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th class="not-sortable">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach ($awards as $awards)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $awards->title }}</td>
                                                <td>
                                                    <input type="text" name="sort_order"
                                                        id="sort_order_{{ $loop->iteration }}"
                                                        data-table="SuccessAward" data-url="/sort-order-with-field"
                                                        data-field="success_story_id"
                                                        data-field-value="{{ $awards->success_story_id }}"
                                                        data-id="{{ $awards->id }}" class="common_sort_order"
                                                        style="width:25%" value="{{ $awards->sort_order }}">
                                                </td>
                                                <td>

                                                    <label class="switch">
                                                        <input type="checkbox" class="status_check"
                                                            data-url="/status-change" data-table="SuccessAward"
                                                            data-field="status" data-pk="{{ $awards->id }}"
                                                            {{ $awards->status == 'Active' ? 'checked' : '' }}
                                                            title="SuccessAward" ref="{{ $awards->id }}">
                                                        <span class="slider"></span>
                                                    </label>
                                                </td>
                                                <td>{{ date('d-M-Y', strtotime($awards->created_at)) }}</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ url(Helper::sitePrefix() . 'success-stories/awards/edit/' . $awards->id) }}"
                                                            class="btn btn-success mr-2 tooltips" title="Edit Award"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                            data-url="success-stories/awards/delete"
                                                            data-id="{{ $awards->id }}"
                                                            title="Delete Award"><i
                                                                class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php $i++@endphp
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
