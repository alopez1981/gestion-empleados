@extends('layouts.app')

@section('content')
    <h1>Añadir Trabajador</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>
        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" required>
        </div>
        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-control" id="rol" name="rol">
                <option value="Administrador">Administrador</option>
                <option value="Profesor">Profesor</option>
                <option value="Atención al Alumno">Atención al Alumno</option>
                <option value="Director">Director</option>
                <option value="Otro Empleado">Otro Empleado</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="centro" class="form-label">Centro</label>
            <input type="text" class="form-control" id="centro" name="centro" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
