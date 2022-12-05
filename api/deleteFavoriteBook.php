<?php
require_once('../controller/api/bookController.php');
$book = new bookController();

parse_str(file_get_contents('php://input'), $_DELETE);

if (isset($_DELETE['id_users']) && isset($_DELETE['id_book'])) {
  if ($book->deleteFavorite($_DELETE['id_users'], $_DELETE['id_book']) > 0) {
    $response = [
      "status" => 200,
      "message" => "Deleted!"
    ];
    echo json_encode($response);
  } else {
    $response = [
      "status" => 500,
      "message" => "Failed"
    ];
    echo json_encode($response);
  }
} else {
  $response = [
    "status" => 400,
    "message" => "Field is required"
  ];
  echo json_encode($response);
}
