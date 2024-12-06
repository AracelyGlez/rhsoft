<?php
include APPROOT .'/views/includes/encabezado.inc.php';
?>

  
        <!-- Título del formulario -->
        <div class="p-3 mb-3 text-center">
            <h2 class="mb-0">Formulario de Solicitud de Tiempo Vacacional</h2>
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
                >Días Disponibles</label
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
              <label for="fecha_salida" class="form-label"
                >Fecha de Salida</label
              >
              <input
                type="date"
                class="form-control"
                name="fecha_salida"
                id="fecha_salida"
                required
              />
            </div>
            <div class="col">
              <label for="fecha_entrada" class="form-label"
                >Fecha de Entrada</label
              >
              <input
                type="date"
                class="form-control"
                name="fecha_entrada"
                id="fecha_entrada"
                required
              />
            </div>
          </div>

          <div class="row mb-3">
            <div class="col text-center">
              <label for="pago_por_dia" class="form-label">Pago por Día</label>
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
     
        <?php
include APPROOT .'/views/includes/pie.inc.php';
?>
    
 
