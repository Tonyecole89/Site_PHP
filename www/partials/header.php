<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                  </li>
                  <li class="nav-item">
                  <?php if (!isset($_SESSION["utilisateur"])) { ?>
                    <a class="nav-link" href="register.php">Inscription</a>
                  </li>
                  <?php } ?>
                  <li class="nav-item">
                  <?php if (!isset($_SESSION["utilisateur"])) { ?>
                    <a class="nav-link" href="login.php">Connexion</a>
                  </li>
                  <?php } ?>
                  <li class="nav-item">
                  <?php if (isset($_SESSION["utilisateur"])) { ?>
                    <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                  </li>
                  <?php } ?>
                </ul>
              </div>
              <?php if ($_SESSION != []) { ?>
                <div>Bienvenue <?= $_SESSION["utilisateur"][0]["prenom"] ?></div>
              <?php } ?>
            </div>
          </nav>
    </header>