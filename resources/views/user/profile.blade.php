@extends('layouts.navbar')

@section('user')
 


    <div class="reg-container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
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
            </div>
        </div>

    </div>


<script src="{{ asset('js/myjs.js') }}"></script>









@endsection
