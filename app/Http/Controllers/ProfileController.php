<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\models\User;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user =  auth()->user();
        return view('user.edit')->with(['user' => $user]);
    }

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
}
