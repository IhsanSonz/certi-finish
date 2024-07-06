@extends('layouts.main')

@section('content')

<div class="container">
    <form action="{{ route('assesment.update', ['id' => $assesment->id]) }}" method="post">
        @csrf
        @method('PUT') <!-- Menggunakan method PUT -->
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Pengisian Sertifikat Peserta</h5>
                        <div class="mb-3">
                            <label for="title" class="form-label">Sertifikat</label>
                            <input class="form-control" name="title" id="title" type="text" value="{{ $assesment->title }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Peserta</label>
                            <input class="form-control" name="name" id="name" type="text" value="{{ $assesment->name }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="value" class="form-label">Score</label>
                            <input class="form-control" name="value" id="value" type="text" value="{{ $assesment->value }}">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3">{{ $assesment->keterangan }}</textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
