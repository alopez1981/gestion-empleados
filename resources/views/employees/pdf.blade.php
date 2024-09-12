<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f8e600;
        }
    </style>
</head>
<body>
<h1>Listado de Empleados</h1>

<table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>DNI</th>
        <th>Rol</th>
        <th>Centro</th>
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
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
