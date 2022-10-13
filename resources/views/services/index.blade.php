@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h2>Listado de servicios</h2>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Servicio</th>
                        <th>Precio</th>
                        <th>Foto</th>
                        <th>Sitio Id</th>

                    </tr>

                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)
                        <tr>
                            <td>{{$servicio->id}}</td>
                            <td>{{$servicio->servicio}}</td>
                            <td>{{$servicio->precio}}</td>
                            <td>
                                <div class="imagen">
                                    <img class=" img-fluid" src="{{asset('img/'.$servicio->foto)}}" alt="">
                            </div>
                            </td>
                            <td>{{$servicio->sitio_id}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$servicios->links()}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/5.15.3/css/all.min.css">
    <style>
        img {
        width:100px; /* ANCHO_IMAGEN */ 
        border:solid silver 1px; 
        height:100px; /* ALTO_IMAGEN */
        background-position:center center; /* Centrado
        de imagen*/
        background-repeat:no-repeat;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop