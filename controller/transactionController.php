<?php
require './koneksi/koneksi.php';
require_once('./root/base_url.php');

class transactionController
{
  function __construct()
  {
    global $conn;
    if (!isset($_SESSION)) {
      session_start();
    }
  }
  public function getUserTransaction($id_users)
  {
    global $conn;
    $query = "SELECT * FROM transaction JOIN va_numbers ON va_numbers.id_transaction=transaction.id_transaction LEFT JOIN payment_amount ON payment_amount.id_transaction=transaction.id_transaction JOIN detail_transaction ON detail_transaction.transaction_id=transaction.transaction_id WHERE detail_transaction.id_users=$id_users GROUP BY transaction.id_transaction";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    if (isset($rows)) {
      return $rows;
    }
  }
}
