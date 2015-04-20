<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UndiansTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		// $member = Member::find(1);
		// $undian = $member->undians()->save(new Undian(array( 'undian_number' => $faker->numberBetween(1, 100) )));

		foreach (Member::all() as $member) {

			$undians = [];
			for ($i=0; $i < 4; $i++) { 
				$undian = new Undian([
					'undian_number' => $faker->unique()->numberBetween(143, 1067650)
				]);

				array_push($undians, $undian);
			}

			$undian = $member->undians()->saveMany($undians);
		}
	}

}