<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\reservation;
use Illuminate\Support\Facades\DB;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


     public function del_res($id){




       DB::table('tables')->where('number',$id )
          ->update([
              'status' => 'open',
          ]);

       $reservations = DB::table('reservations')->where('table_number',$id)->delete();

       
        return redirect('add_user');
     }
     public function add_user()
     {
        if (Auth::user()->id == NULL) {
            return redirect('/');
        }
         return view('add_user');
     }
    public function index()
    {
        return redirect('/');
    }
}
