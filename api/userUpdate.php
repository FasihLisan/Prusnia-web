<?php
require_once('../controller/api/userController.php');
$user = new userController();

parse_str(file_get_contents('php://input'), $_PUT);

// var_dump($_GET, $_POST, $_FILES);
// die;

if ($user->update($_PUT['id_users']) > 0) {
  echo json_encode([
    "status" => 200,
    "message" => "Updated!"
  ]);
} else {
  echo json_encode([
    "status" => 400,
    "message" => "Failed to Update data"
  ]);
}
