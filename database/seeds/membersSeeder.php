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
				'nama' => $faker->name(),
				'tempat_lahir' => $faker->city,
				'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
				'nomor_telepon' => $faker->phoneNumber,
				'alamat' => $faker->streetAddress,
				'foto' => $faker->imageUrl(50, 50, 'people')
			]);
		}
	}
}
