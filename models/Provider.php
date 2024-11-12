<?php

class Provider {
    private $host = 'localhost';
    private $dbName = "scolarite";
    private $user = "root"; // Nom d'utilisateur pour MySQL (souvent "root" par défaut)
    private $password = ""; // Mot de passe MySQL (souvent vide par défaut sur les installations locales)

    public function getConnection() {
        try {
            $con = new PDO("mysql:host=$this->host;dbname=$this->dbName;charset=utf8", $this->user, $this->password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Pour gérer les erreurs PDO
            return $con;
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            return null;
        }
    }
}

// Exemple d'utilisation
$p = new Provider();
$p->getConnection();
