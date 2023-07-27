<!DOCTYPE html>
<html class="no-js">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>

    <!-- Meta info -->
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Plataforma Informativa de Autocarros</title>

    <meta content="" name="description">


    <!-- styles -->
    @extends('layouts.styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="js/modernizr-2.6.2.js"></script>

</head>

<body>
<div id="container">
    <section id="content">

        <div id="what-we-do">

            <header>

                @include('layouts.partials.header')

                <br>
                <div id="preamble">

                    <h2 class="h2">Publicações</h2>

                </div>

            </header>


            <!-- Posts -->
            <article class="card-body">

                <div class="row">

                    <div class="col-md-6 blog-main">

                        <form action="{{ route('posts-search') }}" method="POST" role="search">
                            {{ csrf_field() }}
                            <input name="q" class="form-control" type="text"
                                   placeholder="Pesquise uma Publicação aqui..." required>

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
                            <a href="{{ route('posts-create') }}" id="create_p" class="btn btn-primary">
                                Criar um Post
                            </a>
                        @endauth
                    </div>


                </div>

                <hr id="hr1">
                <br>


                <div class="col-md-12 blog-main">

                    @if (isset($details))

                        <div style="float:right">

                            <a class="btn btn-info" href="{{ route('posts') }}">Voltar Atrás</a>

                        </div>

                        <h2> O resultado da sua pesquisa <b> {{ $query }} </b> é : </h2>


                        @include('posts.articleSearch', ['post' => $posts])

                    @else

                        @include('posts.article', ['post' => $posts])

                        <nav class="text-center">

                            {!! $posts->links(); !!}

                        </nav>

                    @endif

                </div>
            </article>

    </section>

</div>
</div>

@extends('../layouts.footer')

</div><!-- container -->


@extends('../layouts.nav_bar')


<!-- no-script -->


</body>
</html>
