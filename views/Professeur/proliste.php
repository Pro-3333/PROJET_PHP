<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des professeurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Lien vers votre fichier CSS -->
</head>

<body>

    <!-- Barre de navigation (optionnelle) -->
    <div class="navbar">
        <h2>Gestion des professeurs</h2>
    </div>

    <div class="container mt-5 pt-5">
        <h1 class="text-center">Liste des professeurs</h1>

        <div class="text-center mb-3">
            <a href="../../controllers/ProfesseurCtrl.php?action=proform" class="btn btn-link"><i class="fas fa-user-plus"></i> Ajouter un professeur</a>
        </div>

        <!-- Message de retour -->
        <?php if (isset($_GET['message'])) : ?>
            <div class="message text-center">
                <?php echo $_GET['message']; ?>
            </div>
        <?php endif; ?>

        <!-- Tableau des professeurs -->
        <div class="table-container">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>MATRICULE</th>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>SEXE</th>
                        <th>SPECIALITE</th>
                        <th>TELEPHONE</th>
                        <th>DATE DE NAISSANCE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('../../models/ProfesseurService.php');
                        $profService = new ProfesseurService();
                        $professeurs = $profService->getAll();

                        foreach ($professeurs as $prof) :
                    ?>
                        <tr>
                            <td><?php echo $prof['matricule']; ?></td>
                            <td><?php echo $prof['nom']; ?></td>
                            <td><?php echo $prof['prenom']; ?></td>
                            <td><?php echo $prof['sexe']; ?></td>
                            <td><?php echo $prof['matiere']; ?></td>   
                            <td><?php echo $prof['tel']; ?></td>
                            <td><?php echo $prof['ddn']; ?></td>
                            <td>
                                <a href="../../controllers/ProfesseurCtrl.php?action=editForm&matricule=<?php echo $prof['matricule']; ?>" class="btn btn-action btn-edit">MODIFIER</a>
                                <a href="../../controllers/ProfesseurCtrl.php?action=prodelete&matricule=<?php echo $prof['matricule']; ?>" class="btn btn-action btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce professeur ?')">SUPPRIMER</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="container my-3">
    <a href="../../index.php" class="btn-retour">
        <i class="fas fa-arrow-left"></i> Retour à la page principale
    </a>
</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
