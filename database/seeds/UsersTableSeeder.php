<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
          'name'        =>  'Wahyu Said',
          'email'       =>  'wahyumd5@gmail.com',
          'phone'       =>  '081233626439',
          'occupation'  =>  'Full Stack Developer',
          'is_admin'    =>  true,
          'password'    =>  bcrypt('miku39!')
        ],[
          'name'        =>  'John Doe',
          'email'       =>  'bps.phi@gmail.com',
          'phone'       =>  '081209876565',
          'occupation'  =>  'Freelancer',
          'is_admin'    =>  false,
          'password'    =>  bcrypt('miku39!')
        ]]);
    }
}
