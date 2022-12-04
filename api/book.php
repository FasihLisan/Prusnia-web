<?php
require_once('../controller/api/bookController.php');
$user = new bookController();


if (isset($_GET['id_users'])) {
  echo $user->getBookById($_GET['id_users']);
} else {
  echo $user->index();
}
