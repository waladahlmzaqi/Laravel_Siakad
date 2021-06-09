@extends('template.master')
@push('link')

@endpush
@section('title', 'SIAKAD | DATA SISWA')
@section('judul', 'DATA SISWA')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-user"></i></div>
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DATA SISWA</div>
@endsection
@section('main')
<div class="card">
    <div class="card-header">
      <h4>Data Siswa</h4>
    </div>
    <div class="d-flex flex-row-reverse mr-5" style="margin-top: -53px; margin-bottom: 30px;">
        <a href="/mapel/tambahsiswa" class="btn btn-success">Tambah Siswa +</a>
    </div>
    <div class="card-body">
      <table class="table table-striped" id="table_siswa">
        <tbody class="table-striped">
            <td>
                <h5 class="card-title card-text mb-2">Nama : {{ $siswa->nama_siswa }}</h5>
                    <h5 class="card-title card-text mb-2">No. Induk : {{ $siswa->no_induk }}</h5>
                    <h5 class="card-title card-text mb-2">NIS : {{ $siswa->nis }}</h5>
                    <h5 class="card-title card-text mb-2">Kelas : {{ $siswa->kelas->nama_kelas }}</h5>
                    @if ($siswa->jk == 'L')
                        <h5 class="card-title card-text mb-2">Jenis Kelamin : Laki-laki</h5>
                    @else
                        <h5 class="card-title card-text mb-2">Jenis Kelamin : Perempuan</h5>
                    @endif
                    <h5 class="card-title card-text mb-2">Tempat Lahir : {{ $siswa->tmp_lahir }}</h5>
                    <h5 class="card-title card-text mb-2">Tanggal Lahir : {{ date('l, d F Y', strtotime($siswa->tgl_lahir)) }}</h5>
                    <h5 class="card-title card-text mb-2">No. Telepon : {{ $siswa->telp }}</h5>
            </td>
        </tbody>
      </table>
    </div>
</div>
@endsection
@push('script')

@endpush
