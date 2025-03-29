<?php
// Iniciar la sesión para manejar la autenticación del usuario
session_start();
require 'conexion.php'; // Asegurar que la conexión a la base de datos se cargue correctamente

// Verificar si la conexión a la base de datos está establecida
if (!$conexion) {
    die("Error de conexión a la base de datos");
}

// Obtener las credenciales enviadas desde el formulario
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Verificar si la conexión sigue activa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Preparar la consulta SQL para obtener los datos del usuario
$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conexion->prepare($sql);

// Verificar si la consulta se preparó correctamente
if ($stmt === false) {
    die("Error en la consulta: " . $conexion->error);
}

// Asociar parámetros y ejecutar la consulta
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Verificar si el usuario existe y la contraseña es correcta
if ($user && password_verify($password, $user['password'])) {
    $_SESSION['usuario'] = $usuario;
    header("Location: dashboard.php"); // Redirigir al panel de control
    exit(); 
} else {
    header("Location: login.php?error=1"); // Redirigir a login con un mensaje de error
    exit(); 
}

// Cerrar la consulta y la conexión a la base de datos
$stmt->close();
$conexion->close();
?>