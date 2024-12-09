<?php  if (!empty($data['msg_error'])): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($data['msg_error']); ?>
    </div>
<?php endif; ?>

<?php
include APPROOT .'/views/includes/encabezado.inc.php';
?>

<?php if (estaLogueado()) {

?>

 <!-- Título del formulario -->
 <div class="p-3 mb-3 text-center">

            <h2 class="mb-0">Generaci&oacute;n de Incapacidades</h2>
        </div>

        <!-- Comienza formulario -->
        <form
          action="<?= URLROOT; ?>/usuarios/agregarIncapacidades"
          method="post"
          id="datos_nomina"
           enctype="multipart/form-data"
          class="needs-validation"
          novalidate
        >

          <!-- Primera fila -->
          <div class="row mb-3" >
            <div class="col" id="grupo-nombre_usuario">
              <label for="nombre_usuario" class="form-label">Nombre</label>
              <input
                type="text"
                class="form-control"
                name="nombre_usuario"
                id="nombre_usuario"
                placeholder="Nombre"
                pattern=".{3,60}"
                required
              />
            </div>
            <div class="col" id="grupo-rfc_">
              <label for="rfc" class="form-label">RFC</label>
              <input
                type="text"
                class="form-control"
                name="rfc"
                id="rfc"
                placeholder="RFC"
                required
              />
            </div>
          </div>

          <!-- Segunda fila -->
          <div class="row mb-3" >
            <div class="col" id="grupo-departamento_usuario">
              <label for="departamento_usuario" class="form-label">Departamento</label>
              <select
                class="form-select"
                name="departamento_usuario"
                id="departamento-usuario"
                required
              >
                <option value="" disabled selected>
                  Seleccione un departamento
                </option>
                <option value="recursos_humanos">Recursos Humanos</option>
                <option value="finanzas">Finanzas</option>
                <option value="tI">Tecnologías de la Información</option>
              </select>
            </div>
            <div class="col" id="grupo-dias_incapacidad">
              <label for="dias_incapacidad" class="form-label">D&iacute;as</label>
              <input
                type="number"
                class="form-control"
                name="dias_incapacidad"
                id="dias_incapacidad"
                placeholder="D&iacute;as de Incapacidad"
                required
              />
            </div>
          </div>

          <!-- Tercera fila -->
          <div class="row mb-3">
          <div class="col" id="grupo-tipo_incapacidad">
              <label for="tipo_incapacidad" class="form-label">Tipo de incapacidad</label>
              <select
                class="form-select"
                name="tipo_incapacidad"
                id="tipo_incapacidad"
                required
              >
                <option value="" disabled selected>
                  Seleccione un tipo de incapacidad
                </option>
                <option value="lesion">Lesi&oacute;n</option>
                <option value="enfermedad">Enfermedad o Infecci&oacute;n</option>
                <option value="reposo">Tiempo de Reposo</option>
              </select>
            </div>
            <div class="col text-center" id="grupo-pago_general">
              <label for="pago_general" class="form-label">Pago </label>
              <input
                type="number"
                class="form-control"
                name="pago_general"
                id="pago_general"
                placeholder="Salario"
                required
              />
            </div>
          </div>

          <!-- Cuarta fila -->
          <div class="row">
            <div class="col text-center">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </div>
        </form>
       


         <script>
      (() => {
      'use strict'
    
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')
    
      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
    
          form.classList.add('was-validated')
        }, false)
      })
    })()
    </script> 
    
        <?php
include APPROOT .'/views/includes/pie.inc.php';
?>
    
    <?php }
else { ?>
<h1>Inicia sesión primero</h1>
<?php }
?>

