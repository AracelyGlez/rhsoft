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

            <h2 class="mb-0">Editar N&oacute;minas</h2>
        </div>

        <!-- Comienza formulario -->
        <form
          action="<?= URLROOT ?>/usuarios/<?= (isset($data['button']) && $data['button'] == 'Guardar') ? 'agregar' : 'editarNominas'; ?>/<?= (isset($data['button']) && $data['button'] == 'Guardar') ? '' : $data['id']; ?>" 
          method="post"
          id="datos_nomina"
           enctype="multipart/form-data"
          class="needs-validation"
          novalidate
        >

        <?php if (isset($data['id']) && $data['id'] != null) { ?>
          <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <?php } ?>

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
                 autocomplete="on"
                value="<?= $data['nombre_nomina']; ?>"
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
            <div class="col" id="grupo-departamento_nomina">
              <label for="departamento_nomina" class="form-label">Departamento</label>
              <select
                class="form-select"
                name="departamento_nomina"
                id="departamento-nomina"
                autocomplete="off"
                value="<?= $data['departamento_nomina']; ?>"
                
              >
                <option value="" disabled selected>
                  Seleccione un departamento
                </option>
                <option value="Recursos humanos">Recursos Humanos</option>
                <option value="Finanzas">Finanzas</option>
                <option value="TI">Tecnologías de la Información</option>
              </select>
            </div>
            <div class="col" id="grupo-nss_nomina">
              <label for="nss_nomina" class="form-label">NSS</label>
              <input
                type="number"
                class="form-control"
                name="nss_nomina"
                id="nss_nomina"
                placeholder="N&uacute;mero de Seguro Social"
                autocomplete="off"
                value="<?= $data['nss_nomina']; ?>"
                
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
    autocomplete="off"
    value="<?= $data['horas_nomina']; ?>"
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
                autocomplete="off"
                value="<?= $data['pago_nominas']; ?>"
                
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
<?php }
else { ?>
<h1>Inicia sesión primero</h1>
<?php }
?>
    