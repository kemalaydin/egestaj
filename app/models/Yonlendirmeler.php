<?php
class Yonlendirmeler extends Eloquent{
	protected $table="yonlendirmeler";
	
public function YonlendirmeDanisman(){

	return $this -> HasMany('user','id','DanismanID');

}

public function YonlendirmeOgr(){

	return $this -> HasMany('user','id','OgrID');

}

public function YonlendirmeIsl(){

	return $this -> HasMany('user','id','IsletmeID');

}

public function YonlendirmeIlan(){

	return $this -> HasMany('Ilan','id','IlanID');

}




	
	
}