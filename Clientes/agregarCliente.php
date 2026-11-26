<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("../head.php")
    ?>
    <style>
        /* .id-cliente{
            display: none;
        } */
    </style>
</head>

<body>
    <div class="d-flex">
        <?php
        include("../bar.php");

        ?>
        <link rel="stylesheet" href="../src/css/general.css">
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

            <!-- Contenedor  -->
            <main class="p-4" id="contenedorVistas">

                <div class="contenedor">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <div class="row g-3 align-items-end">
                                <!-- Búsqueda simultánea: Nombres, Apellidos, Documento y Teléfono -->
                                <div class="col-md-4">
                                    <label for="filtroGeneral" class="form-label fw-semibold">Buscar cliente</label>
                                    <input type="text" id="filtroGeneral" class="form-control" placeholder="Nombre, apellido, cédula o teléfono...">
                                </div>

                                <!-- Select Estado Civil -->
                                <div class="col-md-2">
                                    <label for="filtroEstadoCivil" class="form-label fw-semibold">Estado Civil</label>
                                    <select id="filtroEstadoCivil" class="form-select">
                                        <option value="">Todos</option>
                                        <option value="Soltero/a">Soltero/a</option>
                                        <option value="Casado/a">Casado/a</option>
                                        <option value="Unión Libre">Unión Libre</option>
                                        <option value="Divorciado/a">Divorciado/a</option>
                                        <option value="Viudo/a">Viudo/a</option>
                                    </select>
                                </div>

                                <!-- Select Nacionalidad -->
                                <div class="col-md-2">
                                    <label for="filtroNacionalidad" class="form-label fw-semibold">Nacionalidad</label>
                                    <select id="filtroNacionalidad" class="form-select">
                                        <option value="">Todas</option>

                                    </select>
                                </div>

                                <!-- Select garante -->
                                <div class="col-md-2">
                                    <label for="filtroClienteGarante" class="form-label fw-semibold">Cliente/Garante</label>
                                    <select id="filtroClienteGarante" class="form-select">
                                        <option value="">Todas</option>
                                        <option value="0">Clientes</option>
                                        <option value="1">Garantes</option>
                                    </select>
                                </div>

                                <!-- Select Estado -->
                                <div class="col-md-2">
                                    <label for="filtroEstado" class="form-label fw-semibold">Estado</label>
                                    <select id="filtroEstado" class="form-select">
                                        <option value="">Todos</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>


                                <!-- Slider de Rango: Límite de Crédito -->

                                <div class="col-xxl-4 col-md-6 mt-3">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label fw-semibold mb-1">Rango de Límite de Crédito</label>
                                        <span id="etiquetaRangoCredito" class="badge bg-primary fs-6">RD$ 0 - RD$ 500,000</span>
                                    </div>
                                    <div class="range-slider-container mt-2">
                                        <div class="slider-track" id="sliderTrack"></div>
                                        <input type="range" id="rangoMin" min="0" max="500000" step="5000" value="0">
                                        <input type="range" id="rangoMax" min="0" max="500000" step="5000" value="500000">
                                    </div>
                                </div>

                                <!-- Botón Buscar -->
                                <div class="col-md-2">
                                    <button type="button" id="btnBuscar" class="btn col-md-12 btn-success">
                                        Buscar
                                    </button>
                                </div>

                                <!-- Botón Limpiar -->
                                <div class="col-md-2 d-grid">
                                    <button type="button" id="btnLimpiarFiltros" class="btn btn-outline-secondary">
                                        Limpiar filtros
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="table-responsive col-lg-12 px-0">
                        <table class="table table-hover table-condensed table-bordered" id="tablaClientes">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Documento</th>
                                    <th>Estado Civil</th>
                                    <th>Limite de Credito</th>
                                    <th>Telefono Prin.</th>
                                    <th>Nacionalidad</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include("../scripts.php"); ?>
    <script src="../src/js/agregarClientes.js"></script>
</body>

</html>