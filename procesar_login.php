<?php
session_start();
require 'conexion.php'; // Asegurar que la conexión se cargue

if (!$conexion) {
    die("Error de conexión a la base de datos");
}

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Verificar si la conexión sigue activa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conexion->prepare($sql);

if ($stmt === false) {
    die("Error en la consulta: " . $conexion->error);
}

$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['usuario'] = $usuario;
    header("Location: dashboard.php"); // 🔹 REDIRECCIÓN AL DASHBOARD
    exit(); 
} else {
    header("Location: login.php?error=1"); // 🔹 REDIRECCIÓN EN CASO DE ERROR
    exit(); 
}

$stmt->close();
$conexion->close();
?>