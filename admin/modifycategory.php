<?php
session_start();
include '../include/function.php';
require('../include/define.php');
$jsonto = json_decode(file_get_contents('../data/categories.json'), true);
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
                <form class="mx-auto col-6">
                    <div class="form-group">
                        <textarea class="form-control" id="txtarea" name="newscat" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Créer un article">
                    </div>
                </form>

            </div>
            <?php
            if(isset($_GET['edit'])){
                $_SESSION['numcat'] = $_GET['edit'];
            }
            if (isset($_GET['newscat'])) {
                foreach ($jsonto as $val) {
                    if ($_SESSION['numcat'] == $val['id']) {
                        $val['name'] = $_GET['newscat'];
                        array_replace($jsonto, $_GET['newscat']);
                        file_put_contents('../data/categories.json', json_encode($jsonto));
                        header("Location: addcategory.php");
                    }
                }
            }

            ?>
        </div>
    </div>
    <?php
    require_once('../element/footer.php');
    ?>
</body>

</html>