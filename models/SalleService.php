<?php
require_once('Provider.php');

class SalleService
{
    private $connexion;

    function __construct()
    {
        $p = new Provider();
        $this->connexion = $p->getconnection();
    }

    // Méthode pour ajouter une salle
    public function add($nom, $capacite)
    {
        $requete = 'INSERT INTO salle (nom, capacite) VALUES (:nom, :capacite)';
        $stat = $this->connexion->prepare($requete);
        $stat->execute([
            'nom' => $nom,
            'capacite' => $capacite
        ]);
    }

    // Méthode pour modifier une salle
    public function edit($id, $nom, $capacite)
    {
        $requete = 'UPDATE salle SET nom=:nom, capacite=:capacite WHERE id=:id';
        $stmt = $this->connexion->prepare($requete);
        $stmt->execute([
            'id' => $id,
            'nom' => $nom,
            'capacite' => $capacite
        ]);
    }

    // Méthode pour récupérer une salle par son ID
    public function getById($id)
    {
        $requete = "SELECT * FROM salle WHERE id=:id";
        $stmt = $this->connexion->prepare($requete);
        $stmt->execute(['id' => $id]);
        $salle = $stmt->fetch(PDO::FETCH_ASSOC);
        return $salle;
    }

    // Méthode pour récupérer toutes les salles
    public function getAll()
    {
        $requete = 'SELECT * FROM salle ORDER BY id DESC';
        $stmt = $this->connexion->query($requete);
        $salles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $salles;
    }

    // Méthode pour supprimer une salle par son ID
    public function delete($id)
    {
        $requete = 'DELETE FROM salle WHERE id=:id';
        $stmt = $this->connexion->prepare($requete);
        $stmt->execute(['id' => $id]);
    }
}
