<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reservation;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function add_reservation(Request $request ){

      $validator = validator($request->all(),
      [
          'table_number' => 'required',
          'client_tel' => 'required',
          'client_mail' => 'required',
          'client_name' => 'required',
          'date_res'=>'required',
      ]
      );

      $reservation = new reservation();
      if(!$validator->fails() ){

            $date_res = $request->date_res;
            $date_res=date('Y-m-d H:i:s',strtotime($date_res));

            $reservation->table_number = $request->table_number;
            $reservation->client_tel = $request->client_tel;
            $reservation->client_mail = $request->client_mail;
            $reservation->client_name = $request->client_name;
            $reservation->date_res = $date_res;
            $table = DB::table('tables')
                  ->where('number', $reservation->table_number)
                  ->update([
                                     'status' => 'close'
                               ]);;

            $reservation->save();

            if($reservation){
                return response()->json($reservation)
                    ->setStatusCode('200');
            }

        }

        return response()
            ->json($validator->errors())
            ->setStatusCode(400, 'Bad Request');
    }

    public function get_users(){
      $users = DB::table('reservations')->get();

      return response()
          ->json($users)
          ->setStatusCode(200, 'Success');
    }

    public function get_tables(){
      $tables = DB::table('tables')->get();

      return response()
          ->json($tables)
          ->setStatusCode(200, 'Success');
    }
    public function get_data(){
      $today = date("Y-m-d H:i:s");
      $datetime = [];
      $datetime[0] = date('Y-m-d',strtotime($today));
      $datetime[1] = date('H:i',strtotime($today));



      return response()
          ->json($datetime)
          ->setStatusCode(200, 'Success');
    }
}
