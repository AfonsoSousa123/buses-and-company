<html class="no-js">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    

    <!-- Meta info -->
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Plataforma Imformativa de Autocarros</title>

    <meta content="" name="description">
    
    @include('layouts.styles')

</head>

<body>
    <div id="container">

        <section id="content">
            
            <div id="what-we-do">
	            <header>

                    @include('layouts.header')

                    <br>
    	            <div id="preamble">

                        <h2 class="h2">Autocarros</h2>
        	 
                    </div>
                    
	            </header>

                <article class="card-body">

                    <div class="row">

                        <div class="col-md-6 blog-main">

                            <form action="{{ route('buses-search') }}" method="POST">
                                {{ csrf_field() }}
                                <input name="b" class="form-control" type="text" placeholder="Pesquise um Autocarro aqui..." required>

                            </form>
    
                        </div>

                            <div class="col-md-3 blog-main">

                                @if(session('message'))
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ session('message') }}
                                        
                                    </div>
                                @endif

                            </div>

                        <div class="col-sm-3 blog-main">
                            @auth
                                <a href="{{ route('buses-create') }}" id="create_b" class="btn btn-primary">
                                    Adicionar Autocarro
                                </a>
                            @endauth
                        </div>
                        

                    </div>
                    
                    <hr id="hr1">
                    <br>

                    <div class="row">

                        <div class="col-xl-12 blog-main">

                            @if (isset($details))

                                <div style="float:right">

                                    <a class="btn btn-info" href="{{ route('buses') }}">Voltar Atrás</a>

                                </div>
                                
                                <h2> O resultado da sua pesquisa <b> {{ $query }} </b> é : </h2>
                              

                                @include('buses.articleSearch_Buses', ['buses' => $buses])

                            @else
                                
                                @include('buses.article_Buses', ['buses' => $buses])

                                <nav style="margin-left:10px;">

                                    {!! $buses->links(); !!}

                                </nav>

                            @endif

                        </div>

                    </div>


                </article>

            </div><!-- what we do -->

        </section>

    </div>
</body>


    @extends('layouts.footer')

    @extends('layouts.nav_bar')

</body>
</html>