@extends('layouts.app')

@section('content')

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h4 class="page-title">Manage Clients</h4>

                            <div class="ml-auto text-right">
                            <!-- <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Clients</li>
                                    </ol>
                                </nav> -->
                            <form class="form-inline my-2 my-lg-0" action="{{url('clients/search')}}" method="post">
                            @if(count($admin)>0)
                                <button class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#newClientModal" type="button" onclick="addNew(1)">New Client</button> &nbsp
                                @endif
                            {{ csrf_field() }}
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="csearchkey">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>

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
                        <div class="table-responsive">
                    <table class="table table-hover">
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
                              </a><br>
                              <a href="{{url('jo/create?cid=')}}{{$client->id}}">
                              <button class="btn btn-success mt-2" data-toggle="modal" rel="tooltip" title="Create JO" ><i class="fa fa-tasks"></i></button>
                             </a>
                             <a href="{{url('billing/view')}}/{{$client->id}}">
                             <button class="btn btn-success mt-2" data-toggle="modal" rel="tooltip" title="View Billing" ><i class="fa fa-credit-card"></i></button>
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
                <input type="text" class="form-control" id="branch" placeholder="Enter Branch" name="branch" value="{{ old('branch') }}" required>
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



                    <!-- BEGIN MODAL -->
                    <!-- <div class="modal none-border" id="my-event">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Add Event</strong></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Modal Add Category -->
                    <!-- <div class="modal fade none-border" id="add-new-event">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Add</strong> a category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label">Category Name</label>
                                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Choose Category Color</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="success">Success</option>
                                                    <option value="danger">Danger</option>
                                                    <option value="info">Info</option>
                                                    <option value="primary">Primary</option>
                                                    <option value="warning">Warning</option>
                                                    <option value="inverse">Inverse</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- END MODAL -->
    
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
