<?php

include APPROOT . '/views/includes/encabezado.inc.php';
?>
<!-- seccion cuerpo -->
<div class="container mt-3 ">
  <h3><?= ucfirst((isset($data['button']) && $data['button'] == 'Guardar') ? 'agregar ' : 'editar '); ?> Usuario</h3>
  <div class="row bg-gray rounded-2 py-2 ">

    <div class="alert alert-warning 
          <?= (isset($data['msg_error']) && !empty($data['msg_error'])) ? 'd-block' : 'd-none'; ?>">
      <?= (isset($data['msg_error']) && !empty($data['msg_error'])) ? $data['msg_error'] : ''; ?>
    </div>
    <div class="offset-1 col-10 offset-1">

        <!-- para editar -->
        <?php if (isset($data['id']) && $data['id'] != null) { ?>
          <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <?php } ?>

    <div class="card p-4 shadow" style="width: 300px;">
        <h3 class="text-center mb-3">Login</h3>
        <form action="<?= URLROOT; ?>/usuarios/login" method="post">
            <!-- Correo -->
            <div class="mb-3">
                <label for="correo_usuario" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo_usuario" name="correo_usuario" placeholder="Ingrese su correo" required>
            </div>
            
            <!-- Contraseña -->
            <div class="mb-3">
                <label for="password_usuario" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password_usuario" name="password_usuario" placeholder="Ingrese su contraseña" required>
            </div>
            
            <!-- Botón de ingresar -->
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>
    </div>

</body>
</html>