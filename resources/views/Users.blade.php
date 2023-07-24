
<html class="no-js">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <head>

        <title>Plataforma Informativa de Autocarros</title>
    
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
            
			        <div id="preamble" class="col-md-6">
                        <h2 class="h2" style="margin-left:20px;margin-top:30px;">

                            Gestão de Utilizadores

                        </h2>
                    </div>

                    <div id="preamble" class="col-md-6">
                        @if(session('message'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session('message') }}         
                            </div>
                        @endif
                    </div>
                        
                </div>

                    <div class="row">
                        <div class="col-sm-12 blog-main">

                            <table class="table table-condensed" id="show_u">
                                <tbody>
                                    <tr style="text-align:center;">
                                        <th>
                                            <strong>ID</strong> 
                                        </th>
                                        <th>
                                            <strong>Primeiro Nome</strong> 
                                        </th>
                                        <th>
                                            <strong>Último Nome</strong> 
                                        </th>
                                        <th>
                                            <strong>Nome de Utilizador</strong> 
                                        </th>
                                        <th colspan="2">
                                            <strong>Email</strong> 
                                        </th>
                                        
                                    </tr>

                                    @foreach ($users as $user)
                                        <tr style="text-align:center;">
                                            <td>
                                                {{ $user->id }}
                                            </td>
                                            <td>
                                                {{ $user->Pnome }}
                                            </td>
                                            <td>
                                                {{ $user->Unome }}
                                            </td>
                                            <td>
                                                {{ $user->username }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>

                                            <td>
                                                <a href="{{ route('users-delete', $user->id) }}" class="btn btn-danger" style="float:right; margin-left:10px;" onclick="return confirm('Deseja realmente remover o Utilizador ?');">Eliminar</a>
                                                <!--<a href="" class="btn btn-success" style="float:right;">Editar</a>-->
                                            </td>   

                                        </tr>  
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                
            </div>

        </section>

        @extends('layouts.footer')

    </div><!-- container -->
    
    @extends('layouts.nav_bar')

</body>
</html>