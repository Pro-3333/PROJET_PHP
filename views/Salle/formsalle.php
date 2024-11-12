<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Salle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Lien vers votre fichier CSS -->

</head>
<body>
    <div class="form-container">
        <h1>Ajouter une Salle</h1>
        <form action="../../controllers/SalleCtrl.php" method="post">
            <div class="mb-3">
                <label for="nom">Nom de la salle</label>
                <input type="text" name="nom" id="nom" required>
            </div>
            <div class="mb-3">
                <label for="capacite">Capacité</label>
                <input type="number" name="capacite" id="capacite" required min="1">
            </div>
            <input type="hidden" name="action" value="ajout">
            <button type="submit" class="btn-submit">Ajouter Salle</button>
        </form>
        <div class="container my-3">
            <a href="../../index.php" class="btn-retour">
                <i class="fas fa-arrow-left"></i> Retour à la page principale
            </a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
