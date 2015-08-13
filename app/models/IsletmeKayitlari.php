<?php
class IsletmeKayitlari extends Eloquent{
	protected $table = "IsletmeTalepleri";

	public function OgrenciBilgisi(){
		return $this -> HasMany('user','id','OgrenciID');
	}

	public function IsletmeBilgisi(){
		return $this -> HasMany('user','IsletmeAdi','IsletmeAdi');
	}
}

?>