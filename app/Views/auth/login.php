<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Login</title>

<link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">

</head>

<body class="hold-transition login-page">

<div class="login-box">

<div class="card">

<div class="card-body login-card-body">

<h3 class="text-center mb-4">

Media Asset Manager

</h3>

<?php if(session()->getFlashdata('error')) : ?>

<div class="alert alert-danger">

<?= session()->getFlashdata('error') ?>

</div>

<?php endif; ?>

<form action="<?= base_url('authenticate') ?>" method="post">

<div class="input-group mb-3">

<input type="email"
class="form-control"
name="email"
placeholder="Email">

<div class="input-group-append">

<div class="input-group-text">

<span class="fas fa-envelope"></span>

</div>

</div>

</div>

<div class="input-group mb-3">

<input type="password"
class="form-control"
name="password"
placeholder="Password">

<div class="input-group-append">

<div class="input-group-text">

<span class="fas fa-lock"></span>

</div>

</div>

</div>

<button class="btn btn-primary btn-block">

Login

</button>

</form>

</div>

</div>

</div>

<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>

</body>

</html>