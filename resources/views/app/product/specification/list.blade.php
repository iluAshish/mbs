@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header list_breadcrumb">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Specification</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url(Helper::sitePrefix() . 'dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url(Helper::sitePrefix() . 'containers') }}">Product</a></li>
                            <li class="breadcrumb-item active">Specification</li>
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
                                    <a href="{{ url(Helper::sitePrefix() . 'containers/specification/create/' . $product_id) }}"
                                        class="btn btn-success pull-right">Add Specification
                                        <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i>
                                    </a>
                                </div>
                                <table class="table table-bordered table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Specification</th>
                                            <th>Sort Order</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th class="not-sortable">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach ($ProductSpecification as $specification)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $specification->title }}</td>
                                                <td>
                                                    <input type="text" name="sort_order"
                                                        id="sort_order_{{ $loop->iteration }}"
                                                        data-table="ProductSpecification" data-url="/sort-order-with-field"
                                                        data-field="product_id"
                                                        data-field-value="{{ $specification->product_id }}"
                                                        data-id="{{ $specification->id }}" class="common_sort_order"
                                                        style="width:25%" value="{{ $specification->sort_order }}">
                                                </td>
                                                <td>

                                                    <label class="switch">
                                                        <input type="checkbox" class="status_check"
                                                            data-url="/status-change" data-table="ProductSpecification"
                                                            data-field="status" data-pk="{{ $specification->id }}"
                                                            {{ $specification->status == 'Active' ? 'checked' : '' }}
                                                            title="ProductSpecification" ref="{{ $specification->id }}">
                                                        <span class="slider"></span>
                                                    </label>
                                                </td>
                                                <td>{{ date('d-M-Y', strtotime($specification->created_at)) }}</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ url(Helper::sitePrefix() . 'containers/specification/edit/' . $specification->id) }}"
                                                            class="btn btn-success mr-2 tooltips" title="Edit Specification"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                            data-url="containers/specification/delete"
                                                            data-id="{{ $specification->id }}"
                                                            title="Delete Specification"><i
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {
                    actionDelete: ''
                },
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileTypes: ['image'],
                minImageWidth: 1021,
                minImageHeight: 531,
                maxImageWidth: 1021,
                maxImageHeight: 531,
                maxFileSize: 512,
                showRemove: false,
                @if (isset($product) && $product->specification_image != null)
                    initialPreview: ["{{ asset($product->specification_image) }}", ],
                    initialPreviewConfig: [{
                        caption: "{{ last(explode('/', $product->specification_image)) }}",
                        width: "120px"
                    }]
                @endif
            });
        });
    </script>
@endsection
