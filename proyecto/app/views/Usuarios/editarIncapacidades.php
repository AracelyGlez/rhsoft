<?php  if (!empty($data['msg_error'])): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($data['msg_error']); ?>
    </div>
<?php endif; ?>
<?php
include APPROOT .'/views/includes/encabezado.inc.php';
?>
 <!-- Título del formulario -->
 <div class="p-3 mb-3 text-center">

            <h2 class="mb-0">Editar Incapacidades</h2>
        </div>

        <!-- Comienza formulario -->
        <form
          action="<?= URLROOT ?>/usuarios/<?= (isset($data['button']) && $data['button'] == 'Guardar') ? 'agregar' : 'editarIncapacidades'; ?>/<?= (isset($data['button']) && $data['button'] == 'Guardar') ? '' : $data['id']; ?>" 
          method="post"
          id="datos_incapacidades"
           enctype="multipart/form-data"
          class="needs-validation"
          novalidate
        >

        <?php if (isset($data['id']) && $data['id'] != null) { ?>
          <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <?php } ?>

          <!-- Primera fila -->
          <div class="row mb-3" >
            <div class="col" id="grupo-nombre_usuario">
              <label for="nombre_nomina" class="form-label">Nombre</label>
              <input
                type="text"
                class="form-control"
                name="nombre_usuario"
                id="nombre_usuario"
                placeholder="Nombre"
                 autocomplete="on"
                value="<?= $data['nombre_usuario']; ?>"
                pattern=".{3,60}"
                
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
                value="<?= $data['rfc']; ?>"
                
              />
            </div>
          </div>

          <!-- Segunda fila -->
          <div class="row mb-3" >
            <div class="col" id="grupo-departamento_usuario">
              <label for="departamento_nomina" class="form-label">Departamento</label>
              <select
                class="form-select"
                name="departamento_usuario"
                id="departamento-usuario"
                autocomplete="off"
                value="<?= $data['departamento_usuario']; ?>"
                
              >
                <option value="" disabled selected>
                  Seleccione un departamento
                </option>
                <option value="Recursos humanos">Recursos Humanos</option>
                <option value="Finanzas">Finanzas</option>
                <option value="TI">Tecnologías de la Información</option>
              </select>
            </div>
            <div class="col" id="grupo-dias_incapacidad">
              <label for="nss_nomina" class="form-label">Dias</label>
              <input
                type="number"
                class="form-control"
                name="dias_incapacidad"
                id="dias_incapacidad"
                placeholder="Dias de incapacidad"
                autocomplete="off"
                value="<?= $data['dias_incapacidad']; ?>"
                
              />
            </div>
          </div>

          <!-- Tercera fila -->
          <div class="row mb-3">
          <div class="col" id="grupo-tipo_incapacidad">
              <label for="departamento_nomina" class="form-label">Tipo de Incapacidad</label>
              <select
                class="form-select"
                name="tipo_incapacidad"
                id="tipo_incapacidad"
                autocomplete="off"
                value="<?= $data['tipo_incapacidad']; ?>"
                
              >
                <option value="" disabled selected>
                  Seleccione su incapacidad
                </option>
                <option value="lesion">Lesi&oacute;n</option>
                <option value="enfermedad">Enfermedad o Infecci&oacute;n</option>
                <option value="reposo">Tiempo de Reposo</option>
              </select>
            </div>
            </div>
            <div class="col text-center" id="grupo-pago_general">
              <label for="pago_nominas" class="form-label">Pago </label>
              <input
                type="number"
                class="form-control"
                name="pago_general"
                id="pago_general"
                placeholder="Pago"
                autocomplete="off"
                value="<?= $data['pago_general']; ?>"
                
              />
            </div>
          </div>

          <!-- Cuarta fila -->
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
    