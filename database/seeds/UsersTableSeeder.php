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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.ro',
            'password' => '$2y$10$NLo2p4WTPUAmacY5Yi4c7OeoGOhdUCaqkUkQXI1EtiW22u45LBrOy',
        ]); 
    }
}
