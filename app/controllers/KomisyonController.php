<?php

class KomisyonController extends \BaseController {

	public function getIndex(){
		$TercihOnaySay = StajBasvuru::whereRaw('OgrenciOnay = 0 and IsletmeOnay = 1 and OgretmenOnay = 0 and AdminOnay = 0')->count();
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		$Bolumler = Bolumler::where('FakulteID','=',Auth::user()->FakulteID)->get();
		$Danismanlar = User::where('Yetki','=','3')->where('FakulteID','=',Auth::user()->FakulteID)->get();
		// $Ogrenciler = User::where('Yetki','=','1')->whereNotNull('IsletmeID')->where('Donem','=',Auth::user()->Donem)->where('FakulteID','=',Auth::user()->FakulteID)->where('DonemNotGirisi','!=','3')->orderBy('Adi')->paginate(30);
		$Ogrenciler = Notlar::where('FakulteID','=',Auth::user()->FakulteID)->where('Donem','=',Auth::user()->Donem)->whereNull('Not')->paginate(30);
		return View::make('ogretmen.komisyon.index',array('Ogrenciler' => $Ogrenciler,'TercihOnaySay' => $TercihOnaySay,'Danismanlar' => $Danismanlar, 'Mesajlar' => $Mesajlar, 'Bolumler' => $Bolumler));
	}

	public function postIndex(){
		$TercihOnaySay = StajBasvuru::whereRaw('OgrenciOnay = 0 and IsletmeOnay = 1 and OgretmenOnay = 0 and AdminOnay = 0')->count();
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		$Bolumler = Bolumler::where('FakulteID','=',Auth::user()->FakulteID)->get();
		$Danismanlar = User::where('Yetki','=','3')->where('FakulteID','=',Auth::user()->FakulteID)->get();
		$Ogrenciler = Notlar::where('FakulteID','=',Auth::user()->FakulteID)->whereNull('Not')->where('Donem','=',Auth::user()->Donem)->orderBy('id');

		if(Input::get('OgrenciNo') != ""){
			$Ogrenciler->where('OgrenciNo','=',Input::get('OgrenciNo'));
		}
		if(Input::get('Danisman') != ""){
			$Ogrenciler->where('DanismanID','=',Input::get('Danisman'));
		}
		if(Input::get('Bolum') != ""){
			$Ogrenciler->where('BolumID','=',Input::get('Bolum'));
		}
		if(Input::get('StajTuru') != ""){
			$Ogrenciler->where('StajDonemi','=',Input::get('StajTuru'));
		}

		$Ogrenciler = $Ogrenciler->get();
		return View::make('ogretmen.komisyon.arama',array('Ogrenciler' => $Ogrenciler,'TercihOnaySay' => $TercihOnaySay,'Danismanlar' => $Danismanlar, 'Mesajlar' => $Mesajlar, 'Bolumler' => $Bolumler));
	}

	public function postNotgiris(){
		// dd(Input::all());
		foreach (Input::except('OgrenciNo','Adi','Danisman','Bolum','Sinif','StajTuru') as $key => $value) {


			$InputBilgisi = explode("_", $key);
			$OgrenciID = $InputBilgisi[1];
			$OgrenciNotu = $value;
			$NotGir = Notlar::findOrFail($OgrenciID);
			$NotGir->Not = $OgrenciNotu;
			$NotGir->KomisyonID = Auth::id();
			$NotGir->save();

		}

		return Redirect::back()->with('Basarili','Not Girişleri Başarılı');
	}

	public function getNotugirilmis(){
		return "oke";
	}


}
