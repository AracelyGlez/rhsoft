<?php
/**
 * llamadas a includes, antes decia llegue
 */
include APPROOT .'/views/includes/encabezado.inc.php';
?>
<!-- seccion cuerpo -->
 <br><br>
 <?php if(estaLogueado()) { ?>
<h1 class="my-3">Bienvenido/a: <?= $_SESSION['nombre_usuario']; ?></h1>
<small style="float:right"><a href="usuarios/logout">Cerrar la sesión</a></small>
<?php } else { ?>
<h1>Sistema de nóminas</h1>
<img
          src="https://www.observatoriorh.com/wp-content/uploads/2018/07/gestion-de-nominas.jpg"
          id="imgprin"
          alt="nominas"
          width="400"
          style="margin-right: 20px"
        />
<h3>Inicia sesión, por favor</h3>
<?php } ?>

<!-- fin de seccion cuerpo -->
<?php include APPROOT .'/views/includes/pie.inc.php'; ?>
