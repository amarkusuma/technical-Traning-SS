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

    public function index()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function update(Request $request)
    {

        $user = Auth::user();
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
}
