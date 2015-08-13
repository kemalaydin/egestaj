<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	protected $table = 'Kullanicilar';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function BolumBilgisi(){
		return $this->HasMany('Bolumler','id','Bolum');
	}	

	public function StajyeriBilgisi(){
		return $this->HasMany('Kullanicilar','id','IsletmeID');
	}

	public function DanismanBilgisi(){
		return $this->HasMany('Kullanicilar','id','DanismanID');
	}

	public function HizmetBilgisi(){
		return $this->HasMany('Bolumler','id','HizmetAlani');
	}

	public function SgkBilgisi(){
		return $this->HasMany('SGKDurumlari','id','SGK');
	}

	public function FakulteBilgisi(){
		return $this->HasMany('Fakulteler','id','FakulteID');
	}

	public function scopeOgrenciler($query){
		return $query->whereRaw('Yetki = 1 and Onay = 1 and Bolum = '.Auth::user()->Bolum);
	}

	public function scopeIsletmeTerOgrenciler($query)
	{
		return $query->whereRaw('Yetki = 1 and Onay = 1 and Bolum = '.Auth::user()->HizmetAlani);
	}

	public function scopeOnayOgrenciler($query){
		return $query->whereRaw('Onay = 0  and Yetki = 1 and Bolum ='.Auth::user()->Bolum);
	}

	public function scopeIsletmeler($query){
		return $query->where('Yetki','=','2');
	}

	public function scopeAdminOnayOgrenci($query){
		return $query->whereRaw('Yetki = 1 and Onay = 0 ');
	}

	public function scopeAdminOnayIsletme($query){
		return $query->whereRaw('Yetki = 2 and Onay = 0 ');
	}

	public function scopeAdminOgrenciler($query){
		return $query->whereRaw('Yetki = 1 and FakulteID = "'.Auth::user()->FakulteID.'" and Onay = 1');
	}

	public function scopeAdminIsletmeler($query){
		return $query->whereRaw('Yetki = 2 and Onay = 1');
	}

	public function scopeDanismanlar($query){
		return $query->whereRaw('yetki = 3 and Onay = 1');
	}
	
	public function scopeAdminTumStajyerler($query){
		return $query->whereRaw('Yetki = 1 and IsletmeID != "" and Donem = "'.Auth::user()->FakulteBilgisi[0]["AktifDonem"].'"');
	}

}
