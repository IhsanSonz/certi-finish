@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List Pengisian Sertifikat Peserta</h5>

                    <!-- Form Pencarian -->
                    <form action="{{ route('assesment.index') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Cari sertifikat atau peserta..." value="{{ request()->query('search') }}">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </form>

                    @if ($assesments->isNotEmpty())
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Sertifikat</th>
                                <th>Peserta</th>
                                <th>Score</th>
                                <th></th>
                            </tr>
                            @foreach ($assesments as $assesment)
                            <tr>
                                <td>{{ $loop->index + 1 + ($assesments->currentPage() - 1) * $assesments->perPage() }}</td>
                                <td>{{ $assesment->title }}</td>
                                <td>{{ $assesment->name }}</td>
                                <td>{{ $assesment->value }}</td>

                                <td>
                                    <a href="{{ route('assesment.show', ['id' => $assesment->id] ) }}" target="blank" class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('assesment.edit', ['id' => $assesment->id] ) }}" class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <form action="{{ route('assesment.destroy', ['id' => $assesment->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?');">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                        <!-- Link pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $assesments->links('pagination::bootstrap-4') }}
                        </div>
                    @else
                        <p>Tidak ada data pengisian sertifikat peserta.</p>
                    @endif

                    <a href="{{ route('assesment.create') }}" class="btn btn-primary">Tambah Sertifikat Peserta</a>
                    <br><br>
                    <a href="{{ route('assesment.export-excel', ['search' => request()->query('search')]) }}" class="btn btn-primary">Export to Excel</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
