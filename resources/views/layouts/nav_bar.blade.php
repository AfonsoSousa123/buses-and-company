
    
    <script src="{{ asset('js/modernizr-2.6.2.js') }}"></script>

<nav  id="toc">
    <ul>
        <li>
            <a href="/">Início</a>
        </li>

        <li>
            <a href="{{ route('buses') }}">Autocarros</a>
        </li>

        <li>
            <a href="{{ route('posts') }}">Publicações</a>
        </li>

        <li>
            <a href="/galery">Galeria</a>
        </li>
        
    </ul>

    <a id="toc-actuator" style="opacity: 1;" onclick="myFunction(x)">
        <div class="container_nav">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </a>
</nav>

<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('js/pyaari-main.1.0.js') }}"></script>
<script src="{{ asset('js/pyaari-menu.1.0.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

<script>
    $(document).ready(function () {
        PfdMenu._ctor();
    });
</script>

<script>
    $(document).ready(function(){
       ReadMore.init();
    })
</script>