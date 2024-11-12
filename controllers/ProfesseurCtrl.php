<?php
require_once('../models/ProfesseurService.php');

$profService = new ProfesseurService();

if (isset($_GET['action']))
    $action = $_GET['action'];
if (isset($_POST['action']))
    $action = $_POST['action'];

// Redirection vers le formulaire d'ajout d'un professeur
if ($action == 'proform') {
    Header('Location:../views/Professeur/proform.php');
}

// Redirection vers la liste des professeurs
if ($action == 'proliste') {
    Header('Location:../views/Professeur/proliste.php');
}

// Suppression d'un professeur
if ($action == 'prodelete') {
    // Récupération des données
    $matricule = $_GET['matricule'];

    // Appel du modèle
    $profService->delete($matricule);

    // Redirection vers la vue
    Header('Location:../views/Professeur/proliste.php?message=Professeur supprimé');
}

// Ajout d'un professeur
if ($action == 'ajout') {
    // 1. Récupération des données
    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $ddn = $_POST['ddn'];
    $tel = $_POST['tel'];
    $matiere = $_POST['matiere'];

    // 2. Appel du modèle
    $profService->add($matricule, $nom, $prenom, $sexe, $tel, $ddn, $matiere);

    // 3. Redirection vers la liste des professeurs
    Header('Location:../views/Professeur/proliste.php?message=Professeur ajouté');
}

// Redirection vers le formulaire d'édition d'un professeur
if ($action == 'editForm') {
    $matricule = $_GET['matricule'];
    Header('Location:../views/Professeur/proedit.php?matricule=' . $matricule);
}

// Modification des informations d'un professeur
if ($action == 'modifier') {
    // 1. Récupération des données
    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $ddn = $_POST['ddn'];
    $tel = $_POST['tel'];
    $matiere = $_POST['matiere'];

    // 2. Appel du modèle
    $profService->edit($matricule, $nom, $prenom, $sexe, $tel, $ddn, $matiere);

    // 3. Redirection vers la liste des professeurs
    Header('Location:../views/Professeur/proliste.php?message=Professeur modifié');
}
?>
