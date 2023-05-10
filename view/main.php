<?php
    session_start();
    $user_id = $_SESSION['id'];
    if($user_id == null || $user_id == '') {
        $user = user::getUserById($_SESSION['id']);
        foreach($user as $u) {
            if($u['role'] != 'ADMIN') {
                session_destroy();
                header('Location:index.php');
            }
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="./view/default/css/dashboard.css" rel="stylesheet">
    <link href="./view/default/css/bootstrap.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Hi <strong><?php echo $_SESSION['username']; ?>!</strong> </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
            aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="index.php?controller=login&action=signout">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?controller=incidence&action=publishIncidence">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Publish
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" 
                                href="index.php?controller=user&action=showProfile">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Profile
                            </a>
                        </li>
                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                        <span>Languages</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle" class="align-text-bottom"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <?php
                        $languages = getLanguages();
                        foreach($languages as $language)
                        {
                            echo    "<li class=nav-item>
                                        <a class=nav-link active href=index.php?controller=incidence&action=showIncidences&id=" . $language['id'] . " style=color:#2470dc>
                                            <span data-feather=file-text class=align-text-bottom></span>"
                                            . $language['name'] .
                                        "</a>
                                    </li>";
                        }
                        $user = user::getUserById($_SESSION['id']);
                        foreach($user as $u) {
                            if($u['role'] == 'ADMIN') {
                                echo "<li class=nav-item>
                                        <a href='index.php?controller=language&action=publishLanguage' class='nav-link m-1 btn btn-outline-primary'> Add language </a>
                                        <a href='index.php?controller=language&action=_deleteLanguage' class='nav-link m-1 btn btn-outline-danger'> Delete language </a>
                                      </li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="padding:10px">
                <div class="container mt-5 mb-5">
                    <h2 class="text-center mb-4">Noticias recientes</h2>
                    <hr class="border-bottom">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>Google anuncia el lanzamiento de su nueva herramienta de desarrollo web: Flutter Web</h2>
                            <p>Google ha lanzado su nueva herramienta de desarrollo web, Flutter Web, que permite a los desarrolladores crear aplicaciones web de alta calidad con una experiencia de usuario similar a las aplicaciones móviles.</p>
                            <p>Con Flutter Web, los desarrolladores pueden utilizar el mismo lenguaje de programación para crear aplicaciones web y móviles, lo que les permite ahorrar tiempo y mejorar la eficiencia en el desarrollo.</p>
                        </div>
                        <div class="col-md-4">
                            <img src="./view/default/img/flutter.png" alt="Flutter Web" class="img-fluid">
                        </div>
                    </div>
                </div>
                <hr class="border-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="./view/default/img/python.png" alt="Python" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h2 class="mb-4">El lenguaje de programación Python sigue siendo el más popular entre los desarrolladores</h2>
                            <p>Según una encuesta reciente de Stack Overflow, Python sigue siendo el lenguaje de programación más popular entre los desarrolladores, con un 41.7% de ellos utilizando este lenguaje en su trabajo diario.</p>
                            <p>Python es un lenguaje de programación fácil de aprender y utilizar, lo que lo hace ideal para los principiantes y para proyectos de todo tipo y tamaño.</p>
                        </div>
                    </div>
                </div>
                <hr class="border-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="mb-4">El uso de inteligencia artificial en el desarrollo web está revolucionando la industria</h2>
                            <p>La inteligencia artificial (IA) se está convirtiendo en una herramienta cada vez más importante en el desarrollo web, permitiendo a los desarrolladores automatizar tareas tediosas y mejorar la eficiencia en el desarrollo.</p>
                            <p>Con la IA, los desarrolladores pueden crear sitios web más inteligentes y personalizados, adaptados a las necesidades de cada usuario y con una experiencia de usuario más atractiva y efectiva.</p>
                        </div>
                        <div class="col-md-4">
                             <img src="./view/default/img/ia.png" alt="Inteligencia Artificial en el desarrollo web" class="img-fluid">
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>