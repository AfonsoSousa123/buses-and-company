<!DOCTYPE html>
<html class="no-js">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    
    @include('layouts.styles')
    

    
</head>
<body>
    <div id="container">
        <section id="content">
            
            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        @include('layouts.header')

                    </div>

                </div>

	            <div class="row">
            
			        <div id="preamble">
                        <h2 class="h2">

                            Galeria

                        </h2>
                    </div>
                        
                </div>

                    <div id="our-work">
                        <ul>
                            <li>
                                <a href="">
                                    <img  src="{{ asset('images/gal001.jpg') }}" alt="Pyaari">
                                    <div class="overlay">
                                        <summary>
                                            <h2>Richard Brasier</h2>
                                                
                                        </summary>
                                    </div>
                                </a>
                            </li>
                
                            <li>
                                <a href="">
                                    <img  src="{{ asset('images/gal002.jpg') }}" alt="Pyaari">
                                    <div class="overlay">
                                        <summary>
                                            <h2>Unic</h2>
                                                
                                        </summary>
                                        </div>
                                    </a>
                                </li>
                
                            <li>
                                <a href="">
                                    <img  src="{{ asset('images/gal003.jpg') }}" alt="Pyaari">
                                    <div class="overlay">
                                        <summary>
                                            <h2>Dodge 86 BL</h2>
                                                
                                        </summary>
                                        </div>
                                    </a>
                                </li>
                
                            <li>
                                <a href="">
                                    <img  src="{{ asset('images/gal004.jpg') }}" alt="Pyaari">
                                    <div class="overlay">
                                        <summary>
                                            <h2>Chevrolet 22 hp</h2>
                                                
                                        </summary>
                                        </div>
                                    </a>
                                </li>
                
                                <li>
                                    <a href="">
                                        <img  src="{{ asset('images/gal005.jpg') }}" alt="Pyaari">
                                        <div class="overlay">
                                            <summary>
                                                <h2>Dodge brothers H31 </h2>
                                                
                                            </summary>
                                        </div>
                                    </a>
                                </li>
                
                                <li>
                                    <a href="">
                                        <img  src="{{ asset('images/gal006.jpg') }}" alt="Pyaari">
                                        <div class="overlay">
                                            <summary>
                                                <h2>MAN Irizar i4</h2>
                                                
                                            </summary>
                                        </div>
                                    </a>
                                </li>
                                <br>
                
                                <li>
                                    <a href="">
                                        <img  src="{{ asset('images/gal007.jpg') }}" alt="Pyaari">
                                        <div class="overlay">
                                            <summary>
                                                <h2>Seddon Mk.6</h2>
                                                
                                            </summary>
                                        </div>
                                    </a>
                                </li>
                
                                <li>
                                    <a href="">
                                        <img  src="{{ asset('images/gal008.jpg') }}" alt="Pyaari">
                                        <div class="overlay">
                                            <summary>
                                                <h2>Volvo B9M</h2>
                                                
                                            </summary>
                                        </div>
                                    </a>
                                </li>
                        </ul>
                    </div>
            </div>
        </section>

        @extends('layouts.footer')

    </div><!-- container -->
    
    @extends('layouts.nav_bar')

</body>
</html>