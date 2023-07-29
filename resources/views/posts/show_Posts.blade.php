<html class="no-js">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>

    <!-- Meta info -->
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Plataforma Informativa de Autocarros</title>

    @extends('layouts.styles')

</head>
<body>
<div id="container">
    <section id="content">
        <div id="pfd-work">
            <div id="work-bio">
                <header>

                    <div class="container">

                        <h4>
                            <a class="navbar-brand" href="{{ url('/') }}" id="title">

                                <img src="{{ asset('BUS-COMPANY-LOGO.png') }}" alt="">

                            </a>

                        </h4>

                    </div>
                    <br><br>

                    <div id="preamble" class="posts_show">
                        <div class="col-sm-10 blog-main">
                            <h1>
                                {{ $post->title }}
                            </h1>

                            <br>

                            <p class="blog-post-meta">
                                <strong>

                                    {{ $post->created_at->format('d/m/Y') }} por {{ $post->user->username }}

                                </strong>
                            </p>

                            {{ $post->body }}

                            <hr id="hr1">

                            <div class="comments">

                                <h4 style="color:#e87543;font-weight:bold;">Comentários</h4>


                                @foreach ($post->comments as $comment)

                                    <article>

                                        <strong style="color:#3A86BB;">

                                            {{ $comment->created_at->format('d/m/Y') }} por {{ $post->user->username }}:

                                            @auth
                                                <a
                                                        href="{{ route('comment-delete', ['comment', $comment->id]) }}"
                                                        class="close"
                                                        onclick="return confirm('Deseja realmente eliminar o Comentário ?');"
                                                >

                                                    <span aria-hidden="true"
                                                          style="color:red;font-size:30px;">&times;</span>

                                                </a>
                                            @endauth

                                        </strong>

                                        <p style="color:#d3f8ff;">
                                            {{ $comment->body }}
                                        </p>


                                    </article>

                                    <hr>

                                @endforeach


                            </div>

                            <!-- Add Comments -->

                            @auth
                                <div class="card-block">

                                    <form action="{{ route('comment-store', ['comment' => $post->id]) }}" method="POST">

                                        {{ csrf_field() }}

                                        <div class="form-group">

                                            <textarea id="comment" name="body" placeholder="O seu comentário..."
                                                      class="form-control" required></textarea>

                                        </div>


                                        <div class="form-group">

                                            <input type="submit" class="btn btn-primary" value="Comentar">

                                        </div>

                                    </form>

                                    @include('layouts.errors')

                                </div>
                            @endauth


                        </div>
                    </div>

                    <ul id="links">
                        <li>
                            <a href="{{ route('posts') }}" id="home">Back</a>
                        </li>
                    </ul>

                </header>
            </div>

            @extends('layouts.partials.footer')

            <!-- Secção das Fotografias -->
            <section id="work-visuals">
                <ul>
                    <li data-visual="website-design-florentina-norfolk">
                        <img style="width:700px;" class="img-thumbnail" src="{{ asset('images/image1.jpg') }}">&nbsp;
                    </li>
                    <li data-visual="florentina-logo-design">
                        <img style="width:700px;" class="img-thumbnail"
                             src="{{ asset('images/project-detail-2.jpg') }}">&nbsp;
                    </li>
                </ul>
            </section>

        </div>

    </section>


</div><!-- container -->

@extends('layouts.nav_bar')

</body>
</html>
