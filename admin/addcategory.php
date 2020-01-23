<?php

include '../include/function.php';
session_start();
require('../include/define.php');
$jsonto = json_decode(file_get_contents('../data/user.json'), true);
if (isset($_GET['delete'])) {
    deleteElementData($_GET['delete'], 'categories.json');
    header('Location: category.php');
}
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
            <div class="col-md-8 text-center my-2">
                <form action="" class="text-center" id="formcat" method="post">
                    <input type="text" class="form-control" id="newscat" name="newscat" aria-label="Text input with checkbox">
                    <input type="submit" value="Ajouter">
                </form>
            </div>
            <?php
            $category = file_get_contents('../data/categories.json');
            $resultCat = json_decode($category, true);
            if (isset($_POST['newscat'])) {
                $resId = max(array_column($resultCat, 'id')) + 1;
                $newArray = [["name" => $_POST['newscat'], "id" => $resId]];
                $array = array_merge($resultCat, $newArray);
                $resultfinal = json_encode($array, JSON_PRETTY_PRINT);
                file_put_contents('../data/categories.json', $resultfinal);
            }
            ?>
        </div>
    </div>
    <?php
    require_once('../element/footeradmin.php');
    ?>
</body>

</html>