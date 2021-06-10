@extends('template.master')
@push('link')

@endpush
@section('title', 'SIAKAD | DATA KELAS')
@section('judul', 'DATA KELAS')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}</div>
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DATA KELAS</div>
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
      <h4>Data Siswa {{ $kelas->nama_kelas }}</h4>
    </div>
    <div class="d-flex flex-row-reverse mr-5" style="margin-top: -53px; margin-bottom: 30px;">
        <a href="/siswa/tambahsiswa" class="btn btn-success">Tambah Siswa +</a>
    </div>
    <div class="card-body">
      <table class="table table-striped" id="table_siswa">
        <thead>
            <tr>
              <th>No</th>
              <th>No Induk Siswa</th>
              <th>Nama Siswa</th>
              <th>Jenis Kelamin</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-striped">
            @foreach ($siswa as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->no_induk }}</td>
                    <td>{{ $data->nama_siswa }}</td>
                    <td>{{ $data->kelas->nama_kelas }}</td>

                    <td>
                        <form action="{{ route('siswa.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a class="btn btn-info" href="{{ route('siswa.show', $data->id) }}"><i class="nav-icon fas fa-users"></i> View Siswa</a>
                            <a class="btn btn-success" href="{{ route('siswa.edit', $data->id) }}"><i class="nav-icon fas fa-edit"></i> Edit</a>
                            <button class="btn btn-danger"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
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
