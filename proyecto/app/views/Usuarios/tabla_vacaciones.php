

<?php
include APPROOT .'/views/includes/encabezado.inc.php';
?>
<div class="row">
<div class="col-8">&nbsp;</div>
<div class="col-1"><a href="<?= URLROOT; ?>/usuarios/imprimirVacaciones/fpdf" class="btn btn-danger btn-sm" title="Imprimir FPDF"><i class="fa fa-file-pdf"></i></a>

</div>
<div
    class="table-responsive mt-3">
    <table
        class="table table-primary table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">R.F.C</th>
                <th scope="col">Nombre</th>
                <th scope="col">Departamento</th>
                <th scope="col">Días</th>
                <th scope="col">Salida</th>
                <th scope="col">Entrada </th>
                <th scope="col">Pago</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- recibo $data <==== $usuarios -->
            <!-- < ? php foreach($data as $usuario) { ?> -->
            <?php foreach ($data['usuarios'] as $usuario): ?>
                <tr>
                    <td><?= $usuario->id; ?></td>
                    <td><?= $usuario->rfc_vacaciones; ?></td>
                    <td><?= $usuario->nombre_vacaciones; ?></td>
                    <td><?= $usuario->departamento_vacaciones; ?></td>
                    <td><?= $usuario->dias_vacaciones; ?></td>
                    <td><?= $usuario->salidad_vacaciones; ?></td>
                    <td><?= $usuario->entrada_vacaciones; ?></td>
                    <td><?= $usuario->pago_vacaciones; ?></td>
                     <td><a href="<?= URLROOT; ?>/usuarios/editarVacaciones/<?= $usuario->id; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="<?= URLROOT; ?>/usuarios/eliminarVacacion/<?= $usuario->id; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td> 
                </tr>
                <!-- < ? php } ?> -->
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- seccion de navegacion para paginacion -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center   ">
            <!-- anterior -->
            <li class="page-item <?= ($data['pagina'] <= 1) ?  'disabled' : ''; ?> ">
                <a class="page-link" href="<?= ($data['pagina'] <= 1) ? '#' : URLROOT . '/usuarios/tablaVacacion/' . $data['pag_previa'] . '/' . $data['limite']; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <!-- fin anterior -->
            <!-- paginas -->
            <?php for ($i = 1; $i <= $data['paginas']; $i++) { ?>
                <li class="page-item <?= ($data['pagina'] == $i) ?  'active' : ''; ?>" aria-current="page"><a class="page-link" href="<?= URLROOT . '/usuarios/tablaVacacion/' . $i . '/' . $data['limite']; ?>"><?= $i; ?></a></li>
            <?php } ?>
            <!-- fin paginas -->
            <!-- siguiente -->
            <li class="page-item <?= ($data['pagina'] >= $data['paginas']) ?  'disabled' : ''; ?>">
                <a class="page-link" href="<?= ($data['pagina'] >= $data['paginas']) ? '#' : URLROOT . '/usuarios/tablaVacacion/' . $data['pag_siguiente'] . '/' . $data['limite']; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            <!-- fin siguiente -->
        </ul>
    </nav>
</div>
  

<?php
include APPROOT .'/views/includes/pie.inc.php';
?>