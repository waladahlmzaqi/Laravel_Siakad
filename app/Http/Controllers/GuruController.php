<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Guru;
use App\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class GuruController extends Controller
{
    public function index()
    {
        $mapel = Mapel::orderBy('nama_mapel')->get();
        $max = Guru::max('id_card');
        return view('admin.guru.index', compact('mapel', 'max'));
    }

    public function mapel($id)
    {
        $mapel = Mapel::findorfail($id);
        $guru = Guru::where('mapel_id', $id)->orderBy('kode', 'asc')->get();
        return view('admin.guru.show_guru', compact('mapel', 'guru'));
    }

    public function showmaple()
    {
        $mapel = Mapel::all();
        $max = Guru::max('id_card');
        return view('admin.guru.create', compact('mapel', 'max'));
    }

    public function createguru()
    {
        $mapel = Mapel::all();
        $max = Guru::max('id_card');
        return view('admin.guru.create', compact('mapel', 'max'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'id_card' => 'required',
            'nama_guru' => 'required',
            'mapel_id' => 'required',
            'kode' => 'required|string|unique:guru|min:2|max:3',
            'jk' => 'required'
        ]);
        Guru::create($request->all());
        return redirect()->route('guru.index')->with('success','✔️ Data Guru Berhasil Di Perbarui!');
    }

    public function show($id)
    {
        $guru = Guru::findorfail($id);
        return view('admin.guru.detail', compact('guru'));
    }

    public function edit($id)
    {
        $guru = Guru::findorfail($id);
        $mapel = Mapel::all();
        return view('admin.guru.edit', compact('guru', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_guru' => 'required',
            'mapel_id' => 'required',
            'jk' => 'required',
        ]);

        $guru = Guru::findorfail($id);
        $guru_data = [
            'nama_guru' => $request->nama_guru,
            'mapel_id' => $request->mapel_id,
            'jk' => $request->jk,
            'telp' => $request->telp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir
        ];
        $guru->update($guru_data);

        return redirect()->route('guru.mapel', $guru->mapel_id)->with('success', '✔️ Data Guru Berhasil Diperbarui!');
    }

    public function destroy($id)
    {
        $guru = Guru::findorfail($id);
        $guru->delete();
        return redirect()->route('guru.mapel', $guru->mapel_id)->with('warning', '✔️ Data Guru Berhasil Dihapus! (Silahkan Cek Trash Data Guru)');
    }

    public function trash()
    {
        $guru = Guru::onlyTrashed()->get();
        return view('admin.guru.trash', compact('guru'));
    }

    public function restore($id)
    {
        $guru = Guru::withTrashed()->findorfail($id);
        $guru->restore();
        return redirect()->back()->with('info', '✔️ Data Guru Berhasil Direstore! (Silahkan Cek Data Guru)');
    }

    public function kill($id)
    {
        $guru = Guru::withTrashed()->findorfail($id);
        $guru->forceDelete();
        return redirect()->back()->with('danger', '✖️ Data Guru Berhasil Dihapus Secara Permanent');
    }
}
