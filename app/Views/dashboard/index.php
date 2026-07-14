<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </h1>
            </div>
        </div>
    </div>
</section>


<section class="content">

<div class="container-fluid">


<!-- ================= STATISTICS ================= -->

<div class="row">


<div class="col-lg-3 col-6">

<div class="small-box bg-info">

<div class="inner">

<h3>
<?= $totalAssets ?? 0 ?>
</h3>

<p>Total Assets</p>

</div>

<div class="icon">
<i class="fas fa-folder"></i>
</div>

</div>

</div>



<div class="col-lg-3 col-6">

<div class="small-box bg-success">

<div class="inner">

<h3>
<?= $totalCategories ?? 0 ?>
</h3>

<p>Categories</p>

</div>

<div class="icon">
<i class="fas fa-tags"></i>
</div>

</div>

</div>



<div class="col-lg-3 col-6">

<div class="small-box bg-warning">

<div class="inner">

<h3>
<?= $totalUsers ?? 0 ?>
</h3>

<p>Users</p>

</div>

<div class="icon">
<i class="fas fa-users"></i>
</div>

</div>

</div>



<div class="col-lg-3 col-6">

<div class="small-box bg-danger">

<div class="inner">

<h3>
<?= $storageUsed ?? '0 MB' ?>
</h3>

<p>Storage Used</p>

</div>

<div class="icon">

<i class="fas fa-database"></i>

</div>

</div>

</div>


</div>



<!-- ================= RECENT ASSETS ================= -->


<div class="card">

<div class="card-header">

<h3 class="card-title">
<i class="fas fa-cloud-upload-alt"></i>
Recent Uploaded Assets
</h3>


<div class="card-tools">



</div>


</div>



<div class="card-body">


<table class="table table-bordered table-striped">


<thead class="thead-dark">

<tr>

<th width="5%">No</th>

<th>Title</th>

<th>Category</th>

<th>Type</th>

<th>Size</th>

<th width="15%">Upload Date</th>

<th width="10%">Action</th>

</tr>

</thead>



<tbody>


<?php if(!empty($recentAssets)): ?>


<?php $no = 1; ?>

<?php foreach($recentAssets as $asset): ?>


<tr>


<td>
<?= $no++ ?>
</td>


<td>
<?= esc($asset['title']) ?>
</td>


<td>
<?= esc($asset['category_name'] ?? '-') ?>
</td>


<td>

<span class="badge badge-info">

<?= strtoupper($asset['file_type']) ?>

</span>

</td>



<td>

<?php

$size = $asset['file_size'];

if ($size >= 1073741824) {

    echo round($size / 1073741824, 2) . ' GB';

} elseif ($size >= 1048576) {

    echo round($size / 1048576, 2) . ' MB';

} else {

    echo round($size / 1024, 2) . ' KB';

}

?>

</td>



<td>

<?= date(
'd M Y',
strtotime($asset['created_at'])
) ?>

</td>



</tr>


<?php endforeach; ?>


<?php else: ?>


<tr>

<td colspan="7" class="text-center">

Belum ada asset

</td>

</tr>


<?php endif; ?>


</tbody>


</table>


</div>


</div>



<!-- ================= STORAGE INFO ================= -->


<div class="card">

<div class="card-header">

<h3 class="card-title">

<i class="fas fa-chart-pie"></i>

Storage Information

</h3>

</div>


<div class="card-body">


<div class="progress">

<div class="progress-bar bg-success"

style="width: <?= $storagePercentage ?? 0 ?>%">

<?= $storagePercentage ?? 0 ?>%

</div>

</div>


<br>


<p>

Storage digunakan:
<strong>

<?= $storageUsed ?? '0 MB' ?>

</strong>

dari

<strong>

<?= $storageLimit ?? '10 GB' ?>

</strong>

</p>


</div>


</div>



</div>

</section>


<?= $this->endSection() ?>