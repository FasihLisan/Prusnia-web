<?php
require_once('../controller/api/userController.php');
$user = new userController();



if (isset($_GET['file'])) {
  $filename = $_GET['file'];
  $path = "http://localhost/perusnia/assets/images/";

  $user->getFiles($filename, $path);
}
