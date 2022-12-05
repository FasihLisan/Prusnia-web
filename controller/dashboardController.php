<?php
require './koneksi/koneksi.php';
require_once('./root/base_url.php');

class dashboardController
{
  function __construct()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    if ($_SESSION["userdata"]["is-login"] != true) {
      $_SESSION["failed"] = "Login required";
      header("Location: signin.php");
    }
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
