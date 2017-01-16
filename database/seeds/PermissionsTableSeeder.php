<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    
    protected $permissions = '[
	{
		"id" : 1,
		"title" : "view menu session",
		"description" : "The menu item session is visible"
	},
	{
		"id" : 2,
		"title" : "view menu administrator",
		"description" : "The menu item administrator is visible"
	},
	{
		"id" : 3,
		"title" : "view menu servers",
		"description" : "The menu item servers is visible"
	},
	{
		"id" : 4,
		"title" : "access session search",
		"description" : "Search session"
	},
	{
		"id" : 5,
		"title" : "access session information",
		"description" : "Session informations"
	},
	{
		"id" : 6,
		"title" : "view menu type manager",
		"description" : "The menu item types is visible"
	},
	{
		"id" : 7,
		"title" : "access user type list",
		"description" : "Access to a list with user types"
	},
	{
		"id" : 8,
		"title" : "access manage user types",
		"description" : "Access to manage user types"
	},
	{
		"id" : 9,
		"title" : "set session status",
		"description" : "Set session status"
	},
	{
		"id" : 10,
		"title" : "run facebook crawler",
		"description" : "Start the facebook crawler"
	},
	{
		"id" : 11,
		"title" : "run facebook parser",
		"description" : "Start the parser"
	},
	{
		"id" : 12,
		"title" : "create user",
		"description" : "Create User"
	},
	{
		"id" : 13,
		"title" : "view menu servers",
		"description" : "view menu servers"
	},
	{
		"id" : 14,
		"title" : "manage users",
		"description" : "User management"
	},
	{
		"id" : 15,
		"title" : "view menu user manager",
		"description" : "user manager menu"
	}
    ]';


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = json_decode($this->permissions, true);
        foreach($permissions as $value) 
        {
            DB::table('permissions')->insert([
                'id'            => $value['id'],
                'title'         => $value['title'],
                'description'   => $value['description'],
            ]); 
        }
    }
}
