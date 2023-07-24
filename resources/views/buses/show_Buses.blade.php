
<html class="no-js">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        

        <!-- Meta info -->
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <title>Plataforma Informativa de Autocarros</title>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                            <div class="col-sm-12 blog-main">

                                <h4 class="blog-post-meta" style="margin-bottom:20px;">
                                    <strong>

                                        {{ $bus->created_at->format('d/m/Y') }} por {{ $bus->user->username }}

                                    </strong>
                                </h4>

                                <ul class="list-group" id="table_b">

                                    <li class="list-group-item"><span class="list-buses">Matrícula:</span> <strong>{{ $bus->Matricula }}</strong></li>
                                    <li class="list-group-item"><span class="list-buses">Marca:</span> <strong>{{ $bus->Marca }}</strong></li>
                                    <li class="list-group-item"><span class="list-buses">Modelo:</span> <strong>{{ $bus->Modelo }}</strong></li>
                                    <li class="list-group-item"><span class="list-buses">Ano de Produção:</span> <strong>{{ $bus->Ano_Producao }}</strong></li>
                                    <li class="list-group-item"><span class="list-buses">Empresa:</span> <strong>{{ $bus->Empresa }}</strong></li>
                                <!--<li class="list-group-item"><span class="list-buses">Motor:</span> <strong>{{ $bus->Motor }}</strong></li>
                                    <li class="list-group-item"><span class="list-buses">Num_Motor:</span> <strong>{{ $bus->Num_Motor}}</strong></li>
                                    <li class="list-group-item"><span class="list-buses">Combustivel:</span> <strong>{{ $bus->Combustivel }}</strong></li>
                                    <li class="list-group-item"><span class="list-buses">Carrocaria:</span> <strong>{{ $bus->Carrocaria }}</strong></li>
                                    <li class="list-group-item"><span class="list-buses">Num_Chassis:</span> <strong>{{ $bus->Num_Chassis }}</strong></li>
                                    <li class="list-group-item"><span class="list-buses">Lotacao:</span> <strong>{{ $bus->Lotacao }}</strong></li>
                                    <li class="list-group-item"><span class="list-buses">Comprimento:</span> <strong>{{ $bus->Comprimento }}</strong></li>
                                    <li class="list-group-item"><span class="list-buses">Largura:</span> <strong>{{ $bus->Largura }}</strong></li>
                                    <li class="list-group-item"><span class="list-buses">Altura:</span> <strong>{{ $bus->Altura }}</strong></li>
                                    <li class="list-group-item"><span class="list-buses">Dist_entre_eixos:</span> <strong>{{ $bus->Dist_entre_eixos }}</strong></li>
                                    <li class="list-group-item"><span class="list-buses">Peso_bruto:</span> <strong>{{ $bus->Peso_bruto }}</strong></li>-->

                                </ul>

                                    <br>
                                        <h4 class="blog-post-meta">
                                            <strong>
                                                Breve Descrição/História:
                                            </strong>
                                        </h4>
                                    <hr>
                                    
                                    <p>
                                        <strong>
                                            {{ $bus->Descricao }}
                                        </strong>
                                    </p>   

                            </div>
                        </div>
                        
                        <ul id="links">
                            <li>
                                <a href="{{ route('buses') }}" id="home">Back</a>
                            </li>
                        </ul>

                    </header>
                </div>

                    @extends('layouts.footer')

                <!-- Secção das Fotografias -->
                <section id="work-visuals">
                    <ul>
                        <li class="img-thumbnail">
                            <img src="{{ $bus->Imagem }}">
                        </li>
                    </ul>
                </section>
    
            </div>

        </section>
    </div><!-- container -->
    
    @extends('layouts.nav_bar')
    
</body>
</html>