<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reservation;
use App\User;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function add_user(Request $request){

      $validator = validator($request->all(),
      [
          'name'=>'required',
          'email'=>'required',
          'password'=>'required',
      ]
      );

      $user_model = new User();

      if(!$validator->fails() ){

            $user_model->name = $request->name;
            $user_model->email = $request->email;
            $user_model->password = $request->password;
            $user_model->save();

            if($user_model){
                return response()->json($user_model)
                    ->setStatusCode('200');
            }

        }
        return response()
            ->json($validator->errors())
            ->setStatusCode(400, 'Bad Request');


    }
}
