<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\models\User;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(Auth::user()->id);

        return view('user.index')->with(['user' => $user]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('user.edit', [
            'user' => $request->user()
        ]);
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
        $request->validate([


        ]);

        if (! ($request->password)) {
            // Do an insert (query 2)
            \DB::table('users')->where('id',$id)->update([

                'name' => $request->name,
                'email' => $request->email,
                'alamat' => $request->alamat,

            ]);
            return redirect()->route('user.index')->with('message', 'user berhasil diubah!');
        }else {

        \DB::table('users')->where('id',$id)->update([

            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' =>  Hash::make($request->password),
        ]);
         return redirect()->route('user.index')->with('message', 'user berhasil diubah!');
    }}

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

    // public function editprofile(Request $request)
    // {
    //     return view('user.edit', [
    //         'user' => $request->user()
    //     ]);
    // }

}
