<?php
include  "../config1.php";
class PromotionC {

	public function recupererPromotion($id_promo){
		$sql="SELECT * from promotion where id_promo=".$id_promo;
		$db = config::getConnexion();
		try{
		$stmt=$db->query($sql);
		$stmt->execute();
      	$res = $stmt->fetch();
		return $res;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
		public function ajouterPromotion($promotion)
	{
		$solde=$promotion->get_solde();
		$datedebut=$promotion->get_dateDebut();
		$datefin=$promotion->get_date_fin();
		$productId=$promotion->getProductId();	
		var_dump($promotion);	
		$db= config::getConnexion();
		$req=$db->prepare("INSERT INTO promotion (solde ,datedebut ,datefin ,product_id ) values (:solde,STR_TO_DATE(:datedebut,'%d-%m-%Y') ,STR_TO_DATE(:datefin,'%d-%m-%Y') ,:productId )");
		$req->bindParam(':solde',$solde);
		$req->bindParam(':datedebut',$datedebut);
		$req->bindParam(':datefin',$datefin);
		$req->bindParam(':productId',$productId);
		return $req->execute();
	}


	public function getPromotion($id_promo,$promotion)
		{
			$c = config7::getConnexion();
	   		$stmt = $c->prepare("SELECT * FROM promotion WHERE id_promo=:id_promo limit 1");
			$stmt->bindParam(':id_promo', $id_promo);
      		$stmt->execute();
      		$res = $stmt->fetchAll();
      foreach ($res as $row)
      {
		    	$promo->set_solde($row['solde']);
		    	$promo->set_date_debut($row['datedebut']);
				$promo->set_date_fin($row['datefin']);
				$promo->set_nom_produit($row['nomproduit']);
		    }
		    
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
		$data = $db->query("SELECT prom.id_promo, prom.solde ,prom.datedebut ,prom.datefin , prod.nomproduit, prod.prix FROM promotion prom, produits  prod  WHERE prod.id = prom.product_id ")
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

    	function supprimerPromotion($id_promo){
		$sql="DELETE FROM promotion where id_promo= :id_promo";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_promo',$id_promo);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
      
    }
    
		function modifierPromotion($promotion,$id_promo){
		$sql="UPDATE promotion SET id_promo=:idp, solde=:solde,datedebut=:datedebut,datefin=:datefin,nomproduit=:nomproduit WHERE id_promo=:id_promo";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idp=$promotion->get_id_promo();
        $solde=$promotion->get_solde();
        $dated=$promotion->get_dateDebut();
        $datef=$promotion->get_date_fin();
        $nom=$promotion->get_nom_produit();
		$datas = array(':idp'=>$idp, ':id_promo'=>$id_promo, ':solde'=>$solde,':dated'=>$datedebut,':datef'=>$datefin,':nom'=>$nomproduit);
		$req->bindValue(':idp',$idp);
		$req->bindValue(':id_promo',$id_promo);
		$req->bindValue(':solde',$solde);
		$req->bindValue(':dated',$datedebut);
		$req->bindValue(':datef',$datefin);
		$req->bindValue(':nom',$nomproduit);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}



?>
