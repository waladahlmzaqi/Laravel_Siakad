@extends('template.master')
@push('link')

@endpush
@section('title', 'SIAKAD | DATA TRASH KELAS')
@section('judul', 'DATA TRASH KELAS')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}</div>
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DATA TRASH KELAS</div>
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

<div class="card">
    <div class="card-header">
        <h4>Trash Data Kelas</h4>
    </div>
    <div class="card-body">
        <table id="table_trash_kelas" class="table table-striped">
          <thead>
              <tr>
                  <th>No.</th>
                  <th>Kelas</th>
                  <th>Paket Keahlian</th>
                  <th>Wali Kelas</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($kelas as $data)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->nama_kelas }}</td>
                  <td>{{ $data->paket->ket }}</td>
                  <td>{{ $data->guru->nama_guru }}</td>
                  <td>
                      <form action="{{ route('kelas.kill', $data->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <a href="{{ route('kelas.restore', $data->id) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-undo"></i> &nbsp; Restore</a>
                          <button class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
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
        $('#table_trash_kelas').DataTable();
    } );
</script>
@endpush
