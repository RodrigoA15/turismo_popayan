<x-app-layout>
    <!-- seccion imagen -->

    <section id="hero">
        <div class="container">

            <div class="content-center topmargin-lg">
                <h1 class="mt-5">Tecno Academia Popayán</h1>
                <p>Te invitamos a que revises nuestras actividades del mes de marzo </p>
                <p> Que esperas para inscribirte desde tu computador o movil</p>

            </div>
        </div>
    </section>

    <!-- seccion portafolio-->
    <section id="portfolio">
        <div class="container-fluid">
            <div class="content-center">
                <h2>Conoce en que estamos trabajando para ti <b>Tecno Academía Popayán</b></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ea consequuntur, odit veniam mollitia
                    aliquam reiciendis dignissimos, vitae sapiente neque, cum dolorum. Suscipit expedita obcaecati
                    nesciunt error ut quidem autem.</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="portfolio-container">
                        <div class="portfolio-details">
                            <a href="#">
                                <h2>Marzo mes de deporte y vida</h2>
                            </a>
                            <a href="#">
                                <p>Tecno Academía App</p>
                            </a>
                        </div>
                        <img src="images/deporte.jpg" class="img-fluid" alt="Portfolio 01">
                    </div>
                </div>

                
           @foreach ($sites as $site)
           <div class="col-md-6">
            <div class="portfolio-container">
                <div class="portfolio-details">
                    <a href="#">
                        <h2>{{$site->nombre}}</h2>
                    </a>
                    <a href="#">
                        <p>{{$site->descripcion}}</p>
                    </a>

                    @if (Auth::user())
                        <a href="{{route('getSite', $site)}}" class="btn btn-primary" >Reservar</a>
                     @else
                     <a href="{{route('login')}}" class="btn btn-sucess" >iniciar sesion</a>
                    @endif

                </div>
                <img src={{asset('img/'.$site->foto)}} class="img-fluid" alt="Portfolio 02">
            </div>
        </div>
           @endforeach

            </div>

        </div>
    </section>

    <!-- pie de pagina footer-->

    <footer class="bgDark">
        <div class="container">

            <small>Todos los derechos reservados. ©2021 </small>
        </div>
    </footer>
</x-app-layout>
