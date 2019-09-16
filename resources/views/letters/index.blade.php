@extends('layouts.app')

@section('content')
    <h3>Cartas</h3>
    @if (count($letters) > 0)
        @foreach ($letters as $letter)
            <div class="well">
                <div class="row">
                        <small><a href="/letters/{{$cartaRecivida->id}}">{{$cartaRecivida->TEXTO_CARTA}}</a></small>
                </div>
            </div>
        @endforeach
    @else
        <h1>No hay cartas</h1>
    @endif
@endsection