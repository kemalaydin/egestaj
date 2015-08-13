<?php
class StajGiris extends Eloquent{
	protected $table="StajGiris";
	
public function StajGirisOgrBilgisi(){

	return $this -> HasMany('Kullanicilar','id','OgrID');

}
public function StajGirisIsBilgisi(){

	return $this -> HasMany('Kullanicilar','id','IsletmeID');
	
}
public function StajGirisHocaBilgisi(){

	return $this -> HasMany('Kullanicilar','id','OgretmenID');
	
}

}

?>