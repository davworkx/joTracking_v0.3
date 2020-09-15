<html>
<head>
<style>
body {font-family: sans-serif;
  font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
  border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
  border-left: 0.1mm solid #000000;
  border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
  text-align: center;
  border: 0.1mm solid #000000;
  font-variant: small-caps;
}
.items td.blanktotal {
  background-color: #EEEEEE;
  border: 0.1mm solid #000000;
  background-color: #FFFFFF;
  border: 0mm none #000000;
  border-top: 0.1mm solid #000000;
  border-right: 0.1mm solid #000000;
}
.items td.totals {
  text-align: right;
  border: 0.1mm solid #000000;
}
.items td.cost {
  text-align: "." center;
}
</style>
</head>
<body>
<hr>
<h2>Into-Opamin CPAs & Co.</h2>
<p>NHA, Buhangin, Davao City, Philippines</p>
<hr>
<h4>Job Order (JO) Details</h4>
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
  @foreach($jos as $jo)
  <tr>
    <td width="10%">CN#</td>
    <td width="10%">{{$jo->id}}</td>
    <td width="15%">Client Name:</td>
    <td width="60%">{{$jo->clientname}}</td>
  </tr>
  @endforeach
</thead>
<tbody>
</tbody>
</table>
<h4>Tasks</h4>
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
  <tr>
    <td width="5%">#</td>
    <td width="35%">Task Name</td>
    <td width="20%">Lead Time (Days)</td>
    <td width="15%">Amount (Php)</td>
    <td width="25%">Status</td>
  </tr>
</thead>
<tbody>
@php $i=1; $total = 0; $due=0; @endphp
  @foreach($tasks as $task)
    <tr>
      @php $due += $task->amount; @endphp
      <td>{{$i++}}</td>
      <td>{{$task->taskname}}</td>
      <td>{{$task->leadtime}}</td>
      <td>{{number_format($task->amount, 2, '.', ',')}}</td>
      <td>{{$task->state}}</td>
    </tr>
  @endforeach
</tbody>
</table>
<h4>Payment Details</h4>
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
  <tr>
    <td width="10%">#</td>
    <td width="20%">OR Number</td>
    <td width="35%">Amount Paid</td>
    <td width="35%">Date</td>
  </tr>
</thead>
<tbody>
@php $i=1; @endphp
  @foreach($billings as $bill)
    <tr>
      @php $total += $bill->amount; @endphp
      <td width="5%">{{$i++}}</td>
      <td>{{$bill->ornumber}}</td>
      <td>{{number_format($bill->amount, 2, '.', ',')}}</td>
      <td>{{$bill->paymentdate}}</td>
    </tr>
  @endforeach
</tbody>
</table>
<h3>Balance (Php):{{number_format(($due - $total), 2, '.', ',')}}</h3>
</body>
</html>
