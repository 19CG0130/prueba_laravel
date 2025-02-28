@extends('layouts.app')

@section('content')
    <h1>Detalles del Estudiante</h1>
    <div>
        <p><strong>Nombre:</strong> {{ $estudiante->nombre }}</p>
        <p><strong>Apellidos:</strong> {{ $estudiante->apellidos }}</p>
        <p><strong>Edad:</strong> {{ $estudiante->edad }}</p>
        <p><strong>Email:</strong> {{ $estudiante->email }}</p>
        <p><strong>Teléfono:</strong> {{ $estudiante->telefono }}</p>
        <p><strong>Grupo:</strong> {{ $estudiante->grupo->semestre }} - {{ $estudiante->grupo->grupo }}</p>
    </div>

    <a class="btn btn-dark" href="{{ route('estudiantes.index') }}">Volver a la lista</a>
@endsection
