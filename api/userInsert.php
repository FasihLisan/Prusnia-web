<?php
require_once('../controller/api/userController.php');
$user = new userController();


if ($user->insert() > 0) {
  echo json_encode([
    "status" => 201,
    "message" => "Created!!"
  ]);
} else {
  echo json_encode([
    "status" => 400,
    "message" => "Failed to add data"
  ]);
}
