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
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form method="POST" action="">
        Nom d'utilisateur: <input type="text" name="nom_utilisateur" required><br>
        Mot de passe: <input type="password" name="mot_de_passe" required><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
