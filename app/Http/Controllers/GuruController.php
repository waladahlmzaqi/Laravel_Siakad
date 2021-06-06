<?php

namespace App\Http\Controllers;

use App\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::paginate(5);
        return view('admin.guru.index', ['guru' => $guru]);
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama_guru' => 'required',
            'mapel_id' => 'required',
            'jk' => 'required',
            'no_tlp' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
        ]);
            Guru::create($request->all());
        return redirect()->route('guru.index')->with('success','Data Guru berhasil di input');
    }

    public function show(Guru $guru)
    {
        return view('admin.guru.detail',compact('guru'));
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit',compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {

        $request->validate([
            'nip' => 'required',
            'nama_guru' => 'required',
            'mapel_id' => 'required',
            'jk' => 'required',
            'no_tlp' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
        ]);
        $guru->update($request->all());
        return redirect()->route('guru.index')->with('warning','Data Guru berhasil di update');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('danger','Data Guru berhasil dihapus');
    }
}
