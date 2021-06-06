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

<div class="card">
    <div class="card-header">
      <h4>Data Guru</h4>
    </div>
    <div class="d-flex flex-row-reverse mr-5" style="margin-top: -53px; margin-bottom: 30px;">
        <a href="{{ route('guru.create') }}" class="btn btn-success">Tambah Guru +</a>
    </div>
    <div class="card-body">
      <table class="table table-striped" id="table_siswa">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Mapel</th>
                <th>Gender</th>
                <th>No. Telp</th>
                <th>Tempat & Tanggal Lahir</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody class="table-striped text-center">
            @foreach ($guru as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->nama_guru }}</td>
                    <td>{{ $data->mapel_id }}</td>
                    <td>{{ $data->jk }}</td>
                    <td>{{ $data->no_tlp }}</td>
                    <td>{{ $data->tmp_lahir }} {{ $data->tgl_lahir }}</td>
                    <td>
                        <form action="{{ route('guru.destroy',$data->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('guru.show',$data->id) }}">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <a class="btn btn-primary" href="{{ route('guru.edit',$data->id) }}">
                                <i class="far fa-edit"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready( function () {
        $('#table_guru').DataTable();
    } );
</script>
@endpush
