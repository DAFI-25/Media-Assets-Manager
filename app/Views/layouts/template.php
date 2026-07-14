<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Media Asset Manager' ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">

    <style>
        .brand-text{
            font-weight:600;
        }

        .content-header h1{
            font-weight:bold;
        }

        .small-box{
            border-radius:12px;
        }

        .card{
            border-radius:12px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

<?= $this->include('layouts/navbar') ?>

<?= $this->include('layouts/sidebar') ?>

<div class="content-wrapper">

<?= $this->renderSection('content') ?>

</div>

<?= $this->include('layouts/footer') ?>

</div>

<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>

</body>
</html>