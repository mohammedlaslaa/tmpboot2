  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
          <a class="navbar-brand" href="index.php">Start Bootstrap</a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="#">Home
                          <!-- <span class="sr-only">(current)</span> -->
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Services</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Contact</a>
                  </li>
                  <li class="nav-item">
                      <?php
                        if (isset($_SESSION['isConnected']) && $_SESSION['isConnected'] == "success") {
                            echo '<a class="nav-link text-danger" href=' . __BASE_URI__ . '/index.php?session=deconnect>Se déconnecter</a>';
                        }
                        ?>
                  </li>
                  <li class="nav-item">
                      <?php

                        if (isset($_SESSION['user_right']) && $_SESSION['user_right'] >= ADMIN) {
                            echo '<a class="nav-link text-primary" href=' . __BASE_URI_ADMIN__ . '/index.php>Admin</a>';
                        }
                        
                        ?>
                  </li>
              </ul>
          </div>
      </div>
  </nav>