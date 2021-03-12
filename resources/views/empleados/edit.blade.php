@extends('layout')
@section('contenido')
    @if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class = "card card-body"style="border-collapse: separate;background: #20B2AA;color: #fff;" >
        <form action="{{ url('/empleados/'.$empleado->id) }}" method="POST">
            @csrf
            {{method_field('PATCH')}}

            <div class="form-group h2 row">
                <h5><span class="col-md-1" for="Nombres" >Nombres</span></h5>
                <input class="col-md-3 h6" type="text" name="Nombres" id="Nombres" autocomplete="first-name" required
                maxlength="50" value="{{$empleado->apellEmp}}"/>
            </div>

            <div class="form-group h2 row">
                <h5><span class="col-md-3" for="Apellidos">Apellidos</span></h5>
                <input class="col-md-3 h6" type="text" name="Apellidos" id="Apellidos" autocomplete="family-name"
                maxlength="50" required value="{{$empleado->nombreEmp}}"/>
            </div>


            <div class="form-group h2 row">
                <h5><span class="col-md-3" for="Oficinas" >Oficina</span></h5>

                <div class="col-md-3 h6">
                    <select class="form-control h2" name="idOficina" id="Oficinas">
                        @forelse ($oficinas as $item)
                            <option value="{{ $item['id'] }}">{{ $item['id'] }} - {{ $item['nombre'] }}</option>
                        @empty
                            Oficinas no Registradas
                        @endforelse
                    </select>
                    <script>
                        document.ready = document.getElementById("Oficinas").value={{$empleado->idOficina}};
                    </script>
                </div>

            </div>

            <div class="form-group">
                <input class="btn btn-info btn-lg" type="submit" value="Actualizar"/><br>
            </div>
        </form>
    </div>
@endsection
