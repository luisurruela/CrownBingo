<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/b458c15bac.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="assets/css/lu-styles.css">
<title>Crown City Bingo</title>
</head>
<body>
<header class="pl-lg-5 pr-lg-5 shadow-sm">
<nav class="navbar navbar-expand-lg navbar-light pl-lg-5 pr-lg-5">
    <a class="navbar-brand" href="index.php">Crown City  Bingo</a>
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" href="#" data-target="#nuevo_cliente">Nuevo Cliente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bingo.php">Iniciar Bingo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="series.php">Series</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?=$_SESSION['user']['name']?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!--<a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>-->
                <div class="dropdown-divider"></div>
                <form action="inc/logout.php" method="post">
                    <button type="submit" class="dropdown-item" name="logout" value="1">Cerrar sesión</button>  
                </form>
            </div>
        </li>
        </ul>
    </div>
</nav>
</header>
<div>