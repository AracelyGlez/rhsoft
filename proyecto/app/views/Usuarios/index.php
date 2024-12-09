<?php

include APPROOT . '/views/includes/encabezado.inc.php';
?>
<!-- seccion cuerpo -->
<?php if (estaLogueado()) {

?>
<h1>TIENES PERMISOS</h1>

<?php }
else { ?>
<h1>No tiene permisos</h1>
<?php }
?>


<!-- fin de seccion cuerpo -->
<?php include APPROOT . '/views/includes/pie.inc.php'; ?>