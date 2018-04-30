<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyakitmodel extends Model
{
    protected $table = 'master_penyakit';
    protected $fillable = ['kode_penyakit', 'nama_penyakit','definisi','keterangan','img'];
}
