<?php
include 'include/function.php';
session_start();
require('include/define.php');

$jsonto = json_decode(file_get_contents('data/user.json'), true);

if (isset($_POST['email']) && isset($_POST['password'])) {
  foreach ($jsonto as $key) {
    if ($_POST['email'] == $key['email'] && password_verify($_POST["password"], $key['pwd'])) {
      $_SESSION['isConnected'] = "success";
      setcookie("connection", 'ok', time()+3600);
      $_SESSION['user_right'] = $key['right'];
      header("Location: index.php");
    }
  }

  if ($_SESSION['isConnected'] !== "success") {
    header("Location: index.php?error=display");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Home - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">
</head>

<body>
  <?php
  require_once('element/nav.php');
  if (((isset($_SESSION['isConnected']) && $_SESSION['isConnected'] == "success")) || (isset($_SESSION['isConnected']) && $_COOKIE["connection"] == 'ok')){
    if (isset($_GET["session"]) && $_GET["session"] == 'deconnect') {
      disconnect();
      setcookie("connection", 'not', time()+3600);
      $_SESSION['verify'] = "";
    }
  ?>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
          </h1>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        <?php require_once('element/sideright.php'); ?>
      </div>
      <!-- /.row -->

    </div>
  <?php

  } else {
    require_once('element/form.php');
  }

  // $mail = isset($_SESSION['email']) ? $_SESSION['email'] : "";
  // $_SESSION['password'] = isset($_POST["password"]) ? $_POST["password"] : "";
  // $_SESSION['email'] = isset($_POST["email"]) ? $_POST["email"] : "";

  require_once('element/footer.php');
  ?>
  <!-- /.container -->

</body>

</html>