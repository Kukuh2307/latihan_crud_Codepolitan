@extends('layouts.app')
@section('judul','Selamat Datang')
@section('content')
        <h1>Ini adalah content dari article
            <a href="{{ url("article/create") }}"><button class="btn btn-primary">Tambah Artikel</button></a> 
            
        </h1>
        @foreach ($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ $article->content }}</p>
                <p class="card-text"><small class="text-body-secondary">Last updated at {{ date("d M Y H:i", strtotime($article->updated_at)) }}</small></p>
                <a href="{{ url("article/$article->id") }}" class="btn btn-primary">Selengkapnya</a>
                <a href="{{ url("article/$article->id/edit") }}" class="btn btn-warning">edit</a>
            </div>
        </div>
        @endforeach
@endsection
