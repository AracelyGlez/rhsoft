<?php

include APPROOT . '/views/includes/encabezado.inc.php';
?>
<!-- seccion cuerpo -->

    <div class="card p-4 shadow" style="width: 300px;">
        <h3 class="text-center mb-3">Registrarse</h3>
        <form action="<?= URLROOT; ?>/usuarios/registrar" method="post">
            <!-- Usuario -->
        <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Ingrese su nombre" required>
            </div>
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
            <div>
            <label for="conf_password" class="form-label">Confirmar Contraseña</label>
            <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Confirma tu contraseña" required>
            </div>
            
            <!-- Botón de ingresar -->
            <button type="submit" class="btn btn-primary w-100">Registrarse</button>
        </form>
    </div>

</body>
</html>