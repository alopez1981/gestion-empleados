@extends('layouts.app')

@section('content')
    <h1>Añadir Concepto de Hora Extra</h1>
    <form action="{{ route('extra_concepts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="concepto" class="form-label">Concepto</label>
            <input type="text" class="form-control" id="concepto" name="concepto" required>
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
