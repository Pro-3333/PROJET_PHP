<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nom_utilisateur);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
        $_SESSION['nom_utilisateur'] = $user['nom_utilisateur'];
        header("Location: index.php");
        exit;
    } else {
        echo "<div class='error-msg'>Nom d'utilisateur ou mot de passe incorrect.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        /* Style de base pour la page */
        body {
            font-family: Arial, sans-serif;
            background: url('fond.png');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Effet glassmorphism */
        .glass-container {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
            padding: 30px;
            width: 320px;
            color: #2e7d32;
            text-align: center;
        }

        .glass-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Champs du formulaire */
        .glass-container input[type="text"],
        .glass-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.5);
        }

        /* Boutons stylés */
        .glass-container button {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            background-color: #66bb6a;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .glass-container button:hover {
            background-color: #4caf50;
        }

        /* Lien d'inscription en style de bouton */
        .glass-container a {
            color: white;
            text-decoration: none;
        }

        /* Message d'erreur */
        .error-msg {
            color: #d32f2f;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="glass-container">
        <h2>Connexion</h2>
        <form method="POST" action="">
            <input type="text" name="nom_utilisateur" placeholder="Nom d'utilisateur" required>
            <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
            <button><a href="register.php">S'INCRIRE</a></button>
        </form>
    </div>
</body>
</html>
