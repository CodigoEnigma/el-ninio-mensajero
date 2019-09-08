@extends('layouts.app')
@section('content')
    <a href="/letters" class="btn btn-default">Volver</a>
    <h1>{{$letter->id}}</h1>
    <div>
        {{$letter->body}}
    </div>
@endsection