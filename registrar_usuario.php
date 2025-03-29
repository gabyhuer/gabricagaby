<?php
require 'conexion.php';

$usuario = "admin";  // Usuario de ejemplo
$password = "123456"; // Contraseña de ejemplo

// Verificar si el usuario ya existe
$sql_check = "SELECT id FROM usuarios WHERE usuario = ?";
$stmt_check = $conexion->prepare($sql_check);
$stmt_check->bind_param("s", $usuario);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "El usuario ya existe"]);
    exit;
}

$stmt_check->close();

// Hashear la contraseña antes de insertarla
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insertar nuevo usuario
$sql = "INSERT INTO usuarios (usuario, password) VALUES (?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $usuario, $hashedPassword);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Usuario registrado con éxito"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al registrar usuario: " . $stmt->error]);
}

$stmt->close();
$conexion->close();
?>