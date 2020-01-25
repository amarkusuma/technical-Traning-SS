<?php

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;

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
        $client = new Client();
        $response = $client->get('https://restcountries.eu/rest/v2/all');
        $requ = $response->getBody();
        $request = json_decode($requ);

        foreach ($request as $row) {
            DB::table('countries')->insert([
                'name' =>   $row->name ,
                'alpha2_code' =>   $row->alpha2Code,
                'alpha3_code' =>   $row->alpha3Code,
                'calling_code' =>  $row->callingCodes[0],
                'demonym' =>  $row->demonym,
                'flag' =>$row->flag,
            ]);
        }
    }
}
