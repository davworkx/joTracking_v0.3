@extends('layouts.app')

@section('content')

                        <h4 class="page-title">Dashboard</h4> </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       @guest
                        <a href="{{url('/register')}}" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Register</a>
                        <ol class="breadcrumb">
                            <!-- <li><a href="#">Dashboard</a></li> -->
                        </ol>
                        @endguest
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <div class="row">

   <hr><h3>List of Tasks</h3><hr>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 border-info" style="padding: 2px 2px 2px 2px;">
            <div class="card border-info">
                <div class="card-header border-info">Due Today</div>
                <div class="card-body">

                    <table class="table table-sm table-hover">
                        <thead>
                          <th>JO#</th>
                          <th>Client</th>
                          <th>Task Name</th>
                          <th>Date Due</th>
                          <th>State</th>
                        </thead>
                        <tbody>
                          @if(count($duetasks) > 0)
                          @foreach($duetasks as $dtask)
                            <tr>
                              <td>{{$dtask->joid}}</td>
                              <td>{{$dtask->clientname}}</td>
                              <td>{{$dtask->taskname}}</td>
                              <td>{{$dtask->datedue}}</td>
                              <td>{{$dtask->state}}</td>
                            </tr>
                          @endforeach
                          @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 border-danger" style="padding: 2px 2px 2px 2px;">
            <div class="card border-danger">
                <div class="card-header border-danger">Past Due</div>
                <div class="card-body">

                    <table class="table table-sm table-hover">
                        <thead>
                          <th>JO#</th>
                          <th>Client</th>
                          <th>Task Name</th>
                          <th>Date Due</th>
                          <th>State</th>
                        </thead>
                        <tbody>
                          @if(count($tasks) > 0)
                          @foreach($pduetasks as $ptask)
                            <tr>
                              <td>{{$ptask->joid}}</td>
                              <td>{{$ptask->clientname}}</td>
                              <td>{{$ptask->taskname}}</td>
                              <td>{{$ptask->datedue}}</td>
                              <td>{{$ptask->state}}</td>
                            </tr>
                          @endforeach
                          @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <div class="col-sm-12 col-md-6 border-success" style="padding: 2px 2px 2px 2px;">
            <div class="card border-warning">
                <div class="card-header border-warning">Incoming Due</div>
                <div class="card-body">

                    <table class="table table-sm table-hover">
                        <thead>
                          <th>JO#</th>
                          <th>Client</th>
                          <th>Task Name</th>
                          <th>Date Due</th>
                          <th>State</th>
                        </thead>
                        <tbody>
                          @if(count($intasks) > 0)
                          @foreach($intasks as $itask)
                            <tr>
                              <td>{{$itask->joid}}</td>
                              <td>{{$itask->clientname}}</td>
                              <td>{{$itask->taskname}}</td>
                              <td>{{$itask->datedue}}</td>
                              <td>{{$itask->state}}</td>
                            </tr>
                          @endforeach
                          @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 border-secondary" style="padding: 2px 2px 2px 2px;">
            <div class="card border-success">
                <div class="card-header border-success">Done</div>
                <div class="card-body">
                    @if(count($tasks) > 0)
                    <table class="table table-sm table-hover">
                        <thead>
                          <th>JO#</th>
                          <th>Client</th>
                          <th>Task Name</th>
                          <th>Date Due</th>
                          <th>State</th>
                        </thead>
                        <tbody>
                          @foreach($tasks as $task)
                          @if($task->tsid <= 7)
                            <tr>
                              <td>{{$task->joid}}</td>
                              <td>{{$task->clientname}}</td>
                              <td>{{$task->taskname}}</td>
                              <td>{{$task->datedue}}</td>
                              <td>{{$task->state}}</td>
                            </tr>
                          @endif
                          @endforeach
                        </tbody>
                    </table>
                    {{ $tasks->links() }}
                    @endif
                </div>
            </div>
        </div>

@endsection
