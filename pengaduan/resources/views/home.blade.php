@extends('adminlte::page')

@section('title', 'AdminLTE')



@section('content_header')
    <!-- <h1 class="m-0 text-dark">Dashboard</h1> -->
@stop

@section('content')
<div class="container">
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="carouselExampleControls" class="carousel slide mb-5" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="/images/camara-ninos-11.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="/images/damkar.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="/images/polisi.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                    </div>
                    <h1 class="text-center font-weight-bold">Layanan Muhadi</h1>
                    <p class="text-center" style="font-size: 2rem;">Untuk selruh masyarakat kalian bisa menggunakan website ini untuk melaporkan jika terjadi kehilangan barang. Kami akan melayani anda selama 24 jam melalui website ini.</p>
                    <a href="{{route('pengaduan.create')}}" type="button" class="btn btn-outline-danger btn-lg btn-block">Buat Laporan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
