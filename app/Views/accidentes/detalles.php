<?= $this->extend('shared/master') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<?= $this->endSection() ?>

<?= $this->section('main-content') ?>

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <a href="/accidentes" class="text-decoration-none d-flex align-items-center mb-2">
                <i data-feather="chevron-left"></i>
                <span class="ms-1">Lista de accidentes</span>
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
                <div class="card-body p-5">

                    <img src="<?= base_url() . '/' . $accidente['foto'] ?>" alt="img evidence" class="d-block rounded-3 mb-3" width="200">

                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <h4 class="fs-5">Datos del dispositivo</h4>
                            <br>
                            <div class="mb-3">
                                <h5 class="fs-6"><?= $accidente['nombredispositivo'] ?></h5>
                                <p class="text-muted">Dispositivo</p>
                            </div>
                            <div class="mb-3">
                                <h5 class="fs-6"><?= $accidente['num_serie'] ?></h5>
                                <p class="text-muted">Numero de serie</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <h4 class="fs-5">Datos del accidente</h4>
                            <br>
                            <div class="mb-3">
                                <h5 class="fs-6"><?= $accidente['titulo'] ?></h5>
                                <p class="text-muted">Titulo</p>
                            </div>
                            <div class="mb-3">
                                <h5 class="fs-6"><?= $accidente['descripcion'] ?></h5>
                                <p class="text-muted">Descripcion</p>
                            </div>
                            <div class="mb-3">
                                <h5 class="fs-6"><?= $accidente['tipoaccidente'] ?></h5>
                                <p class="text-muted">Tipo de accidente</p>
                            </div>
                            <div class="mb-3">
                                <h5 class="fs-6"><?= $accidente['fecha_notificacion'] ?></h5>
                                <p class="text-muted">Fecha notificacion</p>
                            </div>
                            <div class="mb-3">
                                <h5 class="fs-6">
                                    <span class="badge bg-light border text-dark"><?= $accidente['estado'] ?></span>
                                </h5>
                                <p class="text-muted">Estado</p>
                            </div>
                            <div class="mb-3">
                                <h5 class="fs-6"><?= $accidente['notificador'] ?></h5>
                                <p class="text-muted">Notificador</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <h4 class="fs-5">Datos de la resolucion</h4>
                            <br>
                            <div class="mb-3">
                                <h5 class="fs-6">
                                    <?php if (empty($accidente['resolucion'])): ?>
                                        Sin resolucion
                                    <?php else: ?>
                                        <?= $accidente['resolucion'] ?>
                                    <?php endif ?>
                                </h5>
                                <p class="text-muted">Resolucion</p>
                            </div>
                            <div class="mb-3">
                            <h5 class="fs-6">
                                    <?php if (empty($accidente['fecha_resolucion'])): ?>
                                        Sin resolucion
                                    <?php else: ?>
                                        <?= $accidente['fecha_resolucion'] ?>
                                    <?php endif ?>
                                </h5>
                                <p class="text-muted">Fecha resolucion</p>
                            </div>
                        </div>
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
</script>
<?= $this->endSection() ?>
