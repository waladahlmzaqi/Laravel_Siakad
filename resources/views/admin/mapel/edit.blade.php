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
      <h4 class="card-title">Edit Data Mapel</h4>
    </div>
    <form action="{{ route('mapel.store') }}" method="post">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
              <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">
              <div class="form-group">
                <label for="nama_mapel">Nama Mapel</label>
                <input type="text" id="nama_mapel" name="nama_mapel" value="{{ $mapel->nama_mapel }}" class="form-control @error('nama_mapel') is-invalid @enderror" placeholder="{{ __('Nama Mata Pelajaran') }}">
              </div>
              <div class="form-group">
                <label for="paket_id">Paket</label>
                <select id="paket_id" name="paket_id" class="form-control @error('paket_id') is-invalid @enderror select2bs4">
                  <option value="">-- Pilih Paket Mapel --</option>
                  <option value="9"
                      @if ($mapel->paket_id == '9')
                          selected
                      @endif
                  >Semua</option>
                  @foreach ($paket as $data)
                    <option value="{{ $data->id }}"
                      @if ($mapel->paket_id == $data->id)
                          selected
                      @endif
                    >{{ $data->ket }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                  <label for="kelompok">Kelompok</label>
                  <select id="kelompok" name="kelompok" class="select2bs4 form-control @error('kelompok') is-invalid @enderror">
                      <option value="">-- Pilih Kelompok Mapel --</option>
                      <option value="A"
                          @if ($mapel->kelompok == 'A')
                              selected
                          @endif
                      >Pelajaran Umum</option>
                      <option value="B"
                          @if ($mapel->kelompok == 'B')
                              selected
                          @endif
                      >Pelajaran Kejuruan</option>
                  </select>
              </div>
          </div>
        </div>
        <div class="modal-footer justify-content-end">
            <a href="/mapel" class="btn btn-success"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
            <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
        </div>
      </div>
    </form>
</div>
@endsection
@push('script')
<script type="text/javascript">
</script>
@endpush
