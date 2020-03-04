<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
 {
    /**
    * Run the database seeds.
    */

    public function run()
 {
        DB::table( 'categories' )->insert( [
            'name' => 'Goals',
            'user_id' => 1,
        ] );
        DB::table( 'categories' )->insert( [
            'name' => 'Education',
            'user_id' => 1,
        ] );
        DB::table( 'categories' )->insert( [
            'name' => 'Live Style',
            'user_id' => 1,
        ] );
    }
}
