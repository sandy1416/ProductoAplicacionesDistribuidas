@extends('layout')
@section('titulo')
      Inicio
@endsection
@guest
@else
    @section('contenido')
    <div class = "container p-4" style="clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
     background: #D8D8D8;
    color:#0B4C5F">
        <center><h3>
            @lang('Bienvenido a tu plataforma')</span></h3></center>
    </div>
    <div class="container p-2" style="clip-path: polygon(20% 0%, 80% 0%, 100% 100%, 0% 100%);">
     <center><img src="imagenes/edificio.jpg" width="350" height="350" /></center> 
    </div>
    @endsection
@endguest

