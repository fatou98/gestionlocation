<?php
namespace location\dao
  { 
       class Proprietaire 
    {
            public $idProprietaire;
            public $numPiece;
            public $nomProprietaire;
            public $tel;
            private $bdd;

    private function getConnexion(){
        try{
            if($this->bdd == null){
                $this->bdd =new PDO('mysql:host=;dbname=BDLocation;charset=utf8', 'root', 'bambilor',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
            }
        }
        catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }
    function findProprietaire()
            {
                 require 'findproprietaire.php';
                 extract($_POST);
                $this->getConnexion();
                 //requete a executer
                 $sql="select * from Proprietaire WHERE numPiece='$numPiece'";
                 // preparation de la requete
                $donnees=$this->bdd->query($sql);
                return $donnees;
            }
    function updateProprietaire()
                    {
                        require 'upadateproprietaire.php';
                        extract($_POST);
                        $this->getConnexion();
                        //requete a executer
                            $sql = "UPDATE Proprietaire SET tel= :tel WHERE numPiece='$numPiece'";
                                    // preparation de la requete
                        $donne=$this->bdd->prepare($sql);
                                // execute la requete
                               $donnees=$donne->execute(array(
                                    'tel'=>$this->tel)
                                );        
                    }
        function listeProprietaire()
                    {

                        $this->getConnexion();
                        // requete a executer
                        $sql = "select * from Proprietaire";
                        // preparation de la requete
                        $donnees = $this->bdd->query($sql);
                        return $donnees;
                    } 
        function addProprietaire()
                    {
                        $this->getConnexion();
                        // requete a executer
                    $sql = "INSERT INTO Proprietaire 
                                VALUES(NULL, :numPiece, :nomProprietaire, :tel)";
                        // preparation de la requete
                        $req = $this->bdd->prepare($sql);
                        //execution de la requete
                        $data = $req->execute(
                            array(
                                'numPiece'=>$this->numPiece,
                                'nomProprietaire'=>$this->nomProprietaire,
                                'tel'=>$this->tel
                        ));
                        return $data;
                    }
}
       
           class BIen
                        {
            public $id;
            public $nomBien;
            public $adresse;
            public $numPiece;
            public $montantLocation;
            public $commission;
            public $idTypebien;
            public $idProprietaire;
            public $etatBien;
            private $bdd;

             private function getConnexion(){
        try{
            if($this->bdd == null){
                $this->bdd =new PDO('mysql:host=;dbname=BDLocation;charset=utf8', 'root', 'bambilor',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
            }
        }
        catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }
            function addBien(){

                      
                         //on fait appel a la fonction findPropietaire de la class propietaire
                         $trouv = Proprietaire::findProprietaire($numPiece);
        if($exist==1)
        // requete a executer
       $sql = "INSERT INTO BIen 
                VALUES(null, :nomBien, :adresse, :montantLocation, :commission, NULL, NULL,:etatBien)";
        // preparation de la requete
        $req = $this->bdd->prepare($sql);
        //execution de la requete
        $data = $req->execute(
            array(
                'nomBien'=>$this->nomBien,
                  'adresse'=>$this->adresse,
                  'montantLocation'=>$this->montantLocation,
                  'commission'=>$this->commission,
                  'idTypebien'=>$this->idTypebien,
                  'idProprietaire'=>$this->idProprietaire,
                    'etatBien'=>$this->etatBien


        ));
        if ($exist==0) {
             $class = new Proprietaire();
                        $exist=$class->addProprietaire();
                $sql = "INSERT INTO BIen 
                VALUES(null, :nomBien, :adresse, :montantLocation, :commission, NULL, NULL,:etatBien)";
        // preparation de la requete
        $req = $this->bdd->prepare($sql);
        //execution de la requete
        $data = $req->execute(
            array(
                'nomBien'=>$this->nomBien,
                  'adresse'=>$this->adresse,
                  'montantLocation'=>$this->montantLocation,
                  'commission'=>$this->commission,
                  'idTypebien'=>$this->idTypebien,
                  'idProprietaire'=>$this->idProprietaire,
                    'etatBien'=>$this->etatBien


        ));

        }
         return $data;

    }
    function listeBien()
                    {

                        $this->getConnexion();
                        // requete a executer
                        $sql = "select * from BIen";
                        // preparation de la requete
                        $donnees = $this->bdd->query($sql);
                        return $donnees;
                    }
    function updateBien()
                    {
                        require 'upadatebien.php';
                        extract($_POST);
                        $this->getConnexion();
                        //requete a executer
                            $sql = "UPDATE Proprietaire SET tel= :tel, nomBien= :nomBien, adresse= :adresse, commission= :commission, idTypebien= :idTypebien , etatBien= :etatBien WHERE numPiece='$numPiece'";
                                    // preparation de la requete
                        $donne=$this->bdd->prepare($sql);
                                // execute la requete
                               $donnees=$donne->execute(array(
                                    'tel'=>$this->tel)
                                );        
                    }
    function findBien(){
                Proprietaire::$this->getConnexion();
                 $sql="SELECT * FROM  BIen  WHERE nomBien=='$nom' " ;
                 $donnees=$this->bdd->query($sql);
                 return $donnees;
                }
    function listerByType(){
               Propietaire::$this->getConnexion();
               $sql="SELECT * FROM  Bien  WHERE idTypeBien=='$idTypeBien' " ;
               $req=$this->bdd->query($sql);
               return $req;
           }
           function listeretat(){
               Propietaire::$this->getConnexion();
               $exist=0;
               $sql="SELECT etatBien FROM  BIen WHERE etatBien==1" ;
               $req=$this->bdd->query($sql);
               while($donee=$req->fetch()){
             if($etatBien==1){
                   $exist=1;
                   break;
                }}
                if($exist==1){ 
                       echo $donee; 
                     }
                else {
                    echo 'il n\'y a pas de bien disponible' ;
                }
                }
           }


}
?>
