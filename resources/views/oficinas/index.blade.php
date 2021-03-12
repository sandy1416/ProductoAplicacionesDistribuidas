
@extends('layout')
@section('contenido')


    <div class = "container p-2" style="background:#0B3B39">
        @if (Session::has('Mensaje'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('Mensaje') }}
            </div>
        @endif
        <div class = "row">
            <div class ="col-md-4" style=text-decoration:underline;color:#FFF>
                <h4>OFICINAS</h4>
            </div>
            <div class ="col-md-3">
                <a class="btn btn-default btn-file"style="background: white" href="{{url('/oficinas/crear')}}">Registrar Oficina</a>
            </div>
        </div>
        <div class="mt-3" >
            <table class = "table table-hover" style="border-collapse: separate;background:#A4A4A4;color: #fff;">
                <thead class="table-second" >
                    <tr>
                        <th>Identificador</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($oficinas as $item)
                        <tr>
                            <td>{{$item -> id}}</td>
                            <td>{{$item -> nombre}}</td>
                            <td  class="row">
                                <a class="btn btn-primary pull-right" href="{{url('/oficinas/'.$item->id.'/editar')}}">Editar</a>
                                <form action="{{url('/oficinas/'.$item->id)}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}

                                    <input type="submit" onclick="return confirm('Desea borrar?');" class="btn btn-warning btn-reset" value="Borrar"/>
                                </form>

                            </td>
                        </tr>
                    @empty
                        NO HAY OFICINAS REGISTRADAS
                    @endforelse
                </tbody>
            </table>
            {{$oficinas->links()}}
        </div>
    </div>
@endsection
