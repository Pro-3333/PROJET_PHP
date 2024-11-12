<?php
require_once('../models/SalleService.php');

$salleService = new SalleService();

// Vérifier si l'action est définie
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} elseif (isset($_POST['action'])) {
    $action = $_POST['action'];
}

// Rediriger vers le formulaire d'ajout de salle
if ($action == 'formsalle') {
    header('Location: ../views/Salle/formsalle.php');
    exit;
}

// Rediriger vers la liste des salles
if ($action == 'salleListe') {
    header('Location: ../views/Salle/salleListe.php');
    exit;
}

// Supprimer une salle
if ($action == 'delete') {
    // Récupération de l'identifiant de la salle
    $id = $_GET['id'];

    // Appel du modèle pour supprimer
    $salleService->delete($id);

    // Redirection avec un message de confirmation
    header('Location: ../views/Salle/salleListe.php?message=Salle supprimée');
    exit;
}

// Ajouter une nouvelle salle
if ($action == 'ajout') {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $capacite = $_POST['capacite'];

    // Appel du modèle pour ajouter la salle
    $salleService->add($nom, $capacite);

    // Redirection avec un message de confirmation
    header('Location: ../views/Salle/salleListe.php?message=Salle ajoutée');
    exit;
}

// Rediriger vers le formulaire de modification de salle
if ($action == 'editForm') {
    $id = $_GET['id'];
    header('Location: ../views/Salle/editSalle.php?id=' . $id);
    exit;
}

// Modifier une salle existante
if ($action == 'modifier') {
    // Récupération des données du formulaire
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $capacite = $_POST['capacite'];

    // Appel du modèle pour modifier la salle
    $salleService->edit($id, $nom, $capacite);

    // Redirection avec un message de confirmation
    header('Location: ../views/Salle/salleListe.php?message=Salle modifiée');
    exit;
}
?>
