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
}
