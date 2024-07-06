@extends('layouts.main')

@section('content')

<div class="container">
    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Masukkan Data User Baru</h5>
                        <br>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" name="name" id="name" type="text" placeholder="Masukan Nama" required />
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" name="username" id="username" type="text" placeholder="Masukan Username" required />
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">password</label>
                          <input type="password" class="form-control" name="password" required />
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
