@extends('template')
@section('main')
    <h1>Data Produk</h1>
    <a href="{{ route('produk.create') }}" class="btn btn-primary my-3">Tambah Data</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Foto</th>
                <th scope="col">harga</th>
                <th scope="col">Desc Produk</th>
                <th scope="col">Judul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->namaproduk }}</td>
                    <td><img src="{{ asset($item->foto) }}" class="img-thumbnail" style="width:200px" /></td>
                    {{-- <td><img src="{{ 'storage/'.$item->foto }}" width="300" alt=""></td> --}}
                    <td>{{ $item->harga }}</td>
                    <td>{{ $item->descproduk }}</td>
                    <td>{{ $item->Post->judul }}</td>
                    <td>{{ $item->Kategori->namakategori }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td><a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning">Edit</a></td>
                    <td><form action="{{ route('produk.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection