<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<h3>Edit User</h3>


<form method="post" action="<?= base_url('users/update/'.$user['id']) ?>">


<div class="mb-3">

<label>Nama</label>

<input 
type="text"
name="name"
class="form-control"
value="<?= esc($user['name']) ?>"
required>

</div>



<div class="mb-3">

<label>Email</label>

<input 
type="email"
name="email"
class="form-control"
value="<?= esc($user['email']) ?>"
required>

</div>



<div class="mb-3">

<label>Password Baru</label>

<input 
type="password"
name="password"
class="form-control">

<small class="text-muted">
Kosongkan jika password tidak ingin diganti
</small>

</div>



<div class="mb-3">

<label>Role</label>

<select name="role" class="form-control">


<option value="admin"
<?= $user['role'] == 'admin' ? 'selected' : '' ?>>
Admin
</option>


<option value="user"
<?= $user['role'] == 'user' ? 'selected' : '' ?>>
User
</option>


</select>

</div>



<button class="btn btn-success">
Update
</button>


<a href="<?= base_url('users') ?>" class="btn btn-secondary">
Kembali
</a>


</form>


<?= $this->endSection() ?>