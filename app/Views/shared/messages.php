<?php if (session()->getFlashdata('msg')): ?>

    <div class="alert alert-<?= session()->getFlashdata('msg')['type'] ?> alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('msg')['content'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php endif ?>