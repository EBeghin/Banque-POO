<h1>Banque</h1>

<p>Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des titulaires
et leurs comptes bancaires respectifs.</p>

<h2>Résultats</h2>

<?php

// importer les 2 classes
require 'Titulaire.php';
require 'CompteBancaire.php';

// instancier au moins 2 titulaires (avant les comptes) et 2 comptes par titulaire
$titulaire1 = new Titulaire("BEGHIN","Emmanuel","1976-10-22","Colmar");
$compte1 = new CompteBancaire("Compte courant", 1000, "EUR", $titulaire1);
$compte2 = new CompteBancaire("Livret A", 500, "EUR", $titulaire1);

$titulaire2 = new Titulaire("PERRIN", "Franck", "1977-09-01", "Haguenau");
$compte3 = new CompteBancaire("Compte courant", 500, "EUR", $titulaire2);
$compte4 = new CompteBancaire("Livret A", 200, "EUR", $titulaire2);

// utiliser toutes les méthodes des 2 classes
$titulaire1->getInfoTitulaire();
$compte1->getInfoCompte();
$compte2->getInfoCompte();

$compte1->crediterCompte(100);
$compte1->debiterCompte(2000);
$compte1->debiterCompte(500);
$compte1->virement(200, $compte2);

$titulaire2->getInfoTitulaire();
$compte3->getInfoCompte();
$compte4->getInfoCompte();