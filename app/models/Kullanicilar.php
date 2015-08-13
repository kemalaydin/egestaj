<?php
class Kullanicilar extends Eloquent{
	protected $table="Kullanicilar";

	public function KullaniciBolumBilgisi(){ // burası neden var la ? user modeli var ya zaten i
		return $this->HasMany('Bolumler','id','Bolum');

	}	
	
}

?>