<?php

/**
 * llamadas a includes, antes decia llegue
 */
include APPROOT . '/views/includes/encabezado.inc.php';
?>
<!-- seccion cuerpo -->
<br><br>
<div class="row">
    <div class="col-8">&nbsp;</div>
    <!-- <div class="col-2"><a href="<?= URLROOT; ?>/usuarios/imprimir/fpdf" class="btn btn-warning btn-sm" title="Imprimir FPDF"><i class="fa fa-file-pdf"></i></a></div> -->
    <div class="col-1"><a href="<?= URLROOT; ?>/usuarios/agregar" class="btn btn-success btn-sm" title="Agregar"><i class="fa fa-user"></i></a></div>
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
                <th scope="col">D&iacute;as</th>
                <th scope="col">Tipo</th>
                <th scope="col">Pago</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['usuarios'] as $usuario): ?>
                <tr>
                    <td><?= $usuario->id; ?></td>
                    <td><?= $usuario->rfc; ?></td>
                    <td><?= $usuario->nombre_usuario; ?></td>
                    <td><?= $usuario->departamento_usuario; ?></td>
                    <td><?= $usuario->dias_incapacidad; ?></td>
                    <td><?= $usuario->tipo_incapacidad; ?></td>
                    <td><?= $usuario->pago_general; ?></td>
                    <td><a href="<?= URLROOT; ?>/usuarios/editar/<?= $usuario->id; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="<?= URLROOT; ?>/usuarios/eliminar/<?= $usuario->id; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- seccion de navegacion para paginacion -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center   ">
            <!-- anterior -->
            <li class="page-item <?= ($data['pagina'] <= 1) ?  'disabled' : ''; ?> ">
                <a class="page-link" href="<?= ($data['pagina'] <= 1) ? '#' : URLROOT . '/usuarios/index/' . $data['pag_previa'] . '/' . $data['limite']; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <!-- fin anterior -->
            <!-- paginas -->
            <?php for ($i = 1; $i <= $data['paginas']; $i++) { ?>
                <li class="page-item <?= ($data['pagina'] == $i) ?  'active' : ''; ?>" aria-current="page"><a class="page-link" href="<?= URLROOT . '/usuarios/index/' . $i . '/' . $data['limite']; ?>"><?= $i; ?></a></li>
            <?php } ?>
            <!-- fin paginas -->
            <!-- siguiente -->
            <li class="page-item <?= ($data['pagina'] >= $data['paginas']) ?  'disabled' : ''; ?>">
                <a class="page-link" href="<?= ($data['pagina'] >= $data['paginas']) ? '#' : URLROOT . '/usuarios/index/' . $data['pag_siguiente'] . '/' . $data['limite']; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            <!-- fin siguiente -->
        </ul>
    </nav>
</div>

<!-- fin de seccion cuerpo -->
<?php include APPROOT . '/views/includes/pie.inc.php'; ?>