<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
 {
    /**
    * Run the database seeds.
    */

    public function run()
 {
        DB::table( 'users' )->insert( [
            'first_name' => 'Mostafa',
            'last_name' => 'Bayumi',
            'email' => 'mostafa@gmail.com',
            'mobile' => '0529705026',
            'password' => app( 'hash' )->make( '123456' ),
            'gender' => 'male',
            'dob' => '2020-03-03',
            'api_token' => str_random( 128 ),
        ] );

    }
}
