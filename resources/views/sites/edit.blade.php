@extends('adminlte::page')

@section('title', 'Sitios')

@section('content_header')
    <h1>Gestion de sitios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('site.update', $site)}}" enctype="multipart/form-data" method="post">
                @method('PUT')
                @csrf
                @if (session()->has('message'))
                    <div class="alert alert-success alertdismissible fade show" role="alert">
                        {{session('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            Close
                            <span ariahidden="true">&times;</span>
                        </button>
                    </div>

                @endif
                <input type="text" placeholder="municipio.." name="municipio" class="form-control" value="{{$site->municipio}}">
                <small class="text-danger">{{ $errors->first('municipio') }}</small>
              
                <input type="text" placeholder="lugar.." name="lugar" class="form-control" value="{{$site->lugar}}">
                <small class="text-danger">{{ $errors->first('lugar') }}</small>

                <input type="text" placeholder="nombre.." name="nombre" class="form-control" value="{{$site->nombre}}">
                <small class="text-danger">{{ $errors->first('nombre') }}</small>

                <input type="text" placeholder="direccion.." name="direccion" class="form-control" value="{{$site->direccion}}">
                <small class="text-danger">{{ $errors->first('direccion') }}</small>
                
                <input type="text" placeholder="telefono.." name="telefono" class="form-control" value="{{$site->telefono}}">
                <small class="text-danger">{{ $errors->first('telefono') }}</small>
                
                <input type="text" placeholder="correo.." name="correo" class="form-control" value="{{$site->correo}}">
                <small class="text-danger">{{ $errors->first('correo') }}</small>
                
                <i class="far fa-images"></i><input accept="image/*"  onchange="vistaPrevia(event)" type="file"  name="foto" class="form-control" value="{{$site->foto}}">
                <small class="text-danger">{{ $errors->first('foto') }}</small>
                
                <label for="">Vista previa fotografia: </label>
                <img class="imagen" src="" id="img-foto" alt="" width="200px" height="150px">

                <input type="text" placeholder="descripcion.." name="descripcion" class="form-control" value="{{$site->descripcion}}">
                <small class="text-danger">{{ $errors->first('descripcion') }}</small>

                <input type="text" placeholder="tipo de actividad económica.." name="tipo_actividad" class="form-control" value="{{$site->tipo_actividad}}">
                <small class="text-danger">{{ $errors->first('tipo_actividad') }}</small>

                <input type="text" placeholder="Horario de atención.." name="horario_atencion" class="form-control" value="{{$site->horario_atencion}}">
                <small class="text-danger">{{ $errors->first('horario_atencion') }}</small>

                <input type="text" placeholder="estado del sitio (activo 1 | inactivo 2).." name="estado" class="form-control" value="{{$site->estado}}">
                <small class="text-danger">{{ $errors->first('estado') }}</small>

               <div class="col-md-12 mt-4 text-center">
                    <button type="submit" class="btn btn-secondary">Registrar</button>
                </div>

            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style type="text/css">
        .btn-file {
            position: relative;
            overflow: hidden;
            width: 100px;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
        .btn-file i{
            font-size:23px;
        }
        .imagen img{
            max-width: 100%;
            max-height: 30vh;
        }
    </style>
@stop

@section('js')
    <script> 
      function ocultarAlerta() {
            document.querySelector(".alert").style.display = 'none';
        }
        setTimeout(ocultarAlerta,3000);
        let vistaPrevia = ()=>{
            let leerImg = new FileReader();
            let id_img = document.getElementById('img-foto');

            leerImg.onload = ()=>{
                if (leerImg.readyState == 2) {
                    id_img.src = leerImg.result;
                }
            }

            leerImg.readAsDataURL(event.target.files[0])
        }
            
    </script>
@stop