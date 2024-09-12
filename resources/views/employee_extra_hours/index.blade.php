@extends('layouts.app')

@section('content')
    <h1>Horas Extras de {{ $employee->nombre }}</h1>
    <a href="{{ route('employee_extra_hours.create', $employee->id) }}" class="btn btn-primary">Añadir Horas Extras</a>

    <table class="table mt-4">
        <thead>
        <tr>
            <th>Concepto</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($extraHours as $extraHour)
            <tr>
                <td>{{ $extraHour->extraConcept->concepto }}</td>
                <td>{{ $extraHour->cantidad }}</td>
                <td>
                    <form action="{{ route('employee_extra_hours.destroy', [$employee->id, $extraHour->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
