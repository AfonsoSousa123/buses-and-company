
@foreach ($buses as $bus)

<div class="blog-post">
        <div class="row">
                <div class="col-md-9">
                        <h2 class="blog-post-title">
                                <a href="{{ route('buses-show', $bus->id) }}">

                                        {{ $bus->Matricula }} | {{ $bus->Marca }} | {{ $bus->Modelo }} | {{ $bus->Ano_Producao }} | {{ $bus->Empresa }} 
                                        
                                </a>
                
                        </h2>
                </div>

                <div class="col-md-3">
                        @auth
                                <a href="{{ route('buses-delete', $bus->id) }}" class="btn btn-danger" style="float:right; margin-left:10px;" onclick="return confirm('Deseja realmente eliminar o Autocarro ?');">Eliminar</a>
                                <a href="{{ route('buses-edit', $bus->id) }}" class="btn btn-success" style="float:right;">Editar</a>
                        @endauth    
                </div>
        </div>
        <p class="blog-post-meta">

                {{ $bus->created_at->format('d/m/Y') }} por {{ $bus->user->username }}
        
        </p>

        <a href="{{ route('buses-show', $bus->id) }}">
                <img width="400px" src="{{ $bus->Imagem }}" class="img-thumbnail" >
        </a>
        
</div> 

<hr id='hr1'>
<br>

@endforeach
