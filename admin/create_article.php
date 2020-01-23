<?php
include '../include/function.php';
session_start();
require('../include/define.php');
$jsonto = json_decode(file_get_contents('../data/user.json'), true);
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
    <?php require('../element/titleadmin.php') ?>
    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row">
            <?php require('../element/sideleftadmin.php') ?>
            <div class="col-md-8 text-center">
                <form class="mx-auto col-6 createform" action="traitement.php">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="txtarea" name="txtarea" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Créer un article">
                    </div>
                </form>
                <?php

                ?>
            </div>
        </div>
    </div>
    <?php
    require_once('../element/footeradmin.php');
    ?>
</body>