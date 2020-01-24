<?php
$listuser = json_decode(file_get_contents('../data/user.json'), true);



foreach ($listuser as &$value) {
    if (isset($_GET['edituser']) && $_GET['edituser'] == $value['id']) {
        if (isset($_POST['right']) && isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['name'])) {
            $value['right'] =  htmlspecialchars($_POST['right']);
            $value['email'] =  htmlspecialchars($_POST['email']);
            $value['prenom'] =  htmlspecialchars($_POST['firstname']);
            $value['nom'] = htmlspecialchars($_POST['name']);
            file_put_contents('../data/user.json', json_encode($listuser));
        }
?>

        <form method="post">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="name" value="<?php echo $value['nom'] ?>">
            </div>
            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control" name="firstname" value="<?php echo $value['prenom'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $value['email'] ?>">
            </div>
            <div class="form-group">
                <label for="right">Droit utilisateur </label>
                <select type="number" name="right" id="right">
                    <option selected value="<?php echo $value['right'] ?>"><?php echo $value['right'] ?></option>
                    <option value="0">0</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>

<?php
}
}
?>
