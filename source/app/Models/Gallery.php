<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';

    public function anggota(){
        return $this->belongsTo('App\Models\Anggota','anggota_id');
    }
}
