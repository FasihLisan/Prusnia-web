<?php

$filename = $_GET['file'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_GET['file']; ?></title>
  <style type="text/css">
    body,
    html {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
    }
  </style>
</head>

<body>
  <iframe type="application/x-google-chrome-pdf" src="http://localhost/perusnia/api/files.php?api_key=fasih123&file=<?= $filename; ?>" style="width:100%; min-height: 100vh;" frameborder="0"></iframe>
</body>

</html>