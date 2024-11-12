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
    <style>
        /* Style minimaliste et espacé */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            position: relative;
            
        }

        /* Image de fond avec effet flou */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('image.png') no-repeat center center fixed;
            background-size: cover;
            z-index: -1;
            filter: blur(8px); /* Floute l'image de fond */
            transform: scale(1.05); /* Agrandit légèrement pour éviter les bords flous */
            
        
        }
        /* Navbar minimaliste */
        .navbar {
            background-color: #fff;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 10;
        }
        .navbar-brand {
            font-size: 1.5rem;
            color: #333;
        }
        .navbar-nav .nav-item .nav-link {
            color: #555;
            font-size: 1rem;
            margin-right: 15px;
        }
        .navbar-nav .nav-item .nav-link:hover {
            color: #007bff;
        }

        /* Titre principal */
        h1 {
            font-size: 2.2rem;
            font-weight: bold;
            color: #0D47A1;
            margin-top: 100px;
            margin-bottom: 40px;
        }
        h2{
            font-size: 2.2rem;
            font-weight: bold;
            color:444444;
            margin-top: 100px;
            margin-bottom: 40px;
        }

        /* Disposition des cartes */
        .container {
            max-width: 1200px;
            padding: 20px;
        }
        .row {
            gap: 20px;
        }

        /* Style des cartes avec effet 3D */
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            font-size: 1.3rem;
            color: #007bff;
            background-color: transparent;
            text-align: center;
            border-bottom: none;
        }

        .card-body {
            padding: 20px;
            text-align: center;
            font-size: 1rem;
            color: #555;
            
        }
        .card-footer {
            color: #007bff;
            background-color: transparent;
            text-align: center;
        }


        /* Bouton personnalisé */
        .btn-custom {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.3rem;
            }
            .navbar-nav {
                flex-direction: column;
                text-align: center;
            }
            .navbar-nav .nav-item {
                margin-bottom: 10px;
            }
            h1 {
                font-size: 1.8rem;
            }
        }
    </style>
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
