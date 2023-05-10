<?php
    session_start();
    $user_id = $_SESSION['id'];
    if($user_id == null || $user_id == '') {
        session_destroy();
        header('Location:index.php');
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
                            <a class="nav-link active" aria-current="page"
                                href="index.php?controller=incidence&action=publishIncidence">
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
                <form method="POST">
                    <h1 class="h3 mb-3 fw-normal">Language form</h1>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Language name</label>
                        <input class="form-control" id="exampleFormControlInput1" name="name"
                            placeholder="Write the language here">
                    </div>
                    <button class="w-20 mt-2 mb-2 btn btn-lg btn-primary" type="submit" name="submit">Add language</button>
                </form>

                <?php
                    if (isset($_POST['submit']) && isset($_POST['name'])) {
                        $name = $_POST['name'];
                        
                        if($name != '') {
                            addLanguage($name);
                            echo "<div class='alert alert-success' role='alert'> ¡The language has been addded! </div>";
                        } else {
                            echo "<div class='mt-2 alert alert-danger' role='alert'> The field can't be empty! </div>";
                        }
                    }
                ?>
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