<?php
$active = "galeri.php";
require './layout/headerBookCenter.php';
require_once './controller/GaleryController.php';
$galery = new GaleryController();
$data = $galery->tampil();
?>

<h4 class="my-4">Galeri Perusnia</h4>
<a href="galeri_input.php" id="addBook" class="btn btn-success "><i class="fa-solid fa-plus"></i> Add Picture</a>
<div class="table-responsive py-3">
<table class="table table-hover align-middle" width='20%'cellspacing="0">
    <thead>
        <tr>
        <th width='25%'>Gambar</th>
        <th width='65%'>Deskripsi</th>
        <th width='5%'></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $d): ?>
        <tr>
            <td><img src="./assets/images/<?=$d['foto'] ?>" width='100%'class="" alt="Foto Perusnia"></td>
            <td><?= $d['deskripsi']; ?> </td>
            <td><a href="deleteGalery.php?id_galeri=<?php $d['id_galeri'];?>" onclick="confirmationHapusData()" class="btn btn-danger" role="button">Hapus</a></td>
        </tr>
        <?php endforeach ?>
        </tbody>
</table>
</div>

<?php require './layout/footerBookCenter.php' ?>