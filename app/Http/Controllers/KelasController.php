<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Guru;
use App\Paket;
use App\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        $guru = Guru::OrderBy('nama_guru', 'asc')->get();
        $paket = Paket::all();
        return view('admin.kelas.index', compact('kelas', 'guru', 'paket'));
    }

    public function siswa($id)
    {
        $kelas = Kelas::findorfail($id);
        $guru = Guru::OrderBy('nama_guru', 'asc')->get();
        $paket = Paket::all();
        $siswa = Siswa::where('kelas_id', $id)->orderBy('kelas_id', 'asc')->get();
        return view('admin.kelas.show_siswa', compact('kelas', 'siswa', 'guru', 'paket'));
    }

    public function showsiswa()
    {
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        $guru = Guru::OrderBy('nama_guru', 'asc')->get();
        $paket = Paket::all();
        $siswa = Siswa::all();
        return view('admin.kelas.show_siswa', compact('kelas', 'siswa', 'guru', 'paket'));
    }
    public function createkelas()
    {
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        $guru = Guru::OrderBy('nama_guru', 'asc')->get();
        $paket = Paket::all();
        return view('admin.kelas.create', compact('kelas', 'guru', 'paket'));
    }

    public function create()
    {
        $guru = Guru::OrderBy('nama_guru', 'asc')->get();
        return view('admin.kelas.create', compact('guru'));
    }

    public function store(Request $request)
    {
        if ($request->id != '') {
            $this->validate($request, [
                'nama_kelas' => 'required|min:6|max:10',
                'paket_id' => 'required',
                'guru_id' => 'required|unique:kelas',
            ]);
        } else {
            $this->validate($request, [
                'nama_kelas' => 'required|unique:kelas|min:6|max:10',
                'paket_id' => 'required',
                'guru_id' => 'required|unique:kelas',
            ]);
        }

        Kelas::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'nama_kelas' => $request->nama_kelas,
                'paket_id' => $request->paket_id,
                'guru_id' => $request->guru_id,
            ]
        );
        return redirect()->route('kelas.index')->with('success', '✔️ Data Kelas Berhasil Diperbarui!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $kelas = Kelas::findorfail($id);
        $kelas->delete();
        return redirect()->back()->with('warning', '✔️ Data Kelas Berhasil Dihapus! (Silahkan Cek Trash Data Kelas)');
    }

    public function trash()
    {
        $kelas = Kelas::onlyTrashed()->get();
        return view('admin.kelas.trash', compact('kelas'));
    }

    public function restore($id)
    {
        $kelas = Kelas::withTrashed()->findorfail($id);
        $kelas->restore();
        return redirect()->back()->with('info', '✔️ Data Kelas Berhasil Direstore! (Silahkan Cek Data Kelas)');
    }

    public function kill($id)
    {
        $kelas = Kelas::withTrashed()->findorfail($id);
        $kelas->forceDelete();
        return redirect()->route('kelas.trash')->with('danger', '✖️ Data Kelas Berhasil Dihapus Secara Permanent');
    }

    public function getEdit(Request $request)
    {
        $kelas = Kelas::where('id', $request->id)->get();
        foreach ($kelas as $val) {
            $newForm[] = array(
                'id' => $val->id,
                'nama' => $val->nama_kelas,
                'paket_id' => $val->paket_id,
                'guru_id' => $val->guru_id,
            );
        }
        return response()->json($newForm);
    }
}
