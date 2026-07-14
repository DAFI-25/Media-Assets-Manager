<!DOCTYPE html>
<html>
<head>

    <title><?= $title ?? 'Media Asset Manager' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body>


<nav class="navbar navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="<?= base_url('dashboard') ?>">
            Media Asset Manager
        </a>

    </div>
</nav>



<div class="container mt-4">

    <?= $this->renderSection('content') ?>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>