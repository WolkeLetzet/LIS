@extends('layouts.navbar')
@section('user')
<div class="reg-container">
    <div class="row justify-content-center">


        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <h5>Cambiar Contraseña</h5>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-body ">

                    <form class="form needs-validation" id="new-password-form" method="POST"
                        action="{{ route('password.save') }} ">

                        @csrf


                        {{-- Password Actual --}}
                        <div class="row mb-3">
                            <label for="current-password" class="col-md-4 col-form-label text-md-end">Contraseña
                                Actual</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" autocomplete="off" 
                                    class="form-control @error('current-password') is-invalid @enderror"
                                    name="current-password" required>

                                @error('current-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- New Password --}}
                        <div class="row mb-3">
                            <label for="new-password" class="col-md-4 col-form-label text-md-end">Nueva
                                Contraseña</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password"
                                    class="form-control @error('new-password') is-invalid @enderror" name="new-password"
                                    required>
                                @error('new-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Confirmar --}}
                        <div class="row mb-3">
                            <label for="new-password-confirm" class="col-md-4 col-form-label text-md-end">Confirmar
                                Nueva Contraseña</label>

                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="new-password_confirmation" required>


                            </div>
                        </div>


                    </form>

                </div>
                <div class="card-footer text-end">
                    <button form="new-password-form" type="submit" class="btn btn-primary">
                        Cambiar Contraseña
                    </button>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection