<?php

class SabitController extends BaseController {
	public function hakkimizda(){
		return View::make('sabitler.hakkimizda');
	}

	public function ilanKosullari(){
		return View::make('sabitler.ilan-kosullari');
	}

	public function layoutilan(){

		return View::make('layoutilan');
	}

	public function ara(){
		
		$Cek=user::AdminOgrenciler()->whereRaw('OgrenciNo ="'.Input::get('OgrenciNo').'"')->get();
		 if($Cek->Count() > 0){
		 	foreach($Cek as $Cektir){
		 	return Redirect::to('panel/ogrencidetay/'.$Cektir->id);
		 }
		 }

		 else{

		 	return Redirect::back()->with('ogryok',Input::get('OgrenciNo').' nolu Öğrenci Bulunamadı');
		 }
	}

	public function sss(){
		return View::make('sabitler.sss');
	}
	
}

