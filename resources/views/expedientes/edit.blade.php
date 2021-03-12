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

    <div class = "card card-body">
        <form action="{{ url('/expedientes/'.$expediente['nroRegistro']) }}" method="POST">
            @csrf
            {{method_field('PATCH')}}

            <div class="form-group h2 row">
                <span class="col-md-1" for="OficinaEmisora" ><h5>{{ __('Emisor') }}</h5></span>

                <div class="col-md-3">
                    <select class="form-control" name="idOficinaEmisora" id="OficinaEmisora" style="pointer-events: none;" READONLY>
                        @forelse ($oficinas as $item)
                            <option value="{{ $item['id'] }}">{{ $item['id'] }} - {{ $item['nombre'] }}</option>
                        @empty
                            Oficinas no Registradas
                        @endforelse
                    </select>
                    <script>
                        document.ready = document.getElementById("OficinaEmisora").value="{{ $expediente['idOficinaEmisora'] }}";
                    </script>
                </div>

            </div>

            <div class="form-group h2 row">
                <label class="col-md-1" for="OficinaReceptora" ><h5>{{ __('Receptor') }}</h5></label>

                <div class="col-md-3">
                    <select class="form-control" name="idOficinaReceptora" id="OficinaReceptora">
                        @forelse ($oficinas as $item)
                            @if ($item['id']!=$expediente['idOficinaEmisora'])
                                <option value="{{ $item['id'] }}">{{ $item['id'] }} - {{ $item['nombre'] }}</option>
                            @endif
                        @empty
                            Oficinas no Registradas
                        @endforelse
                    </select>
                </div>
                <script>
                    document.ready = document.getElementById("OficinaReceptora").value="{{ $expediente['idOficinaReceptora'] }}";
                </script>
            </div>

            <div class="form-group h2 row">
                <label class="col-md-1" for="Tipo" ><h5>{{ __('Tipo') }}</h5></label>

                <div class="col-md-3">
                    <select class="h6" name="tipo" id="Tipo">
                        <option value="1">Oficio</option>
                        <option value="2">Carta</option>
                        <option value='3'>No especificado</option>
                    </select>
                </div>
                <script>
                    document.ready = document.getElementById("Tipo").value="{{ $expediente['idTipo'] }}";
                </script>
            </div>

            <div class="form-group h2 row">
                <label class="col-md-1" for="Descripcion"><h5>{{ 'Descripcion' }}</h5></label>
                <textarea class="col-md-3 h6" name="descripcion" id="Descripcion" autocomplete="description"
                placeholder="Ingresa una descripcion del expediente" maxlength="250" rows="4"
                >{{$expediente['descripcion']}}</textarea>
            </div>

            <div class="form-group">
                <input class="btn btn-warning btn-lg" type="submit" value="Actualizar"/><br>
            </div>

        </form>
    </div>
@endsection
