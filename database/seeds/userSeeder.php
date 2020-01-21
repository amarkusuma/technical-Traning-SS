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
        $gender = $faker->randomElement(['M', 'F']);


        for($i = 1; $i <= 10; $i++){
        DB::table('user')->insert([
            'id' => $faker->randomDigit,
            'frist_name' =>  $faker->firstNameMale ,
            'last_name' =>  $faker->lastName,
        	'email' =>  $faker->email,
            'phone_number' =>  $faker->phoneNumber ,
            'gender' =>  $gender,
            'country_id' =>$faker->randomDigit,
        	'password' =>  $faker->password,
        ]);
    }
  }
}
