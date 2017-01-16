<?php

use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('user_types')->insert([
                'id' => 0,
                'title' => 'default',
                'description' => 'default'
            ], 
            [
                'id' => 1,
                'title' => 'authenticated',
                'description' => 'A normal registered user.'
            ]
        );
    }

}
