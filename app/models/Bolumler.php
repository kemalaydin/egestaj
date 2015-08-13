<?php
class Bolumler extends Eloquent{
	protected $table="bolumler";

public function BolumBilgisi(){

		return $this -> HasMany('Fakulteler','id','FakulteID');
}
}
?>