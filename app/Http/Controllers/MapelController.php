<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Paket;
use App\Guru;
use App\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::OrderBy('kelompok', 'asc')->OrderBy('nama_mapel', 'asc')->get();
        $paket = Paket::all();
        // $paket = DB::table('paket')->get();
        return view('admin.mapel.index', compact('mapel', 'paket'));
    }
    public function createmapel()
    {
        $paket = Paket::all();
        // $paket = DB::table('paket')->get();
        return view('admin.mapel.create', compact('paket'));
    }

    public function createguru()
    {
        // $mapel = Mapel::orderBy('nama_mapel')->get();
        $mapel = Mapel::all();
        $max = Guru::max('id_card');
        return view('admin.guru.create', compact('mapel', 'max'));
    }
    public function createsiswa()
    {
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        return view('admin.siswa.create', compact('kelas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('mapel.index')->with('success','Data Mapel Berhasil Di Perbarui');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = Mapel::findorfail($id);
        $paket = Paket::all();
        return view('admin.mapel.edit', compact('mapel', 'paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = Mapel::findorfail($id);
        $countGuru = Guru::where('mapel_id', $mapel->id)->count();
        if ($countGuru >= 1) {
            $guru = Guru::where('mapel_id', $mapel->id)->delete();
        } else {
        }
        $mapel->delete();
        return redirect()->route('mapel.index')->with('warning','Data Mapel Berhasil Di Dihapus (Silahkan Cek Trash Data Mapel)');
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
        return redirect()->route('mapel.trash')->with('info','Data Mapel Berhasil Di Restore (Silahkan Cek Data Mapel)');
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
        return redirect()->back()->with('danger', 'Data mapel berhasil dihapus secara permanent');
    }
}
