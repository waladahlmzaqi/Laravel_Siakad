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
<div class="card card-primary">
    <div class="card-header">
        <h4>Data Siswa</h4>
    </div>
    <div class="d-flex flex-row-reverse mr-5" style="margin-top: -53px; margin-bottom: 30px;">
        <a href="/siswa" class="btn btn-success">Kembali</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <tbody>
              <tr>
                <th scope="row" width="140px">Nama</th>
                <td width="10px">:</td>
                <td width="250px">{{ $siswa->nama_siswa }}</td>
                {{--  --}}
                <th scope="row" width="140px">Jenis Kelamin</th>
                <td width="10px">:</td>
                @if ($siswa->jk == 'L')
                    <td>Laki-laki</td>
                @else
                    <td>Perempuan</td>
                @endif
              </tr>
              <tr>
                <th scope="row">No Induk</th>
                <td>:</td>
                <td>{{ $siswa->no_induk }}</td>
                {{--  --}}
                <th scope="row">Tempat Lahir</th>
                <td>:</td>
                <td>{{ $siswa->tmp_lahir }}</td>
              </tr>
              <tr>
                <th scope="row">NIS</th>
                <td>:</td>
                <td>{{ $siswa->nis }}</td>
                {{--  --}}
                <th scope="row">Tanggal Lahir</th>
                <td>:</td>
                <td>{{ date('l, d F Y', strtotime($siswa->tgl_lahir)) }}</td>
              </tr>
              <tr>
                <th scope="row">Kelas</th>
                <td>:</td>
                <td>{{ $siswa->kelas->nama_kelas }}</td>
                {{--  --}}
                <th scope="row">No Telephone</th>
                <td>:</td>
                <td>{{ $siswa->telp }}</td>
              </tr>
            </tbody>
        </table>
        <div class="mt-5 mb-2">
            {{-- <a href="{{ route("guru.mapel", $guru->mapel_id) }}" class="btn btn-success"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> --}}
        </div>
    </div>
</div>
@endsection
@push('script')

@endpush
