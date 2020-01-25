<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

class ProfileController extends Controller
{
    public $successStatus = 200;

    public function index(){
    //     $user =  auth('api')->user();
    //     // $user->id;
    //     $users = DB::table('users')
    //     ->select('*')
    //     ->where('users.id', $user)->get();
    // echo dd($user);
    // return json_encode($users);

    $user = Auth::user();
    return response()->json(['success' => $user], $this->successStatus);


    }

    public function update(Request $request, $user){
        $user =  auth()->user();
        // $user->email = $request->email;

        $users = User::find($user);
        $users->name = $request->name;
        $users->email   = $request->email;
        $users->alamat   = $request->alamat;
        $users->password   = $request->password;
        try {
            $users->save();
        } catch (\Illuminate\Database\QueryException $e) {
            return "Ada kesalahan = " . $e->getMessage();
        }
        return "Profile sudah diubah";
    }
}
