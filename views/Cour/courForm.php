<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Cours</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Lien vers votre fichier CSS -->
</head>
<body>
    <div class="form-container">
        <h1>Ajouter un Cours</h1>
        <?php
            require_once('../../models/ProfesseurService.php');
            require_once('../../models/SalleService.php');
            $profService = new ProfesseurService();
            $salleService = new SalleService();
            $professeurs = $profService->getAll();
            $salles = $salleService->getAll();
        ?>
        <form action="../../controllers/CourCtrl.php" method="POST">
            <div class="mb-3">
                <label for="nom">Nom du cours</label>
                <input type="text" name="nom" id="nom" required>
            </div>
            <div class="mb-3">
                <label for="matricule">Professeur</label>
                <select name="matricule" id="professeur" required>
                    <option value="" disabled selected>Choisissez un professeur</option>
                    <?php foreach ($professeurs as $prof): ?>
                        <option value="<?php echo htmlspecialchars($prof['matricule']); ?>">
                            <?php echo htmlspecialchars($prof['matricule']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="id">Salle</label>
                <select name="id" id="salle" required>
                    <option value="" disabled selected>Choisissez une salle</option>
                    <?php foreach ($salles as $salle): ?>
                        <option value="<?php echo htmlspecialchars($salle['id']); ?>">
                            <?php echo htmlspecialchars($salle['nom']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="action" value="ajout">
            <button type="submit" class="btn-submit">Ajouter Cours</button>
            
        </form>
       
    </div>
    
      <div>
      <div class="container my-3">
            <a href="../../index.php" class="btn-retour">
                <i class="fas fa-arrow-left"></i> Retour à la page principale
            </a>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
