<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Connexion</h3>

            </div>
            <div class="card-body">
                <form method="post">
                    <?php
                    if (isset($_GET['error']) && $_GET['error'] == "display") {
                        echo "<div><p>Email ou mot de passe incorrect</p></div>";
                    }
                    ?>

                    <div class="input-group form-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>

                        <input type="email" class="form-control" placeholder="email" name="email" value="<?php if (isset($_POST['email'])) {
                                                                                                                echo htmlspecialchars($_POST['email']);
                                                                                                            } ?>">
                    </div>
                    <?php
                    ?>
                    <div class="input-group form-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" name='password' placeholder="password" value="<?php if (isset($_POST['password'])) {
                                                                                                                        echo htmlspecialchars($_POST['password']);
                                                                                                                    } ?>">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" value="Login" class="btn btn-primary login_btn text-white">Connexion</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <div class="d-flex justify-content-center mx-auto">
                    <a href="inscription.php">S'inscrire</a>
                </div>
            </div>
        </div>
    </div>
</div>