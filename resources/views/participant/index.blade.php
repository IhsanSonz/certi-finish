@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List Peserta</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th></th>
                        </tr>
                        @foreach ($participants as $participant)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $participant->name }}</td>
                            <td>{{ $participant->birth_date }}</td>
                            <td>
                                <a href="{{ route('participant.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <form action="{{ route('participant.destroy', ['id' => $participant->id]) }}" method="post" class="d-inline">
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

                    <a href="{{ route('participant.create') }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
