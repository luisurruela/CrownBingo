<?php 

// Obtener Clientes
function todos_los_clientes() {
    require('config/db.php');
    
    $sql = "SELECT * FROM clientes";
    $result = $conn->query($sql);
    $conn->close();

    return $result;
}

// Obtener Clientes
function todas_las_series() {
    require('config/db.php');
    
    $sql = "SELECT * FROM series";
    $result = $conn->query($sql);
    $conn->close();
    
    return $result;
}

function todos_los_cartones_del_dia() {
    require('config/db.php');
    
    $sql = "SELECT * FROM cartones WHERE fecha_juego = CURDATE() ORDER BY id ASC";
    $result = $conn->query($sql);
    $conn->close();
    
    return $result;
}

function todos_los_numeros_del_bingo_del_dia() {
    require('config/db.php');
    
    $sql = "SELECT numeros FROM partidas WHERE fecha_juego = CURDATE()";
    $result = $conn->query($sql);
    $numeros = $result->fetch_assoc();
    
    $conn->close();
    
    return explode(" ", $numeros['numeros']);
}