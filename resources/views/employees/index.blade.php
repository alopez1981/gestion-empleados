@extends('layouts.app')

@section('content')
    <!-- Sección de encabezado -->
    <div class="section-header">
        <h1>Listado de Trabajadores</h1>
    </div>

    <!-- Botón para añadir un nuevo trabajador -->
    <div class="section-content">
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Añadir Trabajador</a>
    </div>

    <!-- Tabla que muestra la lista de empleados -->
    <div class="section-content">
        <table class="table">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Rol</th>
                <th>Centro</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->nombre }}</td>
                    <td>{{ $employee->apellidos }}</td>
                    <td>{{ $employee->dni }}</td>
                    <td>{{ $employee->rol }}</td>
                    <td>{{ $employee->centro }}</td>
                    <td>
                        <!-- Botón para editar al empleado -->
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Editar</a>

                        <!-- Botón para gestionar las horas extras del empleado -->
                        <a href="{{ route('employee_extra_hours.index', $employee->id) }}" class="btn btn-info">Gestionar Horas Extras</a>

                        <!-- Formulario para eliminar al empleado -->
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este empleado?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Mensaje de éxito al realizar una operación -->
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
