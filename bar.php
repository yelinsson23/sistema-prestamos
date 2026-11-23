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