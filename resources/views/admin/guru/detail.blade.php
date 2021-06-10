@extends('template.master')
@push('link')
<style>

</style>
@endpush
@section('title', 'SIAKAD | DATA GURU')
@section('judul', 'DATA GURU')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}</div>
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DATA GURU</div>
@endsection
@section('main')
<div class="card card-primary">
    <div class="card-header">
        <h4>Detail Guru </h4>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <tbody>
              <tr>
                <th scope="row" width="140px">Nama</th>
                <td width="10px">:</td>
                <td width="250px">{{ $guru->nama_guru }}</td>
                {{--  --}}
                <th scope="row" width="140px">Jenis Kelamin</th>
                <td width="10px">:</td>
                @if ($guru->jk == 'L')
                    <td>Laki-laki</td>
                @else
                    <td>Perempuan</td>
                @endif
              </tr>
              <tr>
                <th scope="row">NIP</th>
                <td>:</td>
                <td>{{ $guru->nip }}</td>
                {{--  --}}
                <th scope="row">Tempat Lahir</th>
                <td>:</td>
                <td>{{ $guru->tmp_lahir }}</td>
              </tr>
              <tr>
                <th scope="row">Id Card</th>
                <td>:</td>
                <td>{{ $guru->id_card }}</td>
                {{--  --}}
                <th scope="row">Tanggal Lahir</th>
                <td>:</td>
                <td>{{ date('l, d F Y', strtotime($guru->tgl_lahir)) }}</td>
              </tr>
              <tr>
                <th scope="row">Guru Mapel</th>
                <td>:</td>
                <td>{{ $guru->mapel->nama_mapel }}</td>
                {{--  --}}
                <th scope="row">No Telephone</th>
                <td>:</td>
                <td>{{ $guru->telp }}</td>
              </tr>
              <tr>
                <th scope="row">Kode Jadwal</th>
                <td>:</td>
                <td>{{ $guru->kode }}</td>
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
