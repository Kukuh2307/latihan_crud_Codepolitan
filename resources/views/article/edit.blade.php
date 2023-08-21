@extends('layouts.app')
@section('judul','Edit Artikel')
@section('content')
    <div class="container">
        <h1>Edit Artikel</h1>
        <form action="{{ url("article/{$articles->id}") }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="tittle" class="form-label">Judul :</label>
                <input type="text" class="form-control" id="tittle" name="tittle" value="{{ $articles->title }}">
              </div>
              <div class="mb-3">
                <label for="content" class="form-label">Deskripsi :</label>
                <textarea class="form-control" id="content" name="content" rows="3">{{ $articles->content }}</textarea>
              </div>
              <button type="submit" class="btn btn-primary">Ubah</button>
              <a href="{{ url('article') }}">
                <button class="btn btn-primary">< Kembali</button>
            </a>

            </form>

            <form action="{{ url("article/{$articles->id}") }}" method="POST" >
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
    </div>
@endsection