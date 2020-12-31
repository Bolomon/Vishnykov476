<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class mailController extends Controller
{
    public function send($user_mail, $table_number,$data){
      $table_number = (string)$table_number;
      $data = (string)$data;
        $d = [];
        $d[0] = $data;
        $d[1] = $table_number;


        Mail::send('mail', ['data' => $d], function($message) use ($user_mail) {
          $message->to($user_mail)->subject('screenseat');
          $message->from('matvish24120166@gmail.com', 'screenseat');
        });
        return redirect('/');


    }
}
