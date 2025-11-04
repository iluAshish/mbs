@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header list_breadcrumb">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Products List</li>
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


                        <div class="gloss_card-header">
                            <a href="{{url(Helper::sitePrefix().'products/create')}}"
                               class="btn btn-success pull-right">Add Product <i
                                    class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                        </div>
                        <div class="gloss_card">
                            <div class="gloss_card-body">
                                <table class="table table-bordered table-hover dataTable" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                         <th>Category</th>
                                         <th>Brand</th>
                                         <th>Sort Order</th>
                                         <th>Featured to Home</th> 
                                        {{-- <th>Specification</th> --}}
                                        <th>Gallery</th>
                                        <th>Status</th>
                                       <th>Case study</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($productList as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>
                                                @foreach($categories as $category)
                                                    @if($category->id == $product->category_id)
                                                        {{ $category->title }}
                                                    @endif
                                                @endforeach
                                            </td> 
                                            <td>
                                                @foreach($brands as $brand)
                                                    @if($brand->id == $product->brand_id)
                                                        {{ $brand->title }}
                                                    @endif
                                                @endforeach
                                            </td> 
                                            <td>
                                                <input type="text" name="sort_order"
                                                       id="sort_order_{{$loop->iteration}}" data-extra="id"
                                                       data-extra_key="{{$product->id}}" data-table="Product"
                                                       data-id="{{ $product->id }}" class="common_sort_order"
                                                       style="width:25%"
                                                       value="{{$product->sort_order}}" maxlength="10">
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="bool_status "
                                                           data-url='/featured-bool-status' data-table="Product"
                                                           data-id="{{$product->id}}" data-field="featured-to-home" data-pk="{{$product->id}}"
                                                        {{($category->featured_to_home == "Yes")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td> 
                                            {{-- <td>
                                                <a href="{{url(Helper::sitePrefix().'products/specification/'.$product->id)}}"
                                                   class="btn btn-sm btn-danger mr-2 tooltips"
                                                   title="Add Specification">Specification</a>
                                            </td>  --}}
                                            <td><a href="{{url(Helper::sitePrefix().'products/gallery/'.$product->id)}}"
                                                   class="btn btn-sm btn-primary mr-2 tooltips" title="Add Gallery">Gallery</a>
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/status-change" data-table="Product"
                                                           data-field="status" data-pk="{{ $product->id}}"
                                                        {{($product->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="bool_status"
                                                           data-url='/change-bool-status' data-table="Product"
                                                           data-id="{{$product->id}}" data-field="display_to_home" data-pk="{{ $product->id}}"
                                                        {{($product->display_to_home == "Yes")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>

                                            <td class="text-right py-0 align-middle">

                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'products/edit/'.$product->id)}}"
                                                       class="btn btn-success mr-2 tooltips" title="Edit Product"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       data-url="products/delete" data-id="{{$product->id}}"
                                                       title="Delete Product"><i class="fas fa-trash"></i></a>
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
