@extends('layouts.app')

@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h4 class="page-title">Manage Tasks</h4> </div>
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <!-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro 2</a> -->       
        <ol class="breadcrumb">

            <li><a href="{{url('home')}}">Dashboard</a></li>
            <li class="active">Manage Tasks</li>
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

    <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="white-box analytics-info">
            <h3 class="box-title text-info"> DUE TODAY </h3>
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
    <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="white-box analytics-info">
            <h3 class="box-title text-danger"> PAST DUE </h3>
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
    <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="white-box analytics-info">
            <h3 class="box-title text-warning"> INCOMING DUE </h3>
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
    <div class="col-lg-6 col-sm-6 col-xs-12">
        <div class="white-box analytics-info">
            <h3 class="box-title text-success"> DONE </h3>
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
<!--/.row -->
@endsection