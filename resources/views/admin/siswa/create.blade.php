@extends('template.master')
@push('link')
<style>
    .card1{
        width: 80%;
        margin: 0px auto;
    }
    .d-flex{
        margin-top: 60px;
    }
</style>
@endpush
@section('title', 'SIAKAD | TAMBAH SISWA')
@section('judul', 'TAMBAH SISWA')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-user"></i></div>
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> TAMBAH SISWA</div>
@endsection
@section('main')
<div class="card card1">
    <div class="card-header">
      <h4>Tambah Data Siswa</h4>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Maaf</strong> Data yang anda inputkan bermasalah.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
              <div class="col-6">
                    <div class="form-group">
                      <label>NISN</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="far fa-address-card"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control" name="nisn">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nama Siswa</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="far fa-address-card"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control" name="nama_siswa">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Jenis Kelamin</label>
                      <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                          <input type="radio" name="jk" value="L" class="selectgroup-input">
                          <span class="selectgroup-button">Laki-laki</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="radio" name="jk" value="P" class="selectgroup-input">
                          <span class="selectgroup-button">Perempuan</span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>No Telephone</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="far fa-address-card"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control" name="no_tlp">
                      </div>
                    </div>
              </div>
              <div class="col-6">
                  <div class="form-group">
                      <label>Tempat Lahir</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-calendar"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control" name="tmp_lahir">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <input type="date" class="form-control" name="tgl_lahir">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Kelas</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="far fa-address-card"></i>
                            </div>
                          </div>
                          <select class="form-control" name="kelas_id">
                              <option value="XI RPL1">XI RPL 1</option>
                              <option value="XI RPL2">XI RPL 2</option>
                              <option value="XI RPL3">XI RPL 3</option>
                          </select>
                      </div>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="ml-3 btn btn-primary">Submit</button>
                      <a href="{{ route('siswa.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
              </div>
            </div>
        </div>
    </form>

</div>
@endsection
@push('script')

@endpush
