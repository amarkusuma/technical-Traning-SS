<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Hash;

class UsersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
        return UserResource::collection($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $user = new User;

        // $user->name = $request->name;
        // $user->frist_name   = $request->frist_name;
        // $user->last_name   = $request->last_name;
        // $user->email   = $request->email;
        // $user->phone_number   = $request->phone_number;
        // $user->alamat   = $request->alamat;
        // $user->gender   = $request->gender;
        // $user->country_id   = $request->country_id;
        // $user->password   = $request->password;

        // try {
        //     $user->save();
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return "Ada kesalahan = " . $e->getMessage();
        // }
        // return new UserResource($user);

        $user = User::create([
            'name' => $request->name,
            'frist_name' => $request->frist_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
            'gender' => $request->gender,
            'country_id' => $request->country_id,
            'password' => Hash::make($request['password']),
        ]);
        return new UserResource($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = DB::table('users')
            ->select('*')
            ->where('users.id', $id)->get();

        return json_encode($users);
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

        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'frist_name' => $request->frist_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
            'gender' => $request->gender,
            'country_id' => $request->country_id,
            'password' => Hash::make($request['password']),
        ]);
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return "User dengan id " . $id . "Telah Di hapus ";
    }
}
