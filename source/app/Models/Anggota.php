<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function jenis_kelamin()
    {
        $jk = ['L'=>'Laki-laki','P'=>'Perempuan'];

        return $jk[$this->gender];
    }
}
