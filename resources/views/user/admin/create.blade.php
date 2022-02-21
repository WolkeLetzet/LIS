@extends('layouts.navbar')

@section('admin')


    <div class="container reg-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registrar Nuevo Ususario</div>
                    {{-- Mensaje de Exito --}}
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" placeholder="{{$example->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        >
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="{{$example->safeEmail}}"  autocomplete="{{old('email')}}">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">Contraseña</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        <button class="input-group-text bg-white border-start-0" style="font-size: 1.1rem" id="changeVis"><i class="icon bi bi-eye"></i></button>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong><strong>{{ $message }}</strong></strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">Confirmar Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control"
                                        name="password_confirmation"  autocomplete="">
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-center">
                                @foreach ($roles as $rol)
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input class="form-check-input" name="roles[]" type="checkbox"
                                                value="{{ $rol->name }}" id="{{ $rol->name }}">
                                            <label class="form-check-label" for="{{ $rol->name }}">
                                                {{ $rol->name }}
                                            </label>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
