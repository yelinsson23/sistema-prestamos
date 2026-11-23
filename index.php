<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php") ?>
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

    <?php include("scripts.php"); ?>
</body>

</html>