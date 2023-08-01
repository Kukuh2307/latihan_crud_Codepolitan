<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article | create</title>
        {{-- CSS --}}
        <link href="{{ asset('../../bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        {{-- JS --}}
        <script src="{{ asset('../../bootstrap-5/js/bootstrap.bundle.min.js') }}" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
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
</body>
</html>