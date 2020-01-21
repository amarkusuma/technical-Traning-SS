<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\GuzzlePost;

class GuzzlePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = GuzzlePost::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new GuzzlePost();
        $data->name=$request->get('name');
        $data->save();
        return response()->json('Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postRequest()
{
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'https://restcountries.eu/rest/v2/all', [
        'form_params' => [
            // 'name' => $name,
            // 'alpha2_code' => $alpha2Code,
            // 'alpha3_code' => $alpha3Code,
            // 'calling_code' => $callingCodes,
            // 'demonym' => $demonym ,
            // 'flag' => $flag ,
        ]
    ]);
    $response = $response->getBody()->getContents();
    echo '<pre>';
    print_r($response);
}

public function getRequest()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://restcountries.eu/rest/v2/all');
        $response = $request->getBody()->getContents();
        echo '<pre>';
        print_r($response);
        exit;
    }

public function simpan(){

  $client = new \GuzzleHttp\Client();
  $response = $client->get('https://restcountries.eu/rest/v2/all');

  $mydata = json_decode($response->getBody()->getContents());
  $object = new Object();
  $object->COUNTRY = $mydata->COUNTRY;
  $object->SPADOC_CD = $mydata->SPADOC_CD ;
  $object->ORBITAL_TBA = $mydata->ORBITAL_TBA ;
  $object->save();
}
}
