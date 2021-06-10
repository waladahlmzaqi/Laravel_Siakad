@extends('template.master')
@push('link')
<style>
    .card{
        width: 50%;
        margin: 0px auto;
    }
</style>
@endpush
@section('title', 'SIAKAD | DATA MAPEL')
@section('judul', 'DATA MAPEL')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}</div>
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DATA MAPEL</div>
@endsection
@section('main')
<div class="card card-primary">
    <div class="card-header">
        <h4>Tambah Mapel</h4>
    </div>
    <div class="card-body">
        <div class="container">
            <form action="{{ route('mapel.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama_mapel">Nama Mapel</label>
                            <input type="text" id="nama_mapel" name="nama_mapel" class="form-control @error('nama_mapel') is-invalid @enderror" placeholder="{{ __('Nama Mata Pelajaran') }}">
                        </div>
                        <div class="form-group">
                            <label for="paket_id">Paket</label>
                            <select id="paket_id" name="paket_id" class="form-control @error('paket_id') is-invalid @enderror select2bs4">
                                <option value="">-- Pilih Paket Mapel --</option>
                                <option value="9">Semua</option>
                                @foreach ($paket as $data)
                                <option value="{{ $data->id }}">{{ $data->ket }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelompok">Kelompok</label>
                            <select id="kelompok" name="kelompok" class="select2bs4 form-control @error('kelompok') is-invalid @enderror">
                                <option value="">-- Pilih Kelompok Mapel --</option>
                                <option value="A">Pelajaran Umum</option>
                                <option value="B">Pelajaran Kejuruan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <a href="/mapel" class="btn btn-success"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a>
                    <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
</script>
@endpush
