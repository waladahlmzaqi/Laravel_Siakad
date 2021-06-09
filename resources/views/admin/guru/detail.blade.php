@extends('template.master')
@push('link')
<style>
    .card{
        width: 50%;
        margin: 0px auto;
    }
</style>
@endpush
@section('title', 'SIAKAD | DATA SISWA')
@section('judul', 'DATA GURU')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-user"></i></div>
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DATA SISWA</div>
@endsection
@section('main')
<div class="card">
    <div class="card-header">
        <h4>Detail Guru </h4>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <tbody>
              <tr>
                <th scope="row">Nama</th>
                <td>:</td>
                <td>{{ $guru->nama_guru }}</td>
              </tr>
              <tr>
                <th scope="row">NIP</th>
                <td>:</td>
                <td>{{ $guru->nip }}</td>
              </tr>
              <tr>
                <th scope="row">Id Card</th>
                <td>:</td>
                <td>{{ $guru->id_card }}</td>
              </tr>
              <tr>
                <th scope="row">Guru Mapel</th>
                <td>:</td>
                <td>{{ $guru->mapel->nama_mapel }}</td>
              </tr>
              <tr>
                <th scope="row">Kode Jadwal</th>
                <td>:</td>
                <td>{{ $guru->kode }}</td>
              </tr>
              <tr>
                <th scope="row">Jenis Kelamin</th>
                <td>:</td>
                @if ($guru->jk == 'L')
                    <td>Laki-laki</td>
                @else
                    <td>Perempuan</td>
                @endif
              </tr>
              <tr>
                <th scope="row">Tempat Lahir</th>
                <td>:</td>
                <td>{{ $guru->tmp_lahir }}</td>
              </tr>
              <tr>
                <th scope="row">Tanggal Lahir</th>
                <td>:</td>
                <td>{{ date('l, d F Y', strtotime($guru->tgl_lahir)) }}</td>
              </tr>
              <tr>
                <th scope="row">No Telephone</th>
                <td>:</td>
                <td>{{ $guru->telp }}</td>
              </tr>
            </tbody>
        </table>
        <div class="mt-5 mb-2">
            <a href="{{ route("guru.mapel", $guru->mapel_id) }}" class="btn btn-success"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a>
        </div>
    </div>
</div>
@endsection
@push('script')

@endpush
