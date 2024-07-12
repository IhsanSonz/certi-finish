@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col col-12">
            <div class="card p-5">
                <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
                <section class="row justify-content-center">
                    <section class="col-12 col-sm-6 col-md-4">
                        <form class="form-container" action="{{ route('authenticate') }}" method="POST">
                            @csrf
                            <img src="{{ asset('assets/usb.png') }}" alt="Logo" class="img-fluid mb-3 mx-auto d-block"
                                style="max-width: 150px;">
                            <h4 class="text-center font-weight-bold"> Sistem E-Sertifikat<br> Sangga Buana </h4>

                            <div class="mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukkan username" required>
                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                            <div class="form-footer mt-2">
                                <p> Belum punya account? <a href="{{ route('register') }}">Register</a></p> <!-- Updated link -->
                            </div>
                        </form>
                    </section>
                </section>
            </div>
        </div>
    </div>
</div>

@endsection
