<div class="col-md-4">
  <h3>Bienvenue sur votre espace Admin</h3>
  <div class="btn-group-vertical w-100 mx-auto mt-3" role="group" aria-label="Vertical button group">
    <button type="button" class="btn btn-secondary">
      <a class="text-white text-decoration-none" href="">Tableau de bord</a>
    </button>

    <button type="button" class="btn btn-secondary">
      <a class="text-white text-decoration-none" href="create.html">Créer un article</a>
    </button>

    <button type="button" class="btn btn-secondary">
      <?php
      if (isset($_SESSION['isConnected']) && $_SESSION['isConnected'] == "success") {
        echo '<a class="nav-link text-white" href=' . __BASE_URI_ADMIN__ . '/category.php>Catégorie</a>';
      }
      ?>
    </button>

    <button type="button" class="btn btn-secondary">
      <?php
      echo '<a class="nav-link text-white" href=' . __BASE_URI__ . '/index.php>Retour à l\'accueil</a>';
      ?></a>
    </button>
    <button type="button" class="btn btn-secondary">
      <?php
      if (isset($_SESSION['isConnected']) && $_SESSION['isConnected'] == "success") {
        echo '<a class="nav-link text-white" href=' . __BASE_URI__ . '/index.php?session=deconnect>Se déconnecter</a>';
      }
      ?>
    </button>
  </div>
  </div>