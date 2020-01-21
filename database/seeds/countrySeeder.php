<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $response = $request->getBody()->getContents();
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://restcountries.eu/rest/v2/all');
        $requ = $response->getBody();
        $request = json_decode($requ);
        DB::table('countries')->insert([

            'name' =>   $request->name ,
            'alpha2_code' =>   $request->alpha2Code,
        	'alpha3_code' =>   $request->alpha3Code,
            'callingcodes' =>  $request->callingCodes ,
            'demonym' =>  $request->demonym,
            'flag' =>$request->flag,

        ]);


}
}
