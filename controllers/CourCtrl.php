<?php
require_once('../models/CoursService.php');

$courService = new CoursService();

if (isset($_GET['action']))
    $action = $_GET['action'];
if (isset($_POST['action']))
    $action = $_POST['action'];

// Redirection vers le formulaire d'ajout d'un cours
if ($action == 'courForm') {
    Header('Location:../views/Cour/courForm.php');
}

// Redirection vers la liste des cours
if ($action == 'courListe') {
    Header('Location:../views/Cour/courListe.php');
}

// Suppression d'un cours
if ($action == 'courDelete') {
    // Récupération de l'identifiant du cours
    $id = $_GET['id'];

    // Appel du modèle
    $courService->delete($id);

    // Redirection vers la vue
    Header('Location:../views/Cour/courListe.php?message=Cours supprimé');
}

// Ajout d'un cours
if ($action == 'ajout') {
    // 1. Récupération des données
    $nom = $_POST['nom'];
    $matricule = $_POST['matricule'];
    $id = $_POST['id'];

    // 2. Appel du modèle
    $courService->add($nom,$matricule, $id);

    // 3. Redirection vers la liste des cours
    Header('Location:../views/Cour/courListe.php?message=Cours ajouté');
}

// Redirection vers le formulaire d'édition d'un cours
if ($action == 'editForm') {
    $id = $_GET['id'];
    Header('Location:../views/Cour/courEdit.php?id=' . $id);
}

// Modification des informations d'un cours
if ($action == 'modifier') {
    // 1. Récupération des données
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $id_professeur = $_POST['id_professeur'];
    $id_salle = $_POST['id_salle'];

    // 2. Appel du modèle
    $courService->edit($id, $nom, $id_professeur, $id_salle);

    // 3. Redirection vers la liste des cours
    Header('Location:../views/Cour/courListe.php?message=Cours modifié');
}
?>
