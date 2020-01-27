<?php
include '../include/function.php';
session_start();
require('../include/define.php');
auth();

$jsonto = getUsers();
if (isset($_GET['delete'])) {
    deleteElementData($_GET['delete'], 'categories.json');
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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $category = file_get_contents('../data/categories.json');
                        $resultCat = json_decode($category, true);
                        foreach ($resultCat as $key => $value) {
                            echo "<tr>";
                            echo "<td>" . $value['id'] . "</td>";
                            echo "<td>" . $value['name'] . "</td>";
                            echo '<td>' . '<a href=categorydetail.php?id=' . $value['id'] . '>Voir</a> / ' . '<a href=?delete=' . $value['id'] . '>Supprimer</a> / '  . '<a href=modifycategory?edit=' . $value['id'] . '>Modifier</a> </td>';
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    require_once('../element/footeradmin.php');
    ?>
</body>

</html>