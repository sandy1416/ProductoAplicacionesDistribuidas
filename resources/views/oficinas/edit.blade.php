@extends('layout')
@section('contenido')

    <div class = "card card-body" style="background:#81F7BE">
        <form action="{{ url('/oficinas/'.$oficina->id) }}" method="POST">
            @csrf
            {{method_field('PATCH')}}
            <h5 class="form-group" >
                <label for="Nombre">{{ 'Nombre' }} </label>
                <input type="text" name="Nombre" id="Nombre" autocomplete="oficina" required
                maxlength="30" value="{{$oficina->nombre}}" style="border-collapse: separate;background: #20B2AA;color: #fff;"/>
            </h5>

            <div class="form-group">
                <input class="btn btn-info btn-lg" type="submit" value="Actualizar"/><br>
            </div>
        </form>
    </div>
@endsection

