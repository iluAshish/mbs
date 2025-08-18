@extends('app.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header list_breadcrumb">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage {{ucwords(str_replace('-', ' ', $type))}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">{{ucwords(str_replace('-', ' ', $type))}} List</li>
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
                            <a href="{{url(Helper::sitePrefix().'media/'.$type.'/create')}}"
                               class="btn btn-success pull-right">Add {{ucwords(str_replace('-', ' ', $type))}} <i
                                    class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                        </div>
                            <div class="gloss_card">
                            <div class="gloss_card-body">
                                <table id="recordsListView" class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Posted Date</th>
                                        
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1 @endphp
                                    @foreach($blogList as $blog)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ date("d-M-Y", strtotime($blog->posted_date))  }}</td>
                                        <!--     <td>
                                                <label class="switch">
                                                    <input type="hidden" value="{{$blog->id}}" class="findme">
                                                    <input id="switch-state" type="checkbox" class="showonhome"
                                                          
                                                        {{($blog->showonhome=="yes")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td> -->
                                            <td>
                                                <label class="switch">
                                                    <input id="switch-state" type="checkbox" class="status_check"
                                                           data-size="mini" data-url="/status-change"
                                                           data-table="Blog"
                                                           data-field="status" data-pk="{{ $blog->id }}"
                                                        {{($blog->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td>{{ date("d-M-Y", strtotime($blog->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'media/'.$type.'/edit/'.$blog->id)}}"
                                                       class="btn btn-success mr-2 tooltips" title="Edit {{ucwords(str_replace('-', ' ', $type))}}"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       title="Delete {{ucwords(str_replace('-', ' ', $type))}}" data-url="media/{{$type}}/delete"
                                                       data-id="{{$blog->id}}"><i class="fas fa-trash"></i></a>
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
                     type:'blog'
                 },
               success:function(data) {
                 swal("Done", "Updated", "success");
               }
            });
  });
});
</script>
@endsection
