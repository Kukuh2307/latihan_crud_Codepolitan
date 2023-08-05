<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article | edit</title>
        {{-- CSS --}}
        <link href="{{ asset('../../bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        {{-- JS --}}
        <script src="{{ asset('../../bootstrap-5/js/bootstrap.bundle.min.js') }}" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
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

            </form>

            <form action="{{ url("article/{$articles->id}") }}" method="POST" >
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
    </div>
</body>
</html>