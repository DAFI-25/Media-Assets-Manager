<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<section class="content-header">
    <div class="container-fluid">
        <h1>Media Assets</h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">

        <div class="card">

            <div class="card-header">

                <button
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#uploadModal">
                    <i class="fas fa-upload"></i>
                    Upload Asset
                </button>

            </div>

            <div class="card-body">

                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th width="70">No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Size</th>
                            <th width="220">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $no = 1; ?>

                        <?php foreach($assets as $asset): ?>

                            <tr>

                                <td><?= $no++ ?></td>

                                <td><?= esc($asset['title']) ?></td>

                                <td><?= esc($asset['category_name']) ?></td>

                                <td><?= esc($asset['file_type']) ?></td>

                                <td><?= number_format($asset['file_size'] / 1024, 2) ?> KB</td>

                                <td>

                                    <!-- DOWNLOAD -->
                                    <a href="<?= base_url('media-assets/download/' . $asset['id']) ?>"
                                       class="btn btn-success btn-sm"
                                       title="Download">

                                        <i class="fas fa-download"></i>

                                    </a>

                                    <!-- VIEW -->
                                    <a href="<?= base_url('media-assets/view/' . $asset['id']) ?>"
   class="btn btn-info btn-sm"
   title="Preview">

    <i class="fas fa-eye"></i>

</a>

                                    <!-- EDIT -->
                                    <a href="<?= base_url('media-assets/edit/' . $asset['id']) ?>"
   class="btn btn-warning btn-sm"
   title="Edit">

    <i class="fas fa-edit"></i>

</a>

                                    <!-- DELETE -->
                                    <a href="<?= base_url('media-assets/delete/' . $asset['id']) ?>"
   class="btn btn-danger btn-sm"
   title="Delete"
   onclick="return confirm('Yakin ingin menghapus asset ini?')">

    <i class="fas fa-trash"></i>

</a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</section>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="<?= base_url('media-assets/upload') ?>"
                  method="post"
                  enctype="multipart/form-data">

                <?= csrf_field() ?>

                <div class="modal-header">
                    <h5 class="modal-title">Upload Asset</h5>

                    <button type="button"
                            class="close"
                            data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Title</label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Category</label>

                        <select name="category_id"
                                class="form-control"
                                required>

                            <option value="">-- Pilih Kategori --</option>

                            <?php if(isset($categories)): ?>
                                <?php foreach($categories as $category): ?>
                                    <option value="<?= $category['id'] ?>">
                                        <?= esc($category['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Description</label>

                        <textarea name="description"
                                  class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>File</label>

                        <input type="file"
                               name="file"
                               class="form-control"
                               required>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
                            class="btn btn-primary">
                        Upload
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

<?= $this->endSection() ?>