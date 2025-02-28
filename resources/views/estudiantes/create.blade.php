@extends('layouts.app')

@section('content')
    <h1 class="m-2">Crear Estudiante</h1>
    <form action="{{ route('estudiantes.store') }}" method="POST">
        @csrf

        <!-- nombre -->
        <div class="input-group mb-3 d-flex">
            <span class="input-group-text w-25 d-flex justify-content-center align-items-center">Nombre</span>
            <input id="nombre" name="nombre" type="text" class="form-control" pattern="[A-Za-z\s]+" maxlength="100"
                value="{{ old('nombre') }}" required>
        </div>
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Apellidos -->
        <div class="input-group mb-3 d-flex">
            <span class="input-group-text w-25 d-flex justify-content-center align-items-center">Apellidos</span>
            <input id="apellidos" name="apellidos" type="text" class="form-control" pattern="[A-Za-z\s]+" maxlength="100"
                value="{{ old('apellidos') }}" required>
        </div>
        @error('apellidos')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- edad -->
        <div class="input-group mb-3 d-flex">
            <span class="input-group-text w-25 d-flex justify-content-center align-items-center">Edad</span>
            <input id="edad" name="edad" type="number" class="form-control" value="{{ old('edad') }}" required>
        </div>
        @error('edad')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- email -->
        <div class="input-group mb-3 d-flex">
            <span class="input-group-text w-25 d-flex justify-content-center align-items-center">Email</span>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- telefono -->
        <div class="input-group mb-3 d-flex">
            <span class="input-group-text w-25 d-flex justify-content-center align-items-center">Teléfono</span>
            <input id="telefono" name="telefono" type="tel" class="form-control" value="{{ old('telefono') }}" required
                maxlength="10" pattern="\d+">
        </div>
        @error('telefono')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- grupo -->
        <div>
            <label for="grupo_id">Grupo:</label>
            <select id="grupo_id" name="grupo_id" class="form-select" required>
                <option value="" disabled selected>Seleccionar Grupo</option>
                @foreach ($grupos as $grupo)
                    <option value="{{ $grupo->id }}" {{ old('grupo_id') == $grupo->id ? 'selected' : '' }}>
                        {{ $grupo->semestre }} - {{ $grupo->grupo }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('grupo_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <a class="btn btn-dark" href="{{ route('estudiantes.index') }}">Volver a la lista</a>
        <button type="submit" class="btn btn-success">Guardar</button>

    </form>
@endsection
