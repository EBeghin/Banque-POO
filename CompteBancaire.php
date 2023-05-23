<?php

// création de la classe avec ses attributs
class CompteBancaire {
    private string $_libelle;
    private float $_soldeInitial;
    private string $_deviseMonetaire;
    private Titulaire $_titulaire;

    // constructeur
    public function __construct(string $libelle, float $soldeInitial, string $deviseMonetaire, Titulaire $titulaire){
        $this->_libelle = $libelle;
        $this->_soldeInitial = $soldeInitial;
        $this->_deviseMonetaire = $deviseMonetaire;
        $this->_titulaire = $titulaire;
        $this->_titulaire->ajouterCompte($this);
    }

    // méthodes
    public function getInfoCompte() {
        echo $this->_libelle . "<br/>";
        echo $this->_soldeInitial . "<br/>";
        echo $this->_deviseMonetaire. " <br/>";
        echo $this->afficherNomPrenom(). "<br/><br/>";
    }

    public function afficherNomPrenom() {
        $nomPrenom = $this->getTitulaire()->getNom(). " " .$this->getTitulaire()->getPrenom();
        return $nomPrenom;
    }

    public function crediterCompte(float $montantCredit) {
        $this->_soldeInitial += $montantCredit;
        echo " Le montant de " . $montantCredit ." ". $this->_deviseMonetaire . " vient d'être credité sur votre compte.<br/>";
        echo " Le solde de votre compte est maintenant de " . $this->_soldeInitial ." ". $this->_deviseMonetaire . ".<br/><br/>";
        return $this->_soldeInitial;
    }

    public function debiterCompte(float $montantDebit) {
        if ($this->_soldeInitial >= $montantDebit) {
            $this->_soldeInitial -= $montantDebit;
            echo " Le montant de " . $montantDebit ." ". $this->_deviseMonetaire . " vient d'être débiter sur votre compte.<br/>";
            echo " Le solde de votre compte est maintenant de " . $this->_soldeInitial ." ". $this->_deviseMonetaire . ".<br/><br/>";
            return $this->_soldeInitial;
        } else {
            echo " Le montant de " . $montantDebit ." ". $this->_deviseMonetaire . " n'a pas pu être débité sur votre compte pour insuffisance de fond.<br/><br/>";
        }
    }

    public function virement(float $montantCredit, CompteBancaire $compteCible) {
        $this->debiterCompte($montantCredit);
        $compteCible->crediterCompte($montantCredit);
    }
   
    // getters/setters
    public function getLibelle() {
        return $this->_libelle;
    }
    public function setLibelle(string $libelle) {
        $this->_libelle = $libelle;
    }

    public function getSoldeInitial() {
        return $this->_soldeInitial;
    }
    public function setsoldeInitial(float $soldeInitial) {
        $this->_soldeInitial = $soldeInitial;
    }

    public function getDeviseMonetaire() {
        return $this->_deviseMonetaire;
    }
    public function setDeviseMonetaire(string $deviseMonetaire) {
        $this->_deviseMonetaire = $deviseMonetaire;
    }

    public function getTitulaire() {
        return $this->_titulaire;
    }
    public function setTitulaire(Titulaire $titulaire) {
        $this->_titulaire = $titulaire;
    }

    public function __toString() {
        return $this->_libelle;
    }
}