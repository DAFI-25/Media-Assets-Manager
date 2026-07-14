<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<section class="content-header">
    <div class="container-fluid">
        <h1>Edit Asset</h1>
    </div>
</section>

<section class="content">

<div class="container-fluid">

<div class="card">

<div class="card-body">

<form action="<?= base_url('media-assets/update/' . $asset['id']) ?>"
      method="post"
      enctype="multipart/form-data">

    <?= csrf_field() ?>

    <div class="form-group">
        <label>Title</label>

        <input type="text"
               name="title"
               class="form-control"
               value="<?= esc($asset['title']) ?>"
               required>
    </div>

    <div class="form-group">
        <label>Category</label>

        <select name="category_id"
                class="form-control"
                required>

            <?php foreach($categories as $category): ?>

                <option
                    value="<?= $category['id'] ?>"
                    <?= $asset['category_id'] == $category['id'] ? 'selected' : '' ?>>

                    <?= esc($category['name']) ?>

                </option>

            <?php endforeach; ?>

        </select>
    </div>

    <div class="form-group">
        <label>Description</label>

        <textarea
            name="description"
            class="form-control"><?= esc($asset['description']) ?></textarea>
    </div>

    <div class="form-group">
        <label>File Baru (Opsional)</label>

        <input type="file"
               name="file"
               class="form-control">
    </div>

    <div class="form-group">

        <strong>File Saat Ini:</strong>

        <br>

        <?= esc($asset['file_name']) ?>

    </div>

    <button type="submit"
            class="btn btn-primary">

        Update Asset

    </button>

    <a href="<?= base_url('media-assets') ?>"
       class="btn btn-secondary">

        Kembali

    </a>

</form>

</div>

</div>

</div>

</section>

<?= $this->endSection() ?>