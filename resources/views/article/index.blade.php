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
    {{-- header --}}
    <header class="p-3 text-bg-dark mb-3">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-between">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-between mb-md-0">
              <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
    
            <div class="text-end">
              <button type="button" class="btn btn-outline-light me-2">Login</button>
            </div>
          </div>
        </div>
      </header>
      {{-- akhir header --}}

    <div class="container">
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

    {{-- footer --}}
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <p class="col-md-4 mb-0 text-body-secondary">© 2023 Company, Inc</p>
      
          <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
          </a>
      
          <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
          </ul>
        </footer>
      </div>
</body>
</html>