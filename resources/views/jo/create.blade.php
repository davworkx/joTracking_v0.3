@extends('layouts.app')

@section('content')

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h4 class="page-title">Create New Job Order</h4>

                            <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create New JO</li>
                                    </ol>
                                </nav>
                                <!-- <form class="form-inline my-2 my-lg-0" action="{{url('/jo/search')}}" method="post">
                                <a href="{{url('/jo/create?cid=')}}"> <button class="btn btn-outline-primary my-2 my-sm-0" type="button">New JO</button> </a> &nbsp
                                  {{ csrf_field() }}
                                  <input class="form-control mr-sm-2" type="search" name="josearchkey" placeholder="Search" aria-label="Search">
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
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error! </strong>{{session('error')}}
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                    <div class="col-sm-12">
        <div class="white-box analytics-info">
            <form id="joForm" action="{{url('/addjo')}}" method="post" onsubmit="return confirm('Do you really want to submit the form?');">
            {{ csrf_field() }}
            <div class="form-row">
              <div class="col-md-12 mb-3 form-row">
                <label for="clientid">Choose Company/Client</label>
                <select class="form-control custom-select" name="clientid" id="clientid" >
                  <!-- <option selected>Choose...</option> -->

                  @if(count($clients)>0)
                    @foreach($clients as $client)

                      @if( $_REQUEST['cid'] == $client->id)
                        <option value="{{$client->id}}" selected>{{$client->clientname}}</option>
                      @else
                        <option value="{{$client->id}}" >{{$client->clientname}} - [{{$client->branch}}] - [TIN:{{$client->tin}}]</option>
                      @endif
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="jodate">Due Date</label>
                <input type="date" class="form-control" name="jodate" id="jodate" required>
              </div>
              <div class="form-group col-md-6">
                <label for="assignedto">Assign to</label>
                <select id="assignedto" name="assignedto" class="form-control custom-select" required>
                  <!-- <option selected>Choose....</option> -->
                  @if(count($users)>0)
                    @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->name}} [{{$user->email}}] </option>
                    @endforeach
                  @endif
                </select>
              </div>
              </div>
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-success btn-sm" id="addtask"> <span class="fa fa-plus"></span> Add New Task</button>
                <button type="button" class="btn btn-danger btn-sm" id="deletetask"> <span class="fa fa-times"></span> Remove Task</button>
              </div>
              <div class="card-body">
                <table>
                  <tbody>

                  </tbody>
                </table>
                <hr>
                TOTAL AMOUNT DUE: (Php) <p id="amountdue"></p>
                <button type="button" class="btn btn-success btn-sm" id="calcTask"> <span class="fa fa-calculator"></span> Calculate</button>
              </div>
            </div>
            <hr>
            @if(count($admin) > 0)
              <input type="checkbox" name="dateoverride" id="dateoverride" value="1" class="form-group"> Override Created Date  (For Existing JOs)
              <br>
              <div class="form-group col-md-3">
                <input type="date" class="form-control" name="createddate" id="createddate">
              </div>
            <br>
            @endif

            <button class="btn btn-gray" type="reset">Cancel</button>
            <button class="btn btn-primary" type="submit">Submit JO</button>
          </form>


            </div>
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

@endsection
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.15/sorting/stringMonthYear.js"></script>
<script src="{{url('../../assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{url('../../assets/libs/select2/dist/js/select2.min.js')}}"></script>

<script type="text/javascript">

   jQuery(document).ready(function() {

     $("#createddate").hide();
     $("#dateoverride").click(function () {
       if ($(this).is(":checked")) {
           $("#createddate").show();
           $("#createddate").prop('required',true);
       } else {
           $("#createddate").hide();
           $("#createddate").prop('required',false);
       }
    });
   });
</script>