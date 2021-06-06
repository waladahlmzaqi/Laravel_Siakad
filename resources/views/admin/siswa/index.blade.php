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
      <h4>Data Siswa</h4>
    </div>
    <div class="d-flex flex-row-reverse mr-5" style="margin-top: -53px; margin-bottom: 30px;">
        <a href="{{ route('siswa.create') }}" class="btn btn-success">Tambah Siswa +</a>
    </div>
    <div class="card-body">
      <table class="table table-striped" id="table_siswa">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Gender</th>
                <th>No.Telephone</th>
                <th>Tempat & Tanggal Lahir</th>
                <th>Kelas</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody class="table-striped text-center">
            @foreach ($siswa as $siswas)
                <tr>
                    <td>{{ $siswas->id }}</td>
                    <td>{{ $siswas->nisn }}</td>
                    <td>{{ $siswas->nama_siswa }}</td>
                    <td>{{ $siswas->jk }}</td>
                    <td>{{ $siswas->no_tlp }}</td>
                    <td>{{ $siswas->tmp_lahir }} {{ $siswas->tgl_lahir }}</td>
                    <td>{{ $siswas->kelas_id }}</td>
                    <td>
                        <form action="{{ route('siswa.destroy',$siswas->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('siswa.show',$siswas->id) }}">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <a class="btn btn-primary" href="{{ route('siswa.edit',$siswas->id) }}">
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
        $('#table_siswa').DataTable();
    } );
</script>
@endpush
