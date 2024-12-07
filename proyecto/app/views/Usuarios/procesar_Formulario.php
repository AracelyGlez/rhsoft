<?php
// Conexión a la base de datos
require_once 'config.inc.php'; // Incluye tu archivo de configuración para la conexión a la BD

// Verifica si los datos fueron enviados por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura y valida los datos del formulario
    $nombre = $_POST['nombre_vacaciones'];
    $rfc = $_POST['rfc_vacaciones'];
    $departamento = $_POST['departamento_vacaciones'];
    $dias = intval($_POST['dias_vacaciones']);
    $salida = $_POST['salidad_vacaciones'];
    $entrada = $_POST['entrada_vacaciones'];
    $pago = floatval($_POST['pago_vacaciones']);

    // Establece la conexión con la base de datos
    $conexion = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Inserta los datos en la tabla 'vacaciones'
    $sql = "INSERT INTO vacaciones (nombre_vacaciones, rfc_vacaciones, departamento_vacaciones, dias_vacaciones, salidad_vacaciones, entrada_vacaciones, pago_vacaciones) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssissd", $nombre, $rfc, $departamento, $dias, $salida, $entrada, $pago);

    // Ejecuta la consulta y verifica el resultado
    if ($stmt->execute()) {
        // Redirige a la página de registros si la inserción fue exitosa
        header("Location: mostrar_registros.php");
        exit();
    } else {
        echo "Error al insertar los datos: " . $stmt->error;
    }

    // Cierra la conexión
    $stmt->close();
    $conexion->close();
} else {
    // Si se intenta acceder al archivo directamente sin enviar datos, redirige al formulario
    header("Location: vacaciones.php");
    exit();
}
?>
