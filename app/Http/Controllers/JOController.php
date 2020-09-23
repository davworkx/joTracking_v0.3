<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Role;
use App\Task;
use App\Client;
use App\User;
use App\Joborder;
use App\Tasktracking;

class JOController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  // public function index(Request $request)
  // {
  //   $filter = $request->cmd;
  //   //dd($filter);
  //   //$user->hasAnyRole($role->name)
  //   if(strcmp($filter,"done") === 0){ //ok 
  //       if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
  //         $jos = DB::table('vwjosdetails')->where('s','done')->paginate(15);
  //         $admin = [];
  //         $admin['admin'] = 'admin';
  //         return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //       }else{
  //         $admin = [];
  //         $jos = DB::table('vwjosdetails')->where(['assignedto'=>Auth::user()->id,'s'=>'done'])->paginate(15);
  //         return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //       }
  //   }else if(strcmp($filter,"ongoing") === 0){
  //       if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
  //         $jos = DB::table('vwjosdetails')->where('s','NO')->paginate(15);
  //         $admin = [];
  //         $admin['admin'] = 'admin';
  //         return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //       }else{
  //         $admin = [];
  //         $jos = DB::table('vwjosdetails')->where(['assignedto'=>Auth::user()->id,'s'=>'done'])->paginate(15);
  //         return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //       }
  //   }else if(strcmp($filter,"pastdue") === 0){
  //       if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
  //         $jos = DB::table('vwjosdetails')->where([['datedue','<',date("Y-m-d")], [DB::raw('sumofstatus'), '>', DB::raw('jcount')], ['s', '<>', 'done']])->paginate(15);
  //         $admin = [];
  //         $admin['admin'] = 'admin';
  //         return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //       }else{
  //         $admin = [];
  //         $jos = DB::table('vwjosdetails')->where([['assignedto'=>Auth::user()->id],['datedue','<',date("Y-m-d")], [DB::raw('sumofstatus'), '>', DB::raw('jcount')], ['s', '<>', 'done']])->paginate(15);
  //         return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //       }
  //   }else if(strcmp($filter,"p30") === 0){
  //       if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
  //         $jos = DB::table('vwjosdetails')->where([['days','<=','30'], ['s', '<>', 'done']])->paginate(15);
  //         $admin = [];
  //         $admin['admin'] = 'admin';
  //         return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //       }else{
  //         $admin = [];
  //         $jos = DB::table('vwjosdetails')->where([['assignedto'=>Auth::user()->id],['days','<','30'], ['s', '<>', 'done']])->paginate(15);
  //         return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //       }
  //   }else if(strcmp($filter,"p60") === 0){
  //     if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
  //       $jos = DB::table('vwjosdetails')->where([['days','>','30'], ['days','<=','60'], ['s', '<>', 'done']])->paginate(15);
  //       $admin = [];
  //       $admin['admin'] = 'admin';
  //       return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //     }else{
  //       $admin = [];
  //       $jos = DB::table('vwjosdetails')->where([['assignedto'=>Auth::user()->id],['days','>','30'], ['days','<=','60'], ['s', '<>', 'done']])->paginate(15);
  //       return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //     }
  //   }else if(strcmp($filter,"p90") === 0){
  //     if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
  //       $jos = DB::table('vwjosdetails')->where([['days','>','60'], ['days','<=','89'], ['s', '<>', 'done']])->paginate(15);
  //       $admin = [];
  //       $admin['admin'] = 'admin';
  //       return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //     }else{
  //       $admin = [];
  //       $jos = DB::table('vwjosdetails')->where([['assignedto'=>Auth::user()->id],['days','>','60'], ['days','<=','89'], ['s', '<>', 'done']])->paginate(15);
  //       return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //     }
  //   }else if(strcmp($filter,"p90plus") === 0){
  //     if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
  //       $jos = DB::table('vwjosdetails')->where([['days','>','90'],  ['s', '<>', 'done']])->paginate(15);
  //       $admin = [];
  //       $admin['admin'] = 'admin';
  //       return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //     }else{
  //       $admin = [];
  //       $jos = DB::table('vwjosdetails')->where([['assignedto'=>Auth::user()->id],['days','>','90'], ['s', '<>', 'done']])->paginate(15);
  //       return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //     }
  //   }else if(strcmp($filter,"create111") === 0){
  //     $admin = [];
  //     $clients = Client::orderBy('clientname', 'ASC')->get();
  //     $users = User::orderBy('name', 'ASC')->get();
  
  //     if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
  //        $admin['admin'] = 'admin';
  //     }
  
  //     return view('jo.create')->with(['clients'=>$clients,'users'=>$users, 'admin'=>$admin]);
  //   }else{
  //     if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
  //       $jos = DB::table('vwjosdetails')->get(); //->paginate(15);
  //       $admin = [];
  //       $admin['admin'] = 'admin';
  //       //dd($jos);
  //       return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //     }else{
  //       $admin = [];
  //       $jos = DB::table('vwjosdetails')->where(['assignedto'=>Auth::user()->id])->get(); //->paginate(15);
  //       return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
  //     }
  //   }

  // }
  public function index(Request $request)
  {
    $filter = $request->cmd;
    //dd($filter);
    //$user->hasAnyRole($role->name)
    if(strcmp($filter,"done") === 0){ //ok 
        if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
          $jos = DB::table('vwjosdetails')->where('s','done')->paginate(15);
          $admin = [];
          $admin['admin'] = 'admin';
          return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
        }else{
          $admin = [];
          $jos = DB::table('vwjosdetails')->where(['assignedto'=>Auth::user()->id,'s'=>'done'])->paginate(15);
          return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
        }
    }else if(strcmp($filter,"ongoing") === 0){
        if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
          $jos = DB::table('vwjosdetails')->where('s','NO')->paginate(15);
          $admin = [];
          $admin['admin'] = 'admin';
          return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
        }else{
          $admin = [];
          $jos = DB::table('vwjosdetails')->where(['assignedto'=>Auth::user()->id,'s'=>'done'])->paginate(15);
          return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
        }
    }else{
      if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
        $jos = DB::table('vwjosdetails')->get(); //->paginate(15);
        $admin = [];
        $admin['admin'] = 'admin';
        //dd($jos);
        return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
      }else{
        $admin = [];
        $jos = DB::table('vwjosdetails')->where(['assignedto'=>Auth::user()->id])->get(); //->paginate(15);
        return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
      }
    }

  }

  public function getJOperUser(Request $request){
    // if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
      $jos = DB::table('vwjosdetails')->where(['assignedto'=>$request->id])->get();
      $admin = [];
      $admin['admin'] = 'admin';
      return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin]);
    // }else{
    //   $admin = [];
    //   $jos = DB::table('vwjosdetails')->where([['assignedto'=>Auth::user()->id],['datedue','<',date("Y-m-d")], [DB::raw('sumofstatus'), '>', DB::raw('jcount')], ['s', '<>', 'done']])->paginate(15);
    //   return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin, 'jostate'=>$filter]);
    // }
  }

  public function create(Request $request)
  {
    //dd($request);
    $admin = [];
    $clients = Client::orderBy('clientname', 'ASC')->get();
    $users = User::orderBy('name', 'ASC')->get();

    if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
       $admin['admin'] = 'admin';
    }

    return view('jo.create')->with(['clients'=>$clients,'users'=>$users, 'admin'=>$admin]);
  }
  public function addjo(Request $request)
  {
    if($request->input('task') !== null){
      $jo = new Joborder;
      $jo->cid = $request->input('clientid');
      $jo->datedue = $request->input('jodate');
      $jo->assignedto = $request->input('assignedto');
      $jo->encodedby = Auth::user()->id;
      if($request->input('dateoverride') == 1){
          $jo->created_at = $request->input('createddate');
      }else{
          $jo->created_at = now();
      }
      $jo->save();
      $joid = $jo->id;

      $taskname = $request->input('task');
      $lead  = $request->input('lead');
      $amount  = $request->input('amount');
      for($i=0; $i < count($taskname);$i++){
        $task = new Task;
        $task->joid = $joid;
        $task->taskname = $taskname[$i];
        $task->leadtime = $lead[$i];
        $task->amount = $amount[$i];
        $task->save();
        $tid = $task->id;
        $track = new Tasktracking;
        $track->tid = $tid;
        $track->tsid = '1';
        $track->remarks = 'received request';
        $track->uid = Auth::user()->id;
        $jid = $track->save();
      }
      DB::table('jo_transfer')->insert(['joid'=>$joid,'userid'=>$request->input('assignedto'), 'transferby'=>Auth::user()->id,'created_at'=>now()]);
      return redirect('/jo/viewer/'.Auth::user()->id.'/'.$joid)->with('success','JO #'.$joid.' has been added.');
    }else{
      return redirect('/jo/create?cid=$request->input("clientid")')->with('error','Tasks for the JO must be defined. ');
    }
  }
  public function getTask(Request $request)
  {
    $data = DB::table('vwtasks')->where('joid',$request->input('joid'))->get();
    return response()->json($data);
  }
  public function getTaskStatus()
  {
    $data = DB::table('taskstatus')->get();
    return response()->json($data);
  }
  public function getTaskNotes(Request $request)
  {
    if($request->tnote !== null){
      $rem = 'working';
      if($request->input('tasknotes')){
        $rem = $request->input('tasknotes');
      }
      $ttrack = new Tasktracking;
      $ttrack->tid = $request->tid;
      $ttrack->tsid = $request->sid;
      $ttrack->remarks = $request->tnote;
      $ttrack->uid = Auth::user()->id;
      $ttrack->save();
    }

    $data = DB::table('vwtasknotes')->where('tid',$request->tid)->orderBy('created_at','DESC')->get();
    return response()->json($data);
  }
  public function getTaskDetails(Request $request)
  {
    $data = DB::table('tasktrackings')->where('tid',$request->tid)->orderBy('tsid','ASC')->get();
    return response()->json($data);
  }
  public function addtasktracking(Request $request)
  {
    $rem = 'working';
    if($request->input('tasknotes')){
      $rem = $request->input('tasknotes');
    }
    $ttrack = new Tasktracking;
    $ttrack->tid = $request->input('taskid');
    $ttrack->tsid = $request->input('ctaskstatus');
    $ttrack->remarks = $rem;
    $ttrack->uid = Auth::user()->id;
    $ttrack->save();
    return redirect('/jo')->with('success','Task has been updated.');
  }
  public function viewjo(Request $request)
  {
    //vwjosdetails
    if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
      $jos = DB::table('vwjosdetails')->where(['cid'=>$request->cid])->paginate(15);
      $admin = [];
      $admin['admin'] = 'admin';
      return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin]);
    }else{
      $jos = DB::table('vwjosdetails')->where(['cid'=>$request->cid, 'assignedto'=>Auth::user()->id])->paginate(15);
      return view('jo.index')->with('jos',$jos);
    }

    // dd($jos);
  }
  //Route::get('/jo/viewer/{userid}/{joid}', 'JOController@viewjoone');
  public function viewjoone(Request $request)
  {
    //vwjosdetails
    if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
      $jos = DB::table('vwjosdetails')->where(['id'=>$request->joid])->paginate(15);
      $admin = [];
      $admin['admin'] = 'admin';
      return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin]);
    }else { //if(Auth::user()->id === $request->userid)
      $jos = DB::table('vwjosdetails')->where(['id'=>$request->joid])->paginate(15);
      $admin = [];
      $admin['admin'] = 'admin';
      return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin]);
    }
    // }else{
    //   $jos = DB::table('vwjosdetails')->where(['assignedto'=>Auth::user()->id])->paginate(15);
    //   return view('jo.index')->with('jos',$jos);
    // }

    // dd($jos);
  }
  public function search(Request $request)
  {
    if($request->user()->hasAnyRole('superadmin','admin')){
      $jos = DB::table('vwjosdetails')->where('clientname', 'like', "%$request->josearchkey%")->paginate(20);
      $admin = [];
      $admin['admin'] = 'admin';
      return view('jo.index')->with(['jos'=> $jos ,'admin'=>$admin]);
    }else{
      $jos = DB::table('vwjosdetails')->where('clientname', 'like', "%$request->josearchkey%")->where(['assignedto'=>Auth::user()->id])->paginate(20);
      return view('jo.index')->with('jos',$jos);
    }
  }
  public function getUsers()
  {
    $data = User::all();
    return response()->json($data);
  }

  public function transfer(Request $request)
  {
    $joid = $request->input('inpjoid');
    $uid = $request->input('listusers');
    DB::table('joborders')->where('id',$joid)->update(['assignedto'=>$uid]);
    DB::table('jo_transfer')->insert(['joid'=>$joid,'userid'=>$uid, 'transferby'=>Auth::user()->id,'created_at'=>now()]);
    return redirect('/jo')->with('success','JO #'.$joid.' has been updated.');;
  }

  public function addJoNotes(Request $request)
  {
    DB::table('jo_notes')->insert(
              [
              'joid' => $request->joid, 
              'userid' => Auth::user()->id,
              'note' => $request->note,
              'datecreated' => now()
              ]
            );

    $data = DB::table('users')
    ->join('jo_notes', 'users.id', '=', 'jo_notes.userid')
    ->select('users.name', 'jo_notes.*')
    ->where(['jo_notes.joid'=>$request->joid])
    ->orderby('jo_notes.datecreated', 'desc')
    ->get();

    return response()->json($data);
  }
  public function getJoNotes(Request $request)
  {
    $data = DB::table('users')
    ->join('jo_notes', 'users.id', '=', 'jo_notes.userid')
    ->select('users.name', 'jo_notes.*')
    ->where(['jo_notes.joid'=>$request->joid])
    ->orderby('jo_notes.datecreated', 'desc')
    ->get();

    return response()->json($data);
  }
}
