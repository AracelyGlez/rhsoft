<?php 
/**
 * config.inc.php
 */
# constantes para conexion a base de datos
define('DBMOTOR', 'mysql');
define('DBHOST','localhost');
define('DBNAME', 'rh');
define('DBUSER','root');
define('DBPWD','');
# ambiente publico (url)
define('URLROOT', 'http://rhsoft');
// echo URLROOT;
// echo '<br>';
# ambiente privado (rutas relativas)
define('APPROOT', dirname(dirname(__FILE__)));
// echo APPROOT;



# cargar librerias 
spl_autoload_register(function($nombreClase){
    include_once APPROOT . '/libraries/' . $nombreClase . '.php';
});

// include_once APPROOT . '/libraries/Ruta.php';
// include_once APPROOT . '/libraries/Controller.php';

# cargar FPDF
 include APPROOT . '/vendors/fpdf/fpdf.php';

// # cargar DOMPDF
 include APPROOT . '/vendors/dompdf/autoload.inc.php';

// # cargar helpers de inicio cargar $session
include APPROOT . '/helpers/helpers.php';

// include APPROOT . '/vendors/nusoap-master/src/nusoap.php';
