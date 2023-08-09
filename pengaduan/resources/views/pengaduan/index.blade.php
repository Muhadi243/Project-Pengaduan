@extends('adminlte::page')
@section('title', 'List Pengaduan')
@section('content_header')
 <h1 class="m-0 text-dark">List Pengaduan</h1>
@stop
@section('content')
 <div class="row">
 <div class="col-12">
 <div class="card">
 <div class="card-body">
 @if (Auth::user()->level != 'petugas')
 <a href="{{route('pengaduan.create')}}" class="btn btn-primary mb-2">
 Tambah
 </a>
 @endif
 <table class="table table-hover table-bordered 
table-stripped" id="example2">
 <thead>
 <tr>
 <th>No.</th>
 <th>Nama</th>
 <th>Laporan</th>
 <th>Deskripsi Barang</th>
 <th>Tanggal Kejadian</th>
 <th>Lokasi Kejadian</th>
 <th>Status</th>
 <th>Opsi</th>
 </tr>
 </thead>
 <tbody>
 @foreach($pengaduan as $key => $pengaduan)
 <tr>
 <td>{{$key+1}}</td>
<td>
    <?php
    $studyField = DB::table('users')->where('id', $pengaduan->kduser)->first();
    echo $studyField->name;
    ?>
</td>
<td>{{$pengaduan->laporan}}</td>
 <td>{{$pengaduan->deskripsi_barang}}</td>
<td>{{$pengaduan->tgl_kejadian}}</td>
<td>{{$pengaduan->lokasi_kejadian}}</td>
<td>{{$pengaduan->status}}</td>
<td>
@if (Auth::user()->level == 'petugas')
                                            <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="status" value="sedang ditangani">
                                                <button type="submit" class="btn btn-primary btn-xs">Tangani</button>
                                            </form>
                                        @else
                                            <a href="{{ route('pengaduan.edit', $pengaduan) }}" class="btn btn-primary btn-xs">Edit</a>
                                        @endif
 @if (Auth::user()->level != 'petugas')
     <a href="{{route('pengaduan.destroy', $pengaduan)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
         Delete
     </a>
 @endif
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
 </div>
 </div>
 </div>
 </div>
@stop
@push('js') 
 <form action="" id="delete-form" method="post"> 
 @method('delete') 
 @csrf 
 </form> 
 <script> 
 $('#example2').DataTable({ 
 "responsive": true, 
 }); 
 function notificationBeforeDelete(event, el) { 
 event.preventDefault(); 
 if (confirm('Apakah anda yakin akan menghapus data ? ')) { 
 $("#delete-form").attr('action', $(el).attr('href')); 
 $("#delete-form").submit(); 
 } 
 } 
 </script> 
@endpush