<?php
require_once('Provider.php');

class ProfesseurService
{
    private $connexion;

    function __construct()
    {
        $p = new Provider();
        $this->connexion = $p->getconnection();
    }

    // Méthode pour ajouter un professeur
    public function add($matricule, $nom, $prenom, $sexe, $tel, $ddn, $matiere)
    {
        $requete = 'insert into professeurs (matricule, nom, prenom, sexe, tel, ddn, matiere) 
                    values (:mat, :nm, :pr, :sx, :tl, :dn, :mt)';
        $stat = $this->connexion->prepare($requete);
        $rs = $stat->execute([
            'mat' => $matricule,
            'nm' => $nom,
            'pr' => $prenom,
            'sx' => $sexe,
            'tl' => $tel,
            'dn' => $ddn,
            'mt' => $matiere
        ]);
    }

    // Méthode pour modifier un professeur
    public function edit($matricule, $nom, $prenom, $sexe, $tel, $ddn, $matiere)
    {
        $requete = 'update professeurs set nom=:nm, prenom=:pr, sexe=:sx, tel=:t, ddn=:d, matiere=:mt 
                    where matricule=:m';
        $stmt = $this->connexion->prepare($requete);
        $result = $stmt->execute([
            'nm' => $nom,
            'pr' => $prenom,
            'sx' => $sexe,
            't' => $tel,
            'd' => $ddn,
            'mt' => $matiere,
            'm' => $matricule
        ]);
    }

    // Méthode pour récupérer un professeur par matricule
    public function getByMatricule($matricule)
    {
        $requete = "select * from professeurs where matricule=:mat";
        $stmt = $this->connexion->prepare($requete);
        $res = $stmt->execute([
            'mat' => $matricule
        ]);
        $professeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $professeurs[0];
    }

    // Méthode pour récupérer tous les professeurs
    public function getAll()
    {
        $requete = 'select * from professeurs order by matricule desc';
        $st = $this->connexion->query($requete);
        $professeurs = $st->fetchAll(PDO::FETCH_ASSOC);
        return $professeurs;
    }

    // Méthode pour supprimer un professeur
    public function delete($matricule)
    {
        $requete = 'delete from professeurs where matricule=:m';
        $sta = $this->connexion->prepare($requete);
        $res = $sta->execute([
            'm' => $matricule
        ]);
    }
}
?>
