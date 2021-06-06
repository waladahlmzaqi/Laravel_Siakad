@extends('template.master')
@push('link')

@endpush
@section('title', 'Pembayaran SPP | DASHBOARD')
@section('judul', 'DASHBOARD')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-user"></i></div>
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DASBOARD</div>
@endsection
@section('main')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>CRUD</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('siswa.create') }}"> Input Data</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No Induk</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Gender</th>
        <th>No Tlp</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Kelas</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($siswa as $siswas)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $siswas->no_induk }}</td>
        <td>{{ $siswas->nis }}</td>
        <td>{{ $siswas->nama_siswa }}</td>
        <td>{{ $siswas->gender }}</td>
        <td>{{ $siswas->telp }}</td>
        <td>{{ $siswas->tmp_lahir }}</td>
        <td>{{ $siswas->tgl_lahir }}</td>
        <td>{{ $siswas->kelas_id }}</td>
        <td>
            <form action="{{ route('biodata.destroy',$siswas->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('siswa.show',$siswas->id) }}">Detail</a>

                <a class="btn btn-primary" href="{{ route('siswa.edit',$siswas->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $siswa->links() !!}
@endsection
@push('script')

@endpush
