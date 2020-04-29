<?php 
session_start();
require_once('./config/db.php');
require_once('./vendor/autoload.php');
use Dompdf\Dompdf;

// Obtener id de la serie
$serie_id = $_GET['id'];

// Buscar cartones relacionados con el id de serie. Día actual
$sql = "SELECT * FROM cartones WHERE serie_id = $serie_id AND fecha_juego = CURDATE() ORDER BY id ASC";
$result = $conn->query($sql);
$array_num = 0;

while($carton = $result->fetch_assoc()) {
    
    $numeros = explode(" ", $carton['numeros_original']);
    $arr[$array_num] = [
        'folio'         => $carton['id'],
        'fecha'         => $carton['fecha_juego'],
        'numeros'       => $numeros
    ];

    $array_num++;
    
}

// Buscar cartones relacionados con el id de serie. Siguiente día
$sql = "SELECT * FROM cartones WHERE serie_id = $serie_id AND fecha_juego = (CURDATE() + INTERVAL 1 DAY) ORDER BY id ASC";
$result = $conn->query($sql);
$array_num = 0;

while($carton = $result->fetch_assoc()) {
    
    $numeros = explode(" ", $carton['numeros_original']);
    $arr2[$array_num] = [
        'folio'         => $carton['id'],
        'fecha'         => $carton['fecha_juego'],
        'numeros'       => $numeros
    ];

    $array_num++;
    
}

// instantiate and use the dompdf class
$dompdf = new Dompdf();
ob_start();
require_once('./templates/cartones-template.html');
$html = ob_get_clean();

$dompdf->loadHtml($html);

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('pdf.pdf', array("Attachment" => false));