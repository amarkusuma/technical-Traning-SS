<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class GuzzlePost extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'alpha2_code', 'alpha3_code','calling_code','demonym','flag'

    ];

}
