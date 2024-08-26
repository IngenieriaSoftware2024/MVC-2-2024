<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= asset('build/js/app.js') ?>"></script>
    <link rel="shortcut icon" href="<?= asset('images/tienda.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('build/styles.css') ?>">
    <title>Tienda Vasquez</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/ejemplo/">
                <img src="<?= asset('./images/tienda.png') ?>" width="45px" alt="cit">
                Tienda
            </a>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin: 0;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/MVC-2-2024/"><i class="bi bi-house-fill me-2"></i>Inicio</a>
                    </li>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-cart3 me-2"></i>Productos
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-dark " id="dropdownRevision" style="margin: 0;">
                            <li>
                                <a class="dropdown-item  text-white " href="/MVC-2-2024/productos"><i class="ms-lg-0 ms-2 bi bi-cart-plus me-2"></i>Productos</a>
                            </li>
                            <li>
                                <a class="dropdown-item  text-white " href="/MVC-2-2024/productos/estadistica"><i class="bi bi-bar-chart-steps me-2"></i>estadistica</a>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- <div class="nav-item dropdown">
                        <a class="nav-link" href="/MVC-2-2024/charts">
                            <i class="bi bi-bar-chart-steps me-2"></i>ChartJS
                        </a>
                    </div> -->
                    <?php if ($_SESSION['user']['rol_nombre_ct'] == 'TIENDA_ADMIN') : ?>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-2"></i>Usuarios
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" id="dropdownRevision" style="margin: 0;">
                                <li>
                                    <a class="dropdown-item text-white" href="/MVC-2-2024/usuarios"><i class="ms-lg-0 ms-2 bi bi-person-add me-2"></i>Creacion de Usuarios</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-white" href="/MVC-2-2024/aplicacion"><i class="ms-lg-0 ms-2 bi bi-grid-fill me-2"></i>Aplicaciones</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-white" href="/MVC-2-2024/rol"><i class="ms-lg-0 ms-2 bi bi-person-fill-gear me-2"></i>Asignacion Roles</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-white" href="/MVC-2-2024/permiso"><i class="ms-lg-0 ms-2 bi bi-shield-lock me-2"></i>Permisos</a>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </ul>
                <div class="col-lg-1 d-grid mb-lg-0 mb-2">
                    <a href="/MVC-2-2024/logout" class="btn btn-danger"><i class="bi bi-arrow-bar-left"></i>SALIR</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="progress fixed-bottom" style="height: 6px;">
        <div class="progress-bar progress-bar-animated bg-danger" id="bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <div class="container-fluid pt-5 mb-4" style="min-height: 85vh">
        <?php echo $contenido; ?>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <p style="font-size:xx-small; font-weight: bold;">
                    Comando de Informática y Tecnología, <?= date('Y') ?> &copy;
                </p>
            </div>
        </div>
    </div>
</body>

</html>