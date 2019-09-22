<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/estilos.css')}}" type="text/css">
        <title>{{config('app.name', 'CEAPP')}}</title>

    </head>
    <body background = "http://www.wallpaperk.com/wallpapers/fondos-para-ninos-7681.jpg">
       
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">CódigoEnigma</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Página principal <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    
    </div>
  </nav>
  
  
        
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
    </body>
</html>


