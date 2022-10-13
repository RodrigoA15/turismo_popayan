<x-app-layout>
    @include('layouts.navigation')

    <div class="container">
        <div class="mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <img src="{{asset('img/'.$site->foto)}}">

                        <h2>{{$site->nombre}}</h2>
                        <p>{{$site->descripcion}}</p>

                    </div>

                    <div >
                        <form action="{{route('reservation.store')}}" method="post">
                            @csrf
                            <label for="">Fecha</label>
                            <input type="date" name="fecha" class="form-control">
                            <label for="">Hora</label>
                            <input type="time" name="hora_reserva" class="form-control">
                            <label for="">No Personas</label>
                            <input type="text" name="numero_personas" class="form-control">
                            <label for=""></label>
                            <input type="hidden" name="sitio_id" value="{{$site->id}}" class="form-control">

                            <select name="servicio_id" id="">
                                <option value="" selected disabled>Seleccine un sitio</option>
                                @foreach ($services as $item)
                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

