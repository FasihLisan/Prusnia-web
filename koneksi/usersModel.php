<?php

class usersModel
{
  function __construct()
  {
    require 'koneksi.php';
  }

  function getUsers()
  {
    require 'koneksi.php';
    $query = "SELECT *,level.name as nama_level FROM users JOIN level ON level.id=users.id_level JOIN user_detile ON user_detile.id=users.id_user_detile";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  }
}
