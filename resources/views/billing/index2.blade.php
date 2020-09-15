@extends('layouts.app')

@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h4 class="page-title">Manage Billing</h4> </div>
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <!-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro 2</a> -->       
        <ol class="breadcrumb">
<!-- 
            <li> 

            
            <form class="form-inline my-2 my-lg-0" action="{{url('/billing/search')}}" method="post">
              
                {{ csrf_field() }}
                <input class="form-control mr-sm-2" type="search" name="josearchkey" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </li> -->

            <li><a href="{{url('home')}}">Dashboard</a></li>
            <li class="active">Manage Job Orders</li>
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
@if(session('successb'))
  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success! </strong>{{session('successb')}}
  </div>
  @endif
  @if(count($errors) > 0)
  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong>
    {{$errors->first('ornumber')}}<br>
    {{$errors->first('paymentdate')}}<br>
    {{$errors->first('amount')}}<br>
  </div>
  @endif
  <div class="col-sm-12">
        <div class="white-box analytics-info">
            <!-- <h3 class="box-title">List of Job Orders</h3> -->
            <table class="table table-sm table-hover table-striped">
                    <thead>
                      <tr>
                        <th scope="col">JO#</th>
                        <th scope="col">Company/Client Name</th>
                        <th scope="col">Amount Due</th>
                        <th scope="col">Amount Paid</th>
                        <th scope="col">OR Number</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($billings) > 0)
                         @foreach($billings as $bill)
                         <tr id="tr">
                           <td>{{$bill->id}}</td>
                           <td>{{$bill->clientname}}</td>
                           <td align="right">{{number_format($bill->amount, 2, '.', ',')}}</td>
                           <td align="right">{{number_format($bill->paidamount, 2, '.', ',')}}</td>
                           <td>{{$bill->ornumber}}</td>
                           <td align="right">Php {{ number_format(($bill->amount - $bill->paidamount), 2, '.', ',') }}
                           </td>
                           <td align="center">
                           @if(($bill->amount - $bill->paidamount) == 0)

                           @else
                           <button class="btn btn-success" onClick="addpayment('{{$bill->id}}','{{ ($bill->amount - $bill->paidamount) }}')" data-toggle="modal" data-target="#paymentModal" rel="tooltip" title="Add Payment" type="button"><span class="fa fa-money"></span></button>
                           @endif
                           <a href="{{url('billing/jid')}}/{{$bill->id}}" target="_blank">
                           <button class="btn btn-info" onClick="" data-toggle="modal" data-target="" rel="tooltip" title="View Transaction" type="button"><span class="fa fa-print"></span></button>
                           </a>
                          </td>
                          </tr>
                         @endforeach
                         @else
                         <tr>
                           <td colspan="7">NO Client's Billing Found.</td>
                         </tr>
                         @endif
                    </tbody>
                  </table>
                  {{ $billings->links() }}



      </div>
    </div>
</div>
<!--/.row -->

<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Payment to JO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="paymentForm" action="{{url('/billing/addpayment')}}" method="post">
          {{ csrf_field() }}
          <input type="text" name="joid" id="joid" value="" hidden>
          <div class="form-group col-sm-12">


            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">OR Number:&nbsp &nbsp</span>
              </div>
              <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="ornumber" name="ornumber" required autofocus>
            </div>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Amount (Php):</span>
              </div>
              <input type="number" step="0.01" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="amount" name="amount" required>
            </div>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Payment Date:</span>
              </div>
              <input type="date" class="form-control" value="{{date('Y-m-d')}}" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="paymentdate" required>
            </div>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Remarks:</span>
              </div>
              <input type="text" class="form-control" aria-label="Small" value="settle payment" aria-describedby="inputGroup-sizing-sm" name="remarks">
            </div>

          </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" onclick="form_submit()" class="btn btn-primary btn-sm">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->
@endsection
<script type="text/javascript">
function form_submit() {
  var orn = document.getElementById('ornumber').value;
  if(orn == null || orn == ""){
    alert('Pleaser enter OR Number');
  }else{
    var txt;
    var r = confirm("Please confirm your entries.");
    if (r == true) {
        document.getElementById("paymentForm").submit();
    } else {
        alert("You pressed Cancel!");
    }
  }

}
function addpayment(j,a)
{
  document.getElementById('joid').value = j.toString();
  document.getElementById('amount').value = a.toString();
  //alert(j+'   '+a);
}
</script>
