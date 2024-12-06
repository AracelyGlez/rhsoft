<?php

/**
 * llamadas a includes, antes decia llegue
 */
include APPROOT . '/views/includes/encabezado.inc.php';
?>
<!-- seccion cuerpo -->
<div class="container mt-3 ">
      <div class="row bg-gray rounded-2 py-2 ">
        <div class="alert alert-warning 
          <?= (isset($data['msg_error']) && !empty($data['msg_error']))?'d-block':'d-none'; ?>">
          <?= (isset($data['msg_error']) && !empty($data['msg_error']))?$data['msg_error']:''; ?>
        </div>
        <div class="offset-1 col-10 offset-1">
          <form action="#" method="post" id="datos_usuario"     enctype="multipart/form-data" class="needs-validation" novalidate>
            <!-- <input type="hidden" name="id" > -->
            <div class="row">
              <div class="col-4">
                <div class="mb-3" id="grupo-rfc_usuario">
                  <label for="rfc_usuario" class="form-label">R.F.C</label>
                  <input type="text" class="form-control" name="rfc_usuario" id="rfc_usuario" aria-describedby="helpId"
                    placeholder="R.F.C." />
                  <div class="invalid-feedback">Requiere el formato oficial para R.F.C.</div>
                </div>
              </div>
              <div class="col-8">
                <div class="mb-3" id="grupo-correo_usuario">
                  <label for="correo_usuario" class="form-label">Correo</label>
                  <input type="email" class="form-control" name="correo_usuario" id="correo_usuario"
                    aria-describedby="helpId" placeholder="Correo Usuario" autocomplete="off" />
                  <div class="invalid-feedback">Requiere el formato estandarizado para correo</div>
                </div>
              </div>
            </div> <!-- ./ row-->
            <div class="row">
              <div class="mb-3" id="grupo-nombre_usuario">
                <label for="nombre_usuario" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario"
                  aria-describedby="helpId" placeholder="Nombre Usuario" autocomplete="off" />
                <div class="invalid-feedback"> Debe contener al menos 3 caracteres y maximo 60</div>
              </div>
            </div> <!-- ./row -->

            <div class="row">
              <div class="col-5">
                <div class="mb-3" id="grupo-password_usuario">
                  <label for="password_usuario" class="form-label">Password Usuario</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="password_usuario" id="password_usuario"
                      aria-describedby="helpId" placeholder="Password Usuario" 
                      required />
                    <div class="invalid-feedback">Por favor, proporcione un password.</div>
                  </div>
                </div>
              </div> <!--./ col-5 -->
              <div class="offset-2 col-5">
                <div class="mb-3" id="grupo-conf_password">
                  <label for="conf_password" class="form-label">Confirmaci&oacute;n Password</label>
                  <input type="password" class="form-control" name="conf_password" id="conf_password"
                    aria-describedby="helpId" placeholder="Conf Password" />
                  <div class="invalid-feedback">Por favor, proporcione un valor igual al password.</div>
                </div>
              </div>
            </div> <!--./ row-->
            <div class="row">
            <div class="col-5 ">
                <label   for="telefono_usuario">Tel&eacute;fono</label>
                <input type="text" class="form-control" id="telefono_usuario" name ="telefono_usuario" placeholder="Tel&eacute;fono Usuario" autocomplete="off"> 
              </div>
              <div class=" offset-2 col-5">
                <label   for="foto_usuario">Fotografía
                <input type="file" class="form-control" id="foto_usuario" name ="foto_usuario" accept="image/jpeg, image/png"> </label>
              </div>

              
          </div>
            <div class="row mt-3 ">
              <div class="offset-5 col-2 offset-5">
                <button type="submit" class="form-control btn btn-primary">
                  Enviar
                </button>
              </div> <!--./ offset-5 col-2 offset-5 -->
            </div> <!--./ row-->
          </form>
        </div>
      </div>
    </div>

<!-- fin de seccion cuerpo -->
<?php include APPROOT . '/views/includes/pie.inc.php'; ?>