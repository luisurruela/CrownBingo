<?php 
session_start();

// Validar si recibimos variables por POST.
if (isset($_POST) && isset($_POST['crear'])) {
    
    // Abrir sesión de base de datos
    require_once('../config/db.php');

    // Crear nuevo registro en la tabla Series para generar un ID de la Serie.
    $sql = "INSERT INTO series (cliente_id) VALUES (null)";
    $guardar = $conn->query($sql);
    $serie_id = $conn->insert_id;

    // Crear 6 cartones asignando el ID de la serie en ellos. Para el juego del día actual    
    for($i=0; $i<=5; $i++) {

        // Crear array para cada registro con 15 números.
        $array = [];
        for($a=0; $a<=14; $a++) {

            $nuevo_numero = rand(1, 99);
            
            //Validar si el número elegido, ya existe en el array
            $validate = array_search($nuevo_numero, $array);
            
            if ($validate) {
                if(count($array) > 0) {
                    if ($validate < 0) {
                    // Agregar el número al array
                    array_push($array, $nuevo_numero);
                    } else {
                        $a--;
                    }
                }
            } else {
                array_push($array, $nuevo_numero);
            }
            
        }

        $numeros = implode(" ", $array);

        $sql = "INSERT INTO cartones (serie_id, numeros, numeros_original, fecha_juego) VALUES ($serie_id, '$numeros', '$numeros', CURDATE())";
        $guardar = $conn->query($sql);

    }

    // Crear 6 cartones para el día siguiente
    for($i=0; $i<=5; $i++) {

        // Crear array para cada registro con 15 números.
        $array = [];
        for($a=0; $a<=14; $a++) {

            $nuevo_numero = rand(1, 99);
            
            //Validar si el número elegido, ya existe en el array
            $validate = array_search($nuevo_numero, $array);
            
            if ($validate) {
                if(count($array) > 0) {
                    if ($validate < 0) {
                    // Agregar el número al array
                    array_push($array, $nuevo_numero);
                    } else {
                        $a--;
                    }
                }
            } else {
                array_push($array, $nuevo_numero);
            }
            
        }

        $numeros = implode(" ", $array);

        $sql = "INSERT INTO cartones (serie_id, numeros, numeros_original, fecha_juego) VALUES ($serie_id, '$numeros', '$numeros', CURDATE() + INTERVAL 1 DAY)";
        $guardar = $conn->query($sql);

    }
    
    // Generar variable de sesión confirmando la creación.
    $_SESSION['confirmation'] = [
        'status'        => 'success',
        'msg'           => 'La serie se ha creado correctamente'
    ];

    // Redirigir a home.
    header("Location: ../index.php");

} else {
    // Si no hay variables POST, redirigir a index.
    header("Location: ../index.php");
}   