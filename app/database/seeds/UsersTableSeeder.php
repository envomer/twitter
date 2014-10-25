<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
			User::create([
				'username' => $faker->word() . $index,
				'email' => $faker->email(),
				'password' => Hash::make('admin1')
			]);
		}
	}

}