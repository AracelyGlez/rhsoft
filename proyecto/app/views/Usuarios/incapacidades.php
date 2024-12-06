
<?php
include APPROOT .'/views/includes/encabezado.inc.php';
?>
        
        <!-- Título del formulario -->
        <div class="p-3 mb-3 text-center">
          <h2 class="mb-0">Solicitud de Tiempo de Incapacidad</h2>
        </div>

        <form
          action="#"
          method="get"
          id="datos_usuario"
          class="needs-validation"
          novalidate
        >
          <div class="row mb-3">
            <div class="col">
              <label for="nombre_usuario" class="form-label">Nombre</label>
              <input
                type="text"
                class="form-control"
                name="nombre_usuario"
                id="nombre_usuario"
                placeholder="Nombre"
                required
              />
            </div>
            <div class="col">
              <label for="rfc_usuario" class="form-label">RFC</label>
              <input
                type="text"
                class="form-control"
                name="rfc_usuario"
                id="rfc_usuario"
                placeholder="RFC"
                required
              />
            </div>
          </div>

          <div class="row mb-3">
            <div class="col">
              <label for="departamento" class="form-label">Departamento</label>
              <select
                class="form-select"
                name="departamento"
                id="departamento"
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
            <div class="col">
              <label for="dias_disponibles" class="form-label"
                >Días de Incapacidad</label
              >
              <input
                type="number"
                class="form-control"
                name="dias_disponibles"
                id="dias_disponibles"
                placeholder="Días"
                required
              />
            </div>
          </div>

          <div class="row mb-3">
            <div class="col">
              <label for="departamento" class="form-label">Tipo de Incapacidad</label>
              <select
                class="form-select"
                name="departamento"
                id="departamento"
                required
              >
                <option value="" disabled selected>
                  Seleccione el tipo de incapacidad
                </option>
                <option value="recursos_humanos">Lesi&oacute;n</option>
                <option value="finanzas">Enfermedad o Infecci&oacute;n</option>
                <option value="ti">Tiempo de Reposo</option>
              </select>
            </div>
            <div class="col text-center">
              <label for="pago_por_dia" class="form-label">Pago general</label>
              <input
                type="number"
                class="form-control"
                name="pago_por_dia"
                id="pago_por_dia"
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
      </div>
    </main>

    <br><br>

    <div class="p-3 mb-3 text-center">
      <h2 class="mb-0">Registro de tiempos de incapacidad</h2>
    </div>
    <div class="container mt-3">
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">Columna 1</th>
            <th scope="col">Columna 2</th>
            <th scope="col">Columna 3</th>
          </tr>
        </thead>
        <tbody>
          <tr class="">
            <td scope="row">1</td>
            <td>2</td>
            <td>3</td>
          </tr>
          <tr class="">
            <td scope="row">4</td>
            <td>5</td>
            <td>6</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
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

<?php include APPROOT .'/views/includes/pie.inc.php'; ?>