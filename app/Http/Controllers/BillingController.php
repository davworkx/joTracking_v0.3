<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Billing;
use App\Joborder;
class BillingController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(Request $request)
  {
    if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
      $billings = DB::table('vwbillings')->paginate(15);
    }else{
      $billings = DB::table('vwbillings')->where([ 'assignedto'=>Auth::user()->id ])->paginate(15);
    }
    return view('billing.index')->with('billings',$billings);
  }
  public function addpayment(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'ornumber' => 'required',
        'amount' => 'required',
        'paymentdate' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('/billing')
                    ->withErrors($validator)
                    ->withInput();
    }

    $bill = new Billing;
    $bill->ornumber = $request->input('ornumber');
    $bill->joid = $request->input('joid');
    $bill->amount = $request->input('amount');
    $bill->remarks = $request->input('remarks');
    $bill->encodedby = Auth::user()->id;
    $bill->paymentdate = $request->input('paymentdate');
    $bill->save();

    return redirect('/billing')->with('successb','Payment for JO#'.$request->input('joid').' has been saved.');
  }
  public function getJOHistory(Request $request)
  {
    $joid = $request->joid;
    $jos = DB::table('vwjosdetails')
                ->where([['id','=',$joid]])
                ->get();
    $tasks = DB::table('vwtasks')
                ->where([['joid','=',$joid]])
                ->get();
    $billings = DB::table('billings')
                ->where([['joid','=',$joid]])
                ->get();

    return view('billing.history')->with(['jos'=>$jos,'tasks'=>$tasks,'billings'=>$billings]);
  }
  public function viewbilling(Request $request){
    if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
      $billings = DB::table('vwbillings')->where(['cid'=>$request->cid])->paginate(15);
    }else{
      $billings = DB::table('vwbillings')->where(['cid'=>$request->cid])->where(['assignedto'=>Auth::user()->id])->paginate(15);
    }
    return view('billing.index')->with('billings',$billings);
  }
  public function search(Request $request)
  {
    if($request->user()->hasAnyRole(['superadmin','admin'])){
      $billings = DB::table('vwbillings')->where('clientname', 'like', "%$request->bsearchkey%")->paginate(20);
    }else{
      $billings = DB::table('vwbillings')->where('clientname', 'like', "%$request->bsearchkey%")->where(['assignedto'=>Auth::user()->id])->paginate(20);
    }
    return view('billing.index')->with('billings',$billings);
  }
}
