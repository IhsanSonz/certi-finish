@extends('layouts.main')

@section('content')

<div class="container">
    <form action="{{ route('participant.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Masukkan Data Peserta Baru</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" name="name" id="name" type="text" placeholder="Default input" required />
                        </div>
                        <div class="mb-3">
                          <label for="birth_date" class="form-label">Date of Birth</label>
                          <input type="date" class="form-control" name="birth_date" required />
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
