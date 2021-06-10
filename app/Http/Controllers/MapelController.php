<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Paket;
use App\Guru;
use App\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::OrderBy('kelompok', 'asc')->OrderBy('nama_mapel', 'asc')->get();
        $paket = Paket::all();
        return view('admin.mapel.index', compact('mapel', 'paket'));
    }

    public function createmapel()
    {
        $paket = Paket::all();
        return view('admin.mapel.create', compact('paket'));
    }

    public function create()
    {
        return view('admin.mapel.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_mapel' => 'required',
            'paket_id' => 'required',
            'kelompok' => 'required'
        ]);

        Mapel::updateOrCreate(
            [
                'id' => $request->mapel_id
            ],
            [
                'nama_mapel' => $request->nama_mapel,
                'paket_id' => $request->paket_id,
                'kelompok' => $request->kelompok,
            ]
        );
        return redirect()->route('mapel.index')->with('success','✔️ Data Mapel Berhasil Di Perbarui');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $mapel = Mapel::findorfail($id);
        $paket = Paket::all();
        return view('admin.mapel.edit', compact('mapel', 'paket'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $mapel = Mapel::findorfail($id);
        $countGuru = Guru::where('mapel_id', $mapel->id)->count();
        if ($countGuru >= 1) {
            $guru = Guru::where('mapel_id', $mapel->id)->delete();
        } else {
        }
        $mapel->delete();
        return redirect()->route('mapel.index')->with('warning','✔️ Data Mapel Berhasil Di Dihapus (Silahkan Cek Trash Data Mapel)');
    }

    public function trash()
    {
        $mapel = Mapel::onlyTrashed()->get();
        return view('admin.mapel.trash', compact('mapel'));
    }

    public function restore($id)
    {
        $mapel = Mapel::withTrashed()->findorfail($id);
        $countGuru = Guru::withTrashed()->where('mapel_id', $mapel->id)->count();
        if ($countGuru >= 1) {
            $guru = Guru::withTrashed()->where('mapel_id', $mapel->id)->restore();
        } else {
        }
        $mapel->restore();
        return redirect()->route('mapel.trash')->with('info','✔️ Data Mapel Berhasil Direstore (Silahkan Cek Data Mapel)');
    }

    public function kill($id)
    {
        $mapel = Mapel::withTrashed()->findorfail($id);
        $countGuru = Guru::withTrashed()->where('mapel_id', $mapel->id)->count();
        if ($countGuru >= 1) {
            $guru = Guru::withTrashed()->where('mapel_id', $mapel->id)->forceDelete();
        } else {
        }
        $mapel->forceDelete();
        return redirect()->back()->with('danger', '✖️ Data Mapel Berhasil Dihapus Secara Permanent');
    }
}
