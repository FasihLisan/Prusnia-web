<?php
require './koneksi/koneksi.php';

class userController
{
  function __construct()
  {
    global $conn;
  }

  function getUsers()
  {
    global $conn;
    $query = "SELECT *,level.name as nama_level FROM users JOIN level ON level.id_level=users.id_level JOIN user_detile ON user_detile.id_user_detile=users.id_user_detile";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  }
}
