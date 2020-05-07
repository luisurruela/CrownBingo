<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Inicia sesión | Crown Bingo</title>
</head>
<body class="bg-light mt-5 pt-5">
<div class="col-10 col-md-6 col-lg-5 col-xl-3 m-auto">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="inc/login.php" method="post">
                <div class="form-group">
                    <label for="username" class="text-secondary small">Usuario</label>
                    <input id="username" class="form-control" type="text" name="username">
                    <?php if(isset($_SESSION['fail']) && $_SESSION['fail']['type'] == 'username'): ?>
                    <span class="text-danger small ml-1"><?=$_SESSION['fail']['msg']?></span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="password" class="text-secondary small">Contraseña</label>
                    <input id="password" class="form-control" type="password" name="password">
                    <?php if(isset($_SESSION['fail']) && $_SESSION['fail']['type'] == 'password'): ?>
                    <span class="text-danger small ml-1"><?=$_SESSION['fail']['msg']?></span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>