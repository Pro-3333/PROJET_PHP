<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Salles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Lien vers votre fichier CSS -->
</head>
<body>

    <div class="container mt-5 pt-5 text-center">
        <h1>Liste des Salles</h1>

        <div class="mb-3">
            <a href="../../controllers/SalleCtrl.php?action=form" class="btn btn-link"><i class="fas fa-plus-circle"></i> Ajouter une salle</a>
        </div>

        <?php if(isset($_GET['message'])): ?>
            <div class="message text-center">
                <?php echo $_GET['message']; ?>
            </div>
        <?php endif; ?>

        <?php
            require_once('../../models/SalleService.php');
            $salleService = new SalleService();
            $salles = $salleService->getAll();
        ?>

        <div class="table-container">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOM</th>
                        <th>CAPACITÉ</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($salles as $salle): ?>
                        <tr>
                            <td><?php echo $salle['id']; ?></td>
                            <td><?php echo $salle['nom']; ?></td>
                            <td><?php echo $salle['capacite']; ?></td>
                            <td>
                                <a href="../../controllers/SalleCtrl.php?action=editForm&id=<?php echo $salle['id']; ?>" class="btn btn-action btn-edit">MODIFIER</a>
                                <a href="../../controllers/SalleCtrl.php?action=delete&id=<?php echo $salle['id']; ?>" class="btn btn-action btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette salle ?')">SUPPRIMER</a>
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
