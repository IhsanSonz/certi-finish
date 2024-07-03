@extends('layouts.main')

@section('content')

<div class="container">
    <form action="{{ route('assesment.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Masukkan Data Pengisian Sertifikat</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" name="name" id="name" type="text" placeholder="Default input" required />
                        </div>
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="birth_date" required />
                        </div>
                        <div class="mb-3">
                            <label for="certificates_id">Certificates</label>
                            <select name="certificates_id" id="certificates_id" class="form-control" required>
                                <option value=""></option>
                                @foreach ($certificates as $certificate)
                                    <option value="{{$certificate->id}}">{{$certificate->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="value" class="form-label">Value</label>
                            <input type="number" class="form-control" name="value" required />
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
