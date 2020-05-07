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
    
    $sql = "SELECT series.id AS id, clientes.nombre AS cliente, series.created_at FROM series INNER JOIN clientes ON cliente_id = clientes.id ORDER BY series.created_at DESC";
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

function todos_los_depositos() {
    require('config/db.php');
    
    $sql = "SELECT cantidad, depositos.created_at, clientes.nombre FROM depositos INNER JOIN clientes ON cliente_id = clientes.id ORDER BY created_at DESC";
    $result = $conn->query($sql);
    
    $conn->close();
    
    return $result;
}

function cliente_de_la_serie() {
    require('config/db.php');
    
    $sql = "SELECT clientes.nombre AS nombre FROM series INNER JOIN clientes on nombre";
    $result = $conn->query($sql);
    
    $conn->close();
    
    return $result;
}

function cartones_de_la_serie($serie_id) {
    require('config/db.php');
    
    $sql = "SELECT fecha_juego FROM cartones WHERE serie_id = $serie_id GROUP BY fecha_juego";
    $result = $conn->query($sql);
    
    $conn->close();
    
    return $result;
}