@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List Pengisian Sertifikat</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Sertifikat</th>
                            <th>Peserta</th>
                            <th>Nilai</th>
                            <th></th>
                        </tr>
                        @foreach ($assesments as $assesment)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $assesment->title }}</td>
                            <td>{{ $assesment->name }}</td>
                            <td>{{ $assesment->value }}</td>
                            <td>
                                <a href="{{ route('assesment.show', ['id' => $assesment->id] ) }}" target="blank" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <form action="{{ route('assesment.destroy', ['id' => $assesment->id]) }}" method="post" class="d-inline">
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

                    <a href="{{ route('assesment.create') }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection