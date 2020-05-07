<?php 

if (isset($_POST) && !empty($_POST['cliente_id']) && !empty($_POST['deposito'])) {

    // Recibir ID del Cliente y Depósito
    $cliente_id = $_POST['cliente_id'];
    $deposito = $_POST['deposito'];

    //Abrir DB
    require_once('../config/db.php');

    // Guardar depósito en DB
    $sql = "INSERT INTO depositos (cliente_id, cantidad) VALUES ($cliente_id, $deposito)";
        $guardar = $conn->query($sql);

        //Verificar si se guardó correctamente
        if ($guardar) {
            $msg = "success";
        } else {
            $msg = "error";
        }

        // Cerrar conexión a DB
        $conn->close();

        //Redirigir a Home
        header("Location: ../index.php");
    

} else {
    header("Location: ../index.php");
}