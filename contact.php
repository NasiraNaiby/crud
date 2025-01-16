<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                <div class="logo">
                    <img src="images/jarditou_logo.jpg" alt="logo">
                </div>
                </div>
                <div class="col text-end">
                <div class="header-title ">
                    <h1>Tout le Jardin</h1>
                </div>
                </div>
            </div>
        </div>
    </header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Jarditou.com</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tableau.php">Tableau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="recherche" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="container-fluid header-image">
    <img src="images/promotion.jpg" alt="">
</div>

<section class="container-fluid">
    <div class="row">
    <div class="p-3">
    <h3>* Ces zones sont obligatoir</h3>
    </div>
    <form class="p-2">
        <div class="mb-3">
            <label for="Nom" class="form-label">Nom*</label>
            <input type="text" class="form-control" id="Nom">
        </div>
        <div class="mb-3">
            <label for="Prenom" class="form-label">Prenom*</label>
            <input type="text" class="form-control" id="Prenom">
        </div>
        <div class="mb-3">

            <input type="radio" id="m" name="gender" value="musculin">
           <label for="m">musculin</label>
            <input type="radio" id="fem" name="gender" value="féminin">
             <label for="fem">Féminin</label>
        </div>
        <div class="mb-3">
            <label for="naissance" class="form-label">Date de naissance*</label>
            <input type="date" class="form-control" id="Date de naissance">
        </div>
        <div class="mb-3">
            <label for="CP" class="form-label">Code Postal*</label>
            <input type="text" class="form-control" id="CP">
        </div>
        <div class="mb-3">
            <label for="Address" class="form-label">Addresse</label>
            <input type="text" class="form-control" id="Address">
        </div>
        <div class="mb-3">
            <label for="Ville" class="form-label">Ville</label>
            <input type="text" class="form-control" id="Ville">
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" placeholder="dave.loper@afpa.fr">
        </div>
        <div class="mb-3">
           <h1>Votre Demande</h1>
        </div>
        <div class="mb-3">
            <label for="sujet" class="form-label">Sujet</label>
            <input type="text" class="form-control" id="sujet" placeholder=" Veuillez sélectionner un sujet"/>
        </div>
        <div class="mb-3">
            <label for="question" class="form-label">Votre question*</label>
            <textarea name="question" id="question" style="width: 100%;"></textarea>
        </div>
        
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="Check">
            <label class="form-check-label" for="Check">J'accepte le traitement informatique de formulaire.</label>
        </div>
        <button type="submit" class="btn btn-dark">Envoyer</button>
        <button type="reset" class="btn btn-dark">Annuler</button>
    </form>

    </div>
</section>

<footer>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link ms-3" href="#">mentions légales  </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">horairs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">plan du site </a>
      </li>
    </ul>
  </div>
</nav>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>