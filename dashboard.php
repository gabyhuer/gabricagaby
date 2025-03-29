<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navidad Gabrica</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="left-section">
            <h1><span class="highlight"></span><br></h1>
            <p class="subtext"><span class="navideño"></span></p>
        </div>
        <div class="right-section">
            <div class="form-container">
                <h2>Filtrar Leads</h2>
                <form action="exportar.php" method="POST">
                    <label>Desde:</label>
                    <input type="date" name="fecha_inicio" required>
                    <label>Hasta:</label>
                    <input type="date" name="fecha_fin" required>
                    <button type="submit" class="login-button">Exportar a Excel</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
