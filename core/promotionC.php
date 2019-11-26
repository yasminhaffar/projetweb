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


	public function updatePromotion($promotion)
	{
		$solde=$promotion->get_solde();
		$datedebut=$promotion->get_dateDebut();
		$datefin=$promotion->get_date_fin();
		$nomproduit=$promotion->get_nom_produit();
		$idproduit=$promotion->get_id_promo();
		$db= config::getConnexion();
		$req=$db->prepare("UPDATE users SET solde=:solde, datedebut=:STR_TO_DATE(:datedebut,'%d-%m-%Y'), datefin=:STR_TO_DATE(:datefin,'%d-%m-%Y'), product_id= :product_id WHERE id_promo=:id ");
		$req->bindParam(':solde',$solde);
		$req->bindParam(':datedebut',$datedebut);
		$req->bindParam(':datefin',$datefin);
		$req->bindParam(':product_id',$idproduit);
		return $req->execute();
	}
	public function getAllPromotion(){
        $db= config::getConnexion();
//		class Sorter {};
		$data = $db->query("SELECT prom.solde ,prom.datedebut ,prom.datefin ,prom.nomproduit, prod.nomproduit FROM promotion prom, produits as prod  WHERE prod.idproduit = prom.id_promo ")
					->fetchAll(PDO::FETCH_OBJ);
		$listPromotion = [];
        foreach ($data as $row) {
        	$listPromotion[]= $row;
//            echo $row->nomproduit."<br />\n";
        }
        return $listPromotion;
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
