@extends('template')
@section('main')
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="exampleFormControlInput1" value="{{ old('judul') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Isi</label>
            <textarea name="isi" class="form-control  @error('isi') is-invalid @enderror" id="exampleFormControlInput1" value="{{ old('isi') }}"  cols="30" rows="10"></textarea>
            {{-- <input type="text" name="isi" class="form-control  @error('isi') is-invalid @enderror" id="exampleFormControlInput1"  value="{{ old('isi') }}"> --}}
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
@endsection