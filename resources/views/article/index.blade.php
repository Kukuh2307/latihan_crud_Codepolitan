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
        @php($number = 1)
    <h1>Ini adalah content dari article</h1>
    @foreach ($articles as $article)
        <div class="article">
            <h3>
                <small>{{ $number }}</small>
                {{ $article[0] }}
            </h3>
            <p>{{ $article[1] }}</p>
        </div>
        @php($number++)
    @endforeach
    </div>
</body>
</html>