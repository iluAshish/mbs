@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header list_breadcrumb">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> {{$title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">{{$type}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('message') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('message') }}
                            </div>
                        @endif





                        <div class="gloss_card-header">
                                <a href="{{url(Helper::sitePrefix().'products/'.$urlType.'/create')}}"
                                   class="btn btn-success pull-right">Add Category <i
                                        class="fa fa-plus-circle pull-right mt-1 ml-2"></i>
                                </a>

                        </div>
                        <div class="gloss_card">
                            <div class="gloss_card-body">
                                <table class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Title</th>
                                        <th>Parent Category</th>
                                        <th>Sort Order</th>
                                        <th>Status</th>
                                        <!-- <th>Websites</th> -->
                                        <th>Featured to home</th> 
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    use App\Models\Category;
                                    $categories = Category::active()->get();
                                    @endphp
                                    @foreach($categoryList as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->title }}</td>
                                            <td>
                                                @foreach($categories as $category_stored)
                                                    @if($category_stored->id == $category->parent_id)
                                                        {{ $category_stored->title }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            
                                            <td>
                                                <input type="text" name="sort_order"
                                                       id="sort_order_{{$loop->iteration}}" data-extra="id"
                                                       data-extra_key="{{$category->id}}" data-table="Category"
                                                       data-id="{{ $category->id }}" class="common_sort_order"
                                                       style="width:25%"
                                                       value="{{$category->sort_order}}" maxlength="10">
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/status-change" data-table="Category"
                                                           data-field="status" data-pk="{{ $category->id}}"
                                                        {{($category->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <!-- <td>
                                                <span  class="badge bg-primary bookingStatusChange"
                                                data-toggle="modal" data-target="#websiteModal{{ $category->id }}"
                                                data-id="{{ $category->id }}"
                                                data-status="{{ $category->type }}" role="button">{{ $category->type }}
                                                                    <i class="fas fa-exchange-alt"></i></span>
                                            </td> -->
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="bool_status "
                                                           data-url='/featured-bool-status' data-table="Category"
                                                           data-id="{{$category->id}}" data-field="featured-to-home" data-pk="{{$category->id}}"
                                                        {{($category->featured_to_home == "Yes")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td> 
                                            <td>{{ date("d-M-Y", strtotime($category->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'products/'.$urlType.'/edit/'.$category->id)}}"
                                                       class="btn btn-success mr-2 tooltips" title="Edit {{$type}}"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       data-url="products/{{$urlType}}/delete"
                                                       data-id="{{$category->id}}"
                                                       title="Delete {{$type}}"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="websiteModal{{$category->id}}">
                                            <div class="modal-dialog" id="modalContent">
                                                <div class="modal-content">

                                                        <div class="modal-body">
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="status">Choose websites*</label>
                                                                        <input type="hidden" name="product_id" value="{{ @$category->id }}">
                                                                        <select class="form-control select2 bool_status"
                                                                        data-url='change-bool-status' data-table="category"
                                                                        data-id="{{$category->id}}" data-field="type">
                                                                            <option value="">Select Website</option>
                                                                            <option value="all">Common</option>
                                                                           <option value="ecommerce">Ecommerce</option>
                                                                           <option value="Corporate">Corporate</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="booking_id" id="booking_id" class="required" value="">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                        </div>

                                                </div>
                                            </div>
                                        </div>
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
