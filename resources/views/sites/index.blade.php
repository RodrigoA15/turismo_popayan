@extends('adminlte::page')

@section('title', 'Listado de sitios')

@section('content_header')
    <h1>Sitios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table-responsive">
                <thead>
                    <tr>
                        <th>Municipio</th>
                        <th>Lugar</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Foto</th>
                        <th>Descripcion</th>
                        <th>Tipo de actividad</th>
                        <th>Horario atención</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sites as $site)
                    <tr>
                        <td>{{$site->municipio}}</td>
                        <td>{{$site->lugar}}</td>

                        <td><a href="{{route('site.show',$site)}}">{{$site->nombre}}</a> </td>
                        <td>{{$site->telefono}}</td>
                        <td>{{$site->correo}}</td>
                        
                        <td>
                            <div class="imagen">
                                <img class=" img-fluid" src="{{asset('img/'.$site->foto)}}" alt="">
                            </div>
                        </td>
                        <td>{{$site->descripcion}}</td>
                        <td>{{$site->tipo_actividad}}</td>
                        <td>{{$site->estado}}</td>
                    </tr>    
                    @endforeach
                    
                </tbody>
                
            </table>
            {{$sites->links()}}
            
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop