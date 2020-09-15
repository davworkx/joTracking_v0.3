@extends('layouts.app')

@section('content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Manage JOs</h4> &nbsp &nbsp <a href="{{url('/jo/create?cid=')}}"> Create New</a>

                <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">JO</li>
                        </ol>
                    </nav>
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
    @if(session('success'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success! </strong>{{session('success')}}
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <div class="table-responsive">

            <table id="jotable" class="table table-striped table-hover table-bordered display">
                <!-- $alltasks -->

                <thead>
                    <tr>
                        <th scope="col" width="2%"></th>
                        <th scope="col" width="25%"></th>
                        <th scope="col" width="15%"></th>
                        <th scope="col" width="10%"></th>
                        <th scope="col" width="38%"></th>
                        <th scope="col" width="5%"></th>
                        <th scope="col" width="5%"></th>
                    </tr>
                </thead>
                <thead>
                    <tr id="jofilter">
                        <th scope="col" width="2%">JO#</th>
                        <th scope="col" width="25%">Company/Client Name</th>
                        <th scope="col" width="15%">Due Date</th>
                        <th scope="col" width="10%">Assigned to</th>
                        <th scope="col" width="38%">Description</th>
                        <th scope="col" width="5%">Action</th>
                        <th scope="col" width="5%">View Updates</th>
                    </tr>
                </thead>
                <tbody>
                <?php $perx = 0; ?>
                    @if(count($jos) > 0)
                        @foreach($jos as $jo)
                        @if($jo->sumofstatus != 0)
                        <?php $perx = number_format($jo->sumofstatus/($jo->jcount*$jo->maxstate)*100); ?>
                    <tr id="tr">
                           <td>{{$jo->id}}</td>
                           <td data-table-header="clients">{{$jo->clientname}}
                           </td>
                           @if($jo->datedue == date("Y-m-d") && $perx < 100)
                           <td class="bg-white">                           <?php if($perx == 100){ ?>
                        <div class="progress" style="height: 10px; margin-bottom:0px">
                        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="{{$perx}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$perx}}%">{{$perx}}%</div>                             
                        </div>
                        <?php }else{ ?>
                        <div class="progress" style="height: 10px; margin-bottom:0px">
                        <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-valuenow="{{$perx}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$perx}}%">{{$perx}}%</div>
                        </div>
                        <?php } ?>{{$jo->datedue}} </td>
                           @elseif($jo->datedue < date("Y-m-d") && $perx < 100)
                           <td class="bg-danger"><?php if($perx == 100){ ?>
                        <div class="progress" style="height: 10px; margin-bottom:0px">
                        <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-valuenow="{{$perx}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$perx}}%">{{$perx}}%</div>                             
                        </div>
                        <?php }else{ ?>
                        <div class="progress" style="height: 10px; margin-bottom:0px">
                        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="{{$perx}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$perx}}%">{{$perx}}%</div>
                        </div>
                        <?php } ?>{{$jo->datedue}}</td>
                           @elseif($jo->datedue < date("Y-m-d") && $perx == 100)
                           <td class="bg-success">                          <?php if($perx == 100){ ?>
                        <div class="progress" style="height: 10px; margin-bottom:0px">
                        <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-valuenow="{{$perx}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$perx}}%">{{$perx}}%</div>                             
                        </div> 
                        <?php }else{ ?>
                        <div class="progress" style="height: 10px; margin-bottom:0px">
                        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="{{$perx}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$perx}}%">{{$perx}}%</div>
                        </div>
                        <?php } ?>{{$jo->datedue}}</td>
                           @else
                           <td class="bg-warning">                          <?php if($perx == 100){ ?>
                        <div class="progress" style="height: 10px; margin-bottom:0px">
                        <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" role="progressbar" aria-valuenow="{{$perx}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$perx}}%">{{$perx}}%</div>                             
                        </div>
                        <?php }else{ ?>
                        <div class="progress" style="height: 10px; margin-bottom:0px">
                        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="{{$perx}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$perx}}%">{{$perx}}%</div>
                        </div>
                        <?php } ?>{{$jo->datedue}}</td>
                           @endif

                           <td>{{$jo->username}}</td>
                           <td><?php
                            echo nl2br($jo->tasks);
                            ?></td>
                           <td>
                           <p>
                             @if(isset($admin) && $perx != 100)
                             <button class="btn btn-secondary btn-xs" type="button" rel="tooltip" title="Transfer assignment" data-toggle="modal" data-target="#transferJOModal"
                                    onclick="getJoidTransfer({{$jo->id}})">
                               <i class="fas fa-address-book" aria-hidden="true"></i> Transfer
                             </button>
                             @endif
                             <!-- <button class="btn btn-primary btn-xs mt-2" type="button" rel="tooltip" title="Add Notes/Updates"  data-toggle="modal" id="addNotes" data-target="#addNoteJO" onClick="saveNotes({{$jo->id}})" >
                             <i class="far fa-newspaper" aria-hidden="true"></i> Add Notes
                             </button> -->

                             <button class="btn btn-primary btn-xs mt-2" type="button" rel="tooltip" title="Chat with {{$jo->username}}"  data-toggle="modal" id="chat" data-target="#createConvo" onClick="createConvo( {{$jo->assignedto}}, '{{$jo->username}}' , {{$jo->id}} , '{{$jo->clientname}}' )" >
                             <i class="mdi mdi-message" aria-hidden="true"></i> Chat
                             </button>
                           </p>
                         </td>
                         <td class="details-control" data-jo="{{$jo->id}}"></td>
                    </tr>
                    @endif
                    @endforeach
                    @endif

                </tbody>
                <!-- <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot> -->
            </table>

            </div>
        </div>
    </div>
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

<!-- Modal -->
<div class="modal fade" id="transferJOModal" tabindex="-1" role="dialog" aria-labelledby="transferJOModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Transfer JO assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="transferForm" action="{{url('/jo/transfer')}}" method="post">
          {{ csrf_field() }}
          <input type="text" name="inpjoid" id="inpjoid" value="" hidden>
          <div class="form-group col-sm-12">
            <label for="listusers">Transfer to:</label>
            <select id="listusers" name="listusers" class="form-control" required>
              <!-- <option selected>Choose....</option> -->
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit"  onclick="form_submit1()" class="btn btn-primary btn-sm">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->
<!-- Modal -->
<div class="modal fade" id="addNoteJO" tabindex="-1" role="dialog" aria-labelledby="addNoteJOLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Notes/Updates</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="form-group col-sm-12 ">
        <br>
        <input type="text" id="txtjoid" name="txtjoid" hidden/>
        <label for="txtnotes">Add Notes/Remarks:(e.g. Docs Details)</label>
        <textarea type="textarea" name="txtnotes" id="txtnotes" rows = "3" col="50" class="form-control" onkeydown="search(this)" required></textarea>
        <button type="button" class="btn btn-info mt-2 float-right" id="btnSave" onCLick="saveNotesToDB()"> Save</button>
      </div>
      <div class="form-group col-sm-12 ">
        <table class="table table-sm" id="tblnotes">
          <thead>
            <tr>
              <th scope="col" >Date</th>
              <th scope="col">Remarks</th>
            </tr>
          </thead>
          <tbody id="notestable">
            <!-- <tr>
              <td>12Date</td>
              <td>10Remarks</td>
            </tr> -->
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- End Modal -->
<!-- Modal -->
<div class="modal fade" id="updateTaskModal" tabindex="-1" role="dialog" aria-labelledby="updateTaskModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Task Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" id="taskprogress" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%">50%</div>
      <p id="task"> Test Task </p> 
      <form class="form-horizontal" id="joForm" action="{{url('/jo/addtasktracking')}}" method="post">
          {{ csrf_field() }}
          <input type="text" name="taskid" id="taskid" value="" hidden>
          <div class="form-group col-sm-12">
            <label for="taskstatus">Change status to:</label>
            <select id="ctaskstatus" name="ctaskstatus" class="form-control" required>
              <!-- <option selected>Choose....</option> -->
            </select>
          </div>
          <div class="form-group col-sm-12">
            <label for="tasknotes">Add Notes/Remarks:(e.g. Docs Details)</label>
            <textarea type="textarea" name="tasknotes" id="tasknotes" rows = "3" col="50" class="form-control"  onkeydown="search(this)" required></textarea>
          </div>
          <div class="form-group col-sm-12">
          <button type="button" class="btn btn-info mt-2 float-right" id="btnSave" onClick="saveTaskNotes()"> Save</button>
        </div>
      </div>
      <div class="form-group col-sm-12">
      <table class="table table-sm" id="tbltasknotes">
      <thead>
        <tr>
          <th scope="col" >Date</th>
          <th scope="col">Status</th>
          <th scope="col">Remarks</th>

        </tr>
      </thead>
      <tbody id="tasknotestable">
        <!-- <tr>
          <td>12Date</td>
          <td>Processing</td>
          <td>10Remarks</td>
        </tr> -->
      </tbody>
    </table>
                        </div>

      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <!-- <button type="submit"  onclick="form_submit()" class="btn btn-primary btn-sm">Save changes</button> -->
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="createConvo" tabindex="-1" role="dialog" aria-labelledby="createConvo" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Conversation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('createchat')}}" method="post">
        @csrf
      <div class="form-group col-sm-12 ">
        <br>
      <ul class="list-group">
        <li class="list-group-item" id="touser"></li><input type="text" name="touser" id="touser"  hidden/>
        <li class="list-group-item" id="joid"></li><input type="text" name="joid" id="joid" hidden/>
        <li class="list-group-item" id="clientname"></li>
        <li class="list-group-item" >MESSAGE: <textarea class="col-sm-12" name="message" id="message" rows="4" cols="50" autofocus required></textarea>
      
      
      </li>
      </ul>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm">Send</button>            
        <button type="reset" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>
<!-- End Modal -->



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
    <script src="{{url('../../assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{url('../../assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{url('../../assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script>
    
      function search(ele) {
          if(event.key === 'Enter') {
            $("textarea#tasknotes").val(ele.value ); //+ "<br>");

            $("textarea#txtnotes").val(ele.value + "<br>");
            //alert(ele.value);        
          }
      }
        /****************************************
         *       Basic Table                   *
         ****************************************/
        // var table = $('#jotable').DataTable(

        // );
        // var table = $('#jotable1').DataTable( {
        //     "lengthMenu": [[10, 50, 100, 250, -1], [10, 50, 100, 250, "All"]], 
        // });
        var jid = 0;

        var table = $('#jotable').DataTable( {

          initComplete: function () {
            var i = 0;
            this.api().columns().every( function () {
                var column = this;
                //console.log(i);
                if(i === 1 || i ===3){
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
                
                if(i === 2){
                  column.data().unique().sort().each( function ( d, j ) {
                      select.append( "<option value=\""+html_encode(d.split('%')[0])+"\">"+ d +"</option>" )
                  } );
                  
                }else{
                  column.data().unique().sort().each( function ( d, j ) {
                      select.append( '<option value="'+d+'">'+ d.substring(0,20) +'</option>' )
                  } );
                }

                }
                i++;
            } );
          }
        }, {
                "ajax": "../ajax/data/objects.txt",
                "columns": [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ''
                    }
                ],
                "order": [[1, 'asc']]
            } );

        /* Formatting function for row details - modify as you need */
        function format ( d ) {
            var thd = '<thead><tr><th></th><th>Task Description</th><th>Status</th><th>Action</th></tr></thead>';
                var tb = '<tbody id="tbody'+jid+'"></tbody>';
                    return '<table cellpadding="5" cellspacing="0" border="1px" style="padding-right:100px;padding-left:100px;width:100%">'+
                                thd +
                                tb + 
                            '</table>';
        }
        


            
    // Add event listener for opening and closing details
    $('#jotable tbody').on('click', 'td.details-control', function () {
        jid = parseInt($(this).attr("data-jo"));
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

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/jo/gettask',
            data: {
                '_token': $('input[name=_token]').val(),
                'joid':jid,
            },
            success: function(data){
                //console.log(data);
                var markup = '';
                $("tr.trtask").remove();
                
                for (var i = 0; i < data.length; i++) {
                    if(data[i].tsid == 7){
                    markup += '<tr class="trtask"><td >'+(i+1)+'</td><td>'+data[i].taskname+'</td><td>['+data[i].name+']:'+data[i].state+'<br>'+data[i].st+'</td><td>'+
                    '<button class="btn btn-outline-primary my-2 my-sm-0 btn-sm taskstatus" data-toggle="modal" data-target="#updateTaskModal" type="button" onclick="gettaskStatus('+data[i].tid+','+data[i].tsid+',\''+data[i].taskname+'\',\'' + data[i].state +'\')" rel="tooltip" title="Update Status" disabled><span class="fa fa-edit"></span></button> '+
                    ''+
                    '</td></tr>';
                    }else{
                    markup += '<tr class="trtask"><td >'+(i+1)+'</td><td>'+data[i].taskname+'</td><td>['+data[i].name+']:'+data[i].state+'<br>'+data[i].st+'</td><td>'+
                    '<button class="btn btn-outline-primary my-2 my-sm-0 btn-sm taskstatus" data-toggle="modal" data-target="#updateTaskModal" type="button" onclick="gettaskStatus('+data[i].tid+','+data[i].tsid+',\''+data[i].taskname+'\',\'' + data[i].state +'\')" rel="tooltip" title="Update Status" ><span class="fa fa-edit"></span></button> '+
                    ''+
                    '</td></tr>';
                    }
                }
                $("table tbody #tbody"+jid).append(markup);

            },
            error:function(data)
            {
                console.log(data);
            }
        });
    } );

    function getJoidTransfer(joid)
    {
        $('input#inpjoid').val(joid);
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/jo/getusers',
            data: {
                '_token': $('input[name=_token]').val()
            },
            success: function(response){
                //console.log(response);
                $("#listusers").children('option').remove();
                for (var i = 0; i < response.length; i++) {
                    $("#listusers").append('<option value="'+response[i].id+'">'+response[i].name+'['+response[i].email+']</option>');
                }
            },
            error:function(response)
            {
                console.log(response);
            }
        });
    }
    function saveNotes(joid){
    document.getElementById("txtnotes").value = '';
    var d = Date(Date.now('01-25-2009')); 
    var table = document.getElementById("notestable");
    var row = table.insertRow(0); 
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell2 = row.insertCell(2);
    document.getElementById('txtjoid').value = joid.toString();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          type: 'POST',
          url: '/jo/getjonotes',
          data: {
              '_token': $('input[name=_token]').val(),
              'joid' : joid,
          },
          success: function(data){
              console.log(data);
              $("table#tblnotes tr").remove();
              for (var i = 0; i < data.length; i++) {
                var markup = "<tr><td  width='20%'>" + data[i].datecreated + "</td><td  width='80%'><strong>" + data[i].name +'</strong><br>' + data[i].note + "</td></tr>";
                $("table#tblnotes").append(markup);
              }

          },
          error:function(data)
          {
            console.log(data);
          }
        });

  }
  function saveNotesToDB(){
    var joid = $("#txtjoid").val(); 
    var note = $("#txtnotes").val(); 
    var d = Date(Date.now('01-25-2009')); 
    var table = document.getElementById("notestable");
    var row = table.insertRow(0); 
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell2 = row.insertCell(2);

    if(note.length <= 2){
      alert('Please provide notes.');
    }else{
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          type: 'POST',
          url: '/jo/addjonotes',
          data: {
              '_token': $('input[name=_token]').val(),
              'joid' : joid,
              'note' : note,
          },
          success: function(data){
              //console.log(data);
              $("table#tblnotes tr").remove();
              for (var i = 0; i < data.length; i++) {
                var markup = "<tr><td  width='20%'>" + data[i].datecreated + "</td><td  width='80%'><strong>" + data[i].name +'</strong><br>' + data[i].note + "</td></tr>";
                $("table#tblnotes").append(markup);
              }

          },
          error:function(data)
          {
            console.log(data);
          }
        });
    }

  }
  function form_submit() {
    document.getElementById("joForm").submit();
  }
  function form_submit1() {
    document.getElementById("transferForm").submit();
  }

  function gettaskStatus(tid, tsid, tn, s)
  {
    $("#taskprogress").text(s);
    if( s == 'received'){
      $("div#taskprogress").css("width","14%");
      $("#taskprogress").text(s+ " - 14%" );
    }else if( s == 'processing'){
      $("div#taskprogress").css("width","29%");
      $("#taskprogress").text(s+ " - 29%" );
    }else if( s == 'followup'){
      $("div#taskprogress").css("width","43%");
      $("#taskprogress").text(s+ " - 43%" );
    }else if( s == 'stuck or pending'){
      $("div#taskprogress").css("width","57%");
      $("#taskprogress").text(s+ " - 57%" );
    }else if( s == 'negotiating'){
      $("div#taskprogress").css("width","72%");
      $("#taskprogress").text(s+ " - 72%" );
    }else if( s == 'done'){
      $("div#taskprogress").css("width","86%");
      $("#taskprogress").text(s+ " - 86%" );
    }else{
      $("div#taskprogress").css("width","100%");
      $("#taskprogress").text(s+ " - 100%" );
    }
    
    $("#task").html("Task: " + tn);
    $('input#taskid').val(tid);
    $.ajax({
          type: 'POSt',
          url: '/jo/gettaskstatus',
          data: {
              '_token': $('input[name=_token]').val(),
          },
          success: function(data){
              //console.log(data);
              $("#ctaskstatus").children('option').remove();
              for (var i = 1; i < data.length; i++) { //var i = parseInt(tsid)
                $("#ctaskstatus").append('<option value="'+data[i].id+'">'+data[i].state+'</option>');
              }
          },
          error:function(data)
          {
             console.log(data);
          }
      });

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
            type: 'POST',
            url: '/jo/gettasknotes',
            data: {
                '_token': $('input[name=_token]').val(),
                'tid' : tid
            },
            success: function(data){
                //console.log(data);
                $("table#tbltasknotes tr").remove();
                for (var i = 0; i < data.length; i++) {
                  var markup = "<tr><td  width='20%'>" + data[i].created_at + "</td><td  width='70%'><strong>" + data[i].name +'</strong><br>' + data[i].remarks + "</td></tr>";
                  $("table#tbltasknotes").append(markup);
                }

            },
            error:function(data)
            {
              console.log(data);
            }
          });
  }

function saveTaskNotes(){
  var tid = document.getElementById('taskid').value;
  var sid = document.getElementById('ctaskstatus').value;
  var tnote = document.getElementById('tasknotes').value;
  tnote = tnote.replace(/\r?\n/g, '<br>');
  document.getElementById("tasknotes").value = '';
  var d = Date(Date.now('01-25-2009'));
  var table = document.getElementById("tasknotestable");
  var row = table.insertRow(0);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell2 = row.insertCell(2);
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        type: 'POST',
        url: '/jo/gettasknotes',
        data: {
            '_token': $('input[name=_token]').val(),
            'tid' : tid,
            'sid' : sid,
            'tnote' : tnote
        },
        success: function(data){
          //console.log(data);
            $("table#tbltasknotes tr").remove();
            for (var i = 0; i < data.length; i++) {
              var markup = "<tr><td  width='20%'>" + data[i].created_at + "</td><td  width='80%'><strong>" + data[i].name +'</strong><br>' + data[i].remarks + "</td></tr>";
              $("table#tbltasknotes").append(markup);
            }

        },
        error:function(data)
        {
          console.log(data);
        }
      });

}
function createConvo(touser, user, joid, clientname){
  var x = document.getElementById("message").autofocus;
  $("li#touser").text("TO: " + user.toString());
  $("input#touser").val(touser);
  $("li#joid").text("JO#: " + joid.toString());
  $("input#joid").val(joid);
  $("li#clientname").text("CLIENT: "+clientname);

  $('#createConvo').on('shown.bs.modal', function() {
    $(this).find('textarea[name="message"]').focus();
  });

}

</script>

@endsection
