<?php
/**
 * llamadas a includes, antes decia llegue
 */
include APPROOT .'/views/includes/encabezado.inc.php';
?>
<!-- seccion cuerpo -->
 <br><br>
 <?php if(estaLogueado()) { ?>
<h1 class="my-3">Bienvenido: <?= $_SESSION['nombre_usuario']; ?></h1>
<small style="float:right"><a href="usuarios/logout">Cerrar la sesión</a></small>
<?php } else { ?>
<h1>Sistema de ...</h1>
<?php } ?>
<!-- fin de seccion cuerpo -->
<?php include APPROOT .'/views/includes/pie.inc.php'; ?>
