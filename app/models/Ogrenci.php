<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Ogrenci extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'Ogrenciler';

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
		return $this->HasMany('Isletmeler','id','IsletmeID');
	}

	public function DanismanBilgisi(){
		return $this->HasMany('Danismanlar','id','DanismanID');
	}

	public function SgkBilgisi(){
		return $this->HasMany('SGKDurumlari','id','SGK');
	}

	public function FakulteBilgisi(){
		return $this->HasMany('Fakulteler','id','FakulteID');
	}

}
