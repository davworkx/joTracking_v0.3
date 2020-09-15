@extends('layouts.app')

@section('content')

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h4 class="page-title">Dashboard</h4>
                            <div class="ml-auto text-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                <div class="row">
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3">
                        <a href="{{url('home')}}">
                            <div class="card card-hover">
                                <div class="box bg-cyan text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                    <h6 class="text-white">Dashboard</h6>
                                </div>
                            </div>
                            </a>
                        </div>

                         <!-- Column -->
                         <div class="col-md-6 col-lg-3">
                         <a href="{{url('jo')}}">
                            <div class="card card-hover">
                                <div class="box bg-warning text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                                    <h6 class="text-white">Job Orders</h6>
                                </div>
                            </div>
                        </a>
                        </div>                        
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3">
                        <a href="{{url('clientsprofiling')}}">
                            <div class="card card-hover">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-account-box-outline"></i></h1>
                                    <h6 class="text-white"> Clients Profiling</h6>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- Column -->
                        <div class="col-md-6 col-lg-3">
                        <a href="{{url('messenger')}}">
                            <div class="card card-hover">
                                <div class="box bg-danger text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-message"></i></h1>
                                    <h6 class="text-white"> Messages <span class="badge badge-light">{{$newmsgcount}}</span>  </h6>
                                </div>
                            </div>
                            </a>
                        </div>
                    
                        <?php $str_mail = explode("@", Auth::user()->email); ?>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                    <!-- <a href="{{url('webmail')}}" > -->
                    <a href="https://webmail1.hostinger.ph/?_task=login&_user={{$str_mail[0]}}@opamin.com" target="_blank">
                        <div class="card card-hover">
                            <div class="box bg-primary text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-email"></i></h1>
                                <h6 class="text-white">Opamin Webmail</h6>
                            </div>
                        </div>
                    </a>
                    </div>
                    <!-- Column -->

                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                    <a href="https://{{$str_mail[1]}}" target="_blank">
                        <div class="card card-hover">
                            <div class="box bg-secondary text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-email-variant"></i></h1>
                                <h6 class="text-white">{{$str_mail[1]}}</h6>
                            </div>
                        </div>
                    </a>
                    </div>
                    <!-- Column -->

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                             <!-- card -->
                             <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title m-b-0">My Progress</h4>
                                    <div class="m-t-20">
                                        <div class="d-flex no-block align-items-center">
                                            <span>81% Clicks</span>
                                            <div class="ml-auto">
                                                <span>125</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 81%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex no-block align-items-center m-t-25">
                                            <span>72% Uniquie Clicks</span>
                                            <div class="ml-auto">
                                                <span>120</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 72%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex no-block align-items-center m-t-25">
                                            <span>53% Impressions</span>
                                            <div class="ml-auto">
                                                <span>785</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 53%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex no-block align-items-center m-t-25">
                                            <span>3% Online Users</span>
                                            <div class="ml-auto">
                                                <span>8</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 3%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                             <!-- card -->
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title m-b-0">Overall Progress</h4>
                                    <div class="m-t-20">
                                        <div class="d-flex no-block align-items-center">
                                            <span>81% Clicks</span>
                                            <div class="ml-auto">
                                                <span>125</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 81%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex no-block align-items-center m-t-25">
                                            <span>72% Uniquie Clicks</span>
                                            <div class="ml-auto">
                                                <span>120</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 72%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex no-block align-items-center m-t-25">
                                            <span>53% Impressions</span>
                                            <div class="ml-auto">
                                                <span>785</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 53%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="d-flex no-block align-items-center m-t-25">
                                            <span>3% Online Users</span>
                                            <div class="ml-auto">
                                                <span>8</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 3%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card new -->
                            <!-- <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title m-b-0">News Updates</h4>
                                </div>
                                <ul class="list-style-none">
                                    <li class="d-flex no-block card-body">
                                        <i class="fa fa-check-circle w-30px m-t-5"></i>
                                        <div>
                                            <a href="#" class="m-b-0 font-medium p-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                            <span class="text-muted">dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="tetx-right">
                                                <h5 class="text-muted m-b-0">20</h5>
                                                <span class="text-muted font-16">Jan</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex no-block card-body border-top">
                                        <i class="fa fa-gift w-30px m-t-5"></i>
                                        <div>
                                            <a href="#" class="m-b-0 font-medium p-0">Congratulation Maruti, Happy Birthday</a>
                                            <span class="text-muted">many many happy returns of the day</span>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="tetx-right">
                                                <h5 class="text-muted m-b-0">11</h5>
                                                <span class="text-muted font-16">Jan</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex no-block card-body border-top">
                                        <i class="fa fa-plus w-30px m-t-5"></i>
                                        <div>
                                            <a href="#" class="m-b-0 font-medium p-0">Maruti is a Responsive Admin theme</a>
                                            <span class="text-muted">But already everything was solved. It will ...</span>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="tetx-right">
                                                <h5 class="text-muted m-b-0">19</h5>
                                                <span class="text-muted font-16">Jan</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex no-block card-body border-top">
                                        <i class="fa fa-leaf w-30px m-t-5"></i>
                                        <div>
                                            <a href="#" class="m-b-0 font-medium p-0">Envato approved Maruti Admin template</a>
                                            <span class="text-muted">i am very happy to approved by TF</span>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="tetx-right">
                                                <h5 class="text-muted m-b-0">20</h5>
                                                <span class="text-muted font-16">Jan</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex no-block card-body border-top">
                                        <i class="fa fa-question-circle w-30px m-t-5"></i>
                                        <div>
                                            <a href="#" class="m-b-0 font-medium p-0"> I am alwayse here if you have any question</a>
                                            <span class="text-muted">we glad that you choose our template</span>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="tetx-right">
                                                <h5 class="text-muted m-b-0">15</h5>
                                                <span class="text-muted font-16">Jan</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->
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