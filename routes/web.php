<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/message/{id}', 'HomeController@getMessage')->name('message');
Route::post('message', 'HomeController@sendMessage');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/superadmin', function(){
  return 'you are super admin';
})->middleware(['auth','auth.superadmin']);

// Route::resource('users','Admin\UserController', ['except' => ['show','create','store']]);

Route::namespace('Admin')->prefix('superadmin')->middleware(['auth','auth.superadmin'])->name('superadmin.')->group(function(){
  Route::resource('users','UserController', ['except' => ['show','create','store']]);
});


Route::get('/jo', 'JOController@index');
//Route::get('/jo/{}', 'JOController@index');
Route::post('/jo/gettask', 'JOController@getTask');
Route::post('/jo/gettaskstatus', 'JOController@getTaskStatus');
Route::post('/jo/gettaskdetails', 'JOController@getTaskDetails');
Route::post('/jo/addtasktracking','JOController@addtasktracking');
Route::post('/jo/gettasknotes', 'JOController@getTaskNotes');
Route::get('/jo/create', 'JOController@create');
Route::get('/jo/new-jo', 'JOController@createNew');
Route::post('/addjo', 'JOController@addjo');
Route::get('/jo/view/{cid}', 'JOController@viewjo');
Route::get('/jo/details/{cid}', 'JOController@viewjoone'); //update
Route::get('/jo/viewer/{userid}/{joid}', 'JOController@viewjoone');
Route::post('/jo/search', 'JOController@search');
Route::post('/jo/getusers', 'JOController@getUsers');
Route::post('/jo/transfer', 'JOController@transfer');
Route::post('/jo/addjonotes', 'JOController@addJoNotes');
Route::post('/jo/getjonotes', 'JOController@getJoNotes');
Route::get('/jo/user/{id}', 'JOController@getJOperUser');

Route::get('/clients', 'ClientController@getClientList');
Route::post('/clients', 'ClientController@addNewClient');
Route::post('/addnewclient', 'ClientController@store');
Route::post('/clients/search', 'ClientController@search');
Route::post('/clients/update', 'ClientController@update');
Route::post('/clients/file/delete', 'ClientController@deleteFile');

Route::get('/clientsprofiling', 'ClientController@getClientList');
Route::post('/client/getdetail', 'ClientController@getClientDetail');
Route::get('/client/{cid}', 'ClientController@getClient');
Route::post('/client/upload', 'ClientController@upload')->name('upload');

Route::get('/billing', 'BillingController@index');
Route::post('/billing/addpayment', 'BillingController@addpayment');
Route::get('/billing/jid/{joid}', 'BillingController@getJOHistory');
Route::get('/billing/view/{cid}', 'BillingController@viewbilling');
Route::post('/billing/search', 'BillingController@search');

Route::get('webmail','HomeController@openWebmail');
Route::get('data','HomeController@openDataAdministration');

Route::get('generate-pdf','PDFController@generatePDF');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/down', function() {
  $exitCode = Artisan::call('down');
  return redirect('/errors/503'); //Return anything
});

Route::get('/changepass', 'HomeController@changePass');
Route::post('/savechangepass', 'HomeController@saveChangePass');

Route::get('/tasks', 'HomeController@getTasks')->name('tasks');
Route::get('/mytasks', 'HomeController@getMyTasks')->name('mytasks');

Route::get('/profile', 'HomeController@profile')->name('profile');

Route::post('/createchat', 'MessageController@createChat');
Route::get('/messenger', 'MessageController@index');
Route::get('/message/{id}', 'MessageController@getMessage')->name('message');
Route::post('message', 'MessageController@sendMessage');

Route::get('laravel-send-email', 'EmailController@sendEMail');

Route::get('filelist', 'GoogleDriveController@getFileList');

Route::get('getf', function() {
  $filename = 'TjUeiSTUPHYXCU8ujvAdmek46OAtAjreDnw885aE.pdf';
  $dir = '/';
  $recursive = false; // Get subdirectories also?
  $contents = collect(Storage::cloud()->listContents($dir, $recursive));
  
  $dir = $contents->where('type', '=', 'dir')
        ->where('filename', '=', '97')
        ->first();

  //dd($contents); 

  $file = $contents
      ->where('type', '=', 'file')
      ->where('filename', '=', pathinfo($dir['path'].'/'.$filename, PATHINFO_FILENAME))
      ->where('extension', '=', pathinfo($dir['path'].'/'.$filename, PATHINFO_EXTENSION))
      ->first(); // there can be duplicate file names!

  //return $file; // array with file info
  dd($dir);

  // $rawData = Storage::cloud()->get($file['path']);

  // return response($rawData, 200)
  //     ->header('ContentType', $file['mimetype'])
  //     ->header('Content-Disposition', "attachment; filename=$filename");
});

Route::get('dd', function() {
  // The human readable folder name to get the contents of...
  // For simplicity, this folder is assumed to exist in the root directory.
  $folder = '97';
  $filename = 'TjUeiSTUPHYXCU8ujvAdmek46OAtAjreDnw885aE.pdf';
  // Get root directory contents...
  $contents = collect(Storage::cloud()->listContents('/', false));

  // Find the folder you are looking for...
  $dir = $contents->where('type', '=', 'dir')
      ->where('filename', '=', $folder)
      ->first(); // There could be duplicate directory names!

  if ( ! $dir) {
      return 'No such folder!';
  }

  // // Get the file inside the folder...
  $file = collect(Storage::cloud()->listContents($dir['path'], false))
      ->where('type', '=', 'file')
      ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
      ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
      ->first(); // there can be duplicate file names!
  
  $rawData = Storage::cloud()->get($file['path']);
  //dd($file);
  return response($rawData, 200)
    ->header('ContentType', $file['mimetype'])
    ->header('Content-Disposition', "attachment; filename=$filename");
});

Route::get('share', function() {
  $filename = 'TjUeiSTUPHYXCU8ujvAdmek46OAtAjreDnw885aE.pdf';

  // Store a demo file
  Storage::cloud()->put($filename, 'Hello World');

  // Get the file to find the ID
  $dir = '/';
  $recursive = false; // Get subdirectories also?
  $contents = collect(Storage::cloud()->listContents($dir, $recursive));
  $file = $contents
      ->where('type', '=', 'file')
      ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
      ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
      ->first(); // there can be duplicate file names!

  // Change permissions
  // - https://developers.google.com/drive/v3/web/about-permissions
  // - https://developers.google.com/drive/v3/reference/permissions
  $service = Storage::cloud()->getAdapter()->getService();
  $permission = new \Google_Service_Drive_Permission();
  $permission->setRole('reader');
  $permission->setType('anyone');
  $permission->setAllowFileDiscovery(false);
  $permissions = $service->permissions->create($file['basename'], $permission);

  return Storage::cloud()->url($file['path']);
});

Route::get('client/file/{cid}/{file}', 'ClientController@downloadFile');

Route::get('multifileupload', 'HomeController@multifileupload')->name('multifileupload');
Route::post('multifileupload', 'HomeController@store')->name('multifileupload');

Route::get('dropzone/image','ImageController@index');
Route::post('dropzone/store','ImageController@store');

Route::post('getformlist','ClientController@getFormList');

Route::get('put-existing', 'ImageController@putExisting');
//function() {
//   $filenameloc = '\files\book2.png';
//   $filename = 'book2.png';
//   $filePath = public_path($filenameloc);
//   $fileData = File::get($filePath);

//   $data = Storage::cloud()->put($filename, $fileData);
//   return 'File was saved to Google Drive';
// });

Route::get('get', function() {
  $filename = '1579953487402ESP-ppt-16.pdf';

  $dir = '/';
  $recursive = false; // Get subdirectories also?
  $contents = collect(Storage::cloud()->listContents($dir, $recursive));

  $file = $contents
      ->where('type', '=', 'file')
      ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
      ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
      ->first(); // there can be duplicate file names!

  //return $file; // array with file info

  $rawData = Storage::cloud()->get($file['path']);
  //dd($file['mimetype']);
  return response($rawData, 200)
      ->header('ContentType', $file['mimetype'])
      ->header('Content-Disposition', 'form-data; filename=1579953487402ESP-ppt-16.pdf');
});
//https://github.com/ivanvermeyen/laravel-google-drive-demo/blob/master/routes/web.php

Route::get('export/{basename}', function ($basename) {
    $service = Storage::cloud()->getAdapter()->getService();
    $mimeType = 'application/pdf';
    $export = $service->files->export($basename, $mimeType);

    return response($export->getBody(), 200, $export->getHeaders());
});

// Route::post('/client/{cid}/upload','FileUploadController@upload')->name('upload');

// //file upload 03272020
// Route::get('file-upload', 'FileUploadController@index');
// Route::post('file-upload/upload', 'FileUploadController@upload')->name('upload');
