<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MembersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 100) as $index)
		{
			Member::create([
				'member_number'	=> $faker->unique()->numberBetween(1000, 10000000),
				'member_name'	=> $faker->name()
			]);
		}
	}

}