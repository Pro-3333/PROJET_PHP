<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification professeur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Lien vers votre fichier CSS -->
</head>
<body>

    <!-- Barre de navigation (optionnelle) -->
    <div class="navbar">
        <h2>Modification du professeur</h2>
    </div>

    <div class="container d-flex justify-content-center align-items-center mt-5 pt-5" style="min-height: 80vh;">
        <div class="form-container">
            <h1 class="text-center">Formulaire de modification professeur</h1>

            <?php
                $matricule = $_GET['matricule'];
                require_once('../../models/ProfesseurService.php');
                $profService = new ProfesseurService();
                $professeurs = $profService->getByMatricule($matricule);
            ?>

            <form action="../../controllers/ProfesseurCtrl.php" method="post" class="form-group">
                <label for="id" class="form-label">MATRICULE</label>
                <input type="text" name="matricule" id="matricule" class="form-control" value="<?= $professeurs['matricule'] ?>" readonly required>

                <label for="nom" class="form-label">NOM</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?= $professeurs['nom'] ?>" required>

                <label for="prenom" class="form-label">PRENOM</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="<?= $professeurs['prenom'] ?>" required>

                <label for="sexe" class="form-label">SEXE</label>
                <select name="sexe" id="sexe" class="form-select" required>
                    <option value="">Veuillez choisir le sexe du professeur</option>
                    <option value="H" <?php if($professeurs['sexe'] == 'H') echo 'selected'; ?>>Homme</option>
                    <option value="F" <?php if($professeurs['sexe'] == 'F') echo 'selected'; ?>>Femme</option>
                </select>

                <label for="matiere" class="form-label">SPÉCIALITÉ</label>
                <input type="text" name="matiere" id="matiere" class="form-control" value="<?= $professeurs['matiere'] ?>" required>

                <label for="tel" class="form-label">TÉLÉPHONE</label>
                <input type="number" name="tel" id="tel" class="form-control" value="<?= $professeurs['tel'] ?>" required>

                <label for="ddn" class="form-label">DATE DE NAISSANCE</label>
                <input type="date" name="ddn" id="ddn" class="form-control" value="<?= $professeurs['ddn'] ?>" required>


                <input type="hidden" name="action" value="modifier">
                <button type="submit" class="btn btn-submit mt-3">MODIFIER</button>
            </form>
        </div>
       
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
