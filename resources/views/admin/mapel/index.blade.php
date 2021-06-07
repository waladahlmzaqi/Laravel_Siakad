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

<div class="card">
    <div class="card-header">
      <h4>Data Mapel</h4>
    </div>
    <div class="d-flex flex-row-reverse mr-5" style="margin-top: -53px; margin-bottom: 30px;">
        <a href="/mapel/tambahmapel" class="btn btn-success">Tambah Mapel +</a>
    </div>
    <div class="card-body">
      <table class="table table-striped" id="table_mapel">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Gender</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody class="table-striped text-center">
            @foreach ($mapel as $result => $data)
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
                        <form action="{{ route('mapel.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('mapel.edit', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                            <button class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
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
        $('#table_mapel').DataTable();
    } );
</script>
@endpush
