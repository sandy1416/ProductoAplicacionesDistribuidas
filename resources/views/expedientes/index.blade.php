@extends('layout')
@section('contenido')
    <div class = "container p-2" style="background:#0B3B39">
        @if (Session::has('Mensaje'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('Mensaje') }}
            </div>
        @endif

        <div class = "row">
            <div class ="col-md-8 h5">
                <select name="idEmpleado" id="Empleado">
                    @forelse ($empleados as $item)
                    <option value="{{ $item['id'] }}">{{ $item['apellEmp'] }} {{ $item['nombreEmp'] }} - {{ $item['nombreOficina'] }}</option>
                    @empty
                    @endforelse
                </select>
                
            </div>

            <div class ="col-md-4">
                <a class="btn btn-primary pull-right" style="background:#0B3B39" href='/expedientes/'
                onclick="location.href=this.href+obtenerIdEmpleado()+'/'+obtenerFiltro();return false;">Mostrar</a>

                <a class="btn btn-warning btn-md" href='/expedientes/crear/'
                onclick="location.href=this.href+obtenerIdEmpleado();return false;">Nuevo</a>
            </div>

            <script type="text/javascript">
                function obtenerIdEmpleado() {
                    var valor = document.getElementById('Empleado').value;
                    return valor;
                }

                function obtenerFiltro() {
                    var valor = document.getElementById('Filtro').value;
                    return valor;
                }
            </script>

            @isset($configIdEmpleado,$configFiltro)
                <script type="text/javascript"  >
                    document.ready = document.getElementById("Empleado").value={{$configIdEmpleado}};
                    document.ready = document.getElementById("Filtro").value={{$configIdFiltro}};
                </script>
            @endisset

        </div>

        @isset($expedientes,$configFiltro)
            <h5 style="text-decoration:underline;color:white">LISTA DE EXPEDIENTES {{$configFiltro}}</h5>
            <div class="mt-3">
                <table class = "table table-hover" style="background:#0B3B39; color:#FFFFFF">
                    <thead class="table-second" >
                        <tr>
                            <th scope="col"> id Expediente</th>
                            <th scope="col"> N° Reg</th>
                            <th scope="col">Emisora</th>
                            <th scope="col">Destino</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Atención</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($expedientes as $item)
                        <tr>
                            <td>{{ date_format($item['fecha'], 'Y-m-d') }}-{{$item -> nroRegistro}}</td>
                            <td>{{$item -> nroRegistro}}</td>
                            <td>{{$item -> nombreOficinaEmisora}}</td>
                            <td>{{$item -> nombreOficinaReceptora}}</td>
                            <td>{{$item -> tipo}}</td>
                            <td>{{$item -> descripcion}}</td>
                            @isset($item['atencion'])
                                <td>{{$item -> atencion}}</td>
                            @else
                                <td>Sin atender</td>
                            @endisset

                            @switch($configFiltro)
                                @case("EMITIDOS")
                                    <td>
                                        <a class="btn btn-primary pull-right" href="{{url('/expedientes/'.$item->nroRegistro.'/editar')}}">Editar</a>
                                        <form action="{{url('/expedientes/'.$item->nroRegistro)}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}

                                            <input type="submit" onclick="return confirm('Desea borrar?');" class="btn btn-warning btn-reset" value="Borrar"/>
                                        </form>
                                    </td>
                                    @break
                                @case("RECIBIDOS")
                                    <td>
                                        <a class="btn btn-success btn-sm" href='/expedientes/atender/'
                                        onclick="location.href=this.href+obtenerIdEmpleado()+'/'+{{$item -> nroRegistro}};return false;">Atender</a>
                                    </td>
                                    @break
                                
                                @default

                            @endswitch

                        </tr>
                        @empty
                            <h6 style="color:white">NO HAY EXPEDIENTES REGISTRADOS {{$configFiltro}}</h6>
                        @endforelse
                    </tbody>
                </table>
                {{$expedientes->links()}}
            </div>

        @else
            <h6 style="color:white">REALIZA TU CONSULTA</h6>
        @endisset


    </div>
@endsection
