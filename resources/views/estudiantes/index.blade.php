@extends('layouts.app')

@section('content')
    <h1 class="m-2">Lista de Estudiantes</h1>
    <a class="btn btn-warning m-2" href="{{ route('estudiantes.create') }}">Crear Estudiante</a>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Edad</th>
                <th scope="col">Email</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Grupo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->apellidos }}</td>
                    <td>{{ $estudiante->edad }}</td>
                    <td>{{ $estudiante->email }}</td>
                    <td>{{ $estudiante->telefono }}</td>
                    <td>{{ $estudiante->grupo->semestre }} - {{ $estudiante->grupo->grupo }}</td>
                    <td class="p-2">
                        <a class="btn btn-primary btn-sm" href="{{ route('estudiantes.show', $estudiante->id) }}">Ver</a>
                        <a class="btn btn-secondary btn-sm"
                            href="{{ route('estudiantes.edit', $estudiante->id) }}">Editar</a>
                        <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar este registro?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
