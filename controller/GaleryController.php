<?php

require './koneksi/koneksi.php';
require_once('./root/base_url.php');

class GaleryController
{
  function index()
  {
    global $conn;
    $query = "SELECT * FROM galeri";
    $result = mysqli_query($conn, $query);
    while($row=mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }

    return $rows;
  }
}