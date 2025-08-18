@extends('app.layouts.main')
@section('content')
<style>
    div#recordsListView_filter {
    opacity: 0;
}


/* Style the Image Used to Trigger the Modal */
.portfolio_wrapper img {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.portfolio_wrapper img:hover {opacity: 0.7;}

/* The Modal (background) */
#image-viewer {
    display: none;
    position: fixed;
    z-index: 99999;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.9);
}
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}
.modal-content { 
    animation-name: zoom;
    animation-duration: 0.6s;
}
@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}
#image-viewer .close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}
#image-viewer .close:hover,
#image-viewer .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}

</style>
    <div class="content-wrapper">
        <section class="content-header list_breadcrumb">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Manage Portfolio</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Portfolio List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content portfolio_wrapper">
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
                                <a href="{{url(Helper::sitePrefix().'portfolio/create')}}"
                                   class="btn btn-success pull-right">Add PortFolio <i
                                        class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                            </div>
                            <div class="gloss_card">
                            <div class="gloss_card-body">
                                <table id="recordsListView" class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Gallery</th>
                                        <th>Sort Order</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1 @endphp
                                    @foreach($portfolioLists as $portfolioList)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $portfolioList->title }}</td>
                                            {{-- <td><img width="100" src="{{url('/')}}/{{ $portfolioList->image_webp }}" alt="" srcset=""></td> --}}
                                            <td><a href="{{url(Helper::sitePrefix().'portfolio/gallery/'.$portfolioList->id)}}"
                                                class="btn btn-sm btn-primary mr-2 tooltips" title="Add Gallery">Gallery</a>
                                            </td>
                                            <td>
                                                <input type="text" name="sort_order"
                                                       id="gallery_order_{{$loop->iteration}}"
                                                       data-table="Portfolio" data-id="{{ $portfolioList->id }}"
                                                       data-field="id"
                                                       data-field-value="{{ $portfolioList->id }}"
                                                       class="common_sort_order" style="width:25%"
                                                       value="{{$portfolioList->sort_order}}">
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input id="switch-state" type="checkbox" class="status_check"
                                                           data-size="mini" data-url="/status-change"
                                                           data-table="Portfolio"
                                                           data-field="status" data-pk="{{ $portfolioList->id }}"
                                                        {{($portfolioList->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td>{{ date("d-M-Y", strtotime($portfolioList->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'portfolio/edit/'.$portfolioList->id)}}"
                                                       class="btn btn-success mr-2 tooltips" title="Edit Portfolio"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       title="Delete Portfolio" data-url="portfolio/delete"
                                                       data-id="{{$portfolioList->id}}"><i class="fas fa-trash"></i></a>
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
        </section>
    </div>
    <div id="image-viewer">
      <span class="close">&times;</span>
      <img class="modal-content" id="full-image">
    </div>

                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".showonhome").change(function(){
   
    if((this).checked){
   var status = 'yes';
    }
    else
    {
    var status = 'no';
    }
   var id = $(this).closest('.switch').find('.findme').val();
               $.ajax({
               type:'POST',
               url:'/showonhome',
              
                 data:{"_token": "{{ csrf_token() }}",
                     id:id,
                 status:status,
                     type:'portfolio'
                 },
               success:function(data) {
                 swal("Done", "Updated", "success");
               }
            });
  });
  $(".portfolio_wrapper img").click(function(){
  $("#full-image").attr("src", $(this).attr("src"));
  $('#image-viewer').show();
});

$("#image-viewer .close,#image-viewer").click(function(){
  $('#image-viewer').hide();
});
});
</script>    
@endsection
