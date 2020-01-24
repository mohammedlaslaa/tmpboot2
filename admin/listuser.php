<?php
$listuser = json_decode(file_get_contents('../data/user.json'), true);

?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Email</th>
            <th scope="col">Droit</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($listuser as $value) {
            echo '<tr>';
            echo '<th>' . $value['id'] . '</th>';
            echo '<th>' . $value['nom'] . '</th>';
            echo '<th>' . $value['prenom'] . '</th>';
            echo '<th>' . $value['email'] . '</th>';
            echo '<th>' . $value['right'] . '</th>';
            echo '<th><a href="?edituser=' . $value['id'] . '">Editer</a></th>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>