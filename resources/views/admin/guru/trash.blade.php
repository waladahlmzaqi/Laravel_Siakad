@extends('template.master')
@push('link')

@endpush
@section('title', 'SIAKAD | DATA TRASH GURU')
@section('judul', 'DATA TRASH GURU')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}</div>
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DATA TRASH GURU</div>
@endsection
@section('main')
@if ($message = Session::get('info'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('danger'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
          <h4 class="card-title">Trash Data Guru</h4>
        </div>
        <div class="card-body">
          <table id="table_trash_guru" class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Guru</th>
                    <th>Id Card</th>
                    <th>Guru Mapel</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_guru }}</td>
                    <td>{{ $data->id_card }}</td>
                    <td>{{ $data->mapel->nama_mapel }}</td>
                    <td>
                        <form action="{{ route('guru.kill', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('guru.restore', $data->id) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-undo"></i> &nbsp; Restore</a>
                            <button class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
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
        $('#table_trash_guru').DataTable();
    } );
</script>
@endpush
