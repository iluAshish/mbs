@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
<section class="content-header list_breadcrumb">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>FAQs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">FAQ</li>
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
                        <a href="{{url(Helper::sitePrefix().'service/faq/create/')}}" class="btn btn-success pull-right">Add FAQ <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                    </div>
                    <div class="gloss_card">
                        <div class="gloss_card-body">
                            <table class="table table-bordered table-hover dataTable">
                            <thead>
                                    <tr>
                                        <th>ID</th>
                                        
                                        <th>Question</th>
                                        <!-- <th>Sort order</th> -->
                                        <!--<th>Recent Status</th>-->
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @php $i=1 @endphp @foreach($faqList as $faq)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            
                                            <td>{{$faq->question}}</td>
                                          <!--   <td>
                                                <input type="text" name="sort_order"
                                                       id="sort_order_{{$loop->iteration}}" data-extra="program_id"
                                                       data-extra_key="{{$faq->id}}" data-table="ServiceFaqconnect"
                                                       data-id="{{ $faq->id }}" class="common_sort_order"
                                                       style="width:25%"
                                                       value="{{$faq->sort_order}}" maxlength="3">
                                            </td> -->

                                            <!--<td>-->
                                            <!--    <label class="switch">-->
                                            <!--        <input id="switch-state" type="checkbox" class="status_check"-->
                                            <!--               data-size="mini" data-url="/recent-status-change"-->
                                            <!--               data-table="ServiceFaqconnect"-->
                                            <!--               data-field="recent_status" data-pk="{{ $faq->id }}"-->
                                            <!--            {{($faq->recent_status=="Active")?'checked':''}}>-->
                                            <!--        <span class="slider"></span>-->
                                            <!--    </label>-->
                                            <!--</td>-->
                                            <td>
                                                <label class="switch">
                                                    <input id="switch-state" type="checkbox" class="status_check"
                                                           data-size="mini" data-url="/status-change"
                                                           data-table="ServiceFaqconnect"
                                                           data-field="status" data-pk="{{ $faq->id }}"
                                                        {{($faq->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>

                                            <td>{{ date("d-M-Y", strtotime($faq->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                <a href="{{url(Helper::sitePrefix().'service/faq/edit/'.$faq->id)}}" class="btn btn-success mr-2 tooltips" title="Edit FAQ"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" title="Delete FAQ" data-url="service/faq/delete" data-id="{{$faq->id}}"><i class="fas fa-trash"></i></a>
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
@endsection
