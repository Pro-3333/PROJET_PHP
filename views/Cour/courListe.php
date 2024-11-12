<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- Lien vers votre fichier CSS -->
</head>
<body>



    <div class="container mt-5 pt-5 text-center">
        <h1 class="text-success text-center mb-3">Liste des Cours</h1>

        <div class="text-center mb-4">
            <a href="../../controllers/CourCtrl.php?action=courForm" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Ajouter un nouveau cours
            </a>
        </div>

     

        <?php
            require_once('../../models/CoursService.php');
            $coursService = new CoursService();
            $cours = $coursService->getAll();
        ?>

        <div class="table-container">
            <table class="table table-hover table-dark mx-auto">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOM DU COURS</th>
                        <th>PROFESSEUR</th>
                        <th>SALLE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cours as $cour): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cour['id_cours']); ?></td>
                            <td><?php echo htmlspecialchars($cour['nom']); ?></td>
                            <td><?php echo htmlspecialchars($cour['matricule']); ?></td>
                            <td><?php echo htmlspecialchars($cour['id']); ?></td>
                            <td>
                                <a href="../../controllers/CourCtrl.php?action=editForm&id=<?php echo $cour['id']; ?>" class="btn btn-action btn-edit">MODIFIER</a>
                                <a href="../../controllers/CourCtrl.php?action=courDelete&id=<?php echo $cour['id']; ?>" class="btn btn-action btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')">SUPPRIMER</a>
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
