<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
    <style>
        .article{
            padding: 5px;
            border-bottom: 2px solid grey;
        }
    </style>
</head>
<body>
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
</body>
</html>