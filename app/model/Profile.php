<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'password','alamat','frist_name','last_name','email','phone_number','gender','country_id'
    ];
}
