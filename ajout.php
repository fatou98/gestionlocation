<?php
  class BIen
                        {
            public $id;
            public $nomBien;
            public $adresse;
            public $montantLocation;
            public $commission;
            public $idTypebien;
            public $idProprietaire;
            public $etatBien;
            private $bdd;

            function addBien($numPiece){

                        Proprietaire::$this->getConnexion();
                         $exist = Proprietaire::findPropietaire($numPiece);
    
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
Proprietaire::addProprietaire($numPiece);
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
    function updateProprietaire()
                    {
                        require 'upadatebien.php';
                        extract($_POST);
                        $this->getConnexion();
                        //requete a executer
                            $sql = "UPDATE Proprietaire SET tel= :tel, nomBIen= :nomBien, tel= :tel tel= :tel WHERE numPiece='$numPiece'";
                                    // preparation de la requete
                        $donne=$this->bdd->prepare($sql);
                                // execute la requete
                               $donnees=$donne->execute(array(
                                    'tel'=>$this->tel)
                                );        
                    }

}
?>