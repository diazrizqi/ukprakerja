@extends('template')
@section('main')
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
            <input type="text" name="namakategori" class="form-control @error('namakategori') is-invalid @enderror" id="exampleFormControlInput1" value="{{ old('namakategori') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Desc Kategori</label>
            <textarea name="desckategori" class="form-control  @error('desckategori') is-invalid @enderror" id="exampleFormControlInput1" value="{{ old('desckategori') }}"  cols="30" rows="10"></textarea>
            {{-- <input type="text" name="isi" class="form-control  @error('isi') is-invalid @enderror" id="exampleFormControlInput1"  value="{{ old('isi') }}"> --}}
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
@endsection