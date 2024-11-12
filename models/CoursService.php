<?php
require_once('Provider.php');

class CoursService
{
    private $connexion;

    function __construct()
    {
        $p = new Provider();
        $this->connexion = $p->getconnection();
    }

    // Méthode pour ajouter un cours
    public function add($nom, $matricule, $id)
    {
        $requete = 'INSERT INTO cour (nom, matricule, id) VALUES (:nom, :matricule, :id)';
        $stat = $this->connexion->prepare($requete);
        $stat->execute([
            'nom' => $nom,
            'matricule' => $matricule,
            'id' => $id
        ]);
    }

    // Méthode pour modifier un cours
    public function edit($id, $nom, $professeur_id, $salle_id)
    {
        $requete = 'UPDATE cour SET nom=:nom, professeur_id=:professeur_id, salle_id=:salle_id WHERE id=:id';
        $stmt = $this->connexion->prepare($requete);
        $stmt->execute([
            'id' => $id,
            'nom' => $nom,
            'professeur_id' => $professeur_id,
            'salle_id' => $salle_id
        ]);
    }

    // Méthode pour récupérer un cours par son ID
    public function getById($id)
    {
        $requete = "SELECT * FROM cour WHERE id=:id";
        $stmt = $this->connexion->prepare($requete);
        $stmt->execute(['id' => $id]);
        $cours = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cours;
    }

    // Méthode pour récupérer tous les cours
    public function getAll()
    {
        $requete = 'SELECT * FROM cour ORDER BY id DESC';
        $stmt = $this->connexion->query($requete);
        $cours = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cours;
    }

    // Méthode pour supprimer un cours par son ID
    public function delete($id)
    {
        $requete = 'DELETE FROM cour WHERE id=:id';
        $stmt = $this->connexion->prepare($requete);
        $stmt->execute(['id' => $id]);
    }
}
