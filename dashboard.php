<?php
// Iniciar la sesión para mantener la autenticación del usuario
session_start();

// Verificar si el usuario ha iniciado sesión, si no, redirigirlo a la página de inicio de sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redireccionar a la página de login si no hay sesión activa
    exit(); // Terminar la ejecución del script
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navidad Gabrica</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlace a la hoja de estilos externa -->
</head>
<body>
    <div class="container">
        <!-- Sección izquierda con título y subtítulo -->
        <div class="left-section">
            <h1><span class="highlight"></span><br></h1>
            <p class="subtext"><span class="navideño"></span></p>
        </div>
        
        <!-- Sección derecha con el formulario de filtrado de leads -->
        <div class="right-section">
            <div class="form-container">
                <h2>Filtrar Leads</h2>
                <!-- Formulario para filtrar leads según un rango de fechas -->
                <form action="exportar.php" method="POST">
                    <label>Desde:</label>
                    <input type="date" name="fecha_inicio" required> <!-- Campo para la fecha de inicio -->
                    <label>Hasta:</label>
                    <input type="date" name="fecha_fin" required> <!-- Campo para la fecha de fin -->
                    <button type="submit" class="login-button">Exportar a Excel</button> <!-- Botón para exportar datos -->
                </form>
            </div>
        </div>
    </div>
</body>
</html>
