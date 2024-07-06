@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List Sertifikat</h5>

                    <table class="table table-striped table-bordered">
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
                                <a href="{{ route('certificate.edit', ['id' => $certificate->id]) }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-edit"></i> Edit
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

                    <a href="{{ route('certificate.create') }}" class="btn btn-primary">Tambah Sertifikat</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
