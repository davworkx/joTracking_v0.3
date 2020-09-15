<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Mail;
class EmailController extends Controller
{
    public function sendEmail()
    {
        $data['title'] = "This is Test Mail Tuts Make";
 
        Mail::send('emails.email', $data, function($message) {
 
            $message->to('lhestdave@outlook.com', 'Receiver Name')
 
                    ->subject('Tuts Make Mail');
        });
 
        if (Mail::failures()) {
           return 'error';//response()->Fail('Sorry! Please try again latter');
         }else{
           return 'success';//response()->success('Great! Successfully send in your mail');
         }
    }
}