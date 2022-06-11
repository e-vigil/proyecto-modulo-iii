<?php if (session()->getFlashdata('msg')): ?>

    <div class="alert alert-<?= session()->getFlashdata('msg')['type'] ?> alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('msg')['content'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php endif ?>

<?php if (!empty($errors)): ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Algo no salio bien...
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?= $e ?></li>
            <?php endforeach ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php endif ?>