<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Amar extends Model
{
    protected $table = 'amar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'email', 'alamat',

    ];


}
