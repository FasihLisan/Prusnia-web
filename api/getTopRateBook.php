<?php
require_once('../controller/api/bookController.php');
$book = new bookController();

echo $book->getTopRateBook();
