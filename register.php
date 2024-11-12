<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nom_utilisateur, $email, $mot_de_passe);

    if ($stmt->execute()) {
        echo "Inscription réussie. <a href='login.php'>Connectez-vous</a>";
    } else {
        echo "Erreur : " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form method="POST" action="">
        Nom d'utilisateur: <input type="text" name="nom_utilisateur" required><br>
        Email: <input type="email" name="email" required><br>
        Mot de passe: <input type="password" name="mot_de_passe" required><br>
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
