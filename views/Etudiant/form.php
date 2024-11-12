<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Lien vers votre fichier CSS -->
</head>

<body>
    <div class="form-container">
        <h1>Ajouter un étudiant</h1>
        <form action="../../controllers/EtudiantCtrl.php" method="post">
            <input type="hidden" name="action" value="ajout">
            <div class="form-group">
                <label for="matricule"><i class="fas fa-id-card"></i> MATRICULE</label>
                <input type="text" class="form-control" id="matricule" name="matricule" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="nom"><i class="fas fa-user"></i> NOM</label>
                <input type="text" class="form-control" id="nom" name="nom" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="prenom"><i class="fas fa-user-tag"></i> PRENOM</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="sexe"><i class="fas fa-venus-mars"></i> SEXE</label>
                <select name="sexe" id="sexe" class="form-control" required>
                    <option value="">Choisir le sexe</option>
                    <option value="H">Homme</option>
                    <option value="F">Femme</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tel"><i class="fas fa-phone"></i> TEL</label>
                <input type="tel" class="form-control" id="tel" name="tel" required>
            </div>
            <div class="form-group">
                <label for="ddn"><i class="fas fa-calendar-alt"></i> DATE DE NAISSANCE</label>
                <input type="date" class="form-control" id="ddn" name="ddn" required>
            </div>
            <div class="text-center">
                <button type="reset" class="btn btn-reset">VIDER</button>
                <button type="submit" class="btn btn-submit">AJOUTER</button>
            </div>
        </form>
        <div class="text-center mt-3">
            <a href="../../controllers/EtudiantCtrl.php?action=liste" class="btn btn-link"><i class="fas fa-users"></i> Voir la liste des étudiants</a>
        </div>
        <div class="container my-3">
            <a href="../../index.php" class="btn-retour">
                <i class="fas fa-arrow-left"></i> Retour à la page principale
            </a>
        </div>
      </div>
      
        
    </div>
    
      <div>
     
   

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
