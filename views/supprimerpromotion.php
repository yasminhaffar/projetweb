<?PHP
include "../core/promotionC.php";
$promotionC=new PromotionC();
if (isset($_POST["id"])){
    $promotionC->supprimerPromotion($_POST["id"]);
    header('Location: basic_table.php');
}

?>