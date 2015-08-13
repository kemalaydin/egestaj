<?php
class Notlar extends Eloquent{
	protected $table="Notlar";

	public function OgrenciBilgisi(){
		return $this -> HasMany('user','id','OgrenciID');
	}

	public function DanismanBilgisi(){
		return $this -> HasMany('user','id','DanismanID');
	}

	public function BolumBilgisi(){
		return $this -> HasMany('Bolumler','id','BolumID');
	}

}

?>