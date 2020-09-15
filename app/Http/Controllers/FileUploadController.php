<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

class FileUploadController extends Controller
{
    function index()
    {
     return view('file_upload');
    }

    function upload(Request $request)
    {
     $rules = array(
      'file'  => 'required|max:200048'
     );

     $error = Validator::make($request->all(), $rules);

     if($error->fails())
     {
      return response()->json(['errors' => $error->errors()->all()]);
     }

     $image = $request->file('file');
     $file_ext = "";
     $new_name = rand() . '.' . $image->getClientOriginalExtension();
     $image->move(public_path('images'), $new_name);

     switch($image->getClientOriginalExtension()){
         case 'pdf':
            $file_ext = 'pdf.svg';
            break;
        case 'doc':
        case 'docx':
            $file_ext = 'doc.svg';
            break;
        case 'jpeg':
        case 'jpg':
        case 'gif':
        case 'png':
            $file_ext = 'image.svg';
            break;
        default:
            $file_ext = 'file.svg';

     }

     $filename = $new_name; //'3m8LnSGtMlrLYZzain15jfPyyA30qJ5IsoNiX5HA.pdf';
     $filePath = public_path('/files/'.$filename);
     $fileData = File::get($filePath);
   
     $gStatus = Storage::cloud()->put($filename, $fileData);
     //return 'File was saved to Google Drive';

     
     $output = array(
         'success' => 'File uploaded successfully',
         'image'  => '<img src="/icons/'.$file_ext.'" class="img-thumbnail" />',
         'gdrive' => $gStatus
        );

        return response()->json($output);
    }
}

?>
