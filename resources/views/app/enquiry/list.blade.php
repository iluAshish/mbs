@extends('app.layouts.main')
@section('content')
<style>
    div.dt-buttons {
    float: right;
    margin-left:10px !important;
}
</style>
    <div class="content-wrapper" onload="myFunction()">
        <section class="content-header list_breadcrumb">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Enquiry</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Enquiry List</li>
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
                            <div class="box-header" style="height:50px;">
                                <div class="box-tools" style="margin-top: 8px;">
                                    <div class="col-sm-12">
                                        <div class="actions delete_btn" style="display: none;">
                                            <input type="hidden" name="ids" id="ids">
                                            <a href="javascript:void(0);" id="delete_multiple_item_btn"
                                               class="btn btn-danger" data-url="/enquiry/enquiries/delete-multiple">
                                                <i class="fa fa-trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="gloss_card-body recordsListViewTable">
                                @if($enquiryList->isNotEmpty())
                                    <div class="check_all_div">
                                        Select All<input type="checkbox" class="mt-2 ml-3" name="check_all"
                                                         id="check_all">
                                    </div>
                                @endif
                                <table id="datab" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Company</th>
                                        {{-- <th>Branch</th> --}}
                                        {{-- <th>Service</th> --}}
                                        <th>Message</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1 @endphp @foreach($enquiryList as $enquiry)
                                        <tr>
                                            <td>{{ $i }} <input type="checkbox" class="single_box mt-2 ml-3"
                                                                name="single_box" id="{{ $enquiry->id }}"
                                                                value="{{ $enquiry->id }}"></td>
                                            <td>{{ $enquiry->name}}</td>
                                            <td>{{ $enquiry->email}}</td>
                                            <td>{{ $enquiry->phone }}</td>
                                            <td>{{ $enquiry->date_of_appointment }}</td>
                                            {{-- <td>{{ @$enquiry->type }}</td> --}}
                                            {{-- <td>{{ @$enquiry->service->title }}</td> --}}
                                            <td>{{ $enquiry->message }}</td>
                                            <td>{{ date("d-M-Y", strtotime($enquiry->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="javascript:void(0)"
                                                       class="btn btn-danger mr-2 delete_entry tooltips"
                                                       title="Delete enquiry" data-url="enquiry/contact-us/delete"
                                                       data-id="{{$enquiry->id}}"><i class="fas fa-trash"></i></a>
                                                    <a class="mr-2 btn btn-primary"
                                                       href="{{ url(Helper::sitePrefix().'enquiry/contact-us/view/'.$enquiry->id) }}"><i
                                                            class="fa fa-eye fa-lg"></i></a>
                                                    {{-- <a class="btn btn-success mr-2 replay_modal"
                                                       href="javascript:void(0)"
                                                       data-url="enquiry/contact-us/replay_to_quote" data-toggle="modal"
                                                       data-replay="{!! $enquiry->reply !!}"
                                                       data-id="{{ $enquiry->id }}"
                                                       data-request="{!! $enquiry->email !!}"><i
                                                            class="fa fa-reply fa-lg"
                                                            style="color:{{ ($enquiry->reply==NULL)?'red':'green' }}"></i></a> --}}
                                                </div>
                                            </td>
                                        </tr>
                                        @php $i++;@endphp@endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="replay-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" method="post" id="formWizard" class="quote_replay_form">
                        <div class="modal-header">
                            <h4 class="modal-title">Quote Request Reply</h4>
                        </div>
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Request*</label>
                                            <textarea disabled id="request_details" class="form-control">

                                </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Reply*</label>
                                            <textarea class="form-control required reply" id="reply" required id="replay" name="replay"
                                                      placeholder="Reply to request" required></textarea>

                                        </div>

                                         <div class="help-block with-errors descc" id="reply_error"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close
                                </button>
                                <input class="btn btn-primary subm valnull" value="Update Replay">
                                <input class="btn btn-primary subm valon" id="replay_to_enquiry" value="Update Replay">
                                <input type="hidden" id="url" name="url" value="reply">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $(".valon").hide();
    
  $(".reply").keyup(function(){
    var gjhg= $('textarea#reply').val();

  if(gjhg == '')
  {
    
    $(".descc").text('Empty Value Submitted');
    $(".valon").hide();
    $(".valnull").show();

  }
  else
  {
     
    $(".valnull").hide();
    $(".valon").show();
  }

   
  });
  $(".subm").click(function(){
     var gjhg= $('textarea#reply').val();
   
     if(gjhg == '')
  {
    
    $(".descc").text('Empty Value Submitted');
  

  }
  }); 
   $(".replay_modal").click(function(){
    $(".descc").text('');
   });
  
});

    </script>
       <script type="text/javascript">
        function codeAddress() {
 
    $('#datab').DataTable( {
        dom: 'Bfrtip',
        bDestroy: true,
        destroy: true,
        retrieve: true,
        paging: false,
buttons: [
  {
    extend: 'excel',
    filename: 'Enquiry List',
    exportOptions: {
      columns: [ 0, 1, 2, 3, 4,5,6,7]
    },
  },
  
],
columnDefs: [
        {
            targets: [6],
            visible: false
        }
    ]
    } );
}
      
        window.onload = codeAddress;
        </script>
@endsection
