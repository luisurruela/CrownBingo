<?php session_start();

//Revisar si existe una variable POST
if (isset($_POST) && isset($_POST['guardar_numero'])) {

    // Abrir sesión de base de datos
    require_once('../config/db.php');
    
    //Si existe, iniciar función
    //Recibir variables
    $num = $_POST['numero'];

    //Hacer array y agregar el nuevo número
    $sql = "SELECT id, numeros FROM partidas WHERE fecha_juego = CURDATE()";
    $result = $conn->query($sql);
    $arr = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        
        // Si el arreglo tiene números
        //Convertimos en array el string números
        $array = explode(" ", $arr['numeros']);
        
        //Agregamos el nuevo número al array
        array_push($array, $num);
        
        //Convertir array a string
        $numeros = implode(" ", $array);

        //Actualizar la lista de números de la partida
        $sql = "UPDATE partidas SET numeros = '$numeros' WHERE id = " . $arr['id'] . "";
        $result = $conn->query($sql);

        // Descontar número de cartones y revisar si ya hay ganador
        // Buscar cartones en juego, y hacer array.
        $sql = "SELECT id, numeros FROM cartones where fecha_juego = CURDATE()";
        $query = $conn->query($sql);
        
        while($carton = $query->fetch_assoc()) {
            
            $arr_nums = explode(" ", $carton['numeros']);
            $busqueda = array_search($num, $arr_nums);
            
            if(is_int($busqueda) && $busqueda >= 0) {
                
                unset($arr_nums[$busqueda]);
                $numeros = implode(" ", $arr_nums);
                $sql = "UPDATE cartones SET numeros = '$numeros' WHERE id =" . $carton['id'] . "";
                $actualizar = $conn->query($sql);

            }

            //Verificar si hay ganador
            $sql = "SELECT id, numeros FROM cartones WHERE fecha_juego = CURDATE() AND numeros = ''";
            $verificar = $conn->query($sql);
            $carton_ganador = $verificar->fetch_assoc();

            if($verificar->num_rows > 0) {
                $status = "win";
                $msg = "<h3>Tenemos un ganador! Cartón número: " . $carton_ganador['id'] . "</h3>";
            } else {
                $status = "success";
                $msg = "<strong>" . $num . "</strong> cantado!";
            }
        } 

    } else {
        // Si está vacío
        // Inicializar array nuevo
        $array = [$num];
        
        //Convertir array a string
        $numeros = implode(" ", $array);

        //Crear un registro en la tabla PARTIDAS
        $sql = "INSERT INTO partidas (numeros, fecha_juego) VALUES ('$numeros', CURDATE())";
        $result = $conn->query($sql);

        // Descontar número de cartones y revisar si ya hay ganador
        // Buscar cartones en juego, y hacer array.
        $sql = "SELECT id, numeros FROM cartones where fecha_juego = CURDATE()";
        $query = $conn->query($sql);

        while($carton = $query->fetch_assoc()) {
            $arr_nums = explode(" ", $carton['numeros']);
            $busqueda = array_search($num, $arr_nums);
            
            if(is_int($busqueda) && $busqueda >= 0) {
                unset($arr_nums[$busqueda]);
                
                $numeros = implode(" ", $arr_nums);
                $sql = "UPDATE cartones SET numeros = '$numeros' WHERE id =" . $carton['id'] . "";
                $actualizar = $conn->query($sql);

            }
        }

        $status = "success";
        $msg = "<strong>" . $num . "</strong> cantado!";

    }

    //Crear variable de sesión Confirmación
    $_SESSION['confirmation'] = [
        'status'        => $status,
        'msg'           => $msg
    ];

    //Redireccionar
    header("Location: ../bingo.php");

} else {
    
    //Si no existe variable POST, redireccionar
    header("Location: ../index.php");
}

