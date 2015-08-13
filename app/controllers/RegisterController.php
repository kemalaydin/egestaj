<?php

class RegisterController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Register Controller | Öğrenci Kayıt İşlemi 
	|--------------------------------------------------------------------------
	*/


	public function uyeol(){
		$SGK = SGKDurumlari::all();
		$Bolumler = Bolumler::orderBy('Bolum','ASC')->get();
		return View::make('sabitler.uyeol',array('Bolumler' => $Bolumler,'SGK' => $SGK));
		
	}
	
}
