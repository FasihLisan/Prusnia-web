<?php
$active = "my_order.php";
require './layout/headerBookCenter.php';
?>

<h4 class="my-4">My order history</h4>

<?php if (isset($_SESSION['success'])) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  ' . $_SESSION['success'] . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  unset($_SESSION['success']);
} ?>

<div class="table-responsive py-3">
  <table class="table table-hover align-middle " id="table">
    <thead class="bg-default shadow-sm">
      <tr>
        <th>No</th>
        <th>Cover</th>
        <th>Kode Buku</th>
        <th>Judul</th>
        <th>Author</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="text-center"></td>
        <td>
          <img src="./assets/images/" alt="cover_buku" width="80px">
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td>IDR </td>
        <td></td>
        <td>
          <a href="#" class="btn btn-light "><i class="fa-solid fa-eye"></i></a>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<?php
require_once './layout/footerBookCenter.php';
?>