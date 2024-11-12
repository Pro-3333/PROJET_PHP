<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Salle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Lien vers votre fichier CSS -->

</head>
<body>
    <div class="form-container">
        <h1>Modifier la Salle</h1>
        <?php
            require_once('../../models/SalleService.php');
            $salleService = new SalleService();
            $salle = $salleService->getById($_GET['id']);
        ?>
        <form action="../../controllers/SalleCtrl.php" method="post">
            <div class="mb-3">
                <label for="nom">Nom de la salle</label>
                <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($salle['nom']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="capacite">Capacité de la salle</label>
                <input type="number" name="capacite" id="capacite" value="<?php echo htmlspecialchars($salle['capacite']); ?>" required>
            </div>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($salle['id']); ?>">
            <input type="hidden" name="action" value="modifier">
            <button type="submit" class="btn-submit">Modifier Salle</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
