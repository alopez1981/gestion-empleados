<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Trabajadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Tipografía general */
        body {
            font-family: 'Montserrat', sans-serif;
            color: #333;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        /* Encabezados */
        h1, h2, h3, h4, h5, h6 {
            color: #000;
            font-weight: 700;
            margin-bottom: 20px;
        }

        /* Barra de navegación */
        .navbar {
            background-color: #f8e600; /* Color amarillo */
            padding: 15px 0;
            border-bottom: 1px solid #ccc;
        }

        .navbar a {
            color: #FFFFFF;
            font-weight: 600;
            text-transform: uppercase;
            margin-right: 20px;
        }

        .navbar a:hover {
            color: #333;
        }

        /* Botones */
        .btn {
            font-size: 16px;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 30px;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background-color: #f8e600;
            color: #000;
            border: 2px solid transparent;
        }

        .btn-primary:hover {
            background-color: #e0ca00;
            color: #000;
            border: 2px solid #e0ca00;
        }

        .btn-secondary {
            background-color: #fff;
            color: #f8e600;
            border: 2px solid #f8e600;
        }

        .btn-secondary:hover {
            background-color: #f8e600;
            color: #000;
        }

        /* Secciones generales */
        .section {
            padding: 50px 0;
            text-align: center;
        }

        .section.yellow-background {
            background-color: #f8e600;
            color: #000;
        }

        .section.white-background {
            background-color: #fff;
            color: #000;
        }

        /* Imágenes destacadas */
        .featured-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        /* Estilo de tablas */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f8e600;
            color: #000;
            font-weight: bold;
        }

        table td a {
            color: #000;
            font-weight: bold;
            text-decoration: none;
        }

        table td a:hover {
            text-decoration: underline;
        }

        /* Alertas */
        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: fixed; /* Cambia position a fixed */
            bottom: 0; /* Posiciona el footer en la parte inferior de la ventana */
            left: 0;
            width: 100%; /* Asegura que el footer ocupe todo el ancho */
            z-index: 1000; /* Asegura que esté encima de otros elementos si es necesario */
        }

        footer a {
            color: #f8e600;
            text-decoration: none;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Asegurarnos de que el contenido no esté superpuesto por el footer */
        body {
            padding-bottom: 60px; /* Espacio suficiente para que el contenido no sea cubierto por el footer */
        }

        .pagination-container .pagination {
            display: flex !important; /* Forzar que solo se muestre la paginación con display flex */
        }

        .hidden {
            display: none !important; /* Asegurarte de ocultar cualquier otro elemento innecesario */
        }


        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 1px;
        }

        .pagination li {
            margin: 0 5px;
        }
        .pagination .page-link i {
            display: none; /* Si tienes iconos de un set como FontAwesome, ocultalos */
        }


        .pagination li a,
        .pagination li span {
            display: inline-block;
            padding: 8px 16px; /* Ajuste de tamaño para los botones */
            font-size: 14px; /* Tamaño de fuente adecuado */
            color: #007bff;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination li a:hover {
            background-color: #f8e600; /* Color hover */
            color: #000; /* Texto en hover */
        }

        .pagination li.active span {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination .disabled span {
            background-color: #e9ecef;
            color: #6c757d;
            border-color: #dee2e6;
        }

        /* Controlar el tamaño de los iconos prev/next */
        .pagination .page-link {
            font-size: 4px; /* Controlar el tamaño de los íconos */
            padding: 8px 2px; /* Tamaño adecuado de los botones */
        }

        .pagination .page-link i {
            font-size: 4px; /* Asegurarse de que los íconos tengan un tamaño adecuado */
        }

        img {
            max-width: 100%; /* Asegura que las imágenes no se desborden */
            height: auto; /* Mantén la proporción de las imágenes */
        }





    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/Sticker_21.png') }}" alt="Logo" style="height: 50px;">
        </a>
        <a class="navbar-brand" href="#">Gestión RRHH</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employees.index') }}">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('extra_concepts.index') }}">Conceptos de Horas Extras</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
    <img src="{{ asset('images/sticker_jeep.png') }}" alt="Jeep" style="max-width: 300px;">
</div>

</body>
<footer>
    <p>&copy; 2024 Hoy-Voy. Todos los derechos reservados.</p>
</footer>
</html>
