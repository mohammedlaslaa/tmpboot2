<?php
include '../include/function.php';
session_start();
require('../include/define.php');
auth();
$jsonto = getUsers();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Accueil admin</title>
  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../css/blog-home.css" rel="stylesheet">
</head>

<body class="bodyadmin">
  <?php
    require('../element/titleadmin.php') ?>
    <!-- Page Content -->
    <div class="container-fluid">
      <div class="row">
        <?php require('../element/sideleftadmin.php') ?>
        <div class="col-md-8">
          <?php
          if (isset($_GET['id']) && $_GET['id'] == 'user') {
            require_once('../element/listuser.php');
          } elseif (isset($_GET['edituser'])) {
            require_once('../element/edituser.php');
          }
          ?>
        </div>
      </div>
    </div>
  <?php
    require_once('../element/footeradmin.php');
  ?>
</body>

</html>