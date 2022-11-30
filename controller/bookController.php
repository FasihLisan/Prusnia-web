<?php
require './koneksi/koneksi.php';

class bookController
{
  function __construct()
  {
    global $conn;
    if (!isset($_SESSION)) {
      session_start();
    }
    if ($_SESSION["userdata"]["is-login"] != true) {
      $_SESSION["failed"] = "Login required";
      header("Location: signin.php");
    }
  }
  function index()
  {
    global $conn;
    //next id_user form session login and payment id
    $query = "SELECT * FROM book JOIN users ON users.id_users=book.id_users ORDER BY book.id_book DESC";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    $data = [
      "view" => "bookCatalog.php",
      "book" => $rows,
    ];
    return $data;
  }
  function addBook()
  {
    $view = "addBook.php";
    return $view;
  }

  function saveBook()
  {
    global $conn;

    if (isset($_POST["submit"])) {

      $judul = htmlspecialchars($_POST["judul"]);
      $deskripsi = $_POST["deskripsi"] == "<p><br></p>" ? "" : $_POST["deskripsi"];
      $kode_buku = htmlspecialchars($_POST["kode_buku"]);
      $publication_date = htmlspecialchars($_POST["publication_date"]);
      $id_users = htmlspecialchars($_POST["id_users"]);
      $author = htmlspecialchars($_POST["author"]);
      $pembayaran = htmlspecialchars($_POST["pembayaran"]);


      $Currecy = htmlspecialchars($_POST["harga"]);
      $harga = preg_replace("/([^0-9\\.])/i", "", $Currecy);
    }


    if (!$judul) {
      $_SESSION["failed"]["judul"] = "judul is required";
    }
    if (!$deskripsi) {
      $_SESSION["failed"]["deskripsi"] = "deskripsi is required";
    }
    if (!$author) {
      $_SESSION["failed"]["author"] = "author is required";
    }
    if (!$publication_date) {
      $_SESSION["failed"]["publication_date"] = "publication_date is required";
    }
    if (!$id_users) {
      $_SESSION["failed"]["id_users"] = "id_users is required";
    }


    //upload
    function upload()
    {
      $book_cover = $_FILES["book_cover"];
      $book_file = $_FILES["book_file"];

      ////validasi ekstensi
      $ekstensiCoverValid = ['jpg', 'jpeg', 'png'];
      $ekstensiBookValid = ['pdf'];

      $ekstensiBookCover = explode('.', $book_cover['name']);
      $ekstensiBookCover = strtolower(end($ekstensiBookCover));

      $ekstensiBookFile = explode('.', $book_file['name']);
      $ekstensiBookFile = strtolower(end($ekstensiBookFile));

      //cek ekestensi
      if (!in_array($ekstensiBookCover, $ekstensiCoverValid) || !in_array($ekstensiBookFile, $ekstensiBookValid)) {
        if ($ekstensiBookCover && !in_array($ekstensiBookCover, $ekstensiCoverValid)) {
          $_SESSION["failed"]["book_cover"]['extension'] = "book_cover exstension not allowed";
        }
        if ($ekstensiBookFile && !in_array($ekstensiBookFile, $ekstensiBookValid)) {
          $_SESSION["failed"]["book_file"]['extension'] = "book_file exstension not allowed";
        }

        return false;
      }

      //validasi ukuran
      $ukuranBookCover = $book_cover["size"];
      $ukuranBookFile = $book_file["size"];

      if ($ukuranBookCover > 2000000) {
        $_SESSION["failed"]["book_cover"]['size'] = "book_cover > 2 Mb";
        return false;
      }

      $filename = [
        "bookCover" => $coverFilename = uniqid() . "." . $ekstensiBookCover,
        "bookFile" => $bookFilename = uniqid() . "." . $ekstensiBookFile,
      ];

      move_uploaded_file($book_cover['tmp_name'], './assets/images/' . $filename["bookCover"]);
      move_uploaded_file($book_file['tmp_name'], './assets/images/' . $filename["bookFile"]);

      return [$filename['bookCover'], $filename["bookFile"]];
    }

    list($coverFilename, $bookFilename) = upload();
    if (!$coverFilename && !$bookFilename) {
      if (!$coverFilename) {
        $_SESSION["failed"]["book_cover"]['required'] = "book_cover is required";
      }
      if (!$bookFilename) {
        $_SESSION["failed"]["book_file"]['required'] = "book_file is required";
      }
      return false;
    }


    $data = [
      "judul" => $judul,
      "deskripsi" => $deskripsi,
      "kode_buku" => $kode_buku,
      "publication_date" => $publication_date,
      "id_users" => $id_users,
      "author" => $author,
      "book_cover" =>   $coverFilename,
      "book_file" => $bookFilename,
      "harga" => $harga,
      "pembayaran" => $pembayaran,
    ];

    // var_dump($data);
    // die;


    $query = "INSERT INTO book (cover,kode_buku,judul,description,file_buku,author,harga,publication_date,id_users,payment_id) VALUES ('$coverFilename','$kode_buku','$judul','$deskripsi','$bookFilename','$author','$harga','$publication_date','$id_users','$pembayaran')";

    mysqli_query($conn, $query);

    if (mysqli_error($conn)) {
      echo mysqli_error($conn);
      return false;
    }

    return mysqli_affected_rows($conn);
  }

  function updateBook($id_book)
  {
    global $conn;
    //next join payment id
    $query = "SELECT * ,book.created_at as book_created_at, book.updated_at as book_updated_at, users.created_at as users_created_at, users.updated_at as users_updated_at FROM book join users on users.id_users=book.id_users where book.id_book=" . $id_book . "";
    $hasil = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($hasil)) {
      $rows[] = $row;
    }

    $data = [
      "view" => "updateBook.php",
      "data" => $rows
    ];
    return $data;
  }


  function editBook($id_book)
  {
    global $conn;

    if (isset($_POST["submit"])) {

      $judul = htmlspecialchars($_POST["judul"]);
      $deskripsi = $_POST["deskripsi"] == "<p><br></p>" ? "" : $_POST["deskripsi"];
      $kode_buku = htmlspecialchars($_POST["kode_buku"]);
      $publication_date = htmlspecialchars($_POST["publication_date"]);
      $id_users = htmlspecialchars($_POST["id_users"]);
      $author = htmlspecialchars($_POST["author"]);
      $pembayaran = htmlspecialchars($_POST["pembayaran"]);


      $Currecy = htmlspecialchars($_POST["harga"]);
      $harga = preg_replace("/([^0-9\\.])/i", "", $Currecy);
    }


    if (!$judul) {
      $_SESSION["failed"]["judul"] = "judul is required";
    }
    if (!$deskripsi) {
      $_SESSION["failed"]["deskripsi"] = "deskripsi is required";
    }
    if (!$author) {
      $_SESSION["failed"]["author"] = "author is required";
    }
    if (!$publication_date) {
      $_SESSION["failed"]["publication_date"] = "publication_date is required";
    }
    if (!$id_users) {
      $_SESSION["failed"]["id_users"] = "id_users is required";
    }



    $query_gambar = "SELECT cover,file_buku from book where id_book='$id_book'";
    $hasil_hambar = mysqli_query($conn, $query_gambar);
    while ($row = mysqli_fetch_assoc($hasil_hambar)) {
      $rows[] = $row;
    }
    $gambar = $rows[0];

    if ($_FILES['book_cover']['name'] != "" || $_FILES['book_file']['name'] != "") {
      if ($_FILES['book_cover']['name'] != "") {

        $book_cover = $_FILES["book_cover"];

        $ekstensiCoverValid = ['jpg', 'jpeg', 'png'];
        $ekstensiBookCover = explode('.', $book_cover['name']);
        $ekstensiBookCover = strtolower(end($ekstensiBookCover));

        if (!in_array($ekstensiBookCover, $ekstensiCoverValid)) {
          if ($ekstensiBookCover && !in_array($ekstensiBookCover, $ekstensiCoverValid)) {
            $_SESSION["failed"]["book_cover"]['extension'] = "book_cover exstension not allowed";
          }
          return false;
        }

        $ukuranBookCover = $book_cover["size"];
        if ($ukuranBookCover > 2000000) {
          $_SESSION["failed"]["book_cover"]['size'] = "book_cover > 2 Mb";
          return false;
        }

        $filename = [
          "bookCover" => uniqid() . "." . $ekstensiBookCover
        ];
        unlink("./assets/images/" . $gambar["cover"]);
        move_uploaded_file($book_cover['tmp_name'], './assets/images/' . $filename["bookCover"]);

        $coverFilename = $filename['bookCover'];

        $query = "UPDATE book SET cover='$coverFilename' where id_book='$id_book'";

        mysqli_query($conn, $query);
      }
      if ($_FILES['book_file']['name'] != "") {

        $book_file = $_FILES["book_file"];

        $ekstensiBookValid = ['pdf'];
        $ekstensiBookFile = explode('.', $book_file['name']);
        $ekstensiBookFile = strtolower(end($ekstensiBookFile));

        //cek ekestensi
        if (!in_array($ekstensiBookFile, $ekstensiBookValid)) {
          if ($ekstensiBookFile && !in_array($ekstensiBookFile, $ekstensiBookValid)) {
            $_SESSION["failed"]["book_file"]['extension'] = "book_file exstension not allowed";
          }
          return false;
        }

        $filename = [
          "bookFile" =>  uniqid() . "." . $ekstensiBookFile,
        ];
        unlink("./assets/images/" . $gambar["file_buku"]);
        move_uploaded_file($book_file['tmp_name'], './assets/images/' . $filename["bookFile"]);

        $bookFilename = $filename["bookFile"];

        $query = "UPDATE book SET file_buku='$bookFilename' where id_book='$id_book'";

        mysqli_query($conn, $query);
      }
    } else {
      $data = [
        "judul" => $judul,
        "deskripsi" => $deskripsi,
        "kode_buku" => $kode_buku,
        "publication_date" => $publication_date,
        "id_users" => $id_users,
        "author" => $author,
        "harga" => $harga,
        "pembayaran" => $pembayaran,
      ];

      $query = "UPDATE book SET kode_buku='$kode_buku',judul='$judul',description='$deskripsi',author='$author',harga='$harga',publication_date='$publication_date',id_users='$id_users',payment_id='$pembayaran' where id_book='$id_book'";
      mysqli_query($conn, $query);
    }

    if (mysqli_error($conn)) {
      echo mysqli_error($conn);
      return false;
    }

    return mysqli_affected_rows($conn);
  }
  function delete($id_book)
  {
    global $conn;

    $gambarQuery = "SELECT * FROM book where id_book=" . $id_book;
    $gambarRes = mysqli_query($conn, $gambarQuery);
    while ($row = mysqli_fetch_assoc($gambarRes)) {
      $rows[] = $row;
    }
    $gambar = $rows[0];

    if (
      file_exists("./assets/images/" . $gambar['cover']) &&
      file_exists("./assets/images/" . $gambar['file_buku'])
    ) {
      unlink("./assets/images/" . $gambar['cover']);
      unlink("./assets/images/" . $gambar['file_buku']);
    }


    $query = "DELETE FROM book where id_book=" . $id_book;
    mysqli_query($conn, $query);

    if (mysqli_error($conn)) {
      echo mysqli_error($conn);
      return false;
    }

    return mysqli_affected_rows($conn);
  }
}
