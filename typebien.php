<?php
namespace location\dao;
use \PDO;
 class Typebien{
    var $nom;
    private $bdd;

    private function getConnexion()
    {
        try
        {
            if($this->bdd == null)
            {
                $this->bdd = new PDO('mysql:host=;dbname=BDhocasion;charset=utf8', 'root', 'passer',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
            }       
        }
        catch(Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function add()
    {
        $this->getConnexion();
        // requete a executer
        $sql = "INSERT INTO typebien values(null, :nom)";
        // preparation de la requete
        $req = $this->bdd->prepare($sql);
        
        //execution de la requete
        $data = $req->execute(array('nom'=>$this->nom));
        return $data;
    }
    public function lister()
    {
        $this->getConnexion();
        // requete a executer
        $sql = "SELECT * FROM typebien";
        // preparation de la requete
        $donnees = $this->bdd->query($sql);
        return $donnees;
    }
    public function findbyid($ID)
    {
        $this->getConnexion();
        // requete a executer
        $sql = "SELECT * FROM typebien WHERE id='".$ID."'";
        // preparation de la requete
        $donnees = $this->bdd->query($sql);
        return $donnees;
    }
 }
?>