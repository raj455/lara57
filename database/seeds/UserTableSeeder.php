<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

        	'name' => 'Rajendra Sharma',
        	'role_id' => 1,
        	'email' => 'raj.grd.jh@gmail.com',
        	'password' => bcrypt('secret')

        ]);

        DB::table('users')->insert([

        	'name' => 'Himanshu Yadav',
        	'role_id' => 2,
        	'email' => 'himanshu@gmail.com',
        	'password' => bcrypt('secret')

        ]);

        DB::table('roles')->insert([
        	'name' => 'Admin',
        	'slug' => 'admin'
        ]);

        DB::table('roles')->insert([
        	'name' => 'Author',
        	'slug' => 'author'
        ]);
    }
}
