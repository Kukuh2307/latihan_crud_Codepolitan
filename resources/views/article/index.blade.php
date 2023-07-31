<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
    {{-- CSS --}}
    <link href="{{ asset('../../bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    {{-- JS --}}
    <script src="{{ asset('../../bootstrap-5/js/bootstrap.bundle.min.js') }}" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
        .article{
            padding: 5px;
            border-bottom: 2px solid grey;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ini adalah content dari article</h1>
        @foreach ($articles as $article)
        @php($article = explode(',', $article))
        @dd($article)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $article[1] }}</h5>
                <p class="card-text">{{ $article[2] }}</p>
                <p class="card-text"><small class="text-body-secondary">Last updated at {{ date("d M Y H:i", strtotime($article[3])) }}</small></p>
                <a href="#" class="btn btn-primary">Selengkapnya</a>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>