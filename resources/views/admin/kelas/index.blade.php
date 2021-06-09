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
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Data Guru</h4>
        </div>
        <div class="d-flex flex-row-reverse mr-5" style="margin-top: -53px; margin-bottom: 30px;">
            <a href="/kelas/createkelas" class="btn btn-success">Tambah Kelas +</a>
         </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table_kelas" class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kelas</th>
                    <th>Wali Kelas</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_kelas }}</td>
                    <td>{{ $data->guru->nama_guru }}</td>
                    <td>
                        <form action="{{ route('kelas.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a class="btn btn-info" href="{{ route('kelas.siswa',$data->id) }}"><i class="nav-icon fas fa-users"></i> View Siswa</a>
                            <button class="btn btn-danger"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready( function () {
        $('#table_kelas').DataTable();
    } );
</script>
@endpush
