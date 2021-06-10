@extends('template.master')
@push('link')

@endpush
@section('title', 'SIAKAD | DATA GURU')
@section('judul', 'DATA GURU')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}</div>
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DATA GURU</div>
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
        <a href="/guru/tambahguru" class="btn btn-success">Tambah Guru +</a>
     </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="table_guru" class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Mapel</th>
                <th>Lihat Guru</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mapel as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_mapel }}</td>
                    <td>
                        <a href="{{ route('guru.mapel', $data->id) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp; Ditails</a>
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
