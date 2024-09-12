@extends('layouts.app')

@section('content')
    <h1>Conceptos de Horas Extras</h1>
    <a href="{{ route('extra_concepts.create') }}" class="btn btn-primary">Añadir Concepto</a>

    <table class="table mt-4">
        <thead>
        <tr>
            <th>Concepto</th>
            <th>Valor</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($concepts as $concept)
            <tr>
                <td>{{ $concept->concepto }}</td>
                <td>{{ $concept->valor }}</td>
                <td>
                    <a href="{{ route('extra_concepts.edit', $concept->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('extra_concepts.destroy', $concept->id) }}" method="POST" style="display:inline-block;">
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
