@extends('layouts.app')

@section('content')
    <div class="alert alert-warning" role="alert">
        <strong>RECUERDA! Por tu seguridad no utilices nombres, ubicaciones, y demas que podrian ponerte en riesgo.</strong>
    </div>
    <h1>Escribir carta</h1>
    {!! Form::open(['action' => 'CartaRecividaController@store', 'method' => 'LETTER', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('TEXTO_CARTA', 'Carta')}}
            {{Form::textarea('TEXTO_CARTA', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Contenido de la carta'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Enviar', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection