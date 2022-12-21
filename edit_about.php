<?php
$active = "edit_about.php";
require './layout/headerBookCenter.php';
require_once './controller/AboutController.php';
$about = new AboutController();
$data = $about->index();

if (isset($_POST['submit'])) {
  $about = new AboutController();
  if( $about->update($_POST) > 0 ) {
      echo "Data berhasil ditambahkan.";
  }else {
      echo "Data gagal ditambahkan.";
  }
}
?>

<h4 class="my-4">Edit About Website</h4>

<div class="col-md-10">
  <form action="" method="post" enctype="multipart/form-data">
  <div class="col-md-2">
    <label for="foto_about" class="form-label">About Picture</label>
        <img src="./assets/images/<?= $data['foto_about']; ?>" class="img-thumbnail" alt="cover_about">
    </div><br>
    <div class="col-md-10">
        <div class="mb-3">
              <input type="file" name="gambar" id="about" class="form-control <?= isset($failed['foto_about']['required']) || isset($failed['foto_about']['extension']) || isset($failed['foto_about']['size']) ? 'is-invalid' : '' ?>">
              <div id="about" class="invalid-feedback">
                <?php ($failed['foto_about']) ?>
              </div>
        </div>
        <div class="mb-3">
          <div class="mb-3"><br>
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi"  id="exampleFormControlTextarea1" rows="10" required><?= $data['isi_about'] ?></textarea>
                </div>
        </div>
    </div>
  </form>
  <div class="mb-3">
      <button type="submit" name="submit" class="btn btn-success px-5"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
  </div>
</div>

<?php
require_once './layout/footerBookCenter.php';
?>