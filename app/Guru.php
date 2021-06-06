<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
    	'nip', 'nama_guru', 'mapel_id',
        'jk', 'no_tlp', 'tmp_lahir',
        'tgl_lahir'
    ];
}
