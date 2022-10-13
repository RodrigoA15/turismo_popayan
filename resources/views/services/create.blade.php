@extends('adminlte::page')

@section('title', 'Sitios')

@section('content_header')
    <h1>Registro de servicios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-boddy">
            <form action="{{route('services.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Servicio</label>
                        <input type="text" name="servicio" class="form-control">
                        <small class="text-danger">{{$errors->first('servicio')}}</small>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Precio</label>
                        <input type="text" name="precio" class="form-control">
                        <small class="text-danger">{{$errors->first('precio')}}</small>
                    </div>

                   <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Fotografia:</label><br>
                        <span class="btn btn-secondary btn-file">
                            <i class="far fa-images"></i> <input accept="image/*" onchange="vistaPrevia(event)" type="file" name="foto">
                        </span>
                        <small class="text-danger">{{$errors->first('foto')}}</small>
                    </div>
                    
                    <div class="imagen col-md-6 col-lg-6 col-sm-12">
                        <label for="">Vista previa fotografia:</label><br>
                        <img src="" id="img-foto" alt="">
                    </div> 

                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <label for="">Sitio</label>
                        <select name="sitio_id" class="form-control" id="">
                            <option disabled="disabled" value="">
                                seleccione un sitio
                            </option>
                            @foreach ($sites as $site)
                                <option value="{{$site->id}}">{{$site->nombre}}</option>
                            @endforeach
                            <small class="text-danger">{{$errors->first('sitio_id')}}</small>
                        </select>
                    </div>
                    
                    <div class="row">
                    <div class="col-md-12 mt-4 text-center">
                        <button type="submit" class="btn btn-secondary">
                            Guardar
                        </button>
                    </div>
                    </div>


                </div>
            </form>    
        </div>    
    </div>    

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/5.15.3/css/all.min.css">
<style>
    
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
        document.querySelector(".alert").style.display= 'none';
    }
    setTimeout(ocultarAlerta,3000); 
    //funcion de Js para ver la imagen en vista previa
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