<?php
include APPROOT .'/views/includes/encabezado.inc.php';
?>
<div class="container mt-3 ">
        
        <div class="container bg-blue container mt-2 " >
            <div class="row">
                <div class="col-4 " ></div>
                <div class="col-4 ">
                    <div class="p-2 mb-2 text-center">
                        <h2 class="" >Login</h2>
                    </div>
                    <div class="contenedor">
                        <img
                        src="assets/images/login.png"
                        id="login"
                        alt="Login"
                        style="width: 200px; height: auto;"
                        />
                    </div>

                    <!-- inicio form -->
                    <form action="<?= URLROOT; ?>/usuarios/login" method="post" id="acceso_usuario" class="needs-validation" novalidate>
                        <div class="row mb-1" text="center">
                            <div class="col">
                                <label for="nombre_usuario" class="form-label">Usuario</label>
                                <input type="text" class="form-control" name="acceso_usuario" id="acceso_usuario"
                                    placeholder="Usuario" required>
                            </div>
                        </div>
                        <div class="row mb-1" text="center">
                            <div class="col">
                                <label for="password_usuario" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password_usuario" id="password_usuario"
                                    placeholder="Password" required>
                            </div>
                        </div>
                        <div style="height: 20px;"></div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                </div>
            </div>
            </form>
    <?php
include APPROOT .'/views/includes/pie.inc.php';
?>
    
