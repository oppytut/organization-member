<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class membersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();
		for ($i = 1; $i <= 10; $i++) {
			DB::table('members')->insert([
				'name' => $faker->name(),
				'place_of_birth' => $faker->city,
				'date_of_birth' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
				'phone_number' => $faker->phoneNumber,
				'address' => $faker->streetAddress,
				'photo' => $faker->imageUrl(200, 200, 'people')
			]);
		}
	}
}
