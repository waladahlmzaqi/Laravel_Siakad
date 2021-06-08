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
@if ($message = Session::get('danger'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="card-body">
          <table class="table table-bordered table-striped table-hover" width="100%">
            <thead>
              <tr>
                <th>No Induk Siswa</th>
                <th>Nama Siswa</th>
                <th>L/P</th>
                <th>Foto Siswa</th>
              </tr>
            </thead>
            <tbody id="data-siswa">
                @foreach ($siswa as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->no_induk }}</td>
                    <td>{{ $data->nama_siswa }}</td>
                    <td>{{ $data->kelas->nama_kelas }}</td>

                    <td>
                        <form action="{{ route('kelas.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('kelas.showsiswa',$data->id) }}">view siswa</a>
                            <button type="button" class="btn btn-info btn-sm" onclick="getSubsSiswa({{$data->id}})" data-toggle="modal" data-target=".view-siswa">
                              <i class="nav-icon fas fa-users"></i> &nbsp; View Siswa
                            </button>
                            <button type="button" class="btn btn-info btn-sm" onclick="getSubsJadwal({{$data->id}})" data-toggle="modal" data-target=".view-jadwal">
                              <i class="nav-icon fas fa-calendar-alt"></i> &nbsp; View Jadwal
                            </button>
                            <button type="button" class="btn btn-success btn-sm" onclick="getEditKelas({{$data->id}})" data-toggle="modal" data-target="#form-kelas">
                              <i class="nav-icon fas fa-edit"></i> &nbsp; Edit
                            </button>
                            <button class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Kembali</button>
      <a id="link-siswa" href="#" class="btn btn-primary"><i class="nav-icon fas fa-download"></i> &nbsp; Download PDF</a>
    </div>
  </div>

@endsection
@push('script')
<script>
    function getSubsSiswa(id){
      var parent = id;
      $.ajax({
        type:"GET",
        data:"id="+parent,
        dataType:"JSON",
        url:"{{ url('/siswa/view/json') }}",
        success:function(result){
          // console.log(result);
          var siswa = "";
          if(result){
            $.each(result,function(index, val){
              $("#judul-siswa").text('View Data Siswa ' + val.kelas);
              siswa += "<tr>";
                siswa += "<td>"+val.no_induk+"</td>";
                siswa += "<td>"+val.nama_siswa+"</td>";
                siswa += "<td>"+val.jk+"</td>";
                siswa += "<td><img src='"+val.foto+"' width='100px'></td>";
              siswa+="</tr>";
            });
            $("#data-siswa").html(siswa);
          }
        },
        error:function(){
          toastr.error("Errors 404!");
        },
        complete:function(){
        }
      });
      $("#link-siswa").attr("href", "https://siakad.didev.id/listsiswapdf/"+id);
    }
</script>
@endpush
