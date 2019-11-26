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
{return $this->qteprod;}


function getnomp()
{return $this->nomprod;
}

function getcatp()
{return $this->catprod;
}

function getphotop()
{return $this->photoprod;
}

function getdispop()
{return $this->dispoprod;
}



function set_refp($refprod)
{$this->refprod =$refprod;}

}

?>