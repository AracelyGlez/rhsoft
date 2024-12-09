<?php
include APPROOT .'/views/includes/encabezado.inc.php';
?>

<?php if (estaLogueado()) {

?>

  
        <!-- Título del formulario -->
        <div class="p-3 mb-3 text-center">
            <h2 class="mb-0">Nominas en Tiempo Vacacional</h2>
        </div>

        <form
          action="<?= URLROOT; ?>/usuarios/agregarVacaciones"
          method="post"
          id="datos_vacaciones"
           enctype="multipart/form-data"
          class="needs-validation"
          novalidate
        >
          <div class="row mb-3">
            <div class="col" id="grupo-nombre_vacaciones">
              <label for="nombre_vacaciones" class="form-label">Nombre</label>
              <input
                type="text"
                class="form-control"
                name="nombre_vacaciones"
                id="nombre_vacaciones"
                placeholder="Nombre"
                required
              />
            </div>
            <div class="col" id="grupo-rfc_vacaciones">
              <label for="rfc_vacaciones" class="form-label">RFC</label>
              <input
                type="text"
                class="form-control"
                name="rfc_vacaciones"
                id="rfc_vacaciones"
                placeholder="RFC"
                required
              />
            </div>
          </div>

          <div class="row mb-3">
            <div class="col" id="grupo-departamento_vacaciones">
              <label for="departamento_vacaciones" class="form-label">Departamento</label>
              <select
                class="form-select"
                name="departamento_vacaciones"
                id="departamento_vacaciones"
                required
              >
                <option value="" disabled selected>
                  Seleccione un departamento
                </option>
                <option value="recursos_humanos">Recursos Humanos</option>
                <option value="finanzas">Finanzas</option>
                <option value="ti">Tecnologías de la Información</option>
              </select>
            </div>
            <div class="col" id="grupo-dias_vacaciones">
              <label for="dias_vacaciones" class="form-label"
                >Días Disponibles</label
              >
              <input
                type="number"
                class="form-control"
                name="dias_vacaciones"
                id="dias_vacaciones"
                placeholder="Días"
                required
              />
            </div>
          </div>

          <div class="row mb-3">
            <div class="col" id="grupo-salidad_vacaciones">
              <label for="salidad_vacaciones" class="form-label"
                >Fecha de Salida</label
              >
              <input
                type="date"
                class="form-control"
                name="salidad_vacaciones"
                id="salidad_vacaciones"
                required
              />
            </div>
            <div class="col" id="grupo-entrada_vacaciones">
              <label for="entrada_vacaciones" class="form-label"
                >Fecha de Entrada</label
              >
              <input
                type="date"
                class="form-control"
                name="entrada_vacaciones"
                id="entrada_vacaciones"
                required
              />
            </div>
          </div>

          <div class="row mb-3">
            <div class="col text-center" id="grupo-pago_vacaciones">
              <label for="pago_vacaciones" class="form-label">Pago por Día</label>
              <input
                type="number"
                class="form-control"
                name="pago_vacaciones"
                id="pago_vacaciones"
                placeholder="Monto"
                required
              />
            </div>
          </div>

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
<?php } ?>    
 
