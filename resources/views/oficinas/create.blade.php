@extends('layout')
@section('contenido')

    <div class = "card card-body" style="background:#A4A4A4">
        <form action="{{ url('/oficinas') }}" method="POST">
            @csrf

            <h4 class="form-group">
                <label for="Nombre">{{ 'Nombre' }} </label>
                <input type="text" name="Nombre" id="Nombre" autocomplete="oficina" required
                maxlength="50"style="border-collapse: separate;background: #20B2AA;color: #fff;"/>
            </h24>

            <div class="form-group">
                <input class="btn btn-success btn-lg" type="submit" value="Guardar Oficina"/><br>
            </div>
        </form>
    </div>
@endsection

