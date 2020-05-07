<?php session_start();

//Revisar si llegan datos por post
if (isset($_POST) && isset($_POST['username']) && isset($_POST['password'])) {

    //Recibir usuario y contraseña
    $user = $_POST['username'];
    $pass = $_POST['password'];

    //Abrir conexión con DB
    require_once('../config/db.php');

    //Buscar el usuario en DB
    $sql = "SELECT * FROM users WHERE username = '$user' LIMIT 1";
    $result = $conn->query($sql);

    //Si existe, comparar el password existente con el password recibido.
    if ($result->num_rows > 0) {
        $current_user = $result->fetch_assoc();
        
        //Si el password es igual, crear sesión
        if ($current_user['password'] == $pass) {

            $_SESSION['user'] = $current_user;

        } else {

            //Si el password no es igual, redirigir a login
            $_SESSION['fail'] = [
                'type'  => 'password',
                'msg'   => 'El password es incorrecto.'
            ];

        }

        header("Location: ../index.php");

    } else {

        //Si el usuario no se encontró, redirigir a login
        $_SESSION['fail'] = [
            'type'  => 'username',
            'msg'   => 'El usuario es incorrecto.'
        ];

    }

    
    //Redirigir a index
    header("Location: ../index.php");

} else {
    header("Location: ../index.php");
}