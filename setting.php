<?php
$active = "setting.php";
require './layout/headerBookCenter.php';
?>

<h4 class="my-4">Setting</h4>

<?php if (isset($_SESSION['success'])) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  ' . $_SESSION['success'] . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  unset($_SESSION['success']);
} ?>

<img src="./assets/images/default_image.png" class="rounded" width="200px">

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">username</label>
  <input type="email" class="form-control" id="exampleFormControlInput1">
</div>

<div class="mb-4">
  <label for="exampleFormControlInput1" class="form-label">Email</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@gmail.com">
</div>

<div class="mb-3">
  <div class="row g-3 align-items-center">
    <div class="col-auto">
      <label for="inputPassword6" class="col-form-label">Password</label>
    </div>
    <div class="col-auto">
      <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
    </div>
    <div class="col-auto">
      <span id="passwordHelpInline" class="form-text">
        Panjangnya harus 8-20 karakter
      </span>
    </div>
  </div>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nama_Depan</label>
  <input type="email" class="form-control" id="exampleFormControlInput1">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nama_Belakang</label>
  <input type="email" class="form-control" id="exampleFormControlInput1">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Tgl_Lahir</label>
  <input type="email" class="form-control" id="exampleFormControlInput1">
</div>

<body>
  <form action="proses.php" method="get">
    <p>Jenis Kelamin</p>
    <p><input type='radio' name='jenis_kelamin' value='pria' />Laki-laki</p>
    <p><input type='radio' name='jenis_kelamin' value='perempuan' />Perempuan</p>
  </form>
</body>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">No_Telp</label>
  <input type="email" class="form-control" id="exampleFormControlInput1">
</div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Negara</label>
  <input type="email" class="form-control" id="exampleFormControlInput1">
</div>

<div class="mb-5">
  <label for="exampleFormControlInput1" class="form-label">Kota</label>
  <input type="email" class="form-control" id="exampleFormControlInput1">
</div>

<button type="button" class="btn btn-success">Simpan</button>

<?php
require_once './layout/footerBookCenter.php';
?>