<?php
class Mesajlar extends Eloquent{

	protected $table="Mesajlasma";
	

	public function MesajAlanBilgisi(){
		return $this -> HasMany('Kullanicilar','id','Alan');
	}

	public function MesajGonderenBilgisi(){
		return $this -> HasMany('Kullanicilar','id','Gonderen');
	}

	public function scopeOkunmamislar($query){
		return $query->whereRaw('Alan = "'.Auth::user()->id.' " && Okunma = "0"');
	}
	public function scopeGelenler($query){
		return $query->whereRaw('Alan = '.Auth::user()->id);
	}
	public function scopeGonderilen($query){
		return $query->whereRaw('Gonderen ='.Auth::user()->id);
	}
}

?>    