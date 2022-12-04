<?php
require_once('../controller/api/bookController.php');
$book = new bookController();

if ($_GET["id_users"] && $_GET['id_book']) {
  $book->getSpesificRateBook($_GET["id_users"], $_GET['id_book']);
} else {
  $response = [
    "status" => 400,
    "message" => "parameter required"
  ];
  echo json_encode($response);
}
