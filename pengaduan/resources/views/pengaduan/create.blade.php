@extends('adminlte::page')
@section('title', 'Tambah Standar Kompetensi')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Pengaduan</h1>
@stop
@section('content')
    <form action="{{ route('pengaduan.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="laporan">Laporan</label>
                            <input type="text" class="form-control @error('laporan') is-invalid @enderror" id="laporan"
                                placeholder="Standar Kompetensi" name="laporan" value="{{ old('laporan') }}">
                            @error('laporan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi_barang">Deskripsi Barang</label>
                            <input type="text" class="form-control @error('deskripsi_barang') is-invalid @enderror"
                                id="deskripsi_barang" placeholder="Deskripsi Barang" name="deskripsi_barang"
                                value="{{ old('deskripsi_barang') }}">
                            @error('deskripsi_barang') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="tgl_kejadian">Tanggal Kejadian</label>
                            <input type="date" class="form-control @error('tgl_kejadian') is-invalid @enderror"
                                id="tgl_kejadian" placeholder="Tanggal Lahir" name="tgl_kejadian"
                                value="{{ old('tgl_kejadian') }}">
                            @error('tgl_kejadian') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        
                        <div class="form-group">
                            <label for="lokasi_kejadian">Lokasi Kejadian</label>
                            <input type="text" class="form-control @error('lokasi_kejadian') is-invalid @enderror"
                                id="lokasi_kejadian" placeholder="Deskripsi Barang" name="lokasi_kejadian"
                                value="{{ old('lokasi_kejadian') }}">
                            @error('lokasi_kejadian') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            <label for="exampleInputstatus">Status</label>
                            <select class="form-control @error('status') isinvalid @enderror" id="exampleInputstatus" name="status">
                                <option value="belum ditangani" @if(old('status') == 'belum ditangani')selected @endif>belum ditangani</option>
                                <option value="sedang ditangani" @if(old('status') == 'sedang ditangani')selected @endif>sedang ditangani</option>
                                <option value="selesai" @if(old('status') == 'selesai')selected @endif>selesai</option>
                            </select>
                            @error('status') <span class="textdanger">{{$message}}</span> @enderror
                        </div>


                        <div class="form-group">
                            <label for="name">User</label>
                            <div class="input-group">
                                <input type="hidden" name="kduser" id="kduser" value="{{ old('kduser') }}">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nama" id="name" name="name" value="{{ old('name') }}"
                                    aria-label="User" aria-describedby="cari" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-warning" type="button" data-toggle="modal"
                                        data-target="#staticBackdrop">
                                        Cari Data User
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('pengaduan.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Nama</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <table class="table table-hover table-bordered table-stripped" id="example2">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fuser as $key => $pengaduan)
                                @if($pengaduan->id === Auth::user()->id)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td id="{{ $key+1 }}">{{ $pengaduan->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs" onclick="pilih('{{ $pengaduan->id }}', '{{ $pengaduan->name }}')" data-dismiss="modal">
                                                Pilih
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
    </form>
@stop

@push('js')
    <script>
        $(document).ready(function() {
            $('#example2').DataTable({
                "responsive": true,
            });
        });

        //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah
        function pilih(id, fuser) {
            document.getElementById('kduser').value = id;
            document.getElementById('name').value = fuser;
        }
    </script>
@endpush
