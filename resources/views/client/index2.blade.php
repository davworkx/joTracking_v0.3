@extends('layouts.app')

@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h4 class="page-title">Manage Clients</h4> </div>
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <!-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro 2</a> -->       
        <ol class="breadcrumb">

            <li> 

            <form class="form-inline my-2 my-lg-0" action="{{url('clients/search')}}" method="post">
              @if(count($admin)>0)
                  <button class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#newClientModal" type="button" onclick="addNew(1)">New Client</button> &nbsp
                  @endif
              {{ csrf_field() }}
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="csearchkey">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            </li>

            <li><a href="{{url('home')}}">Dashboard</a></li>
            <li class="active">Manage Clients</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<!-- ============================================================== -->
<!-- Different data widgets -->
<!-- ============================================================== -->
<!-- .row -->
<div class="row">
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
  <div class="col-sm-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">List of Clients</h3>

            <table class="table table-hover table-responsive">
                    <thead>
                      <tr>
                        <th scope="col">TIN</th>
                        <th scope="col">Company/Client</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Contact No.</th>
                        <th scope="col">Contact Person</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($clients) > 0)
                         @foreach($clients as $client)
                         <tr id="tr{{$client->id}}">
                            <td>{{$client->tin}}</td>
                             <td>{{$client->clientname}}</td>
                             <td>{{$client->branch}}</td>
                             <td>{{$client->contactno}}</td>
                             <td>{{$client->cperson}}</td>
                             <td>{{$client->email}}</td>
                             <td>
                               @if(count($admin)>0)
                               <button class="btn btn-success" data-toggle="modal" rel="tooltip" title="Edit Client" data-target="#newClientModal"
                               onclick="updateClient('5','{{$client->id}}','{{$client->clientname}}','{{$client->branch}}','{{$client->busadd}}','{{$client->tin}}','{{$client->email}}','{{$client->contactno}}','{{$client->cperson}}')"
                               ><i class="fa fa-edit" aria-hidden="true"></i></button>
                               @endif
                               <a href="{{url('jo/view/')}}/{{$client->id}}">
                               <button class="btn btn-success" data-toggle="modal" rel="tooltip" title="View JOs" ><i class="fa fa-bars"></i></button>
                              </a>
                              <a href="{{url('jo/create?cid=')}}{{$client->id}}">
                              <button class="btn btn-success" data-toggle="modal" rel="tooltip" title="Create JO" ><i class="fa fa-tasks"></i></button>
                             </a>
                             <a href="{{url('billing/view')}}/{{$client->id}}">
                             <button class="btn btn-outline-success" data-toggle="modal" rel="tooltip" title="View Billing" ><i class="fa fa-money"></i></button>
                            </a>
                             </td>
                         </tr>
                         @endforeach
                     @else
                     <tr>
                       <td colspan="9"><center>No Data Found.</center></td>
                     </tr>
                     @endif

                    </tbody>
                  </table>
                  {{ $clients->links() }}


        </div>
    </div>
</div>
<!--/.row -->


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
        <form class="form-horizontal" id="clientForm" action="{{url('/addnewclient')}}" method="post">
          {{ csrf_field() }}
          <input type="text" name="eventid" id="eventid" value="" hidden>
          <input type="text" name="cid" id="cid" value="" hidden>
            <div class="form-group">
              <label class="control-label col-sm-5" for="clientname" style="text-align:left;">Client Name:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="clientname" placeholder="Enter Company Name" name="clientname" value="{{ old('clientname') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="branch" style="text-align:left;">Branch</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="branch" placeholder="Enter Branch" name="branch" value="{{ old('branch') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="busadd" style="text-align:left;">Address</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="busadd" placeholder="Enter Business Address" name="busadd" value="{{ old('busadd') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="tin" style="text-align:left;">Tax ID No.</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="tin" placeholder="Enter TIN" name="tin" value="{{ old('tin') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-12" for="contactno" style="text-align:left;">Contact No. (Tel/CP)</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="contactno" placeholder="Enter Contact No." name="contactno" value="{{ old('contactno') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-12" for="email" style="text-align:left;">Company Email:</label>
              <div class="col-sm-12">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-8" for="cperson" style="text-align:left;">Contact Person</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="cperson" placeholder="Enter Contact Person" name="cperson" value="{{ old('cperson') }}">
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" onclick="form_submit()" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->
@endsection

<script type="text/javascript">
function form_submit()
{
  document.getElementById("clientForm").submit();
}
function addNew(eid)
{
  //1-new
  //5-update
  document.getElementById("clientForm").reset();
  document.getElementById("eventid").value = eid.toString();
}
function updateClient(code,id,client,branch,busadd,tin,email,con,cper)
{
  document.getElementById("eventid").value = code.toString();
  document.getElementById("cid").value = id.toString();
  document.getElementById("clientname").value = client.toString();
  document.getElementById("branch").value = branch.toString();
  document.getElementById("busadd").value = busadd.toString();
  document.getElementById("tin").value = tin.toString();
  document.getElementById("email").value = email.toString();
  document.getElementById("contactno").value = con.toString();
  document.getElementById("cperson").value = cper.toString();
}

</script>
