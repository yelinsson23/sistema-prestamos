<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="src/css/bootstrap.min.css">

    <link rel="stylesheet" href="src/css/datatables.min.css">

    <link rel="stylesheet" href="src/css/all.min.css">

    <link rel="stylesheet" href="src/css/navbar.css">
</head>

<body>
    <div class="d-flex">
        <?php
        include("bar.php");

        ?>
        <!-- ÁREA DE CONTENIDO PRINCIPAL -->
        <div class="flex-grow-1 d-flex flex-column">
            <!-- Barra Superior (Navbar) -->
            <header class="navbar navbar-light bg-white border-bottom px-4 py-2 shadow-sm">
                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-secondary btn-sm me-3" id="btnToggleSidebar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h5 class="mb-0 fw-semibold text-secondary" id="tituloModuloActual">Resumen General</h5>
                </div>
                <div class="text-muted small">
                    <i class="far fa-calendar-alt me-1"></i> <span id="fechaActual"></span>
                </div>
            </header>

            <!-- Contenedor dinámico donde se cargan las vistas/módulos -->
            <main class="p-4" id="contenedorVistas">
                <!-- Aquí cargas tus archivos PHP o muestras/ocultas las vistas -->

                <h1>HOLA MUNDDO</h1>
            </main>
        </div>
    </div>

<!-- 1. jQuery (siempre primero) -->
<script src="src/js/jquery-4.1.0.js"></script>

<!-- 2. JS de Bootstrap 5 -->
<script src="src/js/bootstrap.bundle.min.js"></script>

<!-- 3. JS de DataTables -->
<script src="src/js/datatables.min.js"></script>
</body>

</html>