@extends('layouts.master')

@section('contenido-principal')
     <!-- datos -->
     <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>Equipos</h3>
            </div>
        </div>

        <div class="row">
            <!-- tabla -->
            <div class="col-12 col-lg-8 order-last order-lg-first">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Entrenador</th>
                            <th colspan="3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipos as $num=>$equipo)
                        <tr>
                            <td class="align-middle">{{$num+1}}</td>
                            <td class="align-middle">{{$equipo->nombre}}</td>
                            <td class="align-middle">{{$equipo->entrenador}}</td>
                            <td class="text-center" style="width: 1rem">
                                <!--BORRAR-->
                                <span data-bs-toggle="tooltip" data-bs-title="Borrar {{$equipo->nombre}}">
                                    <button type="button" class="btn bt-sm btn-danger pb-0" data-bs-toggle="modal" data-bs-target="#equipoBorrarModal{{$equipo->id}}">
                                        <span class="material-icons">delete</span>
                                    </button>
                                </span>
                                {{--<form action="{{route('equipos.destroy',$equipo->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger pb-0" data-bs-toggle="tooltip"
                                    data-bs-title="Borrar {{$equipo->nombre}}">
                                    <span class="material-icons">delete</span></button>
                                </form>--}}
                                {{--<a href="#" class="btn btn-sm btn-danger pb-0" data-bs-toggle="tooltip"
                                data-bs-title="Borrar {{$equipo->nombre}}">
                                <span class="material-icons">delete</span>
                                </a>--}}
                            <!--/BORRAR-->
                            </td>
                            <td class="text-center" style="width: 1rem">
                                <a href="#" class="btn btn-sm btn-warning pb-0 text-white" data-bs-toggle="tooltip"
                                    data-bs-title="Editar {{$equipo->nombre}}">
                                    <span class="material-icons">edit</span>
                                </a>
                            </td class="text-center" style="width: 1rem">
                            <td>
                                <a href="#" class="btn btn-sm btn-info pb-0 text-white" data-bs-toggle="tooltip"
                                    data-bs-title="Ver {{$equipo->nombre}}">
                                    <span class="material-icons">group</span>
                                </a>
                            </td>
                            
                        </tr>
                        <!-- Modal Borrar Equipo-->
                        <div class="modal fade" id="equipoBorrarModal{{$equipo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Borrar Equipo</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Desea borrar al equipo {{$equipo->nombre}}?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{route('equipos.destroy',$equipo->id)}}" method="POST">
                                        @csrf
                                        @method('delete') 
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-danger">Borrar Equipo</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        @endforeach
                        
                        
                    </tbody>
                </table>
            </div>

            <!-- form agregar equipo -->
            <div class="col-12 col-lg-4 order-first order-lg-last">
                <div class="card">
                    <div class="card-header bg-dark text-white">Agregar Equipo</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('equipos.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="entrenador" class="form-label">Entrenador</label>
                                <input type="text" id="entrenador" name="entrenador" class="form-control">
                            </div>
                            <div class="mb-3 d-grid gap-2 d-lg-block">
                                <button type="reset" class="btn btn-warning">Cancelar</button>
                                <button type="submit" class="btn btn-success">Agregar Equipo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
   
    