<?php
require './koneksi/koneksi.php';

class dashboardController
{
  function __construct()
  {
    global $conn;
  }
  function index()
  {
    $data = [
      "view" => "dashboard.php"
    ];
    return $data;
  }
}
