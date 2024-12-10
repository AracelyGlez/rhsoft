
<?php
include APPROOT .'/views/includes/encabezado.inc.php';
?>

<?php if (estaLogueado()) {

?>
<?php  if (!empty($data['msg_error'])): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($data['msg_error']); ?>
    </div>
<?php endif; ?>
        <!-- Título del formulario -->
        <div class="p-3 mb-3 text-center">
        
       
            <h2 class="mb-0">Editar Incapacidades</h2>
        </div>

        <form
          action="<?= URLROOT; ?>/usuarios/<?= (isset($data['button']) && $data['button'] == 'Guardar') ? 'agregar' : 'editarIncapacidades'; ?>/<?= (isset($data['button']) && $data['button'] == 'Guardar') ? '' : $data['id']; ?>"
          method="post"
          id="datos_incapacidades"
           enctype="multipart/form-data"
          class="needs-validation"
          novalidate
        >

        <?php if (isset($data['id']) && $data['id'] != null) { ?>
          <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <?php } ?>

          <div class="row mb-3">
          <div class="col" id="grupo-rfc">
              <label for="rfc" class="form-label">RFC</label>
              <input
                type="text"
                class="form-control"
                name="rfc"
                id="rfc"
                placeholder="RFC"
                value="<?= $data['rfc']; ?>"
                required
              />
            </div>
            <div class="col" id="grupo-nombre_usuario">
              <label for="nombre_usuario" class="form-label">Nombre</label>
              <input
                type="text"
                class="form-control"
                name="nombre_usuario"
                id="nombre_usuario"
                placeholder="Nombre"
                value="<?= $data['nombre_usuario']; ?>"
                required
              />
            </div>
          </div>

          <div class="row mb-3">
            <div class="col" id="grupo-departamento_usuario">
              <label for="departamento_usuario" class="form-label">Departamento</label>
              <select
                class="form-select"
                name="departamento_usuario"
                id="departamento_usuario"
                value="<?= $data['departamento_usuario']; ?>"
                required
              >
                <option value="" disabled selected>
                  Seleccione un departamento
                </option>
                <option value="RRHH">Recursos Humanos</option>
                <option value="Finanzas">Finanzas</option>
                <option value="TI">Tecnologías de la Información</option>
              </select>
            </div>
            <div class="col" id="grupo-dias_incapacidad">
              <label for="dias_incapacidad" class="form-label"
                >Días Disponibles</label
              >
              <input
                type="number"
                class="form-control"
                name="dias_incapacidad"
                id="dias_incapacidad"
                value="<?= $data['dias_incapacidad']; ?>"
                placeholder="Días"
                required
              />
            </div>
          </div>

          <div class="row mb-3">

          <div class="col" id="grupo-tipo_incapacidad">
              <label for="tipo_incapacidad" class="form-label">Tipo</label>
              <select
                class="form-select"
                name="tipo_incapacidad"
                id="tipo_incapacidad"
                value="<?= $data['tipo_incapacidad']; ?>"
                required
              >
                <option value="" disabled selected>
                  Seleccione el tipo de incapacidad
                </option>
                <option value="lesi&oacute;n">Lesi&oacute;n</option>
                <option value="enfermedad">Enfermedad o Infecci&oacute;n</option>
                <option value="reposo">Tiempo de Reposo</option>
              </select>
            </div>

            <div class="col text-center" id="grupo-pago_general">
              <label for="pago_general" class="form-label">Pago</label>
              <input
                type="number"
                class="form-control"
                name="pago_general"
                id="pago_general"
                value="<?= $data['pago_general']; ?>"
                placeholder="Monto"
                required
              />
            </div>
          </div>

          <div class="row">
            <div class="col text-center">
              <button type="submit" class="btn btn-primary"><?= $data['button']; ?></button>
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
<?php } ?>