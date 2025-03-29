<?php
// Iniciar la sesión para manejar la autenticación del usuario
session_start();

// Verificar si el usuario ya ha iniciado sesión, en cuyo caso se redirige al dashboard
if (isset($_SESSION['usuario'])) {
    header("Location: dashboard.php"); // Redirigir al panel de control
    exit(); // Finalizar el script
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlace a la hoja de estilos externa -->
</head>
<body>
    <div class="container">
        <div class="right-section">
            <h2>Iniciar Sesión</h2>
            <!-- Formulario para iniciar sesión -->
            <form action="procesar_login.php" method="POST">
                <input type="text" name="usuario" placeholder="Usuario" required> <!-- Campo para el usuario -->
                <input type="password" name="password" placeholder="Contraseña" required> <!-- Campo para la contraseña -->
                <button type="submit" class="login-button">Ingresar</button> <!-- Botón para enviar el formulario -->
            </form>
        </div>
    </div>
</body>
</html>
