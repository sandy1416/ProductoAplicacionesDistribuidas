@extends('layout')
@section('contenido')
    <div class = "card card-body" style="border-collapse: separate;background: #20B2AA;color: #fff;">
        <form action="{{ url('/empleados') }}" method="POST">
            @csrf

            <div class="form-group h2 row">
                <h6><span class="col-md-3" >DNI:</span></h6>
                <input class="col-md-2 h6" type="number" name="DNI" autocomplete="DNI" max="99999999" min="1000000" required/>
            </div>

            <div class="form-group h2 row">
                <h6><span class="col-md-3" for="Nombres" >Nombres</span></h6>
                <input class="col-md-2 h6" type="text" name="Nombres" id="Nombres" autocomplete="first-name" required
                maxlength="10"/>
            </div>

            <div class="form-group h2 row">
                <h6><span class="col-md-2" for="Apellidos">Apellidos </span></h6>
                <input class="col-md-2 h6" type="text" name="Apellidos" id="Apellidos" autocomplete="family-name"
                maxlength="50" required/>
            </div>


            <div class="form-group h5 row">
                <h6><span class="col-md-1 h6" for="Oficina" >Oficina</span></h6>

                <div class="col-md-3">
                    <select class="form-control h2" name="idOficina" id="Oficina">
                        @forelse ($oficinas as $item)
                            <option value="{{ $item['id'] }}">{{ $item['id'] }} - {{ $item['nombre'] }}</option>
                        @empty
                            Oficinas no Registradas
                        @endforelse
                    </select>
                </div>

            </div>

            <div class="form-group">
                <input class="btn btn-success btn-lg" type="submit" value="Registrar"/><br>
            </div>
        </form>
    </div>
@endsection
