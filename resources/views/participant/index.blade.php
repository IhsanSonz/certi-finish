@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List Peserta Yang Terdaftar Dalam Pengisian Sertifikat</h5>

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Date of Birth</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participants as $participant)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $participant->name }}</td>
                                <td>{{ $participant->birth_date }}</td>
                                <td>
                                    <a href="{{ route('participant.edit', ['id' => $participant->id]) }}" class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('participant.destroy', ['id' => $participant->id]) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?');">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                <!--  <a href="{{ route('participant.create') }}" class="btn btn-primary">Buat Peserta Baru</a> -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
