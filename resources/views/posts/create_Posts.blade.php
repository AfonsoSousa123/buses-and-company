
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  @extends('layouts.app')

@section('content') 
  
  <div class="container">

    <h2>Publicar Post</h2>

      <form method="POST" action="{{ route('posts-store')}}">

            {{ csrf_field() }}

            <div class="form-group">

              <label for="title">Titulo</label>

              <input type="text" class="form-control" name="title" required>

            </div>


            <div class="form-group">

              <label for="body">Texto</label>

              <textarea name="body" class="form-control" cols="5" rows="10" id="textarea" required></textarea>

            </div>

            <div class="form-group">

              <a href="{{ route('posts')}}" id="submit" class="btn btn-primary">
                    
                Cancelar

              </a>
              <input type="reset" id="submit" class="btn btn-primary" value="Limpar">
              <input type="submit" id="submit" class="btn btn-primary" placeholder="Publicar">
              
            </div>

            @include('layouts.errors')  

      </form>
  </div>
  
@endsection 

      