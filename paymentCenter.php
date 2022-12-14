<?php
$active = "paymentCenter.php";
require './layout/headerBookCenter.php';
?>

<h4 class="my-4">Payment Center</h4>

<?php if (isset($_SESSION['success'])) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  ' . $_SESSION['success'] . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  unset($_SESSION['success']);
} ?>

<a href="" id="addBook" class="btn btn-success "><i class="fa-solid fa-plus"></i> Add Book</a>
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
          <a href="viewPDF.php?file=" class="btn btn-light "><i class="fa-solid fa-eye"></i></a>
          <a href="updateBook.php?id_book=" class="btn btn-warning "><i class="fa-solid fa-edit"></i></a>
          <button class="btn btn-danger sweet-delete"><i class=" fa-solid fa-trash"></i></button>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<?php
require_once './layout/footerBookCenter.php';
?>