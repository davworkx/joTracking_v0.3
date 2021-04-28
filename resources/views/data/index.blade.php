@extends('layouts.app')

@section('content')

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h4 class="page-title">Data Administration</h4>

                            <div class="ml-auto text-right">
                            <!-- <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Clients</li>
                                    </ol>
                                </nav> 
                            <form class="form-inline my-2 my-lg-0" action="{{url('clients/search')}}" method="post">
                                <button class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#newClientModal" type="button" onclick="addNew(1)">New Client</button> &nbsp
                            {{ csrf_field() }}
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="csearchkey">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                            -->
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
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success! </strong>{{session('success')}}
                </div>
                @endif
                <div class="col-lg-12">
                        <!-- Tabs -->
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#agency" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Agencies</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#form" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Forms</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#deletedfile" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Deleted Files</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="agency" role="tabpanel">


                            <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Forms Control</h4> -->
                                <div class="form-group">
                                    <label for="hue-demo">Code (e.g. BIR, SEC ...)</label>
                                    <input type="text" name="agencycode" id="agencycode" class="form-control demo" data-control="hue" value="" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="position-bottom-left">Description</label>
                                    <input type="text" name="agencydescription" id="agencydescription" class="form-control demo" data-position="bottom left" value="">
                                </div>
                                
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success" id="btn-add-agency">Add or Update Record</button>
                                </div>
                            </div>
                        </div>


                                <hr>
                                <div class="p-20" style="padding:20">
                                    <div class="table-responsive">
                                    <table id="table_agency" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($agency) > 0)
                                            @foreach($agency as $a)
                                            <tr>
                                                <td>{{$a->code}}</td>
                                                <td>{{$a->description}}</td>
                                                <td> <a  href="#" onclick="updateA(`{{$a->code}}`, `{{$a->description}}`)"> Update </a> </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tbody>   
                                    </table>
                                </div>
                                </div>

                                </div>
                                <div class="tab-pane  p-20" id="form" role="tabpanel">
                                    <div class="p-20" style="padding:20">
                                       
                                    <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Forms Control</h4> -->
                                <div class="form-group">
                                    <label for="hue-demo">Form Code</label>
                                    <input type="text" name="formcode" id="formcode" class="form-control demo" data-control="hue" value="" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="position-bottom-left">Form Description</label>
                                    <input type="text" name="formdescription" id="formdescription" class="form-control demo" data-position="bottom left" value="">
                                </div>

                            <div class="form-group">
                              <label for="position-bottom-left" class="col-sm-12 text-left control-label col-form-label">Agency or Office</label>
                              <div class="col-md-12" id="select2options">
                                <select class="select2 form-control custom-select" id="select-agency" name="select-agency" style="width: 100%; height:36px;">
                                    @if(count($agency) > 0)
                                        @foreach($agency as $ag)
                                            <option value="{{$ag->id}}">{{$ag->code}}  - {{$ag->description}} </option>
                                        @endforeach
                                    @endif

                                </select>
                                </div>
                          </div>
                                
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success" id="btn-add-form">Add or Update Record</button>
                                </div>
                            </div>
                        </div>


                                <hr>
                                <div class="p-20" style="padding:20">
                                    <div class="table-responsive">
                                    <table id="table_form" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Description</th>
                                                <th>Agency/Office</th>
                                                <th>Action</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($forms) > 0)
                                            @foreach($forms as $frm)
                                            <tr id="tr-{{$frm->code}}">
                                                <td>{{$frm->code}}</td>
                                                <td id="desc">{{$frm->description}}</td>
                                                <td>{{$frm->acode}}</td>
                                                <td> <a  href="#" onclick="update(`{{$frm->code}}`, `{{$frm->description}}`, `{{$frm->aid}}`)"> Update </a> </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tbody>   
                                    </table>
                                </div>
                                </div>



                                    </div>
                                </div>
                                <div class="tab-pane p-20" id="deletedfile" role="tabpanel">
                                    <div class="p-20" style="padding:20">
                                       
                                <hr>
                                <div class="p-20" style="padding:20">
                                    <div class="table-responsive">
                                    <table id="table-delfile" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Client Name</th>
                                                <th>Applicable Date</th>
                                                <th>Form Code</th>
                                                <th>Description</th>
                                                <th>Agency/Office</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                </div>




                                    </div>
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

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{url('../../assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('../../assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{url('../../assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
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

    <script type="text/javascript">
        $('#table_agency').DataTable();
        $('#table_form').DataTable();
        var dftable = $('#table-delfile').DataTable();

        $('button#btn-add-agency').on( 'click', function () {
            var code = $('input#agencycode').val().trim().toUpperCase();
            var description = $('input#agencydescription').val().trim();

            if(code === "" || description === ""){
                alert('Code field and Description field are required fields.');
                return;
            }

                var isSave = confirm('Are you sure that you want to SAVE the changes?');

                 if(isSave === true){
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                    type: 'POST',
                    url: '/data/agency',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'code' : code,
                        'description': description,
                    },
                    success:function(data)
                    {   
                        console.log(data);
                        location.reload();
                        //$("a.nav-link[href='#deletedfile']").click()
                    },
                    error:function(data)
                    {
                        console.error(data);
                    }
                    });
                }else{
                     alert('No changes made on the file.');
                }

        });

        $('button#btn-add-form').on( 'click', function () {
            var code = $('input#formcode').val().trim().toUpperCase();
            var description = $('input#formdescription').val().trim();
            var agencyId = $("select#select-agency").val();

            if(code === "" || description === ""){
                alert('Code field and Description field are required fields.');
                return;
            }

                var isSave = confirm('Are you sure that you want to SAVE the changes?');

                 if(isSave === true){
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                    type: 'POST',
                    url: '/data/form',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'code' : code,
                        'description': description,
                        'agencyid' : agencyId,
                    },
                    success:function(data)
                    {   
                        console.log(data);
                        //$("a.nav-link[href='#form']").click();
                        $("tr#tr-0605 > td#desc").text(description).animate({color: 'blue'}, 'slow');
                    },
                    error:function(data)
                    {
                        console.error(data);
                    }
                    });
                }else{
                     alert('No changes made on the file.');
                }

        });

        $("a.nav-link[href='#deletedfile']").click(function(){
            getDeletedFiles();
        });

        function updateA(c, d)
        {
            $('input#agencycode').val(c);
            $('input#agencydescription').val(d);
        }
        function update(c, d, a)
        {
            $('input#formcode').val(c);
            $('input#formdescription').val(d);
            $("select#select-agency").val(a);
        }

        function getDeletedFiles()
        {
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                    type: 'GET',
                    url: '/data/dfiles',
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success:function(data)
                    {   
                        //console.log(data);
                        //$("a.nav-link[href='#form']").click();
                        //$("tr#tr-0605 > td#desc").text(description).animate({color: 'blue'}, 'slow');
                        dftable.clear().draw();
                        for(var i = 0; i < data.length; i++){
                            dftable.row.add([ 
                                        data[i].clientname,data[i].applicableDate,data[i].code, data[i].description, data[i].agency, 
                                        `<center><a title="" aria-describedby="tooltip" href="{{url('/files')}}/`+data[i].locationReference+`" target="_blank" 
                                        data-toggle="tooltip" data-original-title="View" data-placement="top"><img src="/icons/`+data[i].filetype+`" alt="Image" height="32" width="32"></a></center>`
                                ]).draw(false);
                        }
                    },
                    error:function(data)
                    {
                        console.error(data);
                    }
                    });
        }


    </script>
@endsection


