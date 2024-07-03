@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List Sertifikat</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                        @foreach ($certificates as $certificate)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $certificate->title }}</td>
                            <td>{!! nl2br($certificate->description) !!}</td>
                            <td>
                                <a href="{{ route('certificate.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <form action="{{ route('certificate.destroy', ['id' => $certificate->id]) }}" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="if (!confirm('Anda yakin akan menghapus data ini?')) {return false;}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    <a href="{{ route('certificate.create') }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
