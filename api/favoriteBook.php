<?php
require_once('../controller/api/bookController.php');
$book = new bookController();

if (isset($_GET['id_users']) && isset($_GET['id_book'])) {
  $book->getSpesificFavorite($_GET['id_users'], $_GET['id_book']);
} elseif (isset($_GET['id_users'])) {
  $book->getFavorite($_GET['id_users'],);
} else {
  $response = [
    "status" => 400,
    "message" => "Params is required"
  ];
  echo json_encode($response);
}
