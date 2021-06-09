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

<div class="card card-primary">
    <div class="card-header">
        <h4>Edit Data Guru</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('guru.update', $guru->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_guru">Nama Guru</label>
                        <input type="text" id="nama_guru" name="nama_guru" value="{{ $guru->nama_guru }}" class="form-control @error('nama_guru') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="mapel_id">Mapel</label>
                        <select id="mapel_id" name="mapel_id" class="select2bs4 form-control @error('mapel_id') is-invalid @enderror">
                            <option value="">-- Pilih Mapel --</option>
                            @foreach ($mapel as $data)
                                <option value="{{ $data->id }}"
                                    @if ($guru->mapel_id == $data->id)
                                        selected
                                    @endif
                                >{{ $data->nama_mapel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tmp_lahir">Tempat Lahir</label>
                        <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ $guru->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="id_card">Nomor ID Card</label>
                        <input type="text" id="id_card" name="id_card" class="form-control" value="{{ $guru->id_card }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="telp">Nomor Telpon/HP</label>
                        <input type="text" id="telp" name="telp" value="{{ $guru->telp }}" class="form-control @error('telp') is-invalid @enderror">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" id="nip" name="nip" onkeypress="return inputAngka(event)" value="{{ $guru->nip }}" class="form-control @error('nip') is-invalid @enderror" disabled>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L"
                                @if ($guru->jk == 'L')
                                    selected
                                @endif
                            >Laki-Laki</option>
                            <option value="P"
                                @if ($guru->jk == 'P')
                                    selected
                                @endif
                            >Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $guru->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode Jadwal</label>
                        <input type="text" id="kode" name="kode" class="form-control" value="{{ $guru->kode }}" disabled>
                    </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <a href="{{route("guru.mapel", $guru->mapel_id)}}" name="kembali" class="btn btn-success" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
              <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('script')

@endpush
