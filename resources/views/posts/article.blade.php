
@foreach ($posts as $post)

        <div class="blog-post">

                <h2 class="blog-post-title">

                        <a href="{{ route('posts-show', $post->id) }}">
                                
                                {{ $post->title }}

                                @auth
                                        <a href="{{ route('posts-delete', $post->id) }}" class="btn btn-danger" style="float:right; margin-left:10px;" onclick="return confirm('Deseja realmente eliminar o Post ?');">Eliminar</a>
                                        <a href="{{ route('posts-edit', $post->id) }}" class="btn btn-success" style="float:right;">Editar</a>
                                @endauth
                        
                        </a>
                        
                </h2>

                <p class="blog-post-meta">
        
                        {{ $post->created_at->format('d/m/Y') }} por {{ $post->user->username }}
                
                </p>

                <span class="blog-post-body">
                        {{ $post->body }}
                </span>

                
        </div> 

        <hr id='hr1'>
        <br>

@endforeach
