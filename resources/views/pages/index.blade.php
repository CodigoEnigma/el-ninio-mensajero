@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>BIENVENIDO NIÑO MENSAJERO</h1>
        <p>Aca podras escribir tus experiencias, historias, curiosidades o lo que prefieras compartir a tu cartero.</p>
        <p><a class="btn btn-primary btn-lg" href="/letters/create" role="button">Escribir</a>  {{--<a class="btn btn-success btn-lg" href="/login" role="button">Acceder</a>--}}</p>
    </div>
@endsection