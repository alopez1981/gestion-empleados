@extends('layouts.app')

@section('content')
    <h1>Añadir Horas Extras a {{ $employee->nombre }}</h1>

    <form action="{{ route('employee_extra_hours.store', $employee->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="extra_concept_id" class="form-label">Concepto</label>
            <select class="form-control" id="extra_concept_id" name="extra_concept_id" required>
                @foreach($concepts as $concept)
                    <option value="{{ $concept->id }}">{{ $concept->concepto }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad de Horas</label>
            <input type="number" step="0.01" class="form-control" id="cantidad" name="cantidad" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
