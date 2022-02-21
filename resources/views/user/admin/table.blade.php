
@extends('layouts.navbar')

@section('admin')

<div class="container">
    <div class="card table-container">
        <div class="card-header ">

            <div class="row  justify-content-end">
                <div class="col">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="col-1">
                    <a style="font-size: 1.5rem"  id="edit-roles" href="{{ route('user.role.control') }}">
                        <i class="bi bi-gear-fill"></i>
                    </a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="card-text overflow-scroll" style="height:  450px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if (auth()->user()->hasRole('admin') && $users)

                            @foreach ($users as $user)
                                <tr>
                                    <td scope="row">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }} |
                                        @endforeach
                                    </td>
                                </tr>

                            @endforeach

                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection