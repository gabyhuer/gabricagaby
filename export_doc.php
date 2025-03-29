<?php
require 'vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

// Crear documento
$phpWord = new PhpWord();
$section = $phpWord->addSection();

// Título
$section->addTitle("📑 Documentación Técnica - Proyecto Navidad Gabrica", 1);
$section->addText("Generado el: " . date("Y-m-d H:i:s"));
$section->addTextBreak(1);

// Sección 1: Introducción
$section->addTitle("1. Introducción", 2);
$section->addText("Este documento describe la estructura, funcionalidad y detalles técnicos del proyecto 'Navidad Gabrica'.");

// Sección 2: Tecnologías Utilizadas
$section->addTitle("2. Tecnologías Utilizadas", 2);
$section->addText("✅ Lenguaje: PHP");
$section->addText("✅ Base de Datos: MySQL");
$section->addText("✅ Frameworks: PHPWord, PhpSpreadsheet");
$section->addText("✅ Frontend: HTML, CSS, JavaScript");
$section->addText("✅ Librerías Adicionales: PHPWord, PhpSpreadsheet");

// Sección 3: Base de Datos
$section->addTitle("3. Estructura de la Base de Datos", 2);
$section->addText("Tabla: inscripciones");
$section->addText("- id (INT, PRIMARY KEY, AUTO_INCREMENT)");
$section->addText("- nombre_cliente (VARCHAR)");
$section->addText("- nit (VARCHAR)");
$section->addText("- nombre_punto (VARCHAR)");
$section->addText("- ciudad (VARCHAR)");
$section->addText("- promotor (VARCHAR)");
$section->addText("- rtc (VARCHAR)");
$section->addText("- capitan_usuario (VARCHAR)");
$section->addText("- acepta_datos (BOOLEAN)");
$section->addText("- fecha (DATE)");
$section->addText("- hora (TIME)");
$section->addText("- ip (VARCHAR)");

// Sección 4: Código PHP - Exportación Excel
$section->addTitle("4. Código PHP - Exportación a Excel", 2);
$section->addText("Este código genera un archivo Excel con los datos de la base de datos.", ['bold' => true]);

$codeExcel = <<<'CODE'
<?php
require 'vendor/autoload.php';
include "conexion.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

$sql = "SELECT * FROM inscripciones WHERE fecha BETWEEN ? AND ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $fecha_inicio, $fecha_fin);
$stmt->execute();
$result = $stmt->get_result();

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Nombre Cliente');
$sheet->setCellValue('B1', 'NIT');
$sheet->getStyle('B')->getNumberFormat()->setFormatCode('@'); // Evita notación científica
$sheet->setCellValue('C1', 'Nombre Punto');
$sheet->setCellValue('D1', 'Ciudad');
$sheet->setCellValue('E1', 'Fecha');

$row = 2;
while ($lead = $result->fetch_assoc()) {
    $sheet->setCellValue("A$row", $lead['nombre_cliente']);
    $sheet->setCellValue("B$row", $lead['nit']);
    $sheet->setCellValue("C$row", $lead['nombre_punto']);
    $sheet->setCellValue("D$row", $lead['ciudad']);
    $sheet->setCellValue("E$row", $lead['fecha']);
    $row++;
}

$file_name = "Leads_" . date("YmdHis") . ".xlsx";

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=\"$file_name\"");
header("Cache-Control: max-age=0");

$writer = new Xlsx($spreadsheet);
$writer->save("php://output");
exit();
?>
CODE;

$section->addText($codeExcel, ['name' => 'Courier New', 'size' => 10]);

// Sección 5: Código PHP - Conexión a la Base de Datos
$section->addTitle("5. Código PHP - Conexión a la Base de Datos", 2);
$codeDB = <<<'CODE'
<?php
date_default_timezone_set("America/Bogota");

$server = "localhost";
$user = "root";
$pass = "";
$db = "gabrica";

$conexion = new mysqli($server, $user, $pass, $db);

if ($conexion->connect_error) {
    die(json_encode(["status" => "error", "message" => "Error de conexión: " . $conexion->connect_error]));
}
?>
CODE;

$section->addText($codeDB, ['name' => 'Courier New', 'size' => 10]);

// Sección 6: Código HTML - Formulario
$section->addTitle("6. Código HTML - Formulario", 2);
$codeHTML = <<<'CODE'
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navidad Gabrica</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form id="inscripcionForm">
        <input type="text" name="nombre_cliente" placeholder="Nombre del cliente" required>
        <input type="text" name="nit" placeholder="NIT" required>
        <input type="text" name="nombre_punto" placeholder="Nombre del punto">
        <select name="ciudad" required>
            <option value="">Seleccione una Ciudad</option>
            <option value="Cali">Cali</option>
            <option value="Medellín">Medellín</option>
            <option value="Bogotá">Bogotá</option>
        </select>
        <input type="text" name="rtc" placeholder="RTC" required>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
CODE;

$section->addText($codeHTML, ['name' => 'Courier New', 'size' => 10]);

// Guardar el archivo
$file = "Documentacion_Proyecto.docx";
$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save($file);

// Descargar el archivo
header("Content-Description: File Transfer");
header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
header("Content-Disposition: attachment; filename=$file");
header("Cache-Control: must-revalidate");
header("Content-Length: " . filesize($file));
readfile($file);
exit();
?>