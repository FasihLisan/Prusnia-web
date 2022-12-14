<?php
$active = "category.php";
require './layout/headerBookCenter.php';
?>

<h4 class="my-4">Category</h4>

<?php if (isset($_SESSION['success'])) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  ' . $_SESSION['success'] . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  unset($_SESSION['success']);
} ?>

<a href="addCategory.php" id="addBook" class="btn btn-success "><i class="fa-solid fa-plus"></i> Add Category</a>
<div class="table-responsive py-3">
  <table class="table table-hover align-middle " id="table">
    <thead class="bg-default shadow-sm">
      <tr>
        <th>No</th>
        <th>Category Name</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="text-center"></td>
        <td></td>
        <td>
          <a href="updateCategory.php?id_book=" class="btn btn-warning "><i class="fa-solid fa-edit"></i></a>
          <button class="btn btn-danger sweet-delete"><i class=" fa-solid fa-trash"></i></button>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<?php
require_once './layout/footerBookCenter.php';
?>