<!doctype html>
<html lang="en">

<head>
    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="./view/default/css/sign-in.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <form method="POST">
            <img class="mb-4" src="./view/default/img/main-logo.png" alt="" width="180" height="180">
            <h1 class="h3 mb-3 fw-normal">Sign in</h1>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Email">
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password"
                    placeholder="Password">
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
            <a class="w-100 mt-2 btn btn-lg btn-secondary" href="index.php?controller=login&action=register">Sign up</a>
        </form>
        <?php
        
        if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $login = User::login($email, $password);
            if($login) {
                header( "refresh:1;url=index.php?controller=language&action=showLanguages");
            } else {
                echo "<div class='alert alert-danger mt-2' role='alert'> Email or password was wrong! </div>";
            }
        }
        ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
    </main>
</body>

</html>