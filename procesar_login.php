<?php
session_start();
require 'conexion.php'; // Asegurar que la conexión se cargue

if (!$conexion) {
    die(json_encode(["status" => "error", "message" => "Error de conexión a la base de datos"]));
}

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Verificar si la conexión sigue activa
if ($conexion->connect_error) {
    die(json_encode(["status" => "error", "message" => "Conexión fallida: " . $conexion->connect_error]));
}

$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conexion->prepare($sql);

if ($stmt === false) {
    die(json_encode(["status" => "error", "message" => "Error en la consulta: " . $conexion->error]));
}

$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['usuario'] = $usuario;
    echo json_encode(["status" => "success", "message" => "Registro exitoso"]);
    exit;  // 🔹 DETENER LA EJECUCIÓN AQUÍ
} else {
    echo json_encode(["status" => "error", "message" => "Usuario o contraseña incorrectos"]);
    exit;  // 🔹 DETENER LA EJECUCIÓN AQUÍ
}

$stmt->close();
$conexion->close();
?>