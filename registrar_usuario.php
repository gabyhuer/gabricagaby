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

// Código para registrar un nuevo usuario
$usuarioNuevo = "admin";  // Usuario de ejemplo
$passwordNuevo = "123456"; // Contraseña de ejemplo

// Verificar si el usuario ya existe
$sql_check = "SELECT id FROM usuarios WHERE usuario = ?";
$stmt_check = $conexion->prepare($sql_check);
$stmt_check->bind_param("s", $usuarioNuevo);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "El usuario ya existe"]);
    exit;
}

$stmt_check->close();

// Hashear la contraseña antes de insertarla
$hashedPassword = password_hash($passwordNuevo, PASSWORD_DEFAULT);

// Insertar nuevo usuario
$sql_insert = "INSERT INTO usuarios (usuario, password) VALUES (?, ?)";
$stmt_insert = $conexion->prepare($sql_insert);
$stmt_insert->bind_param("ss", $usuarioNuevo, $hashedPassword);

if ($stmt_insert->execute()) {
    echo json_encode(["status" => "success", "message" => "Usuario registrado con éxito"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al registrar usuario: " . $stmt_insert->error]);
}

$stmt_insert->close();
$conexion->close();
?>