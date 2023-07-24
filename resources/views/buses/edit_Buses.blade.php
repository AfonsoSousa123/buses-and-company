
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
@extends('layouts.app')

@section('content') 
  
  <div class="container">

    <h2>Editar Autocarro</h2>

      <form method="POST" action="{{ route('buses-update', ['buses' => $buses->id])}}" enctype="multipart/form-data">

        {{ csrf_field() }}
        {{ method_field('PUT') }}

          <div class="row" style="margin-bottom:10px;">

            <div class="col-sm-6 blog-main">

              <label for="Matricula">Matrícula</label>

              <input value="{{ $buses->Matricula }}" type="text" class="form-control" name="Matricula" placeholder="XX-XX-XX" required>

            </div>

            <div class="col-sm-6 blog-main">

              <label for="Marca">Marca</label>

              <input value="{{ $buses->Marca }}" type="text" class="form-control" name="Marca" required>

            </div>
          </div>


          <div class="row" style="margin-bottom:10px;">
            
            <div class="col-sm-6 blog-main">

              <label for="Ano_prod">Ano de Produção</label>

              <input value="{{ $buses->Ano_Producao }}" type="text" class="form-control" name="Ano_prod" placeholder="Máximo de 4 digitos">

            </div>

            <div class="col-sm-6 blog-main">

              <label for="Empresa">Empresa</label>

              <input value="{{ $buses->Empresa }}" type="text" class="form-control" name="Empresa">

            </div>
          </div>  
            

          <div class="row" style="margin-bottom:20px;">

            <div class="col-sm-6 blog-main">

              <label for="Modelo">Modelo</label>

              <input value="{{ $buses->Modelo }}" type="text" class="form-control" name="Modelo">

            </div>

            <div class="col-sm-3 blog-main" style="margin-top:33px;">

              <div class="custom-file">
                <input type="file" style="cursor:pointer;" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Imagem</label>

                <input type="hidden" value="{{ $buses->Imagem }}" name="Imagem" id="imagem-wrapper" />

                
              </div>

              <script>

                function getBase64(file, target) {
                  var reader = new FileReader();
                  reader.readAsDataURL(file);
                  reader.onload = function () {
                    //console.log(reader.result);
                    document.getElementById(target).setAttribute('value', reader.result);
                    document.getElementById('preview').setAttribute('src', reader.result);
                  };
                  reader.onerror = function (error) {
                    console.log('Error: ', error);
                  };
                  return reader.result;
                }

                document.addEventListener('DOMContentLoaded', function () {
                  var el = document.getElementById('customFile');

                  el.addEventListener('change', function () {
                    var file = el.files[0]
                    getBase64(file, 'imagem-wrapper'); // prints the base64 string
                  });
                });
                  
              </script>
            </div>

            <div class="col-sm-3 blog-main" style="margin-top:33px;">

              <img width="250px" height="auto" class="img-thumbnail" id="preview"/>

            </div>

          </div>
          
          <a class="read-more" href="#" >Campos Adicionais +</a>  

          <span class="em" style="display: none;">
            <div class="row" style="margin-bottom:10px;">

              <div class="col-sm-4 blog-main">

                <label for="Motor">Motor</label>
      
                  <input value="{{ $buses->Motor }}" type="text" class="form-control" name="Motor">
      
              </div>
    
              <div class="col-sm-4 blog-main">

                <label for="Num_Motor">Nº Motor Original</label>

                <input value="{{ $buses->Num_Motor }}" type="text" class="form-control" name="Num_Motor">

              </div>

              <div class="col-sm-4 blog-main">

                <label for="Combustivel">Combustível</label>

                <input value="{{ $buses->Combustivel }}" type="text" class="form-control" name="Combustivel">

              </div>
            </div>

              
            <div class="row" style="margin-bottom:10px;">

              <div class="col-sm-4 blog-main">

                <label for="Carrocaria">Carroçaría</label>

                <input value="{{ $buses->Carrocaria }}" type="text" class="form-control" name="Carrocaria">

              </div>

              <div class="col-sm-4 blog-maincol-sm-4 blog-main">
      
                <label for="Num_Chassis">Número do Chassis</label>
      
                <input value="{{ $buses->Num_Chassis }}" type="text" class="form-control" name="Num_Chassis">
      
              </div>
            
              <div class="col-sm-4 blog-main">

                <label for="Lotacao">Lotação</label>

                <input value="{{ $buses->Lotacao }}" type="text" class="form-control" name="Lotacao">

              </div>
            </div>
              

            <div class="row" style="margin-bottom:10px;">

              <div class="col-sm-4 blog-main">

                <label for="Comprimento">Comprimento</label>
      
                <input value="{{ $buses->Comprimento }}" type="text" class="form-control" name="Comprimento" placeholder="Formato: metros,centímetros">
      
              </div>
    
              <div class="col-sm-4 blog-main">
      
                <label for="Largura">Largura</label>
      
                <input value="{{ $buses->Largura }}" type="text" class="form-control" name="Largura" placeholder="Formato: metros,centímetros">
      
              </div>
    
              <div class="col-sm-4 blog-main">
      
                <label for="Altura">Altura</label>
      
                <input value="{{ $buses->Altura }}" type="text" class="form-control" name="Altura" placeholder="Formato: metros,centímetros">
      
              </div>
            </div>

            <div class="row" style="margin-bottom:10px;">
              
              <div class="col-sm-6 blog-main">

                <label for="Dist_entre_eixos">Distância entre Eixos</label>

                <input value="{{ $buses->Dist_entre_eixos }}" type="text" class="form-control" name="Dist_entre_eixos" placeholder="Formato: metros,centímetros">

              </div>

              <div class="col-sm-6 blog-main">

                <label for="Peso_bruto">Peso Bruto</label>

                <input value="{{ $buses->Peso_bruto }}" type="text" class="form-control" name="Peso_bruto" placeholder="Em quílos ou toneladas">

              </div>
            </div>

            <div class="row">

              <div class="col-md-12 blog-main">

                <label for="Descricao">Descrição/Curiosidades/História</label>
      
                <textarea name="Descricao" id="Descricao" cols="5" rows="10" class="form-control" placeholder="Escreva aqui a descrição/história do Autocarro...">{{ $buses->Descricao }}</textarea>
      
              </div>
              
            </div>
          </span>
            
            
            <div class="form-group" style="margin-top:20px;">

              <a href="{{ route('buses')}}" id="submit" class="btn btn-primary">
                    
                Cancelar

              </a>
              <input type="reset" id="submit" class="btn btn-primary" value="Limpar">
              <input type="submit" id="submit" class="btn btn-primary" value="Editar" onclick="return confirm('Deseja realmente alterar o Autocarro ?');">
              
            </div>

            @include('layouts.errors')  

      </form>
  </div>
  
@endsection 

  <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>

  <script>
      var ReadMore = {
      init: function(opts) {
        $('.read-more').each(function () {
            var _p = $(this).parent();
                  if (opts==='slide')
                      $('p, span, h3', _p).slideUp();
            else
                      $('p, span, h3', _p).hide();
          $(this).click(function (e) {
            e.preventDefault();
            ReadMore.toggle($(this),_p);
          })
        });
      },
      toggle: function(e,o) {
        if (e.hasClass('on'))
          ReadMore._slideUp(e, o);
        else
          ReadMore._slideDown(e, o);
      },
      _slideDown: function(e,o) {
        $('p, ul, span, h3', o).slideDown();
        e.text('Campos Adicionais -').addClass('on');
      },
      _slideUp: function(e,o) {
        $('p, ul, span, h3', o).slideUp();
        e.text('Campos Adicionais +').removeClass('on');
      },
      slideDown: function (e) {
          var _o = $(e).parent();
          this._slideDown(e, _o);
      },
      slideUp: function (e) {
          var _o = $(e).parent();
          this._slideUp(e, _o);
      }
    };

    $(document).ready(function(){
    ReadMore.init();
    })
  </script>