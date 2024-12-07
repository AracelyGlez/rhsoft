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
 <h3><?= ucfirst((isset($data['button']) && $data['button'] == 'Enviar') ? 'agregar ' : 'editar '); ?></h3>
            <h2 class="mb-0">Generaci&oacute;n de N&oacute;minas</h2>
        </div>

        <!-- Comienza formulario -->
        <form
          action="<?= URLROOT; ?>/cliente/agregar"
          method="post"
          id="datos_nomina"
           enctype="multipart/form-data"
          class="needs-validation"
          novalidate
        >

          <!-- Primera fila -->
          <div class="row mb-3" >
            <div class="col" id="grupo-nombre_nomina">
              <label for="nombre_nomina" class="form-label">Nombre</label>
              <input
                type="text"
                class="form-control"
                name="nombre_nomina"
                id="nombre_nomina"
                placeholder="Nombre"
                pattern=".{5,60}"
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
            <div class="col" id="grupo-departamento_nomina">
              <label for="departamento_nomina" class="form-label">Departamento</label>
              <select
                class="form-select"
                name="departamento_nomina"
                id="departamento-nomina"
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
            <div class="col" id="grupo-nss_nomina">
              <label for="nss_nomina" class="form-label">NSS</label>
              <input
                type="text"
                class="form-control"
                name="nss_nomina"
                id="nss_nomina"
                placeholder="N&uacute;mero de Seguro Social"
                required
              />
            </div>
          </div>

          <!-- Tercera fila -->
          <div class="row mb-3">
            <div class="col text-center" id="grupo-horas_nomina">
              <label for="horas_nomina" class="form-label">Horas a Pagar</label>
              <input
                type="number"
                class="form-control"
                name="horas_nomina"
                id="horas_nomina"
                placeholder="Horas trabajadas"
                required
              />
            </div>
            <div class="col text-center" id="grupo-pago_nominas">
              <label for="pago_nominas" class="form-label">Pago </label>
              <input
                type="number"
                class="form-control"
                name="pago_nominas"
                id="pago_nominas"
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
    


        <!-- <script>
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
    </script> -->
    
        <?php
include APPROOT .'/views/includes/pie.inc.php';
?>
    


