<?php
require_once('../koneksi/koneksi.php');
require_once('../root/base_url.php');
class bookController
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

  public function index()
  {
    global $conn;
    $query = "SELECT users.id_users,users.foto,users.username,CONCAT(users.nama_depan,' ',users.nama_belakang) as publisher_name,users.email,book.*,rate_book.id_rate_book,ROUND(AVG(rate_book.rate_score),1) as rate_book,rate_book.comment FROM book LEFT JOIN rate_book ON book.id_book=rate_book.id_book join users ON book.id_users=users.id_users GROUP BY book.id_book ORDER BY book.id_book ASC";
    $res = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($res)) {
      $rows[] = $row;
    }
    $response = [
      "status" => 200,
      "message" => "Success",
      "data" => $rows
    ];
    return json_encode($response);
  }
  public function getBookById($id_users)
  {
    global $conn;
    $query = "SELECT * FROM book where id_users=$id_users";
    $result = mysqli_query($conn, $query);
    $res = mysqli_fetch_assoc($result);

    $response = [
      "Status" => 200,
      "message" => "Success",
      "data" => $res
    ];

    return json_encode($response);
  }

  public function getTopRateBook()
  {
    global $conn;
    $query = "SELECT users.id_users,users.foto,users.username,CONCAT(users.nama_depan,' ',users.nama_belakang) as publisher_name,users.email,book.*,rate_book.id_rate_book,ROUND(AVG(rate_book.rate_score),1) as rate_book,rate_book.comment FROM book JOIN rate_book ON book.id_book=rate_book.id_book join users ON book.id_users=users.id_users GROUP BY book.id_book ORDER BY rate_book DESC LIMIT 10";
    $res = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($res)) {
      $rows[] = $row;
    }

    if ($rows != null) {
      $response = [
        "status" => 200,
        "message" => "success",
        "data" => $rows
      ];
      echo json_encode($response);
    } else {
      $response = [
        "status" => 500,
        "message" => "Server error",
      ];
      echo json_encode($response);
    }
  }

  //CRUD rate book
  public function getSpesificRateBook($id_users, $id_book)
  {
    global $conn;
    $query = "SELECT * FROM rate_book WHERE id_users=$id_users AND id_book=$id_book";
    $res = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($res);

    if ($result != null) {
      $response = [
        "status" => 200,
        "message" => "success",
        "data" => $result
      ];
      echo json_encode($response);
    } else {
      $response = [
        "status" => 500,
        "message" => "Data is null",
      ];
      echo json_encode($response);
    }
  }

  public function getSpesificFavorite($id_users, $id_book)
  {
    global $conn;

    $query = "SELECT users.id_users,users.foto,users.username,CONCAT(users.nama_depan,' ',users.nama_belakang) as publisher_name,users.email,book.*,rate_book.id_rate_book,ROUND(AVG(rate_book.rate_score),1) as rate_book,rate_book.comment FROM book LEFT JOIN rate_book ON book.id_book=rate_book.id_book JOIN users ON book.id_users=users.id_users JOIN favorit ON favorit.id_book=book.id_book WHERE favorit.id_users=$id_users AND favorit.id_book=$id_book GROUP BY book.id_book ORDER BY book.id_book ASC";

    $res = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($res);

    $row = mysqli_affected_rows($conn);

    if ($row) {
      $response = [
        "status" => 200,
        "message" => "success",
      ];
      echo json_encode($response);
    } else {
      $response = [
        "status" => 404,
        "message" => "not found",
      ];
      echo json_encode($response);
    }
  }

  public function getFavorite($id_users)
  {
    global $conn;

    $query = "SELECT users.id_users,users.foto,users.username,CONCAT(users.nama_depan,' ',users.nama_belakang) as publisher_name,users.email,book.*,rate_book.id_rate_book,ROUND(AVG(rate_book.rate_score),1) as rate_book,rate_book.comment FROM book LEFT JOIN rate_book ON book.id_book=rate_book.id_book JOIN users ON book.id_users=users.id_users JOIN favorit ON favorit.id_book=book.id_book WHERE favorit.id_users=$id_users GROUP BY book.id_book ORDER BY book.id_book ASC";

    $res = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($res)) {
      $rows[] = $row;
    }
    $response = [
      "status" => 200,
      "message" => "success",
      "data" => $rows
    ];

    echo json_encode($response);
  }

  public function insertFavorite($id_users, $id_book)
  {
    global $conn;
    $query = "INSERT INTO favorit (id_book,id_users) VALUES ('$id_book','$id_users')";

    if (!mysqli_query($conn, $query)) {
      return false;
    }

    return mysqli_affected_rows($conn);
  }

  public function deleteFavorite($id_users, $id_book)
  {
    global $conn;
    $query = "DELETE FROM favorit where id_book=$id_book AND id_users=$id_users";
    if (!mysqli_query($conn, $query)) {
      return false;
    }
    return mysqli_affected_rows($conn);
  }
}
