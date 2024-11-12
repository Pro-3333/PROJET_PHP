<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Lien vers votre fichier CSS -->
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="form-container">
            <h1 class="text-center">Formulaire modification étudiant</h1>

            <?php
                $matricule = $_GET['matricule'];
                require_once('../../models/EtudiantService.php');
                $etService = new EtudiantService();
                $etudiant = $etService->getByMatricule($matricule);
            ?>

            <form action="../../controllers/EtudiantCtrl.php" method="post" class="form-group">
                <label for="matricule" class="form-label">MATRICULE</label>
                <input type="text" name="matricule" id="matricule" class="form-control" value="<?= $etudiant['matricule'] ?>" readonly required>

                <label for="nom" class="form-label">NOM</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?= $etudiant['nom'] ?>" required>

                <label for="prenom" class="form-label">PRENOM</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="<?= $etudiant['prenom'] ?>" required>

                <label for="sexe" class="form-label">SEXE</label>
                <select name="sexe" id="sexe" class="form-select" required>
                    <option value="">Veuillez choisir le sexe de l'étudiant</option>
                    <option value="H" <?php if($etudiant['sexe'] == 'H') echo 'selected'; ?>>Homme</option>
                    <option value="F" <?php if($etudiant['sexe'] == 'F') echo 'selected'; ?>>Femme</option>
                </select>

                <label for="tel" class="form-label">TÉLÉPHONE</label>
                <input type="number" name="tel" id="tel" class="form-control" value="<?= $etudiant['tel'] ?>" required>

                <label for="ddn" class="form-label">DATE DE NAISSANCE</label>
                <input type="date" name="ddn" id="ddn" class="form-control" value="<?= $etudiant['ddn'] ?>" required>

                <input type="hidden" name="action" value="modifier">
                <button type="submit" class="btn btn-submit mt-3">MODIFIER</button>
            </form>
        </div>
    </div>
    <div>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
