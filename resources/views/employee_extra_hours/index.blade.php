@extends('layouts.app')

@section('content')
    <h1>Horas Extras de {{ $employee->nombre }}</h1>

    <!-- Mensajes de éxito o error -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla de horas extras -->
    <table class="table mt-4">
        <thead>
        <tr>
            <th>Concepto</th>
            <th>Cantidad de Horas</th>
            <th>Valor por Hora</th>
            <th>Importe</th>
        </tr>
        </thead>
        <tbody>
        @foreach($extraHours as $extraHour)
            <tr>
                <td>{{ $extraHour->extraConcept->concepto }}</td>
                <td>{{ $extraHour->cantidad }}</td>
                <td>{{ number_format($extraHour->extraConcept->valor, 2) }} €</td>
                <td>{{ number_format($extraHour->cantidad * $extraHour->extraConcept->valor, 2) }} €</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Mostrar el total de horas extras y el importe total -->
    <div class="mt-4">
        <h3>Total de Horas Extras: {{ $totalHoras }} horas</h3>
        <h3>Importe Total: {{ number_format($totalImporte, 2) }} €</h3>
    </div>

        <a href="{{ route('employee_extra_hours.create', $employee->id) }}" class="btn btn-primary">Añadir Horas Extras</a>
@endsection
