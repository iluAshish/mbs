@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header list_breadcrumb">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Testimonials</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Testimonials</li>
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
                    @php
                    use App\Models\Testimonial;
                    $sort_order = Testimonial::orderBy('sort_order', 'DESC')->first();
                    @endphp
                    <div class="gloss_card-header">
                        <a href="{{url(Helper::sitePrefix().'home/testimonial/create')}}" class="btn btn-success pull-right">Add Testimonial</a>
                    </div>
                    <div class="gloss_card">
                        <div class="gloss_card-body">
                            <table class="dataTable table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                         <th>Sort Order</th> 
                                       <!-- <th>Featured</th> -->
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $testimonial->name}} </td>

                                         <td>
                                            <input type="text" name="sort_order" id="sort_order_{{$loop->iteration}}" data-extra="id" data-extra_key="{{$testimonial->id}}" data-table="Testimonial" data-id="{{ $testimonial->id }}" class="common_sort_order" style="width:25%" value="{{$testimonial->sort_order}}">
                                        </td>
                                        <!-- <td>
                                            <label class="switch">
                                                <input id="switch-state" type="checkbox" class="status_check"
                                                       data-size="mini" data-url="/is-featured"
                                                       data-table="ServiceTestimonialConnect"
                                                       data-field="is_featured" data-pk="{{ $testimonial->id }}"
                                                    {{($testimonial->is_featured=="Yes")?'checked':''}}>
                                                <span class="slider"></span>
                                            </label>
                                        </td> -->


                                        <td>
                                            <label class="switch">
                                                <input id="switch-state" type="checkbox" class="status_check" data-size="mini" data-url="/status-change" data-table="Testimonial" data-field="status" data-pk="{{ $testimonial->id }}" {{($testimonial->status=="Active")?'checked':''}}>
                                                <span class="slider"></span>
                                            </label>
                                        </td>
                                        <td>{{ date("d-M-Y", strtotime($testimonial->created_at)) }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url(Helper::sitePrefix().'home/testimonial/edit/'.$testimonial->id)}}" class="btn btn-success mr-2 tooltips" title="Edit Testimonial"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" title="Delete Testimonial" data-url="home/testimonial/delete" data-id="{{$testimonial->id}}"><i class="fas fa-trash"></i></a>
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
