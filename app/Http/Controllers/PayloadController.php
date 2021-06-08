<?php

namespace App\Http\Controllers;

use Auth;
use App\Kelas;
use App\Guru;
use App\Paket;
use App\Siswa;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PayloadController extends Controller
{
    public function index2()
    {
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        return view('admin.siswa.create', compact('kelas'));
    }
}
