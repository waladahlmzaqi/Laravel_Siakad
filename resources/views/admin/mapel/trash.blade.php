@extends('template.master')
@push('link')

@endpush
@section('title', 'SIAKAD | DATA MAPEL')
@section('judul', 'DATA MAPEL')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-user"></i></div>
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DATA MAPEL</div>
@endsection
@section('main')

@if ($message = Session::get('info'))
    <div class="alert alert-info">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('danger'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

@php
    $no = 1;
@endphp
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Trash Data Mapel</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Mapel</th>
                    <th>Paket</th>
                    <th>Kelompok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mapel as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_mapel }}</td>
                    @if ( $data->paket_id == 9 )
                      <td>{{ 'Semua' }}</td>
                    @else
                      <td>{{ $data->paket->ket }}</td>
                    @endif
                    <td>{{ $data->kelompok }}</td>
                    <td>
                        <form action="{{ route('mapel.kill', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('mapel.restore', $data->id) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-undo"></i> &nbsp; Restore</a>
                            <button type="submit" class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
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
        $('#table_mapel').DataTable();
    } );
</script>
@endpush
