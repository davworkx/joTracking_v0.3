@extends('layouts.app')

@section('content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">View Tasks</h4>

                <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tasks</li>
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
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <div class="table-responsive">

            <table id="zero_config" class="table table-striped table-hover table-bordered">
                <!-- $alltasks -->

                <thead>
                    <tr>
                        <th>JO#</th>
                        <th>Client Name</th>
                        <th>Task Name</th>
                        <th>Date Due</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th>Days Left</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($alltasks) > 0)
                    @foreach($alltasks as $task)
                    <tr>
                        <td>{{$task->joid}}</td>
                        <td>{{$task->clientname}}</td>
                        <td>{{$task->taskname}}</td>
                        <td>{{$task->datedue}}</td>
                        <td>{{$task->state}}</td>
                        <td>{{$task->assigned}}</td>
                        
                        <?php
                        $date1=date_create(date("Y-m-d"));
                        $date2=date_create($task->datedue);
                        $diff=date_diff($date1,$date2);
                        $rdate = $diff->format("%R%a");

                        if((int)$rdate === 0){
                            //due today
                            echo '<td><span class="badge badge-primary">due today</span></td>';
                        }else if($rdate > 0){
                            //incoming due
                            echo '<td>'. $rdate . ' days<span class="badge badge-warning">incoming due</span></td>';
                        }else{
                            //past due
                            echo '<td>'. $rdate . ' days<span class="badge badge-danger">past due </span> </td>';
                        }
                        ?>

                    </tr>
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




    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

@endsection