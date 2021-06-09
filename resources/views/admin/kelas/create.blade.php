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

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('warning'))
    <div class="alert alert-warning">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('danger'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="" id="form-kelas">
    <div class="" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="judul"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('kelas.store') }}" method="post">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <input type="hidden" id="id" name="id">
                <div class="form-group" id="form_nama"></div>
                <div class="form-group" id="form_paket"></div>
                <div class="form-group">
                  <label for="guru_id">Wali Kelas</label>
                  <select id="guru_id" name="guru_id" class="select2bs4 form-control @error('guru_id') is-invalid @enderror">
                    <option value="">-- Pilih Wali Kelas --</option>
                    @foreach ($guru as $data)
                      <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
                    @endforeach
                  </select>
                </div>
                <label for="nama_kelas">Nama Kelas</label>
                <input type='text' id="nama_kelas" onkeyup="this.value = this.value.toUpperCase()" name='nama_kelas' class="form-control @error('nama_kelas') is-invalid @enderror" placeholder="{{ __('Nama Kelas') }}">

                <label for="paket_id">Paket Keahlian</label>
                <select id="paket_id" name="paket_id" class="select2bs4 form-control @error('paket_id') is-invalid @enderror">
                <option value="">-- Pilih Paket Keahlian --</option>
                @foreach ($paket as $data)
                    <option value="{{ $data->id }}">{{ $data->ket }}</option>
                @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
              <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection
@push('script')
<script>

</script>
@endpush
