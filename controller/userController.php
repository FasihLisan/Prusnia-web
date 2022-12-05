<?php
require './koneksi/koneksi.php';
require_once('./root/base_url.php');

class userController
{
  function __construct()
  {
    global $conn;
    if (!isset($_SESSION)) {
      session_start();
    }
    function validation($data)
    {
      $data = trim($data);
      $data = preg_replace('/\s+/', ' ', $data);
      $data = htmlspecialchars($data);
      return $data;
    }
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

  function getUserById($id_users)
  {
    global $conn;
    $query = "SELECT * FROM users where id_users=$id_users";
    $result = mysqli_query($conn, $query);
    $res = mysqli_fetch_assoc($result);

    return $res;
  }

  function insert()
  {
    global $conn;

    $username = validation($_POST['username']);
    $nama_depan = validation($_POST['firstname']);
    $nama_belakang = validation($_POST['lastname']);
    $jenis_kelamin = validation($_POST['gender']);
    $negara = validation($_POST['country']);
    $kota = validation($_POST['city']);
    $email = validation($_POST['email']);
    $password = validation($_POST['password']);
    $password_verif = validation($_POST['password_verification']);

    //input required check
    if (!$username || !$email || !$password || !$email || !$nama_depan || !$nama_belakang || !$jenis_kelamin || !$negara || !$kota || !$password_verif) {
      return false;
    }

    //password check
    if ($password != $password_verif) {
      return false;
    }

    //username validation
    if (!preg_match('/^[a-zA-Z][0-9a-zA-Z_]{2,10}[0-9a-zA-Z]$/', $username)) { // \w equals "[0-9A-Za-z_]"
      return false;
    }

    $password_hash = password_hash($password_verif, PASSWORD_BCRYPT);


    $query = "INSERT INTO users (username,email,password,nama_depan,nama_belakang,jenis_kelamin,negara,kota) VALUES ('$username','$email','$password_hash','$nama_depan','$nama_belakang','$jenis_kelamin','$negara','$kota')";
    mysqli_query($conn, $query);


    if (mysqli_error($conn)) {
      echo mysqli_error($conn);
      return false;
    }

    return mysqli_affected_rows($conn);
  }
}
