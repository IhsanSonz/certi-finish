@extends('layouts.main')

@section('content')

<div class="container">
    <form action="{{ route('certificate.update', ['id' => $certificate->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Pastikan menggunakan method PUT -->
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Sertifikat</h5>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input class="form-control" name="title" id="title" type="text" value="{{ $certificate->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3">{{ $certificate->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="certificate" class="form-label">File</label>
                            <input class="form-control" name="certificate" type="file" id="certificate" accept="image/jpeg, image/png">
                            <small class="text-muted">Leave this blank if you don't want to change the file.</small>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
