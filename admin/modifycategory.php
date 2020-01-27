<?php
session_start();
include '../include/function.php';
require('../include/define.php');
auth();
$jsonto = getCategories();
$holder;

setsession($jsonto, $holder);

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
                <form class="mx-auto col-6" method="post">
                    <div class="form-group">
                        <input class="form-control" type="text" name="newscat" value="<?php echo $holder ?>">
                        </input>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Modifier">
                    </div>
                </form>

            </div>
            <?php
            if (isset($_POST['newscat'])) {
                foreach ($jsonto as $key => $val) {
                    if ($_SESSION['value'] == $val['id']) {
                        $replace = [$key => ['name' => htmlspecialchars($_POST['newscat']), 'id' => $val['id']]];
                        $arraysubs = array_replace($jsonto, $replace);
                        $resultfinal = json_encode($arraysubs, JSON_PRETTY_PRINT);
                        file_put_contents('../data/categories.json', $resultfinal);
                    }
                }
                header("Location: http://localhost/tmpboot2/admin/modifycategory?edit=" . $_SESSION['value']);
            }

            ?>
        </div>
    </div>
    <?php
    require_once('../element/footeradmin.php');
    ?>
</body>

</html>