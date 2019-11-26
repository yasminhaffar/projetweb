<?PHP
include "../core/promotionC.php";
include "../entities/promotion.php";
var_dump($_POST);
if (isset($_POST['dated']) and isset($_POST['datef']) and isset($_POST['solde']) and isset($_POST['product_id'])){
$promotion=new promotion($_POST['dated'],$_POST['datef'],$_POST['solde'],$_POST['product_id']);
var_dump($promotion);
echo'a';
//Partie2
//Partie3
$promotion1C=new PromotionC();
var_dump($promotion1C);
/*die("fin ");*/
$promotion1C->ajouterPromotion($promotion);
header('Location: list-off-promotion.php');
  
}else{
  echo "vérifier les champs";
}
//*/
?>