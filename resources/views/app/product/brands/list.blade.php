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
                                   class="btn btn-success pull-right">Add Brand <i
                                        class="fa fa-plus-circle pull-right mt-1 ml-2"></i>
                                </a>

                        </div>
                        <div class="gloss_card">
                            <div class="gloss_card-body">
                                <table class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Brand Title</th>
                                        <th>Brand Image</th>
                                        <th>Parent Brand</th>
                                        <th>Sort Order</th>
                                        <th>Status</th>
                                        <th>Display to Home</th>
                                        <th>Gallery</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    use App\Models\ProductBrands;
                                    $brands = ProductBrands::active()->get();
                                    @endphp    
                                    @foreach($brandsList as $brand)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $brand->title }}</td>
                                            <td>
                                            @if($brand->banner_image)
                                            <img src="{{url($brand->banner_image)}}" width="80"/>
                                            @endif
                                            </td>
                                             <td>
                                                @foreach($brands as $brand_stored)
                                                    @if($brand_stored->id == $brand->parent_id)
                                                        {{ $brand_stored->title }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            
                                            <td>
                                                <input type="text" name="sort_order"
                                                       id="sort_order_{{$loop->iteration}}" data-extra="id"
                                                       data-extra_key="{{$brand->id}}" data-table="ProductBrands"
                                                       data-id="{{ $brand->id }}" class="common_sort_order"
                                                       style="width:25%"
                                                       value="{{$brand->sort_order}}" maxlength="10">
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/status-change" data-table="ProductBrands"
                                                           data-field="status" data-pk="{{ $brand->id}}"
                                                        {{($brand->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/products/brand/display-to-home" data-table="ProductBrands"
                                                           data-field="display_to_home" data-pk="{{ $brand->id}}"
                                                        {{($brand->display_to_home=="Yes")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td><a href="{{url(Helper::sitePrefix().'products/brand/gallery/'.$brand->id)}}"
                                                   class="btn btn-sm btn-primary mr-2 tooltips" title="Add Gallery">Gallery</a>
                                            </td>
                                            <td>{{ date("d-M-Y", strtotime($brand->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'products/'.$urlType.'/edit/'.$brand->id)}}"
                                                       class="btn btn-success mr-2 tooltips" title="Edit {{$type}}"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       data-url="products/{{$urlType}}/delete"
                                                       data-id="{{$brand->id}}"
                                                       title="Delete {{$type}}"><i class="fas fa-trash"></i></a>
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
