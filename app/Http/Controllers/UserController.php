<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\models\User;
use App\User;
use Illuminate\Support\Facades\Hash;
use Datatables;
use Redirect, Response, DB, Config;
use App\DataTables\UsersDataTable;
use App\Http\Requests\StoreBlogPost;

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

    public function index(UsersDataTable $dataTable)
    {
        $user = User::find(Auth::user()->id);

        return $dataTable->render('user.index')->with(['user' => $user]);
    }

    public function dataTable()
    {
        $users = DB::table('users')->select('*');

        return datatables()->of($users)->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'alamat' => $request['alamat'],
            'password' => Hash::make($request['password']),
            // 'frist_name' => '',
            // 'last_name' => '',
            // 'phone_number' => '',
            // 'gender' => 'M',
            // 'country_id' => '',

        ]);
        return redirect('user')->with('success', 'Selamat data berhasil ditambah!');
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

    // public function editprofile(Request $request)
    // {
    //     return view('user.edit', [
    //         'user' => $request->user()
    //     ]);
    // }

}
