@extends('layouts.app')
@section('judul',"Judul : $article->title")
@section('content')
    <div class="container">
        <article class="blog-post">
            <h2 class="display-5 link-body-emphasis mb-1">{{ $article->title }}</h2>
            <p class="blog-post-meta">{{ date("d M Y H:i", strtotime($article->created_at)) }}</p>
            <p>{{ $article->content }}</p>

            <small class="text-muted"> Total Komentar : {{ $total_komentar }}</small>
            @foreach($comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <p style="font-size: 8pt">
                        {{ $comment->comment }}
                    </p>
                </div>
            </div>
            @endforeach
        </article>
        <a href="{{ url('article') }}">
            <button class="btn btn-primary">< Kembali</button>
        </a>
    </div>
@endsection