@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">List User</h5>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th></th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-edit">edit</i>
                                </a>
                                <form action="{{ route('user.destroy', ['id' => $user->id]) }}" method="post" class="d-inline">
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

                    <a href="{{ route('user.create') }}" class="btn btn-primary">Buat User Baru</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
