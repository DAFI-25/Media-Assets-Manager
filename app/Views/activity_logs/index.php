<?= $this->extend('layouts/main') ?>


<?= $this->section('content') ?>


<h3>
Activity Log
</h3>


<table class="table table-bordered">


<thead>

<tr>

<th>No</th>

<th>User ID</th>

<th>Aktivitas</th>

<th>Waktu</th>

</tr>

</thead>



<tbody>


<?php $no=1; ?>


<?php foreach($logs as $log): ?>


<tr>

<td>
<?= $no++ ?>
</td>


<td>
<?= esc($log['user_id']) ?>
</td>


<td>
<?= esc($log['activity']) ?>
</td>


<td>
<?= esc($log['created_at']) ?>
</td>


</tr>


<?php endforeach; ?>


</tbody>


</table>


<?= $this->endSection() ?>