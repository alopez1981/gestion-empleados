@extends('layouts.app')

@section('content')
    <h1>Editar Trabajador</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $employee->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $employee->apellidos }}" required>
        </div>

        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->dni }}" required>
        </div>

        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-control" id="rol" name="rol">
                <option value="Administrador" {{ $employee->rol == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="Profesor" {{ $employee->rol == 'Profesor' ? 'selected' : '' }}>Profesor</option>
                <option value="Atención al Alumno" {{ $employee->rol == 'Atención al Alumno' ? 'selected' : '' }}>Atención al Alumno</option>
                <option value="Director" {{ $employee->rol == 'Director' ? 'selected' : '' }}>Director</option>
                <option value="Otro Empleado" {{ $employee->rol == 'Otro Empleado' ? 'selected' : '' }}>Otro Empleado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="centro" class="form-label">Centro</label>
            <input type="text" class="form-control" id="centro" name="centro" value="{{ $employee->centro }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
