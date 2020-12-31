<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'admin',
          'email' => 'admin@gmail.com',
          'password' => Hash::make('admin'),
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
      ]);

      for ($i=1; $i < 7; $i++) {
        if($i <= 3){
        DB::table('tables')->insert([
            'status' => 'open',
            'number' => $i,
            'number_seats' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
      }else{
        DB::table('tables')->insert([
            'status' => 'open',
            'number' => $i,
            'number_seats' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
      ]);
    }


      }
    }
}
