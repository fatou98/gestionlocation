<?php
include 'Proprietaire_class.php';
$prop = new proprietaire();
extract($_POST);
$prop->numpiece = $numpiece;
$prop->nom = $nom;
$prop->tel = $tel;

$prop->addproprietaire();
header('location:viewproprietaire.php');
