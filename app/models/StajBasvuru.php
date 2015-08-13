<?php


class StajBasvuru extends Eloquent{
	protected $table="StajBasvuru";

	public function StajBasvuruOgrBilgisi(){
		return $this -> HasMany('Kullanicilar','id','OgrenciID');
	}
	public function StajBasvuruIsBilgisi(){
		return $this -> HasMany('Kullanicilar','id','IsletmeID');
	}
	public function StajBasvuruHocaBilgisi(){
		return $this -> HasMany('Kullanicilar','id','OgretmenID');
	}
	public function StajBasvuruIlanBilgisi(){
		return $this -> HasMany('Ilan','id','IlanID');
	}
	public function scopeStajBilgisi($query){
		return $query->whereRaw('OgrenciID = '.Auth::user()->id);
	}
	public function scopeStajTercih($query){
		return $query->whereRaw('OgretmenOnay = 0 and OgretmenID ='.Auth::user()->id);
	}
	public function scopeIsletmeSecenler($query){
		return $query->whereRaw('IsletmeOnay = 0 and IsletmeID ='.Auth::user()->id);
	}
	public function scopeAdminStajyerler($query){
		return $query->whereRaw('IsletmeOnay = 1 and IsletmeOnay = 1 and AdminOnay = 0');
	}
	public function scopeAdminTercihStajyerler($query){
		return $query->whereRaw('IsletmeOnay = 1 and IsletmeOnay = 1 and OgrenciOnay = 1 and AdminOnay = 0');
	}
	public function scopeIsletmeStajyerleri($query){
		return $query->whereRaw('IsletmeOnay = 1 and IsletmeOnay = 1 and OgrenciOnay = 1 and AdminOnay = 1 and IsletmeID ='.Auth::user()->id);
	}
	

}

?>