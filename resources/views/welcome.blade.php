<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CGIS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #D3FFE9;
                color: #090909;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #4B5043;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Citas</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Registro</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                     CitApp
                </div>

                <div class="links">
                    <a href="http://citas.test/pacientes">Pacientes</a>
                    <a href="http://citas.test/medicos">Médicos</a>
                    <a href="http://citas.test/citas">Citas</a>
                    <a href="http://citas.test/locations">Localización</a>
                    <a href="http://citas.test/especialidades">Especialidad</a>

                    <h3> Gestione las citas de sus pacientes con este sistema personalizado para su centro médico.  </h3>


                </div>

                <div aling="right">
                    <h4> Desarrollo de la aplicación por el equipo de desarrollo JAMMP.
                       <!--
                        <h3>Ana Caamaño Cundíns, Celia Rivilla Piñango, Pedro Leal del Ojo Rosselló, María Eugenia Parejo Balas y Juan Manuel Martínez Rivero <h3/>
                        -->
                        <h4> ETSII Universidad de Sevilla. 2019 <h4/>

                </div>

            </div>
        </div>
    </body>
</html>
