<?php

namespace App\Http\Controllers;

use Auth;
use App\Siswa;
use App\Kelas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index()
    {
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        return view('admin.siswa.index', compact('kelas'));
    }

    public function kelas($id)
    {
        $siswa = Siswa::where('kelas_id', $id)->OrderBy('nama_siswa', 'asc')->get();
        $kelas = Kelas::findorfail($id);
        return view('admin.siswa.show_siswa', compact('siswa', 'kelas'));
    }

    public function createsiswa()
    {
        $kelas = Kelas::OrderBy('nama_kelas', 'asc')->get();
        return view('admin.siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'no_induk' => 'required|string|unique:siswa',
            'nama_siswa' => 'required',
            'jk' => 'required',
            'kelas_id' => 'required'
        ]);

            Siswa::create([
                'no_induk' => $request->no_induk,
                'nis' => $request->nis,
                'nama_siswa' => $request->nama_siswa,
                'jk' => $request->jk,
                'kelas_id' => $request->kelas_id,
                'telp' => $request->telp,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
            ]);
        return redirect()->route('siswa.index')->with('success', '✔️ Data Siswa Berhasil Diperbarui!');

    }

    public function show($id)
    {
        $siswa = Siswa::findorfail($id);
        return view('admin.siswa.detail', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::findorfail($id);
        $kelas = Kelas::all();
        return view('admin.siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_siswa' => 'required',
            'jk' => 'required',
            'kelas_id' => 'required'
        ]);

        $siswa = Siswa::findorfail($id);
        $siswa_data = [
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jk,
            'kelas_id' => $request->kelas_id,
            'telp' => $request->telp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
        ];
        $siswa->update($siswa_data);

        return redirect()->route('siswa.index')->with('success', '✔️ Data Siswa Berhasil Diperbarui!');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findorfail($id);
            $siswa->delete();
            return redirect()->back()->with('warning', '✔️ Data Siswa Berhasil Dihapus! (Silahkan Cek Trash Data Siswa)');
    }

    public function trash()
    {
        $siswa = Siswa::onlyTrashed()->get();
        return view('admin.siswa.trash', compact('siswa'));
    }

    public function restore($id)
    {
        $siswa = Siswa::withTrashed()->findorfail($id);
        $siswa->restore();
        return redirect()->back()->with('info', '✔️ Data Siswa Berhasil Direstore! (Silahkan Cek Data Siswa)');

    }

    public function kill($id)
    {
        $siswa = Siswa::withTrashed()->findorfail($id);
        $countUser = User::withTrashed()->where('no_induk', $siswa->no_induk)->count();
        if ($countUser >= 1) {
            $user = User::withTrashed()->where('no_induk', $siswa->no_induk)->first();
            $siswa->forceDelete();
            $user->forceDelete();
            return redirect()->back()->with('danger', '✖️ Data Siswa Berhasil Dihapus Secara Permanent');
        } else {
            $siswa->forceDelete();
            return redirect()->back()->with('danger', '✖️ Data Siswa Berhasil Dihapus Secara Permanent');
        }
    }

    public function view(Request $request)
    {
        $siswa = Siswa::OrderBy('nama_siswa', 'asc')->where('kelas_id', $request->id)->get();

        foreach ($siswa as $val) {
            $newForm[] = array(
                'kelas' => $val->kelas->nama_kelas,
                'no_induk' => $val->no_induk,
                'nama_siswa' => $val->nama_siswa,
                'jk' => $val->jk,
            );
        }

        return response()->json($newForm);
    }
}
