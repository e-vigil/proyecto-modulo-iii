<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Admin</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        * {
            font-weight: 500 !important;
        }

        html {
            font-size: 14px;
        }

        body {
            color: #253858;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            max-width: 1000px;
        }

        .feather {
            height: 20px;
            width: 20px;
        }

        .nav-link {
            color: inherit !important;
        }
        
        .nav-link.active {
            color: #0d6efd !important;
        }

    </style>
    <?= $this->renderSection('styles') ?>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container-fluid">
            <a href="/dashboard" class="navbar-brand">Logo</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <i data-feather="menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link d-flex align-items-center" id="dashboard">
                            <i data-feather="grid"></i>
                            <span class="ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/accidentes" class="nav-link d-flex align-items-center" id="accidentes">
                            <i data-feather="clipboard"></i>
                            <span class="ms-1">Accidentes</span>
                        </a>
                    </li>
                    <?php if (session()->get('rol_id') == 1): ?>
                        <li class="nav-item">
                            <a href="/centros-tech" class="nav-link d-flex align-items-center" id="centrostech">
                                <i data-feather="cloud"></i>
                                <span class="ms-1">Centros tech</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dispositivos" class="nav-link d-flex align-items-center" id="dispositivos">
                                <i data-feather="smartphone"></i>
                                <span class="ms-1">Dispositivos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/usuarios" class="nav-link d-flex align-items-center" id="accesos">
                                <i data-feather="users"></i>
                                <span class="ms-1">Accesos</span>
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDdwn" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i data-feather="user"></i>
                            <span class="ms-1"><?= session()->get('nombre') . ' ' . session()->get('apellido') ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDdwn">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/logout">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
            
        <div class="container py-5">
            <?= $this->include('shared/messages') ?>
            <?= $this->renderSection('main-content') ?>
        </div>
    </main>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
      feather.replace()
    </script>
    <script>

        const element = document.querySelector('#<?= $modulo ?>')
        element.classList.add('active');

    </script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>