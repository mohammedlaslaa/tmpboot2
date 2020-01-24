<?php
include '../include/function.php';
session_start();
require('../include/define.php');
$jsonarticle = json_decode(file_get_contents('../data/articles.json'), true);
$jsoncat = json_decode(file_get_contents('../data/categories.json'), true);
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
        <div class="row addhere">
            <?php require('../element/sideleftadmin.php') ?>
            <div class="col-md-8 text-center contentform">
                <form class="mx-auto col-6 createform" action="traitement.php">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <select name="valueselect" required>
                            <?php
                            echo "<option>Choisir une catégorie</option>";
                            foreach ($jsoncat as $key => $val) {
                                echo "<option value=" . $val['id'] . ">" . $val['name'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="txtarea" name="txtarea" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Créer un article">
                    </div>
                    <p class="message"></p>
                </form>
                <?php

                if (isset($_POST['title']) && isset($_POST['txtarea']) && isset($_POST['valueselect'])) {
                    $newsid = max(array_column($jsonarticle, 'id')) + 1;
                    array_push($jsonarticle, ['id' => $newsid, 'titre' => $_POST['title'], "description" =>  $_POST['txtarea'], "category_id" => $_POST['valueselect']]);
                    file_put_contents('../data/articles.json', json_encode($jsonarticle));
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    require_once('../element/footeradmin.php');
    ?>
</body>