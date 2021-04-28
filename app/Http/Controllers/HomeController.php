<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Role;
use App\User;
use App\Message;
use App\Client;
use App\Joborder;
use App\Task;
use App\Agency;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      $clientcount = Client::count();
      $jocount = Joborder::count();
      $taskcount = Task::count();
      //where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);
      $newmsgcount = Message::where(['is_read' => 0 ,'to' => Auth::id()])->count();

     // if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
        $jonotes = DB::table('vwjoupdates')->orderBy('datecreated', 'DESC')->paginate(20);
      // }else{
      //   $jonotes = DB::table('vwjoupdates')->where('assigned',Auth::user()->id)->orderBy('datecreated', 'DESC')->paginate(20);
      // }
      //dd($newmsgcount);

      return view('home')->with(['clientcount' => $clientcount, 'jocount' => $jocount, 'newmsgcount' => $newmsgcount, 'jonotes'=>$jonotes]);
    }
    public function getTasks(Request $request)
    {
          $duetasks = DB::table('vwalltasks')->where([['tsid', '<', '6'],['datedue', '=',  date("Y-m-d")]])->get();//@if(($task->datedue == date("Y-m-d")) and $task->tsid < 6 )
          $pduetasks = DB::table('vwalltasks')->where([['tsid', '<', '6'],['datedue', '<',  date("Y-m-d")]])->get();
          $intasks = DB::table('vwalltasks')->where([['tsid', '<', '6'],['datedue', '>',  date("Y-m-d")]])->get();
          $donetasks = DB::table('vwalltasks')->where('tsid', '>=', '6')->paginate(10);

          $alltasks = DB::table('vwalltasks')->get();

        //return view('task.tasks')->with(['duetasks' => $duetasks, 'pduetasks' => $pduetasks, 'intasks' => $intasks, 'tasks'=>$donetasks]);
        return view('task.tasks')->with(['alltasks' => $alltasks]);

      }
    public function getMyTasks(Request $request)
    {
          $duetasks = DB::table('vwalltasks')->where([['tsid', '<', '6'],['datedue', '=',  date("Y-m-d")],['assignedto', '=', Auth::user()->id]])->get();//@if(($task->datedue == date("Y-m-d")) and $task->tsid < 6 )
          $pduetasks = DB::table('vwalltasks')->where([['tsid', '<', '6'],['datedue', '<',  date("Y-m-d")],['assignedto', '=', Auth::user()->id]])->get();
          $intasks = DB::table('vwalltasks')->where([['tsid', '<', '6'],['datedue', '>',  date("Y-m-d")],['assignedto', '=', Auth::user()->id]])->get();
          $donetasks = DB::table('vwalltasks')->where([['tsid', '>=', '6'], ['assignedto', '=', Auth::user()->id]])->paginate(10);

        return view('task.mytasks')->with(['duetasks' => $duetasks, 'pduetasks' => $pduetasks, 'intasks' => $intasks, 'tasks'=>$donetasks]);
    }
    public function changePass(Request $request)
    {
      return view('changepass');
    }
    public function saveChangePass(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'currentpassword' => 'required',
          'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);
      if ($validator->fails()) {
          return redirect('/changepass')
                      ->withErrors($validator)
                      ->withInput();
      }
      $user =  User::find(Auth::user()->id);

      // dd($request->input('currentpassword'));

      // dd(Hash::check('superadmin', $user->password));

      if(Hash::check($request->input('currentpassword'), $user->password)){
        DB::table('users')->where('id',Auth::user()->id)->update([ 'password'=>Hash::make($request->input('password')) ]);
        return redirect('/changepass')->with('success','Password has been changed.');
      }else{
        return redirect('/changepass')->with('error','Current does not match.');
      }

    }
    public function profile(){
  
      return view('profile');
    }
    public function multifileupload()
    {
        return view('dropzonejs');
    }
    // public function store(Request $request)
    // {
    	
    // 	$image = $request->file('file');
    //     $imageName = time().$image->getClientOriginalName();
    //     $upload_success = $image->move(public_path('images'),$imageName);
        
    //     if ($upload_success) {
    //         return response()->json($upload_success, 200);
    //     }
    //     // Else, return error 400
    //     else {
    //         return response()->json('error', 400);
    //     }
    // }

    public function openWebmail()
    {
      return view('emails.index');
    }

}
//https://www.tutsmake.com/laravel-5-8-new-email-verification/?fbclid=IwAR2DMTYNdPoWnZDec_grgL-M2MJkOcLWKkWn45p-inro3O0AZI2aCuxinWk

