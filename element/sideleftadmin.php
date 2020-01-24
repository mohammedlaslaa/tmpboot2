<div class="col-md-4 p-0">
  <div class="btn-group-vertical w-100 mx-auto" role="group" aria-label="Vertical button group">

    <button type="button" class="btn btn-secondary">
      <?php
      echo '<a class="text-white text-decoration-none" href=' . __BASE_URI_ADMIN__ . '/index.php>Tableau de bord</a>';
      ?>
    </button>

    <button type="button" class="btn btn-secondary">
      <?php
      echo '<a class="text-white text-decoration-none" href=' . __BASE_URI_ADMIN__ . '/article.php>Article</a>';
      ?>
    </button>
    <button type="button" class="btn btn-secondary">
      <?php
      echo '<a class="text-white text-decoration-none" href=' . __BASE_URI_ADMIN__ . '/create_article.php>Créer un article</a>';
      ?>
    </button>

    <button type="button" class="btn btn-secondary">
      <?php
      echo '<a class="nav-link text-white" href=' . __BASE_URI_ADMIN__ . '/category.php>Catégorie</a>';
      ?>
    </button>
    <button type="button" class="btn btn-secondary">
      <?php
      echo '<a class="nav-link text-white" href=' . __BASE_URI_ADMIN__ . '/addcategory.php>Ajout catégorie</a>';
      ?>
    </button>
    <?php

    if (isset($_SESSION['user_right']) && $_SESSION['user_right'] >= 80) {
      echo '<button type="button" class="btn btn-secondary">';
      echo '<a class="nav-link text-white" href="../admin/index.php?id=user">Gérer les utilisateurs</a>';
      echo '</button>';
    }

    ?>

    <button type="button" class="btn btn-secondary">
      <?php
      echo '<a class="nav-link text-white" href=' . __BASE_URI__ . '/index.php>Retour à l\'accueil</a>';
      ?>
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