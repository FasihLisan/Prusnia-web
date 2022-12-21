<?php

use LDAP\Result;

require './koneksi/koneksi.php';
require_once('./root/base_url.php');

class AboutController
{
  function index()
  {
    global $conn;
    $query = "SELECT * FROM about WHERE id_about = 1";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    return $data;
  }

  function update()
  {
    global $conn;

    if (isset($_POST["submit"])) {

      $deskripsi = $_POST["deskripsi"] == "<p><br></p>" ? "" : $_POST["deskripsi"];
    }


    if (!$deskripsi) {
      $_SESSION["failed"]["deskripsi"] = "deskripsi is required";
    }


    //upload
    function upload()
    {
      $gambar_about = $_FILES["gambar"];

      ////validasi ekstensi
      $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

      $ekstensiGambar = explode('.', $gambar_about['name']);
      $ekstensiGambar = strtolower(end($ekstensiGambar));

      //cek ekestensi
      if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        if ($ekstensiGambar && !in_array($ekstensiGambar, $ekstensiGambarValid)) {
          $_SESSION["failed"]["gambar"]['extension'] = "gambar exstension not allowed";
        }

        return false;
      }

      //validasi ukuran
      $ukuranGambarAbout = $gambar_about["size"];

      if ($ukuranGambarAbout > 3000000) {
        $_SESSION["failed"]["gambar"]['size'] = "gambar > 3 Mb";
        return false;
      }

      $filename = [
        "gambar" => $gambarFilename = uniqid() . "." . $ekstensiGambar
      ];

      move_uploaded_file($gambar_about['tmp_name'], './assets/images/' . $filename["gambar"]);

      return [$filename['gambar']];
    }

    list($gambarFilename) = upload();
    if (!$gambarFilename) {
      if (!$gambarFilename) {
        $_SESSION["failed"]["gambar"]['required'] = "gambar is required";
      }
      return false;
    }


    $data = [
      "deskripsi" => $deskripsi
    ];

    // var_dump($data);
    // die;


    $query = "UPDATE about SET foto= '$gambarFilename',deskripsi= '$deskripsi'";

    mysqli_query($conn, $query);

    if (mysqli_error($conn)) {
      echo mysqli_error($conn);
      return false;
    }

    return mysqli_affected_rows($conn);
  }

  /*function updatePul(){
    global $conn;
    $gambar = $about = "";
    if(isset($data["gambar"])){
      $gambar = $data["gambar"];
    }
    if(isset($data["deskripsi"])){
      $deskripsi = $data["deskripsi"];
    }
    //var_dump($data);
      
    $query = "UPDATE about SET foto_about= '$gambar', isi_about= '$deskripsi'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }*/
}