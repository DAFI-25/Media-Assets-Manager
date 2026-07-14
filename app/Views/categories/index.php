<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<section class="content-header">

<div class="container-fluid">

<h1>Categories</h1>

</div>

</section>

<section class="content">

<div class="container-fluid">

<div class="card">

<div class="card-header">

<button class="btn btn-primary"
data-toggle="modal"
data-target="#addModal">

<i class="fas fa-plus"></i>

Tambah Category

</button>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead>

<tr>

<th width="60">No</th>

<th>Name</th>

<th>Description</th>

<th width="170">Action</th>

</tr>

</thead>

<tbody>

<?php $no=1; ?>

<?php foreach($categories as $c): ?>

<tr>

<td><?= $no++ ?></td>

<td><?= esc($c['name']) ?></td>

<td><?= esc($c['description']) ?></td>

<td>

<button
class="btn btn-warning btn-sm"
data-toggle="modal"
data-target="#edit<?= $c['id'] ?>">

Edit

</button>

<a
href="<?= base_url('categories/delete/'.$c['id']) ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus?')">

Delete

</a>

</td>

</tr>

<!-- Modal Edit -->
<div class="modal fade" id="edit<?= $c['id'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="<?= base_url('categories/edit/'.$c['id']) ?>" method="post">

                <div class="modal-header">
                    <h5>Edit Category</h5>
                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>Name</label>

                        <input
                        type="text"
                        class="form-control"
                        name="name"
                        value="<?= esc($c['name']) ?>"
                        required>

                    </div>

                    <div class="form-group">

                        <label>Description</label>

                        <textarea
                        class="form-control"
                        name="description"><?= esc($c['description']) ?></textarea>

                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-success">

                        Update

                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

</div>

</section>

<!-- Modal Tambah -->

<div class="modal fade" id="addModal">

<div class="modal-dialog">

<div class="modal-content">

<form action="<?= base_url('categories/create') ?>" method="post">

<div class="modal-header">

<h5>Tambah Category</h5>

</div>

<div class="modal-body">

<div class="form-group">

<label>Name</label>

<input
type="text"
class="form-control"
name="name"
required>

</div>

<div class="form-group">

<label>Description</label>

<textarea
class="form-control"
name="description"></textarea>

</div>

</div>

<div class="modal-footer">

<button class="btn btn-primary">

Simpan

</button>

</div>

</form>

</div>

</div>

</div>

<?= $this->endSection() ?>