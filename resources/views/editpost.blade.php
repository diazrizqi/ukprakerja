@extends('template')
@section('main')
    <form action="{{ route('post.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                id="exampleFormControlInput1" value="{{ $data->judul }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Isi</label>
            <textarea name="isi" class="form-control  @error('isi') is-invalid @enderror"
            id="exampleFormControlInput1" cols="30" rows="10">{{ $data->isi }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
@endsection