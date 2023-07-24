
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  @extends('layouts.app')

@section('content') 
  
  <div class="container">

    <h2>Editar um Post</h2>

      <form method="POST" action="{{ route('posts-update', ['post' => $post->id])}}">

            {{ csrf_field() }}
            {{ method_field('PUT') }}
            
            <div class="form-group">

              <label for="title">Titulo</label>

            <input value="{{ $post->title }}" type="text" class="form-control" name="title" required>

            </div>


            <div class="form-group">

              <label for="body">Texto</label>

              <textarea name="body" class="form-control" cols="5" rows="5" id="textarea" required>{{ $post->body }}</textarea>

            </div>

            <div class="form-group">

              <a href="{{ route('posts')}}" id="submit" class="btn btn-primary">
                    
                Cancelar

              </a>
              <input type="reset" id="submit" class="btn btn-primary" value="Limpar">
              <input type="submit" id="submit" class="btn btn-primary" value="Editar" onclick="return confirm('Deseja realmente alterar o Post ?');">
              
            </div>

            @include('layouts.errors')  

      </form>
  </div>
  
@endsection 