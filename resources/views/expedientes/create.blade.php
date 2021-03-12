@extends('layout')
@section('contenido')
    <div class = "container p-2" style="background:#A4A4A4">
        <form action="{{ url('/expedientes') }}" method="POST">
            @csrf
            <input type="hidden" name="idEmp" value="{{$empleado->id}}">

            <div class="form-group h2 row">
                <h5><span class="col-md-1" for="OficinaEmisora" >Emisor</span></h5>

                <div class="col-md-3">
                    <select class="form-control" name="idOficinaEmisora" id="OficinaEmisora" style="pointer-events: none;" READONLY>
                        @forelse ($oficinas as $item)
                            <option value="{{ $item['id'] }}">{{ $item['id'] }} - {{ $item['nombre'] }}</option>
                        @empty
                            Oficinas no Registradas
                        @endforelse
                    </select>
                    <script>
                        document.ready = document.getElementById("OficinaEmisora").value={{$oficinaActual->id}};
                    </script>
                </div>

            </div>

            <div class="form-group h2 row">
                <h5><span class="col-md-1" for="OficinaReceptora" >Receptor</span></h5>

                <div class="col-md-3">
                    <select class="form-control" name="idOficinaReceptora" id="OficinaReceptora">
                        @forelse ($oficinas as $item)
                            @if ($item['id']!=$oficinaActual['id'])
                                <option value="{{ $item['id'] }}">{{ $item['id'] }} - {{ $item['nombre'] }}</option>
                            @endif
                        @empty
                            Oficinas no Registradas
                        @endforelse
                    </select>
                </div>
            </div>

            <div class="form-group h2 row">
                <h5><span class="col-md-1" for="Tipo" >{{ __('Tipo') }}</span></h5>

                <div class="col-md-3">
                    <select class="h6" name="tipo" id="Tipo">
                        <option value="1"><h6>Oficio</h6></option>
                        <option value="2"><h6>Carta</h6></option>
                    </select>
                </div>
            </div>

            <div class="form-group h2 row">
                <h5><span class="col-md-1" for="Descripcion">Descripcion</span></h5>
                <textarea class="col-md-5 h6" name="descripcion" id="Descripcion" autocomplete="description"
                placeholder="Ingresa una descripcion del expediente" maxlength="250" rows="4"></textarea>
            </div>

            <div class="form-group">
                <input class="btn btn-primary pull-right" type="submit" value="Registrar"/><br>
            </div>

        </form>
    </div>
@endsection
