<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catégorie</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
</head>

<body>
    <?php require_once('nav.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                $listarticle = file_get_contents('data/articles.json');
                $jsonart = json_decode($listarticle, true);
                foreach ($jsonart as $val) {
                    if ($_GET['id'] == md5($val['id'])) {
                        echo "<h1>" . $val['titre'] . "</h1><br><br>";
                        echo "<p>" . $val['description'] . "</p>";
                    }
                }
                ?>
            </div>
            <?php require_once('sideright.php');?>
        </div>
    </div>
    <?php require_once('footer.php') ?>
</body>

</html>