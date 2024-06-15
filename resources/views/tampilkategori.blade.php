@extends('template')
@section('main')
    <h1>Data Kategori</h1>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary my-3">Tambah Data</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Desc Kategori</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->namakategori }}</td>
                    <td>{{ $item->desckategori }}</td>
                    <td><a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning">Edit</a></td>
                    <td><form action="{{ route('kategori.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection