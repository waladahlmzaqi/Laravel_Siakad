<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
    	'nisn', 'nama_siswa', 'jk',
        'no_tlp', 'tmp_lahir', 'tgl_lahir',
        'kelas_id'
    ];
}
