<?php
$active = "category.php";
require './layout/headerBookCenter.php';
?>
<h4 class="mt-4"><a href="category.php" class="pe-3 btn-back"><i class="fa-solid fa-arrow-left text-dark"></i></a>Add Category</h4>


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Category Name</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Category Name">
</div>

<button type="button" class="btn btn-success">Simpan</button>

<?php
require_once './layout/footerBookCenter.php';
?>