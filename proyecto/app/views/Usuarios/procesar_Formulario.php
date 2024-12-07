<?php
// Configuración de la base de datos
require_once 'config.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre_usuario'] ?? '';
    $rfc = $_POST['rfc_usuario'] ?? '';
    $departamento = $_POST['departamento'] ?? '';
    $dias_disponibles = $_POST['dias_disponibles'] ?? 0;
    $fecha_salida = $_POST['fecha_salida'] ?? '';
    $fecha_entrada = $_POST['fecha_entrada'] ?? '';
    $pago_por_dia = $_POST['pago_por_dia'] ?? 0.0;

    // Validaciones básicas (puedes agregar más según sea necesario)
    if (
        empty($nombre) || empty($rfc) || empty($departamento) || 
        empty($dias_disponibles) || empty($fecha_salida) || 
        empty($fecha_entrada) || empty($pago_por_dia)
    ) {
        die("Por favor completa todos los campos del formulario.");
    }

    // Insertar los datos en la base de datos
    try {
        $pdo = new PDO(DBMOTOR . ":host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO vacaciones (nombre_vacaciones, rfc_vacaciones, departamento_vacaciones, 
                dias_vacaciones, salidad_vacaciones, entrada_vacaciones, pago_vacaciones) 
                VALUES (:nombre, :rfc, :departamento, :dias_disponibles, :fecha_salida, :fecha_entrada, :pago_por_dia)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nombre' => $nombre,
            ':rfc' => $rfc,
            ':departamento' => $departamento,
            ':dias_disponibles' => $dias_disponibles,
            ':fecha_salida' => $fecha_salida,
            ':fecha_entrada' => $fecha_entrada,
            ':pago_por_dia' => $pago_por_dia,
        ]);

        // Redirigir a mostrar_registros.php después de procesar los datos
        header("Location: mostrar_registros.php");
        exit;

    } catch (PDOException $e) {
        die("Error al insertar los datos: " . $e->getMessage());
    }
}
// Redirigir a mostrar_registros.php después de procesar los datos
header("Location: mostrar_registros.php");
exit;
