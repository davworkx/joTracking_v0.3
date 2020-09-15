@extends('layouts.app')

@section('content')

<div class="container">
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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">

                        <li class="nav-item active">
                          <h3>List of Clients</h3>
                        </li>
                        <!--
                        <li class="nav-item">
                          <a class="nav-link" href="#">Ongoing</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Assisting</a>
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
                      @if(count($admin)>0)
                      <button class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#newClientModal" type="button" onclick="addNew(1)">New Client</button> &nbsp
                      @endif
                      <form class="form-inline my-2 my-lg-0" action="{{url('clients/search')}}" method="post">
                        {{ csrf_field() }}
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="csearchkey">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      </form>
                      
                    </div>
                  </nav>
                </div>

                <div class="card-body">
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
                               <button class="btn btn-outline-success" data-toggle="modal" rel="tooltip" title="Edit Client" data-target="#newClientModal"
                               onclick="updateClient('5','{{$client->id}}','{{$client->clientname}}','{{$client->branch}}','{{$client->busadd}}','{{$client->tin}}','{{$client->email}}','{{$client->contactno}}','{{$client->cperson}}')"
                               ><span class="fas fa-edit"></span></button>
                               @endif
                               <a href="{{url('jo/view/')}}/{{$client->id}}">
                               <button class="btn btn-outline-success" data-toggle="modal" rel="tooltip" title="View JOs" ><span class="fas fa-bars"></span></button>
                              </a>
                              <a href="{{url('jo/create?cid=')}}{{$client->id}}">
                              <button class="btn btn-outline-success" data-toggle="modal" rel="tooltip" title="Create JO" ><span class="fas fa-tasks"></span></button>
                             </a>
                             <a href="{{url('billing/view')}}/{{$client->id}}">
                             <button class="btn btn-outline-success" data-toggle="modal" rel="tooltip" title="View Billing" ><span class="fas fa-file-invoice-dollar"></span></button>
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
        <form class="form-horizontal" id="clientForm" action="{{url('/addnewclient')}}" method="post">
          {{ csrf_field() }}
          <input type="text" name="eventid" id="eventid" value="" hidden>
          <input type="text" name="cid" id="cid" value="" hidden>
            <div class="form-group">
              <label class="control-label col-sm-2" for="clientname">Client Name:</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="clientname" placeholder="Enter Company Name" name="clientname" value="{{ old('clientname') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="branch">Branch</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="branch" placeholder="Enter Branch" name="branch" value="{{ old('branch') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="busadd">Address</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="busadd" placeholder="Enter Business Address" name="busadd" value="{{ old('busadd') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="tin">Tax ID No.</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="tin" placeholder="Enter TIN" name="tin" value="{{ old('tin') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-12" for="contactno">Contact No. (Tel/CP)</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="contactno" placeholder="Enter Contact No." name="contactno" value="{{ old('contactno') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-12" for="email">Company Email:</label>
              <div class="col-sm-12">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-8" for="cperson">Contact Person</label>
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
