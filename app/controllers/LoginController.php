<?php

class LoginController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Login Controller | Üye Giriş Aşaması
	|--------------------------------------------------------------------------
	*/

	public function login()
	{
		if(Auth::user()){
			return Redirect::to('/');
		}else{
			return View::make('login.index');
		}
	}

	public function loginPost(){
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))

		{
		    if(Auth::user()->Yetki == "1") return Redirect::intended('/panel/ogrenci');
		   	elseif(Auth::user()->Yetki == "2") return Redirect::intended('/panel/isletme');
		   	elseif(Auth::user()->Yetki == "3") return Redirect::intended('/panel/ogretmen');
		   	elseif(Auth::user()->Yetki == "4") return Redirect::intended('/panel/yonetici');
		   	else return View::make('hata.yetki');
		}else{

			return Redirect::back()->with('mesaj','E-mail yada Şifre Yanlış');
		}
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}
	public function hakkimizda(){

		return View::make('hakkimizda');
	}

	public function AutoLogin($uniqid){
		$UniqIDBul = User::where('UniqID','=',$uniqid)->first();
		Auth::loginUsingId($UniqIDBul->id);
		return Redirect::to('/');
	}

	public function IsletmeKayit($uniqid){
		$KayitSorgula = User::where('uniqID','=',$uniqid)->where('Yetki','=','2')->first();
		if($KayitSorgula->Kayit == "1"){
			return View::make('hata.404');
		}else{
			return View::make('login.kayit',array('IsletmeBilgisi' => $KayitSorgula));
		}
	}

	public function IsletmeKabul(){
		$Kayit = User::findOrFail(Input::get('id'));
		$Kayit->Kayit = "1";
		$Kayit->email = Input::get('email');
		$Kayit->IlanSiniri = "3";
		$Kayit->password = Hash::make(Input::get('password'));
		$Kayit->save();

		return Redirect::to('login/company/'.Input::get('uniqID'));
	}

}
