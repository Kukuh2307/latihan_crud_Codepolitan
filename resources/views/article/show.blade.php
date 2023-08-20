<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @php(dd($article)) --}}
    <title>Artikel | Detail {{ $article->title }}</title>
        {{-- CSS --}}
        <link href="{{ asset('../../bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        {{-- CUSTOM STYLE --}}
        <link rel="stylesheet" href="{{ asset('../../css/article.css') }}">

        {{-- JS --}}
        <script src="{{ asset('../../bootstrap-5/js/bootstrap.bundle.min.js') }}" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
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
</body>
</html>