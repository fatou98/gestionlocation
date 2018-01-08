<?php namespace location\dao; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST"><h1>Ajouter un bien</h1>
        <table style="border:1px solid black;">
            <tr><th>nombien</th><td><input type="text" name="nomBien" required></td></tr>
            <tr><th>adresse</th><td><input type="text" name="adresse" required></td></tr>
            <tr><th>montantlocation</th><td><input type="number" name="montantLocation" required></td></tr>
            <tr><th>commisssion</th><td><input type="number" name="commission" required></td></tr>
            <tr><th>idtypebien</th><td><input type="text" name="idTypebien" required></td></tr>
            <tr><th>idproprietaire</th><td><input type="text" name="idProprietaire" required></td></tr>
            <tr><td><input type="submit" name="ajouter" value="ajouter"></td></tr>
        </table>
     </form>
     <?php
                require 'index.php'; 
                $prop = new BIen();
                extract($_POST);
               $prop->nomBien=$nomBien;
               $prop->adresse=$adresse;
               $prop->montantLocation=$montantLocation;
               $prop->commission=$commission;
               $prop->idTypebien=$idTypebien;
               $prop->idProprietaire=$idProprietaire;
                          
                 $prop->addBien();
                    header('location:listebien.php');
            
    ?>
</body>
</html>