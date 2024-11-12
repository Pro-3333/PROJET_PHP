<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification du Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="form-container">
            <h1 class="text-center">Formulaire Modification Cours</h1>

            <?php
                $id_cours = $_GET['id'];
                require_once('../../models/CoursService.php');
                require_once('../../models/ProfesseurService.php');
                require_once('../../models/SalleService.php');
                
                $coursService = new CoursService();
                $profService = new ProfesseurService();
                $salleService = new SalleService();
                
                $cours = $coursService->getById($id_cours);
                $professeurs = $profService->getAll();
                $salles = $salleService->getAll();
            ?>

            <form action="../../controllers/CourCtrl.php" method="post" class="form-group">
                <label for="nom" class="form-label">Nom du Cours</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?= htmlspecialchars($cours['nom']) ?>" required>

                <label for="matricule" class="form-label">Professeur</label>
                <select name="matricule" id="matricule" class="form-select" required>
                    <option value="">Choisissez un professeur</option>
                    <?php foreach ($professeurs as $prof): ?>
                        <option value="<?= htmlspecialchars($prof['matricule']) ?>" <?= $prof['matricule'] == $cours['matricule'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($prof['matricule']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="id_salle" class="form-label">Salle</label>
                <select name="id_salle" id="id_salle" class="form-select" required>
                    <option value="">Choisissez une salle</option>
                    <?php foreach ($salles as $salle): ?>
                        <option value="<?= htmlspecialchars($salle['id']) ?>" <?= $salle['id'] == $cours['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($salle['id']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <input type="hidden" name="action" value="modifier">
                <input type="hidden" name="id_cours" value="<?= htmlspecialchars($cours['id_cours']) ?>">
                <button type="submit" class="btn btn-submit mt-3">MODIFIER</button>
            </form>
        </div>
    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
