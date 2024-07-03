@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row g-3">
        <div class="col col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lihat Data Sertifikat</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{ route('certificate.index') }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Masukkan Image Sertifikat Baru</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{ route('certificate.create') }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lihat Data Peserta</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{ route('participant.index') }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Masukkan Data Peserta</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{ route('participant.create') }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lihat Data Pengisian Sertifikat</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{ route('assesment.index') }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Masukkan Data Pengisian Sertifikat</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{ route('assesment.create') }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
