<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$user = Sentry::createUser(array(
			'email'     	=> 'admin@admin.com',
			'password'  	=> 'admin',
			'first_name'	=> 'Admin',
			'last_name'		=> 'Admin',
			'activated' 	=> true,
		));
	}

}