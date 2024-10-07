<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listes des taches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
  </head>

  <body>

    <div class="container text-center">
      <div class="row">
        <div class="col s12">
          <h1>Bienvenue</h1>
          <hr>
          <a href="/tache/add" class="btn btn-primary">Ajouter une tache</a>
          <hr>

          @if (session('status'))
              <div class="alert alert-success">
                  {{session('status')}}
              </div>
          @endif

          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php
              $ide = 1;
              @endphp
              @foreach($tasks as $task)
                <tr>
                  <td>{{$ide}}</td>
                  <td> {{$task->name}} </td>
                  <td>
                    <a href="/tache/edit/{{$task->id}}" class="btn btn-info">Mettre à jour</a>
                    <form action="{{ route('tache.destroy', ['id' => $task->id]) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Supprimer</button>
                  </form>
                                    </td>
                </tr>
              @php
              $ide += 1;
              @endphp
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
  </body>
</html>
