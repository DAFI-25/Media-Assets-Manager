<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<section class="content-header">
    <div class="container-fluid">
        <h1>Preview Asset</h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    <?= esc($asset['title']) ?>
                </h3>
            </div>

            <div class="card-body">

                <?php

                $extension = strtolower(pathinfo(
                    $asset['file_name'],
                    PATHINFO_EXTENSION
                ));

                ?>

                <?php if (in_array($extension, ['jpg','jpeg','png','gif','webp'])): ?>

                    <img
                        src="<?= base_url($asset['file_path']) ?>"
                        class="img-fluid">

                <?php elseif ($extension == 'pdf'): ?>

                    <iframe
                        src="<?= base_url($asset['file_path']) ?>"
                        width="100%"
                        height="700">
                    </iframe>

                <?php else: ?>

                    <div class="alert alert-info">
                        Preview tidak tersedia untuk tipe file ini.
                    </div>

                    <a href="<?= base_url('media-assets/download/' . $asset['id']) ?>"
                       class="btn btn-success">

                        Download File

                    </a>

                <?php endif; ?>

            </div>

        </div>

    </div>
</section>

<?= $this->endSection() ?>