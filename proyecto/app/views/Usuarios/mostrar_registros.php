<?php
// Conexión a la base de datos
require_once 'config.inc.php';

// Establece la conexión con la base de datos
$conexion = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener los registros de la tabla 'vacaciones'
$sql = "SELECT * FROM vacaciones";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Vacaciones</title>
</head>
<body>
    <h1>Registros de Vacaciones</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>RFC</th>
                <th>Departamento</th>
                <th>Días</th>
                <th>Fecha de Salida</th>
                <th>Fecha de Entrada</th>
                <th>Pago</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Verifica si hay registros
            if ($resultado->num_rows > 0) {
                // Recorre los registros y los muestra en la tabla
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($fila['nombre_vacaciones']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['rfc_vacaciones']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['departamento_vacaciones']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['dias_vacaciones']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['salidad_vacaciones']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['entrada_vacaciones']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['pago_vacaciones']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No hay registros.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Enlace para regresar al formulario -->
    <a href="vacaciones.php">Registrar otra vacación</a>
</body>
</html>

<?php
// Cierra la conexión
$conexion->close();
?>
