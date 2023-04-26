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
            <h1 class="h3 mb-3 fw-normal">Sign up</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username">
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Email">
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password"
                    placeholder="Password">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
        </form>
        <?php
        
        if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $username = $_POST['username'];
            
            if($email != '' && $username != '' && $password != '') {
                if(!user::getUserByEmail($email)) {
                    if(util::passwordValidation($password)) {
                        user::addUser($username, $email, $password);
                        // mail(
                        //     $email,
                        //     'Codein Account - noreply',
                        //     'Thanks for trust in our company',
                        // );
                        header( "refresh:1;url=index.php" );
    
                    } else {
                        echo "<div class='mt-2 alert alert-danger' role='alert'> 
                                Invalid password! 
                                <ul class='nav flex-column'>
                                    <li class='nav-item'>
                                        -A lowercase character is required
                                    </li>
                                    <li class='nav-item'>
                                        -An uppercase character is required
                                    </li>
                                    <li class='nav-item'>
                                        -A symbol is required ($%&!#) 
                                    </li>
                                </ul>
                             </div>";
                    }
                } else {
                    echo "<div class='mt-2 alert alert-danger' role='alert'> This email has been used! </div>";
                }
            } else {
                echo "<div class='mt-2 alert alert-danger' role='alert'> The fields can't be empty! </div>";
            }
            
        }

        ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
    </main>
</body>

</html>