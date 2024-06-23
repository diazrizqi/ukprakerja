@extends('template')
@section('main')
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
            <input type="text" name="namaproduk" class="form-control @error('namaproduk') is-invalid @enderror" id="exampleFormControlInput1" value="{{ old('namaproduk') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="exampleFormControlInput1" value="{{ old('foto') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="exampleFormControlInput1" value="{{ old('harga') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Desc Produk</label>
            <input type="text" name="descproduk" class="form-control @error('descproduk') is-invalid @enderror" id="exampleFormControlInput1" value="{{ old('descproduk') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Post</label>
            <select class="custom-select" name="post_id">
                @foreach ($post as $item)
                    <option value="{{$item->id}}">{{$item->judul}}</option>    
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Kategori</label>
            <select class="custom-select" name="kategori_id">
                @foreach ($kategori as $item)
                    <option value="{{$item->id}}">{{$item->namakategori}}</option>    
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
@endsection