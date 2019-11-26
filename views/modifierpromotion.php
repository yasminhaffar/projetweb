<HTML>
<head>
</head>
<body>
<?PHP
include "../entities/promotion.php";
include "../core/promotionC.php";
if (isset($_GET['id'])){
	$promotionC=new PromotionC();
    $result=$promotionC->recupererPromotion($_GET['id']);
	foreach($result as $row){
		$id=$row['id_promo'];
		$dated=$row['datedebut'];
		$datef=$row['datefin'];
		$solde=$row['solde'];
		$nom=$row['nomproduit'];
?>
<form method="POST">
<table>
<caption>Modifier Promotion</caption>
<tr>
<td>ID</td>
<td><input type="number" name="id" value="<?PHP echo $id ?>"></td>
</tr>
<tr>
<td>Nom</td>
<td><input type="text" name="solde" value="<?PHP echo $solde ?>"></td>
</tr>
<tr>
<td>Prenom</td>
<td><input type="date" name="datedebut" value="<?PHP echo $datedebut ?>"></td>
</tr>
<tr>
<td>nb heures</td>
<td><input type="date" name="datefin" value="<?PHP echo $datefin?>"></td>
</tr>
<tr>
<td>tarif horaire</td>
<td><input type="text" name="nom" value="<?PHP echo $nomproduit ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['id']) and isset($_POST['solde']) and isset($_POST['datedebut']) and isset($_POST['datefin']) and isset($_POST['nom'])){
	$promotion=new promotion($_POST['id'],$_POST['solde'],$_POST['datedebut'],$_POST['datefin'],$_POST['nom']);
	$promotionC->modifierPromotion($promotion,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: basic_table.php');
}
?>
</body>
</HTMl>