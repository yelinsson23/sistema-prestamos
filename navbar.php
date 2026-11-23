<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Préstamos</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/all.min.css">
    <link rel="stylesheet" href="src/css/navbar.css">

    <style>
        
    </style>
</head>
<body>

<div class="d-flex">
    <!-- SIDEBAR LATERAL -->
    <nav id="sidebar" class="d-flex flex-column">
        <!-- Logo / Nombre del Sistema -->
        <div class="sidebar-header d-flex align-items-center justify-content-between">
            <span class="fs-5 fw-bold text-white">
                <i class="fas fa-landmark text-primary me-2"></i>CrediGest
            </span>
        </div>

        <ul class="nav flex-column mb-auto pb-4">
            <!-- Dashboard -->
            <li class="nav-item mt-2">
                <a href="#dashboard" class="nav-link active" data-vista="dashboard">
                    <i class="fas fa-chart-pie menu-icon"></i> Resumen General
                </a>
            </li>

            <!-- SECCIÓN 1: CLIENTES -->
            <li class="sidebar-heading">Clientes</li>
            <li class="nav-item">
                <a href="#clientes-registro" class="nav-link" data-vista="clientes-registro">
                    <i class="fas fa-user-plus menu-icon"></i> Registro y Edición
                </a>
            </li>
            <li class="nav-item">
                <a href="#clientes-consulta" class="nav-link" data-vista="clientes-consulta">
                    <i class="fas fa-users menu-icon"></i> Consulta de Clientes
                </a>
            </li>

            <!-- SECCIÓN 2: PRÉSTAMOS -->
            <li class="sidebar-heading">Préstamos</li>
            <li class="nav-item">
                <a href="#prestamos-apertura" class="nav-link" data-vista="prestamos-apertura">
                    <i class="fas fa-hand-holding-usd menu-icon"></i> Apertura de Préstamo
                </a>
            </li>
            <li class="nav-item">
                <a href="#prestamos-renovacion" class="nav-link" data-vista="prestamos-renovacion">
                    <i class="fas fa-sync-alt menu-icon"></i> Renovaciones
                </a>
            </li>
            <li class="nav-item">
                <a href="#prestamos-consulta" class="nav-link" data-vista="prestamos-consulta">
                    <i class="fas fa-file-invoice-dollar menu-icon"></i> Cartera de Préstamos
                </a>
            </li>

            <!-- SECCIÓN 3: CAJA / RECIBOS -->
            <li class="sidebar-heading">Caja y Recibos</li>
            <li class="nav-item">
                <a href="#recibos-cobro" class="nav-link" data-vista="recibos-cobro">
                    <i class="fas fa-cash-register menu-icon"></i> Recibo de Ingresos
                </a>
            </li>
            <li class="nav-item">
                <a href="#recibos-historial" class="nav-link" data-vista="recibos-historial">
                    <i class="fas fa-receipt menu-icon"></i> Historial de Recibos
                </a>
            </li>

            <!-- SECCIÓN 4: MANTENIMIENTO / CONFIGURACIÓN -->
            <li class="sidebar-heading">Mantenimiento</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#menuCatalogos" role="button" aria-expanded="false">
                    <i class="fas fa-sliders-h menu-icon"></i> Tablas Auxiliares
                    <i class="fas fa-chevron-right chevron-icon"></i>
                </a>
                <div class="collapse submenu" id="menuCatalogos">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#cat-tipos-prestamo" class="nav-link" data-vista="cat-tipos-prestamo">Tipos de Préstamo</a>
                        </li>
                        <li class="nav-item">
                            <a href="#cat-documentos" class="nav-link" data-vista="cat-documentos">Tipos de Documento</a>
                        </li>
                        <li class="nav-item">
                            <a href="#cat-metodos-pago" class="nav-link" data-vista="cat-metodos-pago">Métodos de Pago</a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item">
                <a href="#config-usuarios" class="nav-link" data-vista="config-usuarios">
                    <i class="fas fa-user-shield menu-icon"></i> Usuarios y Accesos
                </a>
            </li>
        </ul>

        <!-- Pie del Sidebar (Usuario en sesión) -->
        <div class="p-3 border-top border-secondary d-flex align-items-center justify-content-between" style="background-color: #0f172a;">
            <div class="small">
                <div class="text-white fw-semibold" id="lblUsuarioSesion">Admin Sistema</div>
                <span class="text-success" style="font-size: 0.75rem;"><i class="fas fa-circle me-1" style="font-size: 0.5rem;"></i>En línea</span>
            </div>
            <button class="btn btn-sm btn-outline-danger" title="Cerrar sesión">
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </div>
    </nav>

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
        </main>
    </div>
</div>

<script src="src/js/jquery-4.1.0.js"></script>
<script src="src/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        // 1. Colapsar/Expandir el Sidebar en pantallas pequeñas o para ganar espacio
        $('#btnToggleSidebar').on('click', function () {
            $('#sidebar').toggleClass('collapsed');
        });

        // 2. Marcar opción activa y actualizar título superior al hacer clic
        $('#sidebar .nav-link[data-vista]').on('click', function (e) {
            e.preventDefault();

            // Quitar clase active de todos y ponerla en el seleccionado
            $('#sidebar .nav-link').removeClass('active');
            $(this).addClass('active');

            // Cambiar el título de la barra superior automáticamente
            const titulo = $(this).text().trim();
            $('#tituloModuloActual').text(titulo);

            // Aquí puedes cargar la vista por AJAX/PHP o mostrar el contenedor correspondiente
            const vista = $(this).data('vista');
            // ejemplo: $('#contenedorVistas').load('vistas/' + vista + '.php');
        });
    });
</script>
</body>
</html>