@extends('layouts.app')

@section('content')

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h4 class="page-title">Clients Profile</h4> 
                            <!-- <button class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#newClientModal" type="button" onclick="addNew(1)">New Client</button> -->
                            &nbsp; &nbsp; <a href="#new-client" data-toggle="modal" data-target="#newClientModal">Create New</a>
                            <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Clients Profile</li>
                                    </ol>
                                </nav>
                            <!-- <form class="form-inline my-2 my-lg-0" action="{{url('clients/search')}}" method="post">
                            @if(count($admin)>0)
                                <button class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#newClientModal" type="button" onclick="addNew(1)">New Client</button> &nbsp
                                @endif
                            {{ csrf_field() }}
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="csearchkey">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                @if(count($errors) > 0)
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong>
                {{$errors->first('clientname')}}<br>
                {{$errors->first('contactno')}}<br>
                {{$errors->first('cperson')}}<br>
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success! </strong>{{session('success')}}
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        
                        <table id="client-table" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Business / Trade / Client Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($clients) > 0)
                                @foreach($clients as $c)
                                <tr>
                                    <td>{{$c->id}}</td>
                                    <td>{{$c->clientname}}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                
                    </div>
                </div>
            </div>


<!-- Modal -->
<div class="modal fade" id="newClientModal" tabindex="-1" role="dialog" aria-labelledby="newClientModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="clientForm" action="{{url('/clients')}}" method="post">
          {{ csrf_field() }}
          <div class="form-group row">
              <label class="col-md-3">Choose:</label>
              <div class="col-md-9">
                  <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="radioMain" name="chooseBranch" value="1" required checked>
                      <label class="custom-control-label" for="radioMain">Main</label>
                  </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="radioBranch" name="chooseBranch" value="2" required>
                      <label class="custom-control-label" for="radioBranch">Branch</label>
                  </div>
              </div>
          </div>
          <input type="text" name="eventid" id="eventid" value="" hidden>
          <input type="text" name="cid" id="cid" value="" hidden>
            <div class="form-group" id="frmMain">
              <label class="control-label col-sm-5" for="clientname" style="text-align:left;">Client Name:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="clientname" placeholder="Enter Company Name" name="clientname" value="{{ old('clientname') }}" required/>
              </div>
            </div>
            <div class="form-group" id="frmMain">
              <label class="control-label col-sm-2" for="busadd" style="text-align:left;">Address</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="busadd" placeholder="Enter Business Address" name="busadd" value="{{ old('busadd') }}">
              </div>
            </div>
            <div class="form-group" id="frmMain">
              <label class="control-label col-sm-2" for="tin" style="text-align:left;">Tax ID No.</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="tin" placeholder="Enter TIN" name="tin" value="{{ old('tin') }}">
              </div>
            </div>
            <div class="form-group" id="frmMain">
              <label class="control-label col-sm-12" for="contactno" style="text-align:left;">Contact No. (Tel/CP)</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="contactno" placeholder="Enter Contact No." name="contactno" value="{{ old('contactno') }}">
              </div>
            </div>
            <div class="form-group" id="frmMain">
              <label class="control-label col-sm-12" for="email" style="text-align:left;">Company Email:</label>
              <div class="col-sm-12">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
              </div>
            </div>
            <div class="form-group" id="frmMain">
              <label class="control-label col-sm-8" for="cperson" style="text-align:left;">Contact Person</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="cperson" placeholder="Enter Contact Person" name="cperson" value="{{ old('cperson') }}">
              </div>
            </div>
            <div class="form-group" id="frmBranch">
              <label class="col-md-3 m-t-15">Select the Main Company</label>
                <div class="col-md-12">
                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="mySelect2" name="main_cid">
                        <optgroup label="Select">
                        @if(count($clients) > 0)
                          @foreach($clients as $c)
                            <option value="{{$c->id}}">{{$c->clientname}}</option>
                          @endforeach
                        @endif
                      </optgroup>
                    </select>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" onclick="form_submit()" id="frmSubmit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->

    
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{url('../../assets/libs/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{url('../../assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{url('../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{url('../../assets/extra-libs/sparkline/sparkline.js')}}"></script>
<!--Wave Effects -->
<script src="{{url('../../dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{url('../../dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{url('../../dist/js/custom.min.js')}}"></script>
<!-- this page js -->
<script src="{{url('../../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{url('../../dist/js/pages/mask/mask.init.js')}}"></script>
<script src="{{url('../../assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
<script src="{{url('../../assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
<script src="{{url('../../assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script src="{{url('../../assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{url('../../assets/libs/select2/dist/js/select2.min.js')}}"></script>
<script>
    $(".select2").select2();
    $('#mySelect2').select2({
        dropdownParent: $('#newClientModal')
    });
function format ( d ) {
    //alert(d.id);
    //add ajax here
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
    type: 'POST',
    url: '/client/getdetail',
    data: {
        '_token': $('input[name=_token]').val(),
        'id' : d.id
    },
    success: function(data){
        console.log(data);
        let datax = data.data;
        let datab = data.branch;
        var branch = '';
        for(var i = 0; i < datab.length; i++){
          branch += '<tr><td>'+datab[i].clientname+'</td><td>'+datab[i].busadd+'</td><td>'+datab[i].tin+
          '</td><td>'+datab[i].businessID+'</td><td>'+datab[i].RDO+'</td><td>'+datab[i].tax_class+'</td><td>'+datab[i].tax_type+
          '</td><td>'+datab[i].cperson+'</td><td>'+datab[i].contactno+'</td><td><a href="{{url("client")}}/'+datab[i].id+'" target="_blank">Details</a>'+
          ' | <a href="{{url("jo/view")}}/'+datab[i].id+'" target="_blank">JOs</a> | <a href="{{url("jo/create?cid=")}}'+datab[i].id+'" target="_blank">CreateJO</a></td></tr>';
        }

        $("#nav-details-"+d.id).append(
        '<br><table cellpadding="5" cellspacing="0" border="1"  style="padding-left:50px;">'+
          '<thead>'+
          '<tr><th>Business/Trade Name</th><th>Location</th><th>TIN</th><th>Business ID</th><th>RDO</th><th>Taxpayer Classification</th><th>Tax Type</th><th>Contact Person</th><th>Contact No.</th>'+
          '<th>Action</th></tr>'+
          '</thead>'+
          '<tbody><tr>'+
              '<td>'+datax[0].clientname+'</td>'+
              '<td>'+datax[0].busadd+'</td>'+
              '<td>'+datax[0].tin+'</td>'+
              '<td>'+datax[0].businessID+'</td>'+
              '<td>'+datax[0].RDO+'</td>'+
              '<td>'+datax[0].tax_class+'</td>'+
              '<td>'+datax[0].tax_type+'</td>'+
              '<td>'+datax[0].cperson+'</td>'+
              '<td>'+datax[0].contactno+'</td>'+
              '<td><a href="{{url("client")}}/'+datax[0].id+'" target="_blank">Details</a> | <a href="{{url("jo/view")}}/'+datax[0].id+'" target="_blank">JOs</a> | <a href="{{url("jo/create?cid=")}}'+datax[0].id+'" target="_blank">CreateJO</a> </td>'+
          '</tr>'+
          branch +
          '</tbody>'+
          '</table>'
        );

    },
    error:function(data)
    {
        console.log(data);
    }
    });

    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
          '<tr>'+
          '<nav><div class="nav nav-tabs" id="nav-tab" role="tablist">'+
              '<a class="nav-item nav-link active" id="nav-details-tab" data-toggle="tab" href="#nav-details-'+d.id+'" role="tab" aria-controls="nav-details" aria-selected="true">Details</a>'+
              //'<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile-'+d.id+'" role="tab" aria-controls="nav-profile" aria-selected="false">Tab 2</a>'+
              //'<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact-'+d.id+'" role="tab" aria-controls="nav-contact" aria-selected="false">Tab 3</a>'+
          '</div></nav>'+
          '<div class="tab-content" id="nav-tabContent">'+
              '<div class="tab-pane fade show active" id="nav-details-'+d.id+'" role="tabpanel" aria-labelledby="nav-details-tab"></div>'+
              '<div class="tab-pane fade" id="nav-profile-'+d.id+'" role="tabpanel" aria-labelledby="nav-profile-tab">..2.</div>' +
              '<div class="tab-pane fade" id="nav-contact-'+d.id+'" role="tabpanel" aria-labelledby="nav-contact-tab">.3..</div>'+
          '</div>'+
          '</tr>'+
      '</table>';

}
 
$(document).ready(function() {
    var table = $('#client-table').DataTable( {
        
        "columns": [
            {
                "data":"id",
                "width": "1%"
            },
            { "data": "name" },
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            }
        ],
        "order": [[1, 'asc']],
        "pageLength": 50
    } );
     
    // Add event listener for opening and closing details
    $('#client-table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
    $("div#frmBranch.form-group").hide();
    $("input#clientname").val('');
    $("input[name='chooseBranch']#radioMain").click(function(){
      $("div#frmMain.form-group").show();
      $("div#frmBranch.form-group").hide();
      //$("button#frmSubmit").prop('disabled', false);
      $("input#clientname").val('');
    });
    $("input[name='chooseBranch']#radioBranch").click(function(){
      $("div#frmMain.form-group").hide();
      $("div#frmBranch.form-group").show();
      //$("button#frmSubmit").prop('disabled', true);

      //$("button#frmSubmit").click(function(){
        //alert('weee');
        $("input#clientname").val('Add Branch');
      //});
    });
      // $( "select#mySelect2" )
      //   .change(function() {
      //     var str = "";
      //     $( "select option:selected" ).each(function() {
      //       str += $( this ).text() + " ";
      //     });
      //     $("input#clientname").val(str);
      //   })
      //   .trigger( "change" );

} );
</script>

@endsection

