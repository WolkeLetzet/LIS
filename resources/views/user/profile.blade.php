@extends('layouts.navbar')

@section('user')
    <div class="reg-container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card mb-5">
                    <div class="card-header">
                        <h4 class="card-title">Informacion de Usuario</h4>
                    </div>
                    <div class="card-body">

                        <table class="table">

                            <tbody>
                                <tr>
                                    <th>Nombre</th>
                                    <td>
                                        <form id="cambioNombre" action="{{ route('cambiar-nombre') }}" method="POST">
                                            @csrf
                                            <div class="row">

                                                <div class="input-group col">

                                                    <input name="nombre" id="nombre" type="text" class="form-control"
                                                        disabled value="{{ auth()->user()->name }}">

                                                    <button type="button" id="cambiarNombre"
                                                        class="btn btn-outline-secondary"><i
                                                            class="bi bi-pencil-square"></i></button>

                                                    <button id="subir" hidden type="submit"
                                                        class="btn btn-outline-success"><i
                                                            class="bi bi-check2"></i></button>


                                                </div>

                                            </div>
                                        </form>
                                    </td>

                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ auth()->user()->email }}</td>

                                </tr>
                                <tr>
                                    <th>Contraseña</th>
                                    <td>
                                        <div class="row">
                                            <div class="input-group col">
                                                <input type="password" class="form-control" disabled value="**********">
                                                <a class="btn btn-outline-secondary" value="***" type="button"
                                                    href="{{ route('password.change') }}"><i
                                                        class="bi bi-pencil-square"></i></a>
                                            </div>
                                        </div>

                                    </td>

                                </tr>
                            </tbody>
                        </table>

                    </div>


                    <div class="card-footer"></div>
                </div>
                @role('admin')
                @else
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Cursos completados</h4>
                        </div>
                        <div class="card-body">

                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach (auth()->user()->cursos()->get() as $curso )
                                    <tr>
                                        <td>
                                            {{$curso->title}}
                                        </td>
                                        <td>
                                            {{$curso->descrip}}
                                        </td>
                                        <td class="text-center align-middle" >
                                            <a href="{{ route('article.show', ['id'=>$curso->id]) }}" style="font-size:1.4rem">
                                                <i class="icon bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                @endrole

            </div>
        </div>

    </div>


    <script src="{{ asset('js/myjs.js') }}"></script>
@endsection
