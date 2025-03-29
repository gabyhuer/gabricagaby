<?php
date_default_timezone_set("America/Bogota");

$server = "localhost";
$user = "root";
$pass = "";
$db = "gabrica";


// Conectar a la base de datos
$conexion = new mysqli($server, $user, $pass, $db);


// Verificar conexión
//if ($conexion->connect_error) {
   // die("Conexión fallida: " . $conexion->connect_error);
//} else{
   //echo "conectado<br>";
//} 


// Verificar conexión
if ($conexion->connect_error) {
    die(json_encode(["status" => "error", "message" => "Error de conexión: " . $conexion->connect_error]));
}


// Recibir datos del formulario
$nombre_cliente = $_POST['nombre_cliente'] ?? '';
$nit = $_POST['nit'] ?? '';
$nombre_punto = $_POST['nombre_punto'] ?? '';
$nombre_equipo = $_POST['nombre_equipo'] ?? '';
$ciudad = $_POST['ciudad'] ?? '';
$promotor = $_POST['promotor'] ?? '';
$rtc = $_POST['rtc'] ?? '';
$capitan_usuario = $_POST['capitan_usuario'] ?? '';
$acepta_datos = isset($_POST['acepta_datos']) ? '1' : '0';
$fecha = $_POST['fecha'] ?? date("Y-m-d");
$hora = $_POST['hora'] ?? date("H:i:s");
$ip = $_POST['ip'] ?? '';

// Preparar y ejecutar la consulta
$stmt = $conexion->prepare("INSERT INTO inscripciones (nombre_cliente, nit, nombre_punto, nombre_equipo, ciudad, promotor, rtc, capitan_usuario, acepta_datos, fecha, hora, ip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssss", $nombre_cliente, $nit, $nombre_punto, $nombre_equipo, $ciudad, $promotor, $rtc, $capitan_usuario, $acepta_datos, $fecha, $hora, $ip);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Registro exitoso"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al insertar: " . $stmt->error]);
}

// Cerrar conexión
$stmt->close();
//$conexion->close();
?>
