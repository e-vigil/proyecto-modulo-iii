<?= $this->extend('shared/master') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<?= $this->endSection() ?>

<?= $this->section('main-content') ?>

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <a href="/centros-tech" class="text-decoration-none d-flex align-items-center mb-2">
                <i data-feather="chevron-left"></i>
                <span class="ms-1">Lista de centros tech</span>
            </a>
            <h3>Detalles</h3>
        </div>
        <div class="col-sm-12 col-md-6 text-md-end">
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Centro tech</h5>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <h5 class="fs-6"><?= $centroTech['nombre'] ?></h5>
                        <p class="text-muted">Nombre</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="fs-6">
                            <?php if(!empty($centroTech['descripcion'])): ?>
                                <?= $centroTech['descripcion'] ?>
                            <?php else: ?>
                                -
                            <?php endif ?>
                        </h5>
                        <p class="text-muted">Descripcion</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="fs-6">
                            <?php if($centroTech['activo']): ?>
                                <span class="badge bg-success">Activo</span>
                            <?php else: ?>
                                <span class="badge bg-success">Activo</span>
                            <?php endif ?>
                        </h5>
                        <p class="text-muted">Estado</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $('.table').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
        }
    })

    $('.btn-editar-contrasenia').on('click', function () {

        let id = $(this).attr('data-id')
        let usuario = $(this).attr('data-usuario')

        $('#id').val(id)
        $('#usuario').val(usuario)

    })
</script>
<?= $this->endSection() ?>
