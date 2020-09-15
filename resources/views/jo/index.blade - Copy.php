<style media="screen">
ol.progtrckr {
  margin: 0;
  padding: 0;
  list-style-type none;
}

ol.progtrckr li {
  display: inline-block;
  text-align: center;
  line-height: 3.5em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

ol.progtrckr li.progtrckr-done {
  color: black;
  border-bottom: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
  color: silver;
  border-bottom: 4px solid silver;
}

ol.progtrckr li:after {
  content: "\00a0\00a0";
}
ol.progtrckr li:before {
  position: relative;
  bottom: -2.5em;
  float: left;
  left: 50%;
  line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
  content: "\2713";
  color: white;
  background-color: yellowgreen;
  height: 2.2em;
  width: 2.2em;
  line-height: 2.2em;
  border: none;
  border-radius: 2.2em;
}
ol.progtrckr li.progtrckr-todo:before {
  content: "\039F";
  color: silver;
  background-color: white;
  font-size: 2.2em;
  bottom: -1.2em;
}

</style>
@extends('layouts.app')

@section('content')
<div class="container">
  @if(session('success'))
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success! </strong>{{session('success')}}
  </div>
  @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="#">ALL JOs Assignment<span class="sr-only">(current)</span></a>
                        </li>
                        <!-- <li class="nav-item">
                          <a class="nav-link" href="#">Ongoing</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Assigned to me</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Set by me</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Due today</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Overdue</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Done</a>
                        </li> -->
                      </ul>
                      <a href="{{url('/jo/create?cid=')}}"> <button class="btn btn-outline-primary my-2 my-sm-0" type="button">New JO</button> </a> &nbsp
                      <form class="form-inline my-2 my-lg-0" action="{{url('/jo/search')}}" method="post">
                        {{ csrf_field() }}
                        <input class="form-control mr-sm-2" type="search" name="josearchkey" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      </form>


                    </div>
                  </nav>
                </div>

                <div class="card-body">
                  <table class="table table-sm table-hover" id="jotable">
                    <thead>
                      <tr>
                        <th scope="col" >JO#</th>
                        <th scope="col" >Company/Client Name</th>
                        <th scope="col" >Date Encoded</th>
                        <th scope="col" >Due Date &nbsp</th>
                        <th scope="col" >Assigned to</th>
                        <th scope="col" >Progress</th>
                        <th scope="col" >Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($jos) > 0)
                         @foreach($jos as $jo)
                         <?php $perx = number_format($jo->sumofstatus/($jo->jcount*$jo->maxstate)*100); ?>
                         <tr id="tr">
                           <td>{{$jo->id}}</td>
                           <td data-table-header="clients">{{$jo->clientname}}</td>
                           <td>{{$jo->created_at}}</td>
                           @if($jo->datedue == date("Y-m-d") && $perx < 100)
                           <td class="bg-info">{{$jo->datedue}}</td>
                           @elseif($jo->datedue < date("Y-m-d") && $perx < 100)
                           <td class="bg-danger">{{$jo->datedue}}</td>
                           @elseif($jo->datedue < date("Y-m-d") && $perx == 100)
                           <td class="bg-success">{{$jo->datedue}}</td>
                           @else
                           <td class="bg-warning">{{$jo->datedue}}</td>
                           @endif

                           <td>{{$jo->username}}</td>
                           <td>
                             <div class="progress" style="">

                           <?php if($perx == 100){ ?>
                              <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="{{$perx}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$perx}}%">{{$perx}}%</div>
                            <?php }else{ ?>
                              <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-valuenow="{{$perx}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$perx}}%">{{$perx}}%</div>
                            <?php } ?>
                            </div>
                           </td>
                           <td >
                           <p>
                             <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#collapse{{$jo->id}}" aria-expanded="false" aria-controls="collapse{{$jo->id}}" onclick="getJoid({{$jo->id}})">
                               View Task
                             </button>
                             @if(count($admin) > 0)
                             <button class="btn btn-secondary btn-sm" type="button" rel="tooltip" title="Transfer assignment" data-toggle="modal" data-target="#transferJOModal"
                                    onclick="getJoidTransfer({{$jo->id}})">
                               <i class="fa fa-exchange-alt" aria-hidden="true"></i>
                             </button>
                             @endif
                           </p>
                         </td>
                       </tr>
                     <tr style="padding:0 0 0 0">
                       <td colspan="7" style="padding:0 0 0 0">
                           <div class="collapse" id="collapse{{$jo->id}}">
                             <div class="card card-body">
                               <table class="table table-sm table-hover">
                                 <thead>
                                   <tr>
                                     <th scope="col" width="5%"></th>
                                     <th scope="col" width="40%">Task Description</th>
                                     <th scope="col" width="10%">Lead Time</th>
                                     <th scope="col" width="10%">Amount</th>
                                     <th scope="col" width="25%">Status</th>
                                     <th scope="col" width="10%">Action</th>
                                   </tr>
                                 </thead>
                                 <tbody id="tbody{{$jo->id}}">

                                 </tbody>
                               </table>
                             </div>
                           </div>
                           </td>
                         </tr>
                         @endforeach
                      @else
                      <tr>
                        <td>NO JO Found.</td>
                      </tr>
                      @endif

                    </tbody>
                  </table>
                  {{ $jos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateTaskModal" tabindex="-1" role="dialog" aria-labelledby="updateTaskModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Task Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
            <textarea type="textarea" name="tasknotes" id="tasknotes" rows = "3" col="50" class="form-control" required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit"  onclick="form_submit()" class="btn btn-primary btn-sm">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->
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
<div class="modal fade" id="viewTaskDetails" tabindex="-1" role="dialog" aria-labelledby="viewTaskDetailsLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Task Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ol class="progtrckr" data-progtrckr-steps="5">
          <li id="received" class="progtrckr-todo">Received</li><!--
       --><li id="processing" class="progtrckr-todo">Processing</li><!--
       --><li id="ongoing" class="progtrckr-todo">On going</li><!--
       --><li id="done" class="progtrckr-todo">Done</li><!--
       --><li id="billed" class="progtrckr-todo">Billed</li>
      </ol>
      <table class="table">
        <tbody>
          <tr id="trtrack">
            <td id="tdreceived" width="20%"></td>
            <td id="tdprocessing" width="20%"></td>
            <td id="tdongoing" width="20%"></td>
            <td id="tddone" width="20%"></td>
            <td id="tdbilled" width="20%"></td>
          </tr>
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
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src "https://cdn.datatables.net/plug-ins/1.10.15/sorting/stringMonthYear.js"></script>

<script type="text/javascript">
  function form_submit() {
    document.getElementById("joForm").submit();
   }
   function form_submit1() {
     document.getElementById("transferForm").submit();
    }
  function getJoid(id)
  {
    var joid = id;
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
              'joid':joid,
          },
          success: function(data){
              //console.log(data);
              $("tr.trtask").remove();
              var markup = '';
              for (var i = 0; i < data.length; i++) {
                if(data[i].tsid == 7){
                  markup += '<tr class="trtask"><td >'+(i+1)+'</td><td>'+data[i].taskname+'</td><td >'+data[i].leadtime+'</td><td >'+data[i].amount+'</td><td>['+data[i].name+']:'+data[i].state+'<br>'+data[i].created_at+'</td><td>'+
                  '<button class="btn btn-outline-primary my-2 my-sm-0 btn-sm taskstatus" data-toggle="modal" data-target="#updateTaskModal" type="button" onclick="gettaskStatus('+data[i].tid+','+data[i].tsid+')" rel="tooltip" title="Update Status" disabled><span class="fas fa-edit"></span></button> '+
                  '<button class="btn btn-outline-primary my-2 my-sm-0 btn-sm taskdetails" data-toggle="modal" data-target="#viewTaskDetails" type="button" onclick="gettaskDetails('+data[i].tid+')" rel="tooltip" title="View Details" ><span class="fas fa-list"></span></button>'+
                  '</td></tr>';
                }else{
                  markup += '<tr class="trtask"><td >'+(i+1)+'</td><td>'+data[i].taskname+'</td><td >'+data[i].leadtime+'</td><td >'+data[i].amount+'</td><td>['+data[i].name+']:'+data[i].state+'<br>'+data[i].created_at+'</td><td>'+
                  '<button class="btn btn-outline-primary my-2 my-sm-0 btn-sm taskstatus" data-toggle="modal" data-target="#updateTaskModal" type="button" onclick="gettaskStatus('+data[i].tid+','+data[i].tsid+')" rel="tooltip" title="Update Status" ><span class="fas fa-edit"></span></button> '+
                  '<button class="btn btn-outline-primary my-2 my-sm-0 btn-sm taskdetails" data-toggle="modal" data-target="#viewTaskDetails" type="button" onclick="gettaskDetails('+data[i].tid+')" rel="tooltip" title="View Details" ><span class="fas fa-list"></span></button>'+
                  '</td></tr>';
                }
              }
              $("table tbody #tbody"+joid).append(markup);

          },
          error:function(data)
          {
             console.log(data);
          }
      });
  }
  function gettaskStatus(tid, tsid)
  {
    $('input#taskid').val(tid);
    $.ajax({
          type: 'GET',
          url: '/jo/gettaskstatus',
          data: {
              '_token': $('input[name=_token]').val(),
          },
          success: function(data){
              //console.log(data);
              $("#ctaskstatus").children('option').remove();
              for (var i = parseInt(tsid); i < data.length; i++) {
                $("#ctaskstatus").append('<option value="'+data[i].id+'">'+data[i].state+'</option>');
              }
          },
          error:function(data)
          {
             console.log(data);
          }
      });
  }
  function getJoidTransfer(joid)
  {
    $('input#inpjoid').val(joid);
    $.ajax({
          type: 'GET',
          url: '/jo/getusers',
          data: {
              '_token': $('input[name=_token]').val(),
          },
          success: function(data){
              //console.log(data);
              $("#listusers").children('option').remove();
              for (var i = 0; i < data.length; i++) {
                $("#listusers").append('<option value="'+data[i].id+'">'+data[i].name+'['+data[i].email+']</option>');
              }
          },
          error:function(data)
          {
             console.log(data);
          }
      });
  }


  function sortTable(n)
  {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("jotable");
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc";
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
      //start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /*Loop through all table rows (except the
      first, which contains table headers):*/
      for (i = 1; i < (rows.length - 1); i++) {
        //start by saying there should be no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare,
        one from current row and one from the next:*/
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /*check if the two rows should switch place,
        based on the direction, asc or desc:*/
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /*If a switch has been marked, make the switch
        and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        //Each time a switch is done, increase this count by 1:
        switchcount ++;
      } else {
        /*If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again.*/
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
}

function gettaskDetails(tid)
{
  // //remove class
  // var element = document.getElementById("myDIV");
  // element.classList.remove("mystyle");
  // //add class
  // var element = document.getElementById("myDIV");
  // element.classList.add("mystyle");

  $.ajax({
        type: 'POST',
        url: '/jo/gettaskdetails',
        data: {
            '_token': $('input[name=_token]').val(),
            'tid' : tid,
        },
        success: function(data){
            console.log(data);
            // $("#ctaskstatus").children('option').remove();
            // for (var i = parseInt(tsid); i < data.length; i++) {
            //   $("#ctaskstatus").append('<option value="'+data[i].id+'">'+data[i].state+'</option>');
            // }
            // 1-received, 2-processing, 3-followup, 4-stuck or pending, 5-negotiating, 6-done, 7-billed
           //    <li id="received" class="progtrckr-done">Received</li><!--
           // --><li id="processing" class="progtrckr-done">Processing</li><!--
           // --><li id="ongoing" class="progtrckr-done">On going</li><!--
           // --><li id="done" class="progtrckr-todo">Done</li><!--
           // --><li id="billed" class="progtrckr-todo">Billed</li>
           // //remove class
           document.getElementById ( "tdreceived" ).innerHTML = '';
           document.getElementById ( "tdprocessing" ).innerHTML = '';
           document.getElementById ( "tdongoing" ).innerHTML = '';
           document.getElementById ( "tddone" ).innerHTML = '';
           document.getElementById ( "tdbilled" ).innerHTML = '';
           var txt3 = "";

           for (var i = 0; i < data.length; i++) {

             if(data[i].tsid == 1){
               document.getElementById ( "tdreceived" ).innerHTML = '<strong>'+data[i].created_at + '</strong><br>' + data[i].remarks;
               var element1 = document.getElementById("received");
               element1.classList.remove("progtrckr-todo");
               var element1 = document.getElementById("received");
               element1.classList.add("progtrckr-done");

               var element2 = document.getElementById("processing");
               element2.classList.remove("progtrckr-done");
               var element2 = document.getElementById("processing");
               element2.classList.add("progtrckr-todo");

               var element3 = document.getElementById("ongoing");
               element3.classList.remove("progtrckr-done");
               var element3 = document.getElementById("ongoing");
               element3.classList.add("progtrckr-todo");

               var element4 = document.getElementById("done");
               element4.classList.remove("progtrckr-done");
               var element4 = document.getElementById("done");
               element4.classList.add("progtrckr-todo");

               var element5 = document.getElementById("billed");
               element5.classList.remove("progtrckr-done");
               var element5 = document.getElementById("billed");
               element5.classList.add("progtrckr-todo");
             }

             if(data[i].tsid == 2){
               document.getElementById ( "tdprocessing" ).innerHTML = '<strong>'+data[i].created_at + '</strong><br>' + data[i].remarks;
               var element1 = document.getElementById("received");
               element1.classList.remove("progtrckr-todo");
               var element1 = document.getElementById("received");
               element1.classList.add("progtrckr-done");

               var element2 = document.getElementById("processing");
               element2.classList.remove("progtrckr-todo");
               var element2 = document.getElementById("processing");
               element2.classList.add("progtrckr-done");

               var element3 = document.getElementById("ongoing");
               element3.classList.remove("progtrckr-done");
               var element3 = document.getElementById("ongoing");
               element3.classList.add("progtrckr-todo");

               var element4 = document.getElementById("done");
               element4.classList.remove("progtrckr-done");
               var element4 = document.getElementById("done");
               element4.classList.add("progtrckr-todo");

               var element5 = document.getElementById("billed");
               element5.classList.remove("progtrckr-done");
               var element5 = document.getElementById("billed");
               element5.classList.add("progtrckr-todo");

             }

             if(data[i].tsid >= 3 && data[i].tsid <= 5){
               txt3 += '<strong>'+data[i].created_at + '</strong><br>' + data[i].remarks + '<br>';
               document.getElementById ( "tdongoing" ).innerHTML = txt3;
               var element1 = document.getElementById("received");
               element1.classList.remove("progtrckr-todo");
               var element1 = document.getElementById("received");
               element1.classList.add("progtrckr-done");

               var element2 = document.getElementById("processing");
               element2.classList.remove("progtrckr-todo");
               var element2 = document.getElementById("processing");
               element2.classList.add("progtrckr-done");

               var element3 = document.getElementById("ongoing");
               element3.classList.remove("progtrckr-todo");
               var element3 = document.getElementById("ongoing");
               element3.classList.add("progtrckr-done");

               var element4 = document.getElementById("done");
               element4.classList.remove("progtrckr-done");
               var element4 = document.getElementById("done");
               element4.classList.add("progtrckr-todo");

               var element5 = document.getElementById("billed");
               element5.classList.remove("progtrckr-done");
               var element5 = document.getElementById("billed");
               element5.classList.add("progtrckr-todo");
             }

             if(data[i].tsid == 6){
               document.getElementById ( "tddone" ).innerHTML = '<strong>'+data[i].created_at + '</strong><br>' + data[i].remarks;
               var element1 = document.getElementById("received");
               element1.classList.remove("progtrckr-todo");
               var element1 = document.getElementById("received");
               element1.classList.add("progtrckr-done");

               var element2 = document.getElementById("processing");
               element2.classList.remove("progtrckr-todo");
               var element2 = document.getElementById("processing");
               element2.classList.add("progtrckr-done");

               var element3 = document.getElementById("ongoing");
               element3.classList.remove("progtrckr-todo");
               var element3 = document.getElementById("ongoing");
               element3.classList.add("progtrckr-done");

               var element4 = document.getElementById("done");
               element4.classList.remove("progtrckr-todo");
               var element4 = document.getElementById("done");
               element4.classList.add("progtrckr-done");

               var element5 = document.getElementById("billed");
               element5.classList.remove("progtrckr-done");
               var element5 = document.getElementById("billed");
               element5.classList.add("progtrckr-todo");

             }
             if(data[i].tsid == 7){
               document.getElementById ( "tdbilled" ).innerHTML = '<strong>'+data[i].created_at + '</strong><br>' + data[i].remarks;
               var element1 = document.getElementById("received");
               element1.classList.remove("progtrckr-todo");
               var element1 = document.getElementById("received");
               element1.classList.add("progtrckr-done");

               var element2 = document.getElementById("processing");
               element2.classList.remove("progtrckr-todo");
               var element2 = document.getElementById("processing");
               element2.classList.add("progtrckr-done");

               var element3 = document.getElementById("ongoing");
               element3.classList.remove("progtrckr-todo");
               var element3 = document.getElementById("ongoing");
               element3.classList.add("progtrckr-done");

               var element4 = document.getElementById("done");
               element4.classList.remove("progtrckr-todo");
               var element4 = document.getElementById("done");
               element4.classList.add("progtrckr-done");

               var element5 = document.getElementById("billed");
               element5.classList.remove("progtrckr-todo");
               var element5 = document.getElementById("billed");
               element5.classList.add("progtrckr-done");

             }

          }
        },
        error:function(data)
        {
           console.log(data);
        }
    });

}
</script>
