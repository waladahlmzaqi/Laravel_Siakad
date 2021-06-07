@extends('template.master')
@push('link')

@endpush
@section('title', 'SIAKAD | DATA SISWA')
@section('judul', 'DATA GURU')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-user"></i></div>
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DATA SISWA</div>
@endsection
@section('main')
<div class="modal-body">
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
              <option value="B">Pelajaran Khusus</option>
              <option value="C">Pelajaran Keahlian</option>
            </select>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
        <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
    </form>
</div>
    </div>
</div>
@endsection
@push('script')
<script>
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataMapel").addClass("active");
  </script>
@endpush
