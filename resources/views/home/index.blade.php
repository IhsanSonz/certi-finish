@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row g-3">

        <!-- Section: Description -->
        <div class="col-12">
            <div class="alert alert-info" role="alert">
                Selamat datang di halaman pengelolaan sertifikat.<br> Di sini Anda dapat melihat, menambahkan, dan mengelola data sertifikat dengan mudah.
            </div>
        </div>

     <!-- Section: Actions -->
<div class="container">
    <div class="row g-3 text-center">
        <!-- Card 1 -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Buat Sertifikat Baru</h5>
                    <a href="{{ route('certificate.create') }}" class="btn btn-success">Tambah</a>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Data Peserta Sertifikat</h5>
                    <a href="{{ route('assesment.create') }}" class="btn btn-success">Tambah</a>
                </div>
            </div>
        </div>
    </div>
</div>



</div>

@endsection
