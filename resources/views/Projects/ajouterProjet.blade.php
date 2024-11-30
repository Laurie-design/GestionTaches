<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouterprojet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>


    <div class="container text-start">
      <div class="row">
        <div class="col s12">
        <h1>Ajouter un projet</h1>
        <hr>

        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <ul>
           @foreach ($errors->all() as $error)
             <li class="alert alert-danger">{{ $error }}</li>
           @endforeach
        </ul>

        <form action="/projet/store" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
          
            <button type="submit" class="btn btn-primary">Ajouter un projet</button>
            <br> <br>
            <a href="/projet/list" class="btn btn-danger">Revenir à la liste des projets</a>
        </form>

        </div>

      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
