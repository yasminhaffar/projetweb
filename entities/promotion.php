
<?php
class Promotion{
	private $id_promo;
	private $solde;
	private $date_debut;
	private $date_fin; 
	private $nom_produit; 

	public function __construct($id, $dated, $datef, $solde, $nom){
		$this->id_promo = $id;
		$this->solde = $solde;
		$this->nom_produit = $nom;
		$this->date_fin = $datef;
		$this->date_debut = $dated;

	}
	public function get_id_promo()
	{
		return $this->id_promo;
	}
	public function get_solde()
	{
		return $this->solde ;
	}
	public function get_dateDebut()
	{
		return $this->date_debut;
	}
	public function get_date_fin()
	{
		return $this->date_fin;
	}
	public function get_nom_produit()
	{
		return $this->nom_produit;
	}


	
	public function set_id_promo($id_promo)
	{
		$this->id_promo=$id_promo;
	}
	public function set_solde($solde)
	{
		$this->solde=$solde;
	}
	public function set_date_debut($date_debut)
	{
		$this->datedebut=$datedebut;
	}
	public function set_date_fin($date_fin)
	{
		$this->datefin=$datefin;
	}
	public function set_nom_produit($nom_produit)
	{
		$this->nom_produit=$nom_produit;
	}

	
} 
?>