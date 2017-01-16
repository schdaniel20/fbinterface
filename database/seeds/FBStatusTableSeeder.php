<?php

use Illuminate\Database\Seeder;

class FBStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    protected $statuses = [
        0 => "Not Processed",
        1 => "Fb Crawler Running",
        2 => "FB Crawler Finished",
        3 => "Data Parser Running",
        4 => "Data Parser Finished",
        5 => "Crawler Error",
        6 => "Parser Error",
        7 => "Starting",
    ];
    public function run()
    {
        foreach($this->statuses as $key => $status) 
        {
            DB::table('fb_session_status')->insert([
                'statusID' => $key,
                'statusName' => $status
            ]); 
        }
    }
}
