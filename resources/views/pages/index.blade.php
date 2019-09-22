@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <h1>BIENVENIDO NIÑO MENSAJERO</h1>
        <p>Aca podras escribir tus experiencias, historias, curiosidades o lo que prefieras compartir a tu cartero.</p>
        <p>  {{--<a class="btn btn-success btn-lg" href="/login" role="button">Acceder</a>--}}</p>
        
        <div class="carta">
            <div class = "mensaje">
            <a class="btn btn-primary btn-lg" href="/letters/create" role="button" id = "carta">
              <img src="https://image.flaticon.com/icons/svg/138/138801.svg" class="img-fluid" alt="Responsive image">
           </a>
            </div class = "mensaje">
            <div>
            <a class="btn btn-primary btn-lg" role="button" id = "carta">
              <img src="https://image.flaticon.com/icons/svg/138/138701.svg" class="img-fluid" alt="Responsive image">
           </a>
            </div>
            
        </div>
        
        <div class="boletin">
                 <img src="https://i.pinimg.com/564x/50/57/35/5057358a687cf88a6d7c0b01aa753144.jpg" class="img-fluid" alt="Responsive image" id = "cartaBoletin">
         </div>
        
      </div>
      
      

    {{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="/letters/create" class="button close" aria-label="close"><span aria-hidden="true">&times;</span></a>
                    <h4 class="modal-title">Advertencia</h4>
                </div>
                <div class="modal-body">
                    <p>Recuerda no debes usar informacion personal que pueda poner en riesgo tu seguridad.
                        No uses nombres, ubicaciones, otros reales.
                    </p>
                </div>
            </div>
        </div>
    </div>--}}
@endsection