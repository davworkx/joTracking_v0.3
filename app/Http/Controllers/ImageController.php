<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['auth', 'verified']);
    }

    public function multifileupload()
    {
        return view('dropzonejs');
    }
    public function store(Request $request)
    {
        // $image = $request->file('file');
        // $avatarName = $image->getClientOriginalName();
        // $image->move(public_path('files'),$avatarName);
         
        // $imageUpload = new File();
        // $imageUpload->filename = $avatarName;
        // $imageUpload->save();


        // use Illuminate\Support\Facades\Storage;
        // Storage::delete('file.jpg');

        // Storage::delete(['file.jpg', 'file2.jpg']);
        // If necessary, you may specify the disk that the file should be deleted from:

        // use Illuminate\Support\Facades\Storage;
        // Storage::disk('s3')->delete('folder_path/file_name.jpg');

        $filenameloc = '\files\book2.png';
        $filename = 'book2.png';
        $filePath = public_path($filenameloc);
        $fileData = File::get($filePath);
      
        $data = Storage::cloud()->put($filename, $fileData);
        
        return $data;
        //return response()->json(['success'=>$data]);
    }
    public function putExisting(Request $request)
    {
        try{
            $filenameloc = '\files\book2.png';
            $filename = 'book2.png';
            $filePath = public_path($filenameloc);
            $fileData = File::get($filePath);
          
            $data = Storage::cloud()->put($filename, $fileData);
            return 'File was saved to Google Drive';
        }catch (Exception $e) {
            return 'Error';
        }

    }
    public function fileUpload(Request $request)
    {
        $filename = $request->filename;

        $filenameloc = '\files\\'.$filename;
        $filePath = public_path($filenameloc);
        $fileData = File::get($filePath);
        
        $data = Storage::cloud()->put($filename, $fileData);

        return response()->json(['success'=>$fileData]);
    }
}
