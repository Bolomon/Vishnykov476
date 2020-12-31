<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Welcome extends Controller
{
    public function index(){


      $today = date("Y-m-d H:i:s");
      $unix = strtotime($today);
      

      $reservations = DB::table('reservations')->get();
      foreach ($reservations as $key) {



          if (strtotime($key->date_res) < $unix) {


              $kek = DB::table('reservations')
                  ->where('id', $key->id)
                  ->delete();

              $tables = DB::table('tables')
                  ->where('number', $key->table_number)
                  ->update([
                                 'status' => 'open'
                           ]);
          }
      }



      return view('welcome');
    }
}
