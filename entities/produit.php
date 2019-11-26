<?php
class Produit{


	public $id ;
	public $prix ;
	public $quantitee ;

	public $nomproduit ;
	public $couleur ;
	
    
function __construct( $id , $prix ,$quantitee ,$nomproduit,$couleur)
{
$this->id=$id ;
$this->prix=$prix ;
$this->quantitee =$quantitee ;
$this->nomproduit =$nomproduit ;
 $this->couleur = $couleur;
}
function getidp()
{
	return $this->id;
}
function getprixp()
{return $this->prix;
}




function getqtep() 
{return $this->qquantitee;}


function getnomp()
{return $this->nomproduit;
}

function getcouleurp()
{return $this->couleur;
}



function set_idp($id)
{$this->id =$id;}

}

?>