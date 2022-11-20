<?php
require_once('../koneksi/koneksi.php');

class userController
{
  function __construct()
  {
    global $conn;
    header('Content-Type: application/json');
    require 'auth/auth.php'; //api_authorization

    function validation($data)
    {
      $data = trim($data);
      $data = preg_replace('/\s+/', ' ', $data);
      $data = htmlspecialchars($data);
      return $data;
    }
  }
  function index()
  {
    global $conn;
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }

    $response = [
      "Status" => 200,
      "message" => "Success",
      "data" => $rows
    ];

    return json_encode($response);
  }

  function getUserById($id_users)
  {
    global $conn;
    $query = "SELECT * FROM users where id_users=$id_users";
    $result = mysqli_query($conn, $query);
    $res = mysqli_fetch_assoc($result);

    $response = [
      "Status" => 200,
      "message" => "Success",
      "data" => $res
    ];

    return json_encode($response);
  }
  function insert()
  {
    global $conn;
    $username = $email = $password = $email = $password = $nama_depan = $nama_belakang = $jenis_kelamin = $negara = $kota = "";
    $err = [];



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (!isset($_POST['username'])) {
        array_push($err, "username is required");
      } else {
        $username = validation($_POST['username']);
      }
      if (!isset($_POST['email'])) {
        array_push($err, "email is required");
      } else {
        $email = validation($_POST['email']);
      }
      if (!isset($_POST['password'])) {
        array_push($err, "password is required");
      } else {
        $password = password_hash(validation($_POST['password']), PASSWORD_BCRYPT);
      }
      if (!isset($_POST['nama_depan'])) {
        array_push($err, "nama_depan is required");
      } else {
        $nama_depan = validation($_POST['nama_depan']);
      }
      if (!isset($_POST['nama_belakang'])) {
        array_push($err, "nama_belakang is required");
      } else {
        $nama_belakang = validation($_POST['nama_belakang']);
      }
      if (!isset($_POST['jenis_kelamin'])) {
        array_push($err, "jenis_kelamin is required");
      } else {
        $jenis_kelamin = validation($_POST['jenis_kelamin']);
      }
      if (!isset($_POST['negara'])) {
        array_push($err, "negara is required");
      } else {
        $negara = validation($_POST['negara']);
      }
      if (!isset($_POST['kota'])) {
        array_push($err, "kota is required");
      } else {
        $kota = validation($_POST['kota']);
      }
    } else {
      return false;
    }

    //input required check
    if (!$username || !$email || !$password || !$email || !$password || !$nama_depan || !$nama_belakang || !$jenis_kelamin || !$negara || !$kota) {
      return false;
    }

    //send spesific error message
    // if ($err) {
    //   echo json_encode([
    //     "status" => 400,
    //     "message" => $err
    //   ]);
    //   return false;
    // }

    //username validation
    if (!preg_match('/^\w{5,}$/', $username)) { // \w equals "[0-9A-Za-z_]"
      return false;
    }


    $query = "INSERT INTO users (username,email,password,nama_depan,nama_belakang,jenis_kelamin,negara,kota) VALUES ('$username','$email','$password','$nama_depan','$nama_belakang','$jenis_kelamin','$negara','$kota')";
    mysqli_query($conn, $query);


    if (mysqli_error($conn)) {
      echo mysqli_error($conn);
      return false;
    }

    return mysqli_affected_rows($conn);
  }


  function update($id_user)
  {
    parse_str(file_get_contents('php://input'), $_PUT);

    global $conn;
    $username = $email = $password = $email = $password = $nama_depan = $nama_belakang = $tgl_lahir = $jenis_kelamin = $no_telp = $alamat = $negara = $kota = "";
    $err = [];


    if ($_SERVER["REQUEST_METHOD"] == "PUT") {
      if (isset($_PUT['username'])) {
        $username = validation($_PUT['username']);
      }
      if (isset($_PUT['email'])) {
        $email = validation($_PUT['email']);
      }
      if (isset($_PUT['password'])) {
        $password = password_hash(validation($_PUT['password']), PASSWORD_BCRYPT);
      }
      if (isset($_PUT['nama_depan'])) {
        $nama_depan = validation($_PUT['nama_depan']);
      }
      if (isset($_PUT['nama_belakang'])) {
        $nama_belakang = validation($_PUT['nama_belakang']);
      }
      if (isset($_PUT['tgl_lahir'])) {
        $tgl_lahir = validation($_PUT['tgl_lahir']);
      }
      if (isset($_PUT['jenis_kelamin'])) {
        $jenis_kelamin = validation($_PUT['jenis_kelamin']);
      }
      if (isset($_PUT['no_telp'])) {
        $no_telp = validation($_PUT['no_telp']);
      }
      if (isset($_PUT['alamat'])) {
        $alamat = validation($_PUT['alamat']);
      }
      if (isset($_PUT['negara'])) {
        $negara = validation($_PUT['negara']);
      }
      if (isset($_PUT['kota'])) {
        $kota = validation($_PUT['kota']);
      }
    } else {
      return false;
    }

    if (!$username || !$email || !$password || !$email || !$password || !$nama_depan || !$nama_belakang || !$jenis_kelamin || !$negara || !$kota) {
      return false;
    }

    //send spesific error message
    // if ($err) {
    //   echo json_encode([
    //     "status" => 400,
    //     "message" => $err
    //   ]);
    //   return false;
    // }

    //username validation
    if (isset($_PUT['username'])) {
      if (!preg_match('/^\w{5,}$/', $username)) { // \w equals "[0-9A-Za-z_]"
        return false;
      }
    }



    $query = "UPDATE users SET username='$username',email='$email',password='$password',nama_depan='$nama_depan',nama_belakang='$nama_belakang',tgl_lahir='$tgl_lahir',jenis_kelamin='$jenis_kelamin',no_telp='$no_telp',alamat='$alamat',negara='$negara',kota='$kota' WHERE id_users=$id_user";
    mysqli_query($conn, $query);


    if (mysqli_error($conn)) {
      echo mysqli_error($conn);
      return false;
    }

    return mysqli_affected_rows($conn);
  }

  function delete($id_users)
  {
    global $conn;
    $query = "DELETE FROM users WHERE id_users=$id_users";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }

  function getFiles($filename, $path)
  {
    $ekstensiFile = explode('.', $filename);
    $ekstensiFile = strtolower(end($ekstensiFile));

    $ekstensiImageValid = ['jpg', 'jpeg', 'png'];
    $ekstensiPdfValid = ['pdf'];



    if (in_array($ekstensiFile, $ekstensiImageValid)) {
      header('Content-Type: image/png');
      header('Content-Length: ' . filesize('../assets/images/' . $filename));

      @readfile($path . $filename);
    } elseif (in_array($ekstensiFile, $ekstensiPdfValid)) {
      header("Content-type: application/$ekstensiFile");
      header("Content-Disposition: inline; filename=$filename");

      @readfile($path . $filename);
    } else {
      echo "Ekstensi file tidak cocok";
    }
  }
}
