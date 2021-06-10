@extends('template.master')
@push('link')
<style>
    .card{
        width: 50%;
        margin: 0px auto;
    }
</style>
@endpush
@section('title', 'SIAKAD | DATA KELAS')
@section('judul', 'DATA KELAS')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}</div>
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DATA KELAS</div>
@endsection
@section('main')
<div class="card card-primary">
    <div class="card-header">
        <h4>Tambah Data Kelas</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('kelas.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="guru_id">Wali Kelas</label>
                        <select id="guru_id" name="guru_id" class="select2bs4 form-control @error('guru_id') is-invalid @enderror">
                            <option value="">-- Pilih Wali Kelas --</option>
                            @foreach ($guru as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input type='text' id="nama_kelas" name='nama_kelas' class="form-control @error('nama_kelas') is-invalid @enderror" placeholder="{{ __('Nama Kelas') }}">
                    </div>
                    <div class="form-group">
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
            <div class="modal-footer justify-content-end">
                <a href="/kelas" class="btn btn-success"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a>
                <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('script')
<script>

</script>
@endpush
