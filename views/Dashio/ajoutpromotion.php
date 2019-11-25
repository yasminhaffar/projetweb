<?PHP
include "../core/promotionC.php";
include "../entities/promotion.php";

if (isset($_POST['id']) and isset($_POST['dated']) and isset($_POST['datef']) and isset($_POST['solde']) and isset($_POST['nom'])){
$promotion1=new promotion($_POST['id'],$_POST['dated'],$_POST['datef'],$_POST['solde'],$_POST['nom']);
//Partie2

//var_dump($promotion1);


//Partie3
$promotion1C=new PromotionC();
$promotion1C->ajouterPromotion($promotion1);
  
}else{
  echo "vérifier les champs";
}
//*/

?>