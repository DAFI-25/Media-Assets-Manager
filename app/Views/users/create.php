<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<h3>Tambah User</h3>


<form method="post" action="<?= base_url('users/store') ?>">


<div class="mb-3">
<label>Nama</label>

<input 
type="text"
name="name"
class="form-control"
required>

</div>


<div class="mb-3">

<label>Email</label>

<input 
type="email"
name="email"
class="form-control"
required>

</div>


<div class="mb-3">

<label>Password</label>

<input 
type="password"
name="password"
class="form-control"
required>

</div>


<div class="mb-3">

<label>Role</label>

<select name="role" class="form-control">

<option value="admin">
Admin
</option>

<option value="user">
User
</option>

</select>

</div>


<button class="btn btn-primary">
Simpan
</button>


<a href="<?= base_url('users') ?>" class="btn btn-secondary">
Kembali
</a>


</form>


<?= $this->endSection() ?>