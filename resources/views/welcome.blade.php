
<html class=" js no-touch rgba hsla borderradius boxshadow generatedcontent" style="">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <!-- Meta info -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Informativa de Autocarros</title>
    <meta content="" name="description">
    
    <!-- styles -->
    @extends('layouts.styles')
    
</head>

<body>
    <div id="container" style="left: 0px;">
        <section id="content">
            
            <header>
                
                <div id="what-we-do">
                    <div id="preamble">
                    
                        @include('layouts.header')
                    
                    </div>
                </div>
        
                <br>

                <div id="preamble" class="home">
                    <div class="preamble">

                        <div class="row">
                            <div class="col-md-11">
                                <h1>
                                    Bem Vindo(a) ao Buses &amp; Company 
                                    <br><br>
                                    Este site trata-se de uma Plataforma Informativa sobre Autocarros presentes na Ilha da Madeira, 
                                    tendo como principal objetivo dar a conhecer a história dos Autocarros da Madeira como também deixar os utilizadores sempre atualizados
                                    nas Noticias.
                                </h1>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-11">
                                
                                <p class="em" style="display: none;">

                                    Esta Plataforma destina-se a utilizadores Entusiastas de Autocarros, mas também para aqueles que querem aprender mais sobre o tema em questão.
                                    Neste Site poderá encontrar as seguintes características:
                                            
                                </p>
                                    <ul class="em" style="display: none;">

                                        <li>Uma Base de Dados repleta de informação acerca do tema Autocarros;</li>
                                        <li>Uma página dedicada às Publicações sobre o tema em questão;</li>
                                        <li>Uma Galeria cheia de Imagens alusivas ao tema;</li>

                                    </ul>
                                    <a class="read-more" href="#">Ler mais +</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>    
                

            <div class="container"> 
                <div class="row">

                    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:150%;align-self:center;">

                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                            <li data-target="#myCarousel" data-slide-to="5"></li>
                            <li data-target="#myCarousel" data-slide-to="6"></li>
                            <li data-target="#myCarousel" data-slide-to="7"></li>
                            <li data-target="#myCarousel" data-slide-to="8"></li>
                            <li data-target="#myCarousel" data-slide-to="9"></li>
                        </ol>

                        <div class="carousel-inner">
                    
                            <div class="carousel-item active">
                                <img width="100%" class="first-slide" src="{{ asset('images/buses/001-4-M.jpg') }}" alt="First slide">
                                <div class="container">
                    
                                </div>
                            </div>
                    
                            <div class="carousel-item">
                                <img width="100%" class="second-slide" src="{{ asset('images/buses/005-M-1480.jpg') }}" alt="Second slide">
                                <div class="container">
                                    
                                </div>
                            </div>
                    
                            <div class="carousel-item">
                                <img width="100%" class="second-slide" src="{{ asset('images/buses/008-M-3248.jpg') }}" alt="Third slide">
                                <div class="container">
                                        
                                </div>
                            </div>
                        
                    
                            <div class="carousel-item">
                                <img width="100%" class="second-slide" src="{{ asset('images/buses/010-M-3416.jpg') }}" alt="Fourth slide">
                                <div class="container">
                                        
                                </div>
                            </div>
                    
                            <div class="carousel-item">
                                <img width="100%" class="third-slide" src="{{ asset('images/buses/017-MA-42-72.jpg') }}" alt="Fifth slide">
                                <div class="container">
                                    
                                </div>
                            </div>
                    
                            <div class="carousel-item">
                                <img width="100%" class="third-slide" src="{{ asset('images/buses/026-OT-56-45.jpg') }}" alt="Six slide">
                                <div class="container">
                                        
                                </div>
                            </div>
                    
                            <div class="carousel-item">
                                <img width="100%" class="third-slide" src="{{ asset('images/buses/028-MD-98-08.jpg') }}" alt="Seventh slide">
                                <div class="container">
                                            
                                </div>
                            </div>
                    
                            <div class="carousel-item">
                                <img width="100%" class="third-slide" src="{{ asset('images/buses/036-37-67-ZT.jpg') }}" alt="Eight slide">
                                <div class="container">
                                                
                                </div>
                            </div>
                    
                            <div class="carousel-item">
                                <img width="100%" class="third-slide" src="{{ asset('images/buses/037-70-OF-85.jpg') }}" alt="Nine slide">
                                <div class="container">
                                                    
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img width="100%" class="third-slide" src="{{ asset('images/buses/038-MA-14-74.jpg') }}" alt="Ten slide">
                                <div class="container">
                                                        
                                </div>
                            </div>
                    
                        </div>
                    
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="fa fa-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="fa fa-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>       

        </section>

        @extends('layouts.footer')

    </div><!-- container -->
    
        @extends('layouts.nav_bar')

</body>

</html>