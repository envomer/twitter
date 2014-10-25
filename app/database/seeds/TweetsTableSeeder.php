<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TweetsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$users = User::lists('id');

		foreach(range(1, 80) as $index)
		{
			Tweet::create([
				'user_id' => $faker->randomElement($users),
				'body' => $faker->sentence()
			]);
		}
	}

}