<?php
use \PDO;
class proprietaire{
    var $id;
    var $numpiece;
    var $nom;
    var $tel;
    private $bdd;

    private function getConnexion(){
        try{
            if($this->bdd == null){
                $this->bdd = new PDO('mysql:host=;dbname=bdlocation;charset=utf8', 'root', 'killrman007',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
            }       
        }
        catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }

    function addproprietaire()
    {
        $this->getConnexion();
        // requete a executer
       $sql = "insert into proprietaire 
                  values(null, :numpiece, :nom, :tel)";
        // preparation de la requete
        $req = $this->bdlocation->prepare($sql);
        //execution de la requete
        $data = $req->execute(
            array('numpiece'=>$this->numpiece   ,
                  'nom'=>$this->nom,
                  'tel'=>$this->tel
        ));
        return $data;
    }

    function allproprietaire()
    {
        $this->getConnexion();
        // requete a executer
       $sql = "select * from proprietaire";
        // preparation de la requete
        $donnees = $this->bdlocation->query($sql);
        return $donnees;
    }


}
