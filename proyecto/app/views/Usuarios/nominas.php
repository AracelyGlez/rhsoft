<?php
include APPROOT .'/views/includes/encabezado.inc.php';
?>
<div class="container mt-3 ">
     
        <div class="offset-1 col-10 offset-1">
          <form action="#" method="get" id="datos_nomina" enctype="multipart/form-data" class="needs-validation" novalidate>
            <!-- <input type="hidden" name="id" > -->
            <div class="row">
              <div class="col-4">
                <div class="mb-3" id="grupo-rfc">
                  <label for="rfc" class="form-label">R.F.C</label>
                  <input type="text" class="form-control" name="rfc" id="rfc" aria-describedby="helpId"
                    placeholder="R.F.C." />
                  <div class="invalid-feedback">Requiere el formato oficial para R.F.C.</div>
                </div>
              </div>
              <div class="col-8">
                <div class="mb-3" id="grupo-nombre_nomina">
                  <label for="nombre_nomina" class="form-label">Correo</label>
                  <input type="text" class="form-control" name="nombre_nomina" id="nombre_nomina"
                    aria-describedby="helpId" placeholder="Nombre" autocomplete="off" />
                  <div class="invalid-feedback">Requiere el formato estandarizado para correo</div>
                </div>
              </div>
            </div> <!-- ./ row-->

             <div class="row mb-3">
            <div class="col">
              <label for="departamento_nomina" class="form-label">Departamento</label>
              <select
                class="form-select"
                name="departamento_nomina"
                id="grupo-departamento_nomina"
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
              <label for="nss_nomina" class="form-label">NSS</label>
              <input
                type="text"
                class="form-control"
                name="nss_nomina"
                id="grupo-nss_nomina"
                placeholder="N&uacute;mero de Seguro Social"
                required
              />
            </div>
          </div>

          <div class="row mb-3">
            <div class="col text-center">
              <label for="horas_nomina" class="form-label">Horas a Pagar</label>
              <input
                type="number"
                class="form-control"
                name="horas_nomina"
                id="grupo-horas_nomina"
                placeholder="Horas trabajadas"
                required
              />
            </div>
            <div class="col text-center">
              <label for="pago_nominas" class="form-label">Pago por Hora</label>
              <input
                type="number"
                class="form-control"
                name="pago_nominas"
                id="grupo-pago_nominas"
                placeholder="Salario por Hora"
                required
              />
            </div>
          </div>
           <!--./ row-->

              
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
    


