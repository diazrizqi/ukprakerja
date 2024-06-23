@extends('template')
@section('main')
    <h1>Data User</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->role }}</td>
                    <td><a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning">Edit</a></td>
                    <td><form action="{{ route('user.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection