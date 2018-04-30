<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'master_gejala';
    protected $fillable = ['kode_gejala', 'nama_gejala'];
}
