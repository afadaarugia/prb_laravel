<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prb extends Model
{
    protected $fillable = [
        'id',
        'nama',
        'tgl_lahir',
        'alamat',
        'telpon'
    ];
}
