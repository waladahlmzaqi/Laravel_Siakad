@extends('template.master')
@push('link')

@endpush
@section('title', 'SIAKAD | DATA GURU')
@section('judul', 'DATA GURU')
@section('breadcrump')
        <div class="breadcrumb-item ">{{ Auth::user()->name }}</div>
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

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Data Guru Mapel {{ $mapel->nama_mapel }}</h4>
        </div>
        <div class="d-flex flex-row-reverse mr-5" style="margin-top: -53px; margin-bottom: 30px;">
            <a href="{{ route('guru.index') }}" class="btn btn-success"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table_show_guru" class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Id Card</th>
                    <th>NIP</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_guru }}</td>
                    <td>{{ $data->id_card }}</td>
                    <td>{{ $data->nip }}</td>
                    @if ($data->jk == 'L')
                        <td>Laki-laki</td>
                    @else
                        <td>Perempuan</td>
                    @endif
                    <td>
                        <form action="{{ route('guru.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('guru.show',$data->id) }}" class="btn btn-info btn-sm mt-2"><i class="nav-icon fas fa-id-card"></i> &nbsp; Detail</a>
                            <a href="{{ route('guru.edit',$data->id) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
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

{{-- <div class="card">
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
</div> --}}
@endsection
@push('script')
<script>
    $(document).ready( function () {
        $('#table_show_guru').DataTable();
    } );
</script>
@endpush
