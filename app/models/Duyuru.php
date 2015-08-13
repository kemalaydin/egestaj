<?php
	
	class Duyuru extends Eloquent{
		protected $table="duyuru";


	public function DuyuruGonderenBilgisi(){
		return $this->Hasmany('Kullanicilar','id','OlusturanID');


	}	

}