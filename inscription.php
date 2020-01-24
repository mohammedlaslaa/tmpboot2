<?php
session_start();

$tableUser = json_decode(file_get_contents('data/user.json'), true);

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Inscription</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Incription</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">

                            <label for="name">Nom</label>
                            <input type="text" class="form-control" required placeholder="Nom" name="name" value="<?php if (isset($_POST['name'])) {
                                                                                                                        echo htmlspecialchars($_POST['name']);
                                                                                                                    } ?>">
                        </div>
                        <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <input type="text" class="form-control" required placeholder="Prénom" name="firstname" value="<?php if (isset($_POST['firstname'])) {
                                                                                                                                echo htmlspecialchars($_POST['firstname']);
                                                                                                                            } ?>">
                        </div>
                        <div class="form-group">

                            <label for="email">Email</label>
                            <input type="email" class="form-control" required placeholder="email" name="email" value="<?php if (isset($_POST['email'])) {
                                                                                                                            echo htmlspecialchars($_POST['email']);
                                                                                                                        } ?>">
                        </div>
                        <?php
                        ?>
                        <div class="form-group">


                            <label for="email">Mot de passe</label>

                            <input type="password" class="form-control" required name='password' placeholder="password" value="<?php if (isset($_POST['password'])) {
                                                                                                                                    echo htmlspecialchars($_POST['password']);
                                                                                                                                } ?>">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" value="Login" class="btn btn-primary login_btn text-white">Valider</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <div class="d-flex justify-content-center mx-auto">
                        <a href="index.php">Retour à l'accueil</a>
                    </div>
                </div>
                <?php
                if (isset($_POST['password']) && isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['name'])) {
                    $newUser = [
                        "id" => (max(array_column($tableUser, 'id')) + 1),
                        "nom" => $_POST['name'],
                        "prenom" => $_POST['firstname'],
                        "email" => $_POST['email'],
                        "pwd" => password_hash($_POST['password'], PASSWORD_DEFAULT),
                        "right" => 0
                    ];

                    array_push($tableUser, $newUser);

                    file_put_contents('data/user.json', json_encode($tableUser));

                    header('Location: index.php');
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>