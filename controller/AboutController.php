<?php

use LDAP\Result;

require './koneksi/koneksi.php';
require_once('./root/base_url.php');

class AboutController
{
  function index()
  {
    global $conn;
    $query = "SELECT * FROM about";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    return $data;
  }
}