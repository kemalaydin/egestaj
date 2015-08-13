<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Ilan extends Eloquent{
	protected $table="Ilan";

	  use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
	
	public function IlanBolumBilgisi(){
		return $this -> HasMany('Bolumler','id','BolumID');
	}

	public function IlanIsBilgisi(){
		return $this -> HasMany('user','id','IsletmeID');
	}

	public function DonemBilgisi(){
		return $this -> HasMany('StajDonemleri','id','Donem');
	}

	public function scopeBolumeGoreCek($query){
		return $query->whereRaw('BolumID = "'.Auth::user()->Bolum.'" && Onay = "1"');
	}
	
	public function scopeIlanim($query){
		return $query->where("IsletmeID","=",Auth::user()->id);
	}


}