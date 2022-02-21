@extends('layouts.navbar')

@section('admin')
    <div class="container">

        <div class="container">
            <div class="card table-container">

                <div class="card-body">
                    <div class="card-text overflow-scroll" style="height:  450px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Eliminar</th>

                                </tr>
                            </thead>
                            <div>
                                <tbody>
                                    @if (auth()->user()->hasRole('admin') && $users)
                                        <form id="roleForm" action="{{ route('user.admin.delete') }}" method="post">
                                            @csrf

                                            @foreach ($users as $user)
                                                <tr>
                                                    <td scope="row">{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>

                                                        <div class="form-check">
                                                            <input class="form-check-input ck" name="users[]" type="checkbox"
                                                                value="{{$user->id}}" id="{{ $user->id }}"">
                                                        </div>

                                                                     
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </form>
                                    @endif
                                </tbody>
                            </div>

                        </table>
                    </div>

                </div>
                <div class="card-footer">


                    <div class="row justify-content-between">
                        <div class="col text-start">
                            <button id="guardar" form="roleForm" type="submit" class="btn btn-primary">Guardar</button>

                        </div>
                        <div class="col-2">

                            <input type="checkbox" class="form-check-input" id="selectAll">
                            <label class="form-check-label" for="selectAll"> Seleccionar Todos </label>

                        </div>


                    </div>



                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('js/checkboxes.js') }}"></script>
@endsection
