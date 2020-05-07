<?php 

if (isset($_POST)) {

    // Agregar Nuevo Cliente
    if (isset($_POST['guardar'])) {

        $nombre = $_POST['nombre'];
    
        require_once('../config/db.php');
        $sql = "INSERT INTO clientes (nombre) VALUES ('$nombre')";
        $guardar = $conn->query($sql);

        if ($guardar) {
            $msg = "success";
        } else {
            $msg = "error";
        }

        $conn->close();
        header("Location: ../index.php");

    }

    if (isset($_POST['update'])) {

        $nombre = $_POST['nombre'];
        $id = $_POST['cliente_id'];
    
        require_once('../config/db.php');
        $sql = "UPDATE clientes SET nombre = '$nombre' WHERE id = $id";
        $guardar = $conn->query($sql);

        $conn->close();
        header("Location: ../index.php");

    }

    if (isset($_POST['borrar'])) {
        
        $id = $_POST['cliente_id'];
        
        require_once('../config/db.php');
        $sql = "DELETE FROM clientes WHERE id = $id";
        $borrar = $conn->query($sql);

        $conn->close();
        header("Location: ../index.php");
    }
    

} else {
    header("Location: ../index.php");
}