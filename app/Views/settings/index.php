<?= $this->extend('layouts/main') ?>


<?= $this->section('content') ?>


<h3>
Settings
</h3>


<div class="card">

    <div class="card-body">


        <table class="table table-bordered">


            <tr>
                <th width="200">
                    Nama Aplikasi
                </th>

                <td>
                    <?= esc($app_name) ?>
                </td>
            </tr>


            <tr>
                <th>
                    Versi
                </th>

                <td>
                    <?= esc($version) ?>
                </td>
            </tr>


            <tr>
                <th>
                    Developer
                </th>

                <td>
                    <?= esc($developer) ?>
                </td>
            </tr>


            <tr>
                <th>
                    User Login
                </th>

                <td>
                    <?= session()->get('name') ?>
                </td>
            </tr>


        </table>


    </div>

</div>


<?= $this->endSection() ?>