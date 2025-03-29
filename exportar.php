<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

require 'vendor/autoload.php';
include "conexion.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Verificar si las fechas están definidas y no están vacías
if (empty($_POST['fecha_inicio']) || empty($_POST['fecha_fin'])) {
    die("Error: Debes proporcionar ambas fechas.");
}

$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

// Preparar la consulta con parámetros
$sql = "SELECT nombre_cliente, nit, nombre_punto, ciudad, fecha FROM inscripciones WHERE fecha BETWEEN ? AND ?";
$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}

$stmt->bind_param("ss", $fecha_inicio, $fecha_fin);
$stmt->execute();
$result = $stmt->get_result();

// Crear archivo de Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Encabezados
$sheet->setCellValue('A1', 'Nombre Cliente');
$sheet->setCellValue('B1', 'NIT');
$sheet->setCellValue('C1', 'Nombre Punto');
$sheet->setCellValue('D1', 'Ciudad');
$sheet->setCellValue('E1', 'Fecha');

// Aplicar formato de texto a la columna NIT
$sheet->getStyle('B')->getNumberFormat()->setFormatCode('@');

// Llenar el archivo con los datos
$row = 2;
while ($lead = $result->fetch_assoc()) {
    $sheet->setCellValue("A$row", $lead['nombre_cliente']);
    $sheet->setCellValue("B$row", $lead['nit']);
    $sheet->setCellValue("C$row", $lead['nombre_punto']);
    $sheet->setCellValue("D$row", $lead['ciudad']);
    $sheet->setCellValue("E$row", $lead['fecha']);
    $row++;
}

// Cerrar la conexión
$stmt->close();
$conexion->close();

// Nombre del archivo
$file_name = "Leads_" . date("YmdHis") . ".xlsx";

// Limpiar buffer antes de la descarga
if (ob_get_length()) {
    ob_end_clean();
}

// Configurar encabezados para la descarga del archivo
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=\"$file_name\"");
header("Cache-Control: max-age=0");

// Guardar el archivo en la salida estándar (descarga)
$writer = new Xlsx($spreadsheet);
$writer->save("php://output");

exit();
?>