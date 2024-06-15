@extends('template')
@section('main')
    <form action="{{ route('kategori.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
            <input type="text" name="namakategori" class="form-control @error('namakategori') is-invalid @enderror"
                id="exampleFormControlInput1" value="{{ $data->namakategori }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Desc Kategori</label>
            <textarea name="desckategori" class="form-control  @error('desckategori') is-invalid @enderror"
            id="exampleFormControlInput1" cols="30" rows="10">{{ $data->desckategori }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
@endsection