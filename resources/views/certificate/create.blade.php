@extends('layouts.main')

@section('content')

<div class="container">
    <form action="{{ route('certificate.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Masukkan Image Sertifikat Baru</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input class="form-control" name="title" id="title" type="text" placeholder="Default input">
                        </div>
                        <div class="mb-3">
                          <label for="description" class="form-label">Description</label>
                          <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="certificate" class="form-label">File</label>
                            <input class="form-control" name="certificate" type="file" id="certificate" accept="image/jpeg, image/png">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
