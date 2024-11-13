<?php
session_start();
if (!isset($_SESSION['nom_utilisateur'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - BON BERGER</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Lien vers votre fichier CSS -->

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">EXELLENCE LEARNING</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="views/Etudiant/liste.php">Étudiants</a></li>
        <li class="nav-item"><a class="nav-link" href="views/Professeur/proliste.php">Professeurs</a></li>
        <li class="nav-item"><a class="nav-link" href="views/Salle/salleListe.php">Salles</a></li>
        <li class="nav-item"><a class="nav-link" href="views/Cour/courListe.php">Cours</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">DECONNEXION</a></li>

      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container mt-5">
    <h1>BIENVENUE A EXELLENCE LEARNING</h1>
    <h2>L'interface de gestion d'Exellence Learning est une plateforme intuitive et élégante, conçue pour faciliter la gestion des étudiants, professeurs, cours, et salles.</h2>
    
    <div class="row">
        <!-- Gestion des étudiants -->
        <div class="col-md-5 mb-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-graduation-cap"></i> Gestion des Étudiants
                </div>
                <div class="card-body">
                    <p>Ajoutez, modifiez, ou supprimez des étudiants dans le système.</p>
                    <a href="views/Etudiant/form.php" class="btn-custom">Ajoutez un étudiant</a>
                </div>
                <div class="card-body">
                    <a href="views/Etudiant/liste.php" class="btn-custom">Voir les étudiants</a>
                </div>
            </div>
        </div>
        <!-- Gestion des professeurs -->
        <div class="col-md-5 mb-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-chalkboard-teacher"></i> Gestion des Professeurs
                </div>
                <div class="card-body">
                    <p>Ajoutez, modifiez, ou supprimez des professeurs.</p>
                    <a href="views/Professeur/proform.php" class="btn-custom">Ajoutez les professeurs</a>
                </div>
                <div class="card-body">
                    <a href="views/Professeur/proliste.php" class="btn-custom">Voir les professeurs</a>
                </div>
            </div>
        </div>
        <div class="col-md-5 mb-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-door-open"></i> Gestion des Salles
                </div>
                <div class="card-body">
                    <p>Ajoutez, modifiez, ou supprimez des salles.</p>
                    <a href="views/Salle/formsalle.php" class="btn-custom">Ajoutez les Salles</a>
                </div>
                <div class="card-body">
                    <a href="views/Salle/salleliste.php" class="btn-custom">Voir les Salles</a>
                </div>
            </div>
        </div>
        <div class="col-md-5 mb-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-book-open"></i> Gestion des Cours
                </div>
                <div class="card-body">
                    <p>Ajoutez, modifiez, ou supprimez des Cours.</p>
                    <a href="views/Cour/courForm.php" class="btn-custom">Ajoutez les cours</a>
                </div>
                <div class="card-body">
                    <a href="views/Cour/courListe.php" class="btn-custom">Voir les cours</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
