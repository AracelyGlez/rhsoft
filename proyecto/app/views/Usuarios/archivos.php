<?php
include APPROOT .'/views/includes/encabezado.inc.php';
?>
<?php if (estaLogueado()) {

?>
<a href="<?= URLROOT; ?>/usuarios/tablaNomina" style="
    display: inline-block;
    background-color: #0064a2; 
    color: white;
    padding: 250px 130px;
    text-decoration: none;
    font-size: 30px;
    border-radius: 10px;
    text-align: center;
">Nóminas</a>

<a href="<?= URLROOT; ?>/usuarios/tablaVacacion" style="
    display: inline-block;
    background-color: #0064a2; 
    color: white;
    padding: 250px 130px;
    text-decoration: none;
    font-size: 30px;
    border-radius: 10px;
    text-align: center;
">Vacaciones</a>

<a href="<?= URLROOT; ?>/usuarios/tablaIncapacidad" style="
    display: inline-block;
    background-color: #0064a2; 
    color: white;
    padding: 250px 130px;
    text-decoration: none;
    font-size:30px;
    border-radius: 10px;
    text-align: center;
">Incapacidades</a>
<?php }
else { ?>
<h1>Inicia sesión primero</h1>
<?php }
?>