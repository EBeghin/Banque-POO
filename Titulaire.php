<?php

// création de la classe avec ses attributs
class Titulaire
{
    private string $_nom;
    private string $_prenom;
    private DateTime $_dateNaissance;
    private string $_ville;
    private array $_comptes;

    // constructeur
    public function __construct(string $nom, string $prenom, string $dateNaissance, string $ville){
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_dateNaissance = new DateTime ($dateNaissance);
        $this->_ville = $ville;
        $this->_comptes = [];
    }

    // méthodes
    public function ajouterCompte(CompteBancaire $compte) {
        $this->_comptes[] = $compte;
        // equivalent de : array_push($this->_comptes, $compte);
    }

    public function getAge() {
        $dateDuJour = new DateTime("now");
        $interval = $dateDuJour->diff($this->_dateNaissance);
        return $interval->y;
    }

    public function getInfoTitulaire() {
        echo $this->_nom . "<br/>";
        echo $this->_prenom . "<br/>";
        echo $this->getAge() . " ans <br/>";
        echo $this->_ville . "<br/>";
        echo $this->afficherComptes() . "<br/>";
    }

    public function afficherComptes() {
        $result = "";
        foreach ($this->_comptes as $compte) {
            // $result .= $compte->getLibelle() . "<br/>";
            $result .= $compte . "<br/>"; //récupère le toString de $compte
        }
        return $result;
    }

    // getters/setters
    public function getNom() {
        return $this->_nom;
    }
    public function setNom(string $nom) {
        $this->_nom = $nom;
    }

    public function getPrenom() {
        return $this->_prenom;
    }
    public function setPrenom(string $prenom) {
        $this->_prenom = $prenom;
    }

    public function getDateNaissance() {
        return $this->_dateNaissance;
    }
    public function setDateNaissance(string $dateNaissance) {
        $this->_dateNaissance = $dateNaissance;
    }

    public function getVille() {
        return $this->_ville;
    }
    public function setVille(string $ville) {
        $this->_ville = $ville;
    }

    public function getComptes() {
        return $this->_comptes;
    }
    public function setComptes(array $comptes) {
        $this->_comptes = $comptes;
    }
}
