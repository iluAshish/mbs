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
                        <li class="breadcrumb-item active">Key Feature</li>
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
                    <div class="gloss_card">
                           <div class="gloss_card-body">
                            <table class="dataTable table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        {{-- <th>Image</th> --}}
                                        <th>Counter</th>
                                        <th>Sort Order</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($keyfeatureList as $feature)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! $feature->title !!}</td>
                                        <td>{!! $feature->number !!}</td>
                                        <td>
                                            <input type="text" name="sort_order" id="sort_order_{{$loop->iteration}}" data-extra="id" data-extra_key="{{$feature->id}}" data-table="KeyFeature" data-id="{{ $feature->id }}" class="common_sort_order" style="width:25%" value="{{$feature->sort_order}}">
                                        </td>
                                        {{-- <td><img src="{{url('/')}}/{!! $feature->image !!}" alt="" height="60px"></td> --}}
                                        <td>{{ date("d-M-Y", strtotime($feature->created_at)) }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url(Helper::sitePrefix().'home/key-feature/edit/'.$feature->id)}}" class="btn btn-success mr-2 tooltips" title="Edit Key Feature"><i class="fas fa-edit"></i></a>
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
