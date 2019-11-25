<?php
include  "../config1.php";
class PromotionC {
		public function ajouterPromotion($promotion)
	{
		$solde=$promotion->get_solde();
		$datedebut=$promotion->get_dateDebut();
		$datefin=$promotion->get_date_fin();
		$nomproduit=$promotion->get_nom_produit();		
		$db= config::getConnexion();
		$req=$db->prepare("INSERT INTO promotion (solde ,datedebut ,datefin ,nomproduit ) values (:solde,STR_TO_DATE(:datedebut,'%d-%m-%Y') ,STR_TO_DATE(:datefin,'%d-%m-%Y') ,:nomproduit )");
		$req->bindParam(':solde',$solde);
		$req->bindParam(':datedebut',$datedebut);
		$req->bindParam(':datefin',$datefin);
		$req->bindParam(':nomproduit',$nomproduit);
		return $req->execute();
	}

	
	function afficherPromotion(){
		$sql="SElECT * From promotion";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
}
?>