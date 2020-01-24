<?php
session_start();
include '../include/function.php';
require('../include/define.php');
$jsonart = json_decode(file_get_contents('../data/articles.json'), true);
$jsoncat = json_decode(file_get_contents('../data/categories.json'), true);
if (isset($_GET['edit'])) {
    $_SESSION['value'] = $_GET['edit'];
    foreach ($jsonart as $val) {
        if ($_GET['edit'] == $val['id']) {
            $title = $val['titre'];
            $desc = $val['description'];
        }
    }
};

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
                        <input class="form-control" type="text" name="title" value="<?php echo $title ?>">
                        </input>
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
                        <textarea type="text" name="desc" rows="4" class="w-100"><?php echo $desc ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Modifier">
                    </div>
                </form>

            </div>
            <?php
            if (isset($_POST['title'])) {
                foreach ($jsonart as $key => &$val) {
                    if ($_SESSION['value'] == $val['id']) {
                        // $replace = [$key => ['titre' => htmlspecialchars($_POST['title']), 'description' =>  htmlspecialchars($_POST['desc']), 'id' => $val['id'], "category_id" => $val['category_id']]];
                        // $arraysubs = array_replace($jsonart, $replace);
                        $val['titre'] = htmlspecialchars($_POST['title']);
                        $val['description'] = htmlspecialchars($_POST['desc']);
                        $val["category_id"] = $_POST['valueselect']; 
                    }
                }
                $resultfinal = json_encode($jsonart, JSON_PRETTY_PRINT);
                file_put_contents('../data/articles.json', $resultfinal);
                header("Location: http://localhost/tmpboot2/admin/modifyarticle?edit=" . $_SESSION['value']);
            }

            ?>
        </div>
    </div>
    <?php
    require_once('../element/footeradmin.php');
    ?>
</body>

</html>