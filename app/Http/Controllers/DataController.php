<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agency;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function openDataAdministration(Request $request)
    {
      $agency = Agency::all();

      $forms = DB::table('forms')->join('agencies', 'agencies.id', '=', 'forms.agencyID')
                    ->select('forms.code', 'forms.description', 'agencies.code as acode', 'agencies.id as aid')->get();

      if(($request->user()->hasAnyRole('superadmin')) OR ($request->user()->hasAnyRole('admin'))){
        return view('data.index')->with(['agency' => $agency, 'forms' => $forms ]);
      }else{
        return view('home');
      }
        
    }
    public function addUpdateAgency(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'description' => 'string|required',
        ]);

        if ($validator->fails()) {
            abort(422, 'Check your inputs.');
        }


      $data = DB::table('agencies')
        ->updateOrInsert(
        ['code' => $request->code],
        ['code' => $request->code, 'description' => $request->description]
      );

      return response()->json($data);
    }
    public function addUpdateForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string',
            'description' => 'string|required',
            'agencyid' => 'integer|required'
        ]);

        if ($validator->fails()) {
            abort(422, 'Check your inputs.');
        }


      $data = DB::table('forms')
        ->updateOrInsert(
        ['code' => $request->code],
        ['code' => $request->code, 'description' => $request->description, 'agencyID' => $request->agencyid]
      );

      return response()->json($data);
    }

    public function getDeletedFiles(Request $request)
    {
        $data = DB::table('client_files')->join('clients', 'clients.id', '=', 'client_files.clientID')
                        ->join('forms', 'forms.id', '=', 'client_files.formID')
                        ->join('agencies', 'agencies.id','=','forms.agencyID')
                        ->select('client_files.id', 'client_files.applicableDate', 'client_files.locationReference',
                        'client_files.filetype', 'forms.code', 'forms.description', 'clients.clientname', 'agencies.code as agency')
                        ->where('client_files.isDeleted', '=', 0)->get();
        
        if($data)
            return response()->json($data);
        else
            return response()->json([]);
    }
}
