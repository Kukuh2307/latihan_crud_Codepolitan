@extends('layouts.app')
@section('judul','Buat Artikel baru')
@section('content')
    <div class="container">
        <h1>Tambah Artikel</h1>
        <form action="{{ url("article") }}" method="POST" class="form-control">
            @csrf
            <div class="mb-3">
                <label for="tittle" class="form-label">Judul :</label>
                <input type="text" class="form-control" id="tittle" name="tittle">
              </div>
              <div class="mb-3">
                <label for="content" class="form-label">Deskripsi :</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection