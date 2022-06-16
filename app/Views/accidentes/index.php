<?= $this->extend('shared/master') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<?= $this->endSection() ?>

<?= $this->section('main-content') ?>

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <a href="/dashboard" class="text-decoration-none d-flex align-items-center mb-2">
                <i data-feather="chevron-left"></i>
                <span class="ms-1">Dashboard</span>
            </a>
            <h3>Lista de accidentes</h3>
        </div>
        <div class="col-sm-12 col-md-6 text-end">
            <a href="/accidentes/agregar" class="btn btn-primary">Nuevo accidente</a>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Fecha notificacion</th>
                            <th>Estado</th>
                            <th>Notificador</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($accidentes as $i): ?>
                            <tr>
                                <td><?= $i['id'] ?></td>
                                <td><?= $i['titulo'] ?></td>
                                <td><?= $i['fecha_notificacion'] ?></td>
                                <td>
                                    <span class="badge bg-light border text-dark"><?= $i['estado'] ?></span>
                                </td>
                                <td><?= $i['notificador'] ?></td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <a href="/accidentes/detalles/<?= $i['id'] ?>" class="btn btn-link p-1">
                                            <i data-feather="info"></i>
                                        </a>
                                        <?php if (session()->get('rol_id') == 1): ?>
                                            <a href="/accidentes/editar/<?= $i['id'] ?>" class="btn btn-link p-1">
                                                <i data-feather="edit-2"></i>
                                            </a>
                                            </a>
                                        <?php endif ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
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
