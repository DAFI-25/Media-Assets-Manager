<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>User Management</h3>

        <a href="<?= base_url('users/create') ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah User
        </a>
    </div>


    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>


    <div class="card">
        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Dibuat</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>


                <tbody>

                <?php if (!empty($users)) : ?>

                    <?php $no = 1; ?>

                    <?php foreach ($users as $user) : ?>

                        <tr>
                            <td><?= $no++ ?></td>

                            <td>
                                <?= esc($user['name']) ?>
                            </td>

                            <td>
                                <?= esc($user['email']) ?>
                            </td>

                            <td>
                                <?php if ($user['role'] == 'admin') : ?>

                                    <span class="badge bg-danger">
                                        Admin
                                    </span>

                                <?php else : ?>

                                    <span class="badge bg-secondary">
                                        User
                                    </span>

                                <?php endif; ?>
                            </td>


                            <td>
                                <?= date('d-m-Y', strtotime($user['created_at'])) ?>
                            </td>


                            <td>

                                <a href="<?= base_url('users/edit/'.$user['id']) ?>"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>


                                <a href="<?= base_url('users/delete/'.$user['id']) ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Hapus user ini?')">
                                    Hapus
                                </a>

                            </td>

                        </tr>


                    <?php endforeach; ?>


                <?php else : ?>

                    <tr>
                        <td colspan="6" class="text-center">
                            Belum ada data user
                        </td>
                    </tr>

                <?php endif; ?>


                </tbody>

            </table>

        </div>
    </div>

</div>


<?= $this->endSection() ?>