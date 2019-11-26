<?PHP
include "../core/promotionC.php";
include "../entities/promotion.php";





//Partie3
    $promotion1C=new PromotionC();

    var_dump($promotion1C);
    /*die("fin ");*/

    $listOfPromotion = $promotion1C->getAllPromotion();
    echo '<pre>';
    var_dump($listOfPromotion);
echo '</pre>';
//    header('Location: basic_table.php');



//*/

?>
