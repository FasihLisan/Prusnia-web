<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap % Fontawesome -->
  <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap % Fontawesome -->
  <title>Perusnia API</title>
</head>
<style>
  .col {
    margin-top: auto;
    margin-bottom: auto;
  }
</style>

<body>

  <div class="container">
    <h2 class="py-4">API Documentation</h2>
    <div class="row ">
      <div class="col">
        <!-- user api -->
        <div class="api mb-5">
          <h4>Users API</h4>
          <div class="row p-3 bg-success bg-opacity-10 border border-success rounded mb-3">
            <div class="col-md-1">
              <a href="#" class="btn btn-light text-success">GET</a>
            </div>
            <div class="col">
              http://localhost/perusnia/api/user.php<span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">?{api_key}</span>
            </div>
            <div class="col">
              Select all
            </div>
          </div>
          <div class="row p-3 bg-success bg-opacity-10 border border-success rounded mb-3">
            <div class="col-md-1">
              <a href="#" class="btn btn-light text-success">GET</a>
            </div>
            <div class="col">
              http://localhost/perusnia/api/user.php
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">?{api_key}</span>&
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">{id}</span>
            </div>
            <div class="col">
              Select spesific data
            </div>
          </div>
          <div class="row p-3 bg-warning bg-opacity-10 border border-warning rounded mb-3">
            <div class="col-md-1">
              <a href="#" class="btn btn-light text-warning">POST</a>
            </div>
            <div class="col">
              http://localhost/perusnia/api/insertUser.php
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">?{api_key}</span>
            </div>
            <div class="col">
              Insert data,
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">form-data</span>
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">x-www-form-urlencoded</span>
            </div>
          </div>
          <div class="row p-3 bg-info bg-opacity-10 border border-info rounded mb-3">
            <div class="col-md-1">
              <a href="#" class="btn btn-light text-primary">POST</a>
            </div>
            <div class="col">
              http://localhost/perusnia/api/updateUser.php
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">?{api_key}</span>&
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">?{id}</span>
            </div>
            <div class="col">
              Update data,
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">form-data</span>,
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">id_users</span>
            </div>
          </div>
          <div class="row p-3 bg-danger bg-opacity-10 border border-danger rounded mb-3">
            <div class="col-md-1">
              <a href="#" class="btn btn-light text-danger">DELETE</a>
            </div>
            <div class="col">
              http://localhost/perusnia/api/deleteUser.php<span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">?{api_key}</span>
            </div>
            <div class="col">
              Delete data
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">x-www-form-urlencoded</span>,
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">id_users</span>
            </div>
          </div>
        </div>

        <!-- book api -->
        <div class="api mb-5">
          <h4>Get files</h4>
          <div class="row p-3 bg-success bg-opacity-10 border border-success rounded mb-3">
            <div class="col-md-1">
              <a href="#" class="btn btn-light text-success">GET</a>
            </div>
            <div class="col">
              http://localhost/perusnia/api/files.php
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">?{api_key}</span>&
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">(file.extesion}</span>
            </div>
            <div class="col">
              Select file
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">.pdf</span>
              <span class="text-danger bg-danger bg-opacity-10 px-2 rounded-pill">png/jpg/jpeg</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>



  <script src="../assets/bootstrap/js/popper.min.js"></script>
  <script src="../assets/fontawesome/js/all.js"></script>
  <script src="../assets/js/jquery.min.js"></script>
</body>

</html>