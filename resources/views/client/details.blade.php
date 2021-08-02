@extends('layouts.app')

@section('content')

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h4 class="page-title">Clients Profile</h4> 
                           &nbsp &nbsp <button type="button" class="btn btn-primary btn-sm" id="editBtn">
                           <i class="fas fa-edit"></i> Edit Info
                            </button> &nbsp
                            <div class="ml-auto text-right">

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
                <div class="row">
                <div class="col-md-6">
                <div class="card">
                @if(count($clients) > 0)
                    @foreach($clients as $c)
                  <form class="form-horizontal" id="clientProfile">
                      <div class="card-body">
                          <h4 class="card-title"></h4>
                          <div class="form-group row">
                              <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                              <div class="col-sm-9">
                                  <input type="text" id="cid" name="cid" value="{{$c->id}}" hidden>
                                  <input type="text" class="form-control" id="clientname" name="clientname" value="{{$c->clientname}}" disabled>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="fname" class="col-sm-3 text-right control-label col-form-label">Other Info</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" id="branch" name="branch" value="{{$c->branch}}" disabled>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="lname" class="col-sm-3 text-right control-label col-form-label">Location</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" id="busadd" name="busadd" value="{{$c->busadd}}" disabled>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="email1" class="col-sm-3 text-right control-label col-form-label">Business ID</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" id="businessID" name="businessID" value="{{$c->businessID}}" disabled>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" id="contactno" name="contactno" value="{{$c->contactno}}" disabled>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Email Address</label>
                              <div class="col-sm-9">
                                  <input type="email" class="form-control" id="email" name="email" value="{{$c->email}}" disabled>
                              </div>
                          </div>
                      </div>
                      <!-- <div class="border-top">
                          <div class="card-body">
                              <button type="button" class="btn btn-primary">Update</button>
                          </div>
                      </div> -->
                  </form>
              </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                  <form class="form-horizontal">
                      <div class="card-body">
                          <h4 class="card-title"></h4>
                          <div class="form-group row">
                              <label for="lname" class="col-sm-3 text-right control-label col-form-label">BIR TIN</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" id="tin" name="tin" value="{{$c->tin}}" disabled>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="fname" class="col-sm-3 text-right control-label col-form-label">RDO</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" id="rdo" name="rdo" value="{{$c->RDO}}"  disabled>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="lname" class="col-sm-3 text-right control-label col-form-label">Taxpayer Class.</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" id="tax_class" name="tax_class" value="{{$c->tax_class}}" disabled>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tax Type</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" id="tax_type" name="tax_type" value="{{$c->tax_type}}" disabled>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Date Registered</label>
                              <div class="col-sm-9">
                                  <input type="date" class="form-control" id="date_registered" name="date_registered" value="{{$c->date_registered}}" disabled>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contact Person</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" id="cperson" name="cperson" value="{{$c->cperson}}" disabled>
                              </div>
                          </div>
                          <!-- <div class="form-group row">
                              <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Message</label>
                              <div class="col-sm-9">
                                  <input name="vdn_number" type="hidden" id="vdn_number"  class="form-control input-large custom-select" required=""  />
                              </div>
                          </div> -->
                      </div>
                      <!-- <div class="border-top">
                          <div class="card-body">
                              <button type="button" class="btn btn-primary">Update</button>
                          </div>
                      </div> -->
                  </form>
                  @endforeach
                @endif
              </div>
            </div>

            <div class="col-md-12" id="formUpload">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data" id="fileUploadForm">
                      @csrf
                        <div class="form-group row">
                              <label for="lname" class="col-sm-3 text-right control-label col-form-label">Applicable Date</label>
                              <div class="col-sm-9 col-md-6 col-lg-3">
                                  <input type="date" class="form-control" id="applicableDate" name="applicableDate" value="" >
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Form Type</label>
                              <div class="col-md-9" id="select2options">
                                        <select class="select2 form-control custom-select" id="formTypeID" name="formTypeID" style="width: 100%; height:36px;">
                                            <option>Select</option>
                                            <!-- <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                            <optgroup label="Pacific Time Zone">
                                                <option value="CA">California</option>
                                                <option value="NV">Nevada</option>
                                                <option value="OR">Oregon</option>
                                                <option value="WA">Washington</option>
                                            </optgroup> -->
                                        </select>
                                    </div>
                          </div>
                          <div class="form-group row">
                              <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Select File</label>
                              <div class="col-sm-9">
                                  <input type="file" class="form-control" id="file" name="file" value="Upload" >
                              </div>
                          </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                            <center>
                                <input type="button" name="upload" value="Upload" id="btnFileUpload" class="btn btn-success" />
                            </center>
                            </div>
                        </div>

                    </form>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow=""
                      aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        0%
                      </div>
                    </div>
                    <br />
                    <div id="success">

                    </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body"><h5 class="card-title">Files</h5>
                        <!-- <h5 class="card-title">Files &nbsp  <button type="button" class="btn btn-primary btn-sm" id="uploadFile" data-toggle="modal" data-target="#addFileModal" >
                           <i class="fas fa-file-alt"></i>&nbsp Upload</button> </h5> -->
                        <table id="zero_config" class="table table-striped table-bordered">
                            
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Form Code</th>
                                    <th>Form Description</th>
                                    <th>Agency</th>
                                    <th>Applicable Date</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($files) > 0)
                                    @foreach($files as $file)
                                    <tr id="tr{{$file->id}}">
                                        <td>{{$file->id}}</td>
                                        <td>{{$file->formCode}}</td>
                                        <td>{{$file->formDescription}}</td>
                                        <td>{{$file->agencies}}</td>
                                        <td>{{$file->applicableDate}}</td>
                                        <td><center><a title="" aria-describedby="tooltip" href="{{url('/files')}}/{{$file->locationReference}}" target="_blank" 
                                        data-toggle="tooltip" data-original-title="View" data-placement="top"><img src="/icons/{{$file->filetype}}" alt="Image" height="32" width="32"></a></center></td>
                                        <td><center>
                                            <a title="" aria-describedby="tooltip" href="#" data-toggle="tooltip" data-original-title="Share" data-placement="top">
                                            <i class="mdi mdi-share-variant" height="32" width="32"></i>
                                            </a>
                                            <a title="" href="javascript:void(0)" data-toggle="tooltip" data-id="{{$file->id}}" data-original-title="Delete" data-placement="top" >
                                            <i class="mdi mdi-close" height="32" width="32"></i>
                                            </a></center>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                @endif

                            
                        </table>
                        </div>
                    </div>
                    </div>
                </div>


<!-- Modal -->
<div class="modal fade" id="addFileModal" tabindex="-1" role="dialog" aria-labelledby="newClientModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-3" for="disabledTextInput">Applicable Date</label>
                <div class="col-md-9">
                    <!-- <input type="date" id="applicableDate" class="form-control" placeholder="Applicable Date" required> -->
                    <input type="text" id="applicableDate" class="form-control" placeholder="mm/dd/yyyy" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 m-t-15">Form Type</label>
                <div class="col-md-9">
                    <select class="select2 form-control custom-select" id="formType" style="width: 100%; height:36px;">
                            
                    </select>
                </div>
            </div>

        </div>
        <div class="border-top">
            <div class="card-body">
                <center><button type="submit" class="btn btn-primary" id="fileuploadsubmit">Save</button></center>
            </div>
        </div>
    </div>
    </div>
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

<!-- <script src="{{url('../../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{url('../../dist/js/pages/mask/mask.init.js')}}"></script> -->
<script src="{{url('../../assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{url('../../assets/libs/select2/dist/js/select2.min.js')}}"></script>
<!-- <script src="{{url('../../assets/libs/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
<script src="{{url('../../assets/libs/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
<script src="{{url('../../assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
<script src="{{url('../../assets/libs/jquery-minicolors/jquery.minicolors.min.js')}}"></script>
<script src="{{url('../../assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{url('../../assets/libs/quill/dist/quill.min.js')}}"></script> -->


<script src="{{url('../../assets/libs/quill/dist/quill.min.js')}}"></script>



<script>
let isSaved = false;
// console.log($( "#cid" ).val());
// var isUpdate = false;
// var areYouReallySure = false;

$(".select2").select2();
$(document).ready(function() {

    $(window).on('beforeunload',function(e){
        
        e.preventDefault();
        if(isSaved == true)
        {
            delete e['returnValue'];
        }
        else{
            e.returnValue = '';
        }
    });
    
    $('#formTypeID').find('option').remove();
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
    type: 'POST',
    url: '/getformlist',
    data: {
        '_token': $('input[name=_token]').val(),
    },
    success: function(data){
        //console.log("Data." , data.length);
        for(var i = 0; i < data.length; i++){
            $("#formTypeID").append('<option value="'+data[i].id+'">'+data[i].code + ' '+ data[i].description +'</option>');
        }
        //isFormLoaded = true;
    },
    error:function(data)
    {
        console.log(data);
        //isFormLoaded = false;
    }
    });

    //     //***********************************//
    // // For select 2
    // //***********************************//

    

    // $(".select2").select2({
    //     placeholder: 'Select a Form Type'
    // });
    // $('select:not(.normal)').each(function () {
    //     $(this).select2({
    //         dropdownParent: $(this).parent()
    //     });
    // });
    /****************************************
     *       Basic Table                   *
     ****************************************/

    $('#zero_config').DataTable();

        var isEdit = false;
        $("#editBtn").click(function(){
            isSaved = false;
            if(isEdit){
                $("#editBtn").html('<i class="fas fa-edit"></i> Edit Info');
                $( "#clientname" ).prop( "disabled", isEdit );
                $( "#branch" ).prop( "disabled", isEdit );
                $( "#busadd" ).prop( "disabled", isEdit );
                $( "#businessID" ).prop( "disabled", isEdit );
                $( "#contactno" ).prop( "disabled", isEdit );
                $( "#email" ).prop( "disabled", isEdit );
                $( "#tin" ).prop( "disabled", isEdit );
                $( "#rdo" ).prop( "disabled", isEdit );
                $( "#tax_class" ).prop( "disabled", isEdit );
                $( "#tax_type" ).prop( "disabled", isEdit );
                $( "#date_registered" ).prop( "disabled", isEdit );
                $( "#cperson" ).prop( "disabled", isEdit );
                // console.log(isEdit, $( "#clientname" ).val() );
                var cid = $( "#cid" ).val();
                var cname = $( "#clientname" ).val();
                var branch = $( "#branch" ).val();
                var busadd = $( "#busadd" ).val();
                var businessID = $( "#businessID" ).val();
                var contactno = $( "#contactno" ).val();
                var email  = $( "#email" ).val();
                var tin = $( "#tin" ).val();
                var rdo = $( "#rdo" ).val();
                var tax_class  = $( "#tax_class" ).val();
                var tax_type = $( "#tax_type" ).val();
                var date_r = $( "#date_registered" ).val();
                var cperson = $( "#cperson" ).val();

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                type: 'POST',
                url: '/clients/update',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'cid' : cid,
                    'cname' : cname,
                    'branch' : branch,
                    'busadd' : busadd,
                    'businessID' : businessID,
                    'contactno' : contactno,
                    'email' : email,
                    'tin' : tin,
                    'rdo' : rdo,
                    'tax_class' : tax_class,
                    'tax_type' : tax_type,
                    'date_r' : date_r,
                    'cperson' : cperson
                },
                success: function(data){
                    console.log("Data saved." , data);
                    isSaved = true;
                },
                error:function(data)
                {
                    console.log(data);
                    isSaved = false;
                }
                });

                isEdit = false;

            }else{
                $("#editBtn").html('<i class="fas fa-save"></i> Save and Exit Edit Mode');
                $( "#clientname" ).prop( "disabled", isEdit );
                $( "#branch" ).prop( "disabled", isEdit );
                $( "#busadd" ).prop( "disabled", isEdit );
                $( "#businessID" ).prop( "disabled", isEdit );
                $( "#contactno" ).prop( "disabled", isEdit );
                $( "#email" ).prop( "disabled", isEdit );
                $( "#tin" ).prop( "disabled", isEdit );
                $( "#rdo" ).prop( "disabled", isEdit );
                $( "#tax_class" ).prop( "disabled", isEdit );
                $( "#tax_type" ).prop( "disabled", isEdit );
                $( "#date_registered" ).prop( "disabled", isEdit );
                $( "#cperson" ).prop( "disabled", isEdit );
                // console.log(isEdit, $( "#branch" ).val() );
                isEdit = true;

            }
        }); 

        $('#fileuploadsubmit').click(function() {
            var appDate = $('#applicableDate').val();
            var formType = $( "#formType option:selected" ).val();
            var filename = $('#filename').val();
            
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            type: 'POST',
            url: '/clients/update',
            data: {
                '_token': $('input[name=_token]').val(),
                'filename' : filename
            },
            success: function(data){
                console.log("Data saved." , data);
            },
            error:function(data)
            {
                console.log(data);
            }
            });


            alert(formType);
        });

        var table = $('#zero_config').DataTable();

        $('#btnFileUpload').click(function (event) {
            //stop submit the form, we will post it manually.
            event.preventDefault();

            // Get form
            var form = $('#fileUploadForm')[0];

            // Create an FormData object 
            var data = new FormData(form);
            data.append("cid", $("#cid").val());

            $("#btnFileUpload").prop("disabled", true);

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            type: 'POST',
            url: '/client/upload',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend:function(){
                $('#success').empty();
                $('.progress-bar').css('width', '10%');
            },
            uploadProgress:function(event, position, total, percentComplete)
            {
                $('.progress-bar').text(percentComplete + '%');
                $('.progress-bar').css('width', percentComplete + '%');
            },
            success:function(data)
            {   
                console.log(data);
                if(data.errors)
                {
                    $('.progress-bar').text('0%');
                    $('.progress-bar').css('width', '0%');
                    $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
                }
                if(data.success)
                {
                    let client = data.responseJSON[0];
                    $('.progress-bar').text('Uploaded');
                    $('.progress-bar').css('width', '100%');
                    $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
                    // $('#success').append(data.image);
                    $('#fileUploadForm')[0].reset();

                    //$('#zero_config table tbody').append('<tr><td>....</td><td>....</td><td>....</td><td>....</td><td>....</td><td>....</td><td>....</td></tr>');
                    
                    table.row.add([ client.id,
                                    client.formCode,
                                    client.formDescription, 
                                    client.agencies,
                                    client.applicableDate,
                                    `<center><a title="" aria-describedby="tooltip" href="{{url('/files')}}/`+client.locationReference+`" target="_blank" 
                                        data-toggle="tooltip" data-original-title="View" data-placement="top"><img src="/icons/`+client.filetype+`" alt="Image" height="32" width="32"></a></center>`
                                   ,
                                   `<center>
                                    <a title="" aria-describedby="tooltip" href="#" data-toggle="tooltip" data-original-title="Share" data-placement="top">
                                    <i class="mdi mdi-share-variant" height="32" width="32"></i>
                                    </a>
                                    <a title="" href="javascript:void(0)" data-toggle="tooltip"  data-original-title="Delete" data-placement="top" >
                                    <i class="mdi mdi-close" height="32" width="32"></i>
                                    </a></center>`
                                ]).draw(false);
                
                }
                $("#btnFileUpload").prop("disabled", false);
                //console.log(data);
                //setTimeout(function(){ $('.progress-bar').css('width', '0%'); }, 3000);
            },
            error:function(data)
            {
                //console.log(data);
                var msg = data.status === 413 ? 'Error: File too large.':'';
                $('.progress-bar').text('0%');
                $('.progress-bar').css('width', '0%');
                $('#success').html('<span class="text-danger"><b>'+msg+'</b></span>');
                $("#btnFileUpload").prop("disabled", false);
            }
            });
        });
 
        $('#zero_config tbody').on( 'click', 'i.mdi.mdi-close', function () {


            var fid =  $(this).parents('tr').find('td').first().text();
            var isDelete = confirm('Are you sure that you want to DELETE the file?');

            if(isDelete === true){
                table.row( $(this).parents('tr') ).remove().draw();
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                type: 'POST',
                url: '/clients/file/delete',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fid' : fid
                },
                success:function(data)
                {   
                    console.log('Item '+fid+' has been deleted.', data);
                },
                error:function(data)
                {
                    alert('Error in deleting.');
                }
                });
            }else{
                alert('No changes made on the file.');
            }
        
        } );


});
/*datwpicker*/
// $('.mydatepicker').datepicker();
// $('#applicabledate').datepicker({
//     autoclose: true,
//     todayHighlight: true
// });


</script>

@endsection

