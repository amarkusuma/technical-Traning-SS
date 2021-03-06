<?php

use Illuminate\Database\Seeder;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke table pegawai
        $faker = Faker\Factory::create('id_ID');
        $gender = $faker->unique()->randomElement(['M', 'F']);


        for($i = 1; $i <= 3; $i++){
        DB::table('users')->insert([
            // 'id' => $faker->randomDigit,
            'name' =>  $faker->Name ,
            'frist_name' =>  $faker->firstNameMale ,
            'last_name' =>  $faker->lastName,
        	'email' =>  $faker->email,
            'phone_number' =>  $faker->phoneNumber ,
            'alamat' =>  $faker->address ,
            'gender' =>  $gender,
            'country_id' => rand(1,100),
        	'password' =>  $faker->password,
        ]);
    }
  }
}
