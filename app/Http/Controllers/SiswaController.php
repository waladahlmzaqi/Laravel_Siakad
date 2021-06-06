<?php

namespace App\Http\Controllers;
use App\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::paginate(5);
        return view('admin.siswa.index', ['siswa' => $siswas]);
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'jk' => 'required',
            'no_tlp' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'kelas_id' => 'required',
        ]);
        Siswa::create($request->all());
        return redirect()->route('siswa.index')->with('success','Data Siswa berhasil di input');
    }

    public function show(Siswa $siswa)
    {
        return view('admin.siswa.detail',compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.edit',compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'jk' => 'required',
            'no_tlp' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'kelas_id' => 'required',
        ]);
        $siswa->update($request->all());
        return redirect()->route('siswa.index')->with('warning','Data Siswa berhasil di update');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('danger','Data Siswa berhasil dihapus');
    }
}
