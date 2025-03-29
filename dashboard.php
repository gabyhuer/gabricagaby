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
    <title>Panel de Leads</title>
</head>
<body>
    <h2>Filtrar Leads</h2>
    <form action="exportar.php" method="POST">
        <label>Desde:</label>
        <input type="date" name="fecha_inicio" required>
        <label>Hasta:</label>
        <input type="date" name="fecha_fin" required>
        <button type="submit">Exportar a Excel</button>
    </form>
</body>
</html>