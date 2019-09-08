@extends('layouts.app')

@section('content')
    <h3>Cartas</h3>
    @if (count($letters) > 0)
        @foreach ($letters as $letter)
            <div class="well">
                <div class="row">
                        <small><a href="/letters/{{$letter->id}}">{{$letter->body}}</a></small>
                </div>
            </div>
        @endforeach
    @else
        <h1>No hay cartas</h1>
    @endif
@endsection