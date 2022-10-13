@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sitio: {{''.$site->nombre}}</h1>
    <h2>Descripcion: {{$site->descripcion}}</h2>
@stop

@section('content')
    <table class="table table-dark">
        <tbody>
            @foreach ($services as $service)
            <tr>
                <td>{{$service->servicio}}</td>
                <td>{{$service->precio}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop