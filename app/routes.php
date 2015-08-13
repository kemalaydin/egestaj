<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/dumy',function(){
	return Config::get('Sabitler.OkulAdi');
});


Route::get('/', function()
{
	if(Auth::check()){
		if(Auth::user()->Yetki == "1") return Redirect::to('/panel/ogrenci');
	   	elseif(Auth::user()->Yetki == "2") return Redirect::to('/panel/isletme');
	   	elseif(Auth::user()->Yetki == "3") return Redirect::to('/panel/ogretmen');
	   	elseif(Auth::user()->Yetki == "4") return Redirect::to('/panel/yonetici');
	}else{
		$AnasayfaIsl = User::where("Yetki","=","2")->take(3)->orderBy('id','desc')->get();
		$Ilanlar = Bolumler::orderBy('Bolum','ASC')->get();
		$Duyurular = Duyuru::all();
		return View::make('layout',array('AnasayfaIsl' => $AnasayfaIsl,'Ilanlar' => $Ilanlar,'Duyurular' => $Duyurular));
	}
});
Route::post('/ogrenci-register','RegisterController@ogrencikayit');
Route::post('/isletme-register','RegisterController@isletmekayit');
Route::get('uye-ol','RegisterController@uyeol');
Route::get('/login','LoginController@login');
Route::post('/login','LoginController@loginPost');
Route::get('/logout','LoginController@logout');
Route::get('/hakkimizda','SabitController@hakkimizda');
Route::get('/ilanlar','SabitController@ilanlar');
Route::get('/ilan-kosullari','SabitController@ilanKosullari');
Route::get('layoutilan','SabitController@layoutilan');
Route::get('sss','SabitController@sss');
Route::post('ajaxQuery/StudentRegister','AjaxController@OgrenciRegister');
Route::post('ajaxQuery/CompanyRegister','AjaxController@CompanyRegister');
Route::get('login/company/{uniqid}','LoginController@AutoLogin');
Route::get('isletme-kayit/mail/{uniqid}','LoginController@IsletmeKayit');
Route::post('isletme-kabul','LoginController@IsletmeKabul');

// Üye Girişi Yapılarak Ulaşılacak Sayfalar
Route::group(array('before' => 'auth','prefix' => 'panel'), function()
{
	Route::get('/',function(){if(Auth::user()->Yetki == "1") return Redirect::to('/panel/ogrenci');
	   	elseif(Auth::user()->Yetki == "2") return Redirect::to('/panel/isletme');
	   	elseif(Auth::user()->Yetki == "3") return Redirect::to('/panel/ogretmen');
	   	elseif(Auth::user()->Yetki == "4") return Redirect::to('/panel/yonetici');});
	Route::get('/mesajlar','MesajController@index');
	Route::get('/profilduzenle',function(){ echo Auth::user()->Adi; });
	Route::resource('ilan','IlanController');
	Route::get('/isletmeprofil','IsletmeController@isletmeprofil');
	Route::get('/ogrencidetay/{id}','OgrenciController@ogrencidetay');
	Route::get('/ilan-detay/{id}','OgrenciController@ilandetay');
	Route::get('/isletmedetay/{id}','IsletmeController@isletmedetay');
	Route::get('/stajbasvuru/{id}','OgrenciController@StajBasvuru');
	Route::get('/danismandetay/{id}','OgretmenController@danismandetay');
	Route::post('/mesajgonder','MesajController@gonder');
	Route::get('mesajlar/gelen-mesajlar','MesajController@gelen');
	Route::get('mesajlar/gonderilen-mesajlar','MesajController@gonderilen');
	Route::get('mesajlar/gelenicerik/{id}','MesajController@gelenicerik');
	Route::get('mesajlar/gonderilenicerik/{id}','MesajController@gonderilenicerik');
	Route::post('/ara','SabitController@ara');
	Route::get('mesajlar/gelensil/{id}','MesajController@gelensil');

	Route::post('ajaxQuery/ilanFakulte','AjaxController@ilanFakulte');
	Route::post('ajaxQuery/ilanDonem','AjaxController@ilanDonem');
	Route::post('ajaxQuery/sirketBul','AjaxController@sirketBul');
});


//////
Route::group(array('before' => 'auth|Ogrenci','prefix' => 'panel'), function()
{
	Route::get('/ogrenci','OgrenciController@index');
	Route::get('/ogrenci/ogrenci-profil','OgrenciController@profil');
	Route::post('/ogrenci/ogrenci-profil','OgrenciController@profilDuzenle');
	Route::get('/ogrenci/ilan-detay/{id}','OgrenciController@ilandetay');
	Route::get('/ogrenci/tercihhavuz','OgrenciController@tercihhavuz');
	Route::get('/basvuru-iptal/{id}','OgrenciController@IlanIptal');
	Route::get('/ogrenci/tercih/{id}','OgrenciController@tercih');
	Route::get('/ogrenci/evraklar','OgrenciController@evraklar');
	Route::get('/ogrenci/isletme-ekle','OgrenciController@IsletmeEkle');
	Route::post('ogrenci/isletme/kayit','OgrenciController@IsletmeKayit');
});

Route::group(array('before' => 'auth|Isletme','prefix' => 'panel'), function()
{
	Route::get('/isletme','IsletmeController@index');
	Route::get('/isletme/profil','IsletmeController@profil');
	Route::post('/isletme/profil','IsletmeController@profilDuzenle');
	Route::get('/isletme/stajyerhavuz','IsletmeController@stajyerhavuz');
	Route::get('/isletme/ilanekle','IsletmeController@ilanekle');
	Route::get('/isletme/basvuruhavuz','IsletmeController@basvuruhavuz');
	Route::get('/isletme/ilanhavuz','IsletmeController@ilanhavuz');
	Route::get('/isletme/onayver/{id}','IsletmeController@onayla');
	Route::get('/isletme/iptal/{id}','IsletmeController@iptal');
	Route::get('/isletme/staj-onay/{id}','IsletmeController@stajonay');
	Route::get('/isletme/staj-iptal/{id}','IsletmeController@stajiptal');
	Route::get('/isletme/stajyerlerim','IsletmeController@stajyerlerim');
	Route::get('/isletme/danisman','IsletmeController@danisman');
	Route::post('/isletme/tercihet','IsletmeController@tercihet');
	Route::get('/isletme/danismanlar','IsletmeController@danismanlar');
	Route::get('/isletme/durumhavuz','IsletmeController@durumhavuz');

});

////////
Route::group(array('before' => 'auth|Ogretmen','prefix' => 'panel'), function()
{
	Route::get('/ogretmen','OgretmenController@index');
	Route::get('/ogretmen/ogrencihavuz','OgretmenController@ogrencihavuz');
	Route::get('/ogretmen/ogretmen-profil','OgretmenController@profil');
	Route::get('/ogretmen/stajyerekle','OgretmenController@stajyerekle');
	Route::get('/ogretmen/isletmeekle','OgretmenController@isletmeekle');
	Route::get('/ogretmen/ogrencionay','OgretmenController@ogrencionay');
	Route::get('/ogretmen/onay/{id}','OgretmenController@onay');
	Route::post('/ogretmen/yonlendir','OgretmenController@yonlendir');
	Route::get('/ogretmen/tercihler','OgretmenController@tercihler');
	Route::get('/ogretmen/ogrenci-tercih-onayla/{id}','OgretmenController@OgrenciTercihOnayla');
	Route::get('/ogretmen/ogrenci-tercih-iptal/{id}','OgretmenController@OgrenciTercihIptal');
	Route::post('/ogretmen/ogrenci-register','OgretmenController@ogrenciregister');
	Route::post('/ogretmen/isletme-register','OgretmenController@isletmeregister');
	Route::post('/ogretmen/profil-update','OgretmenController@profilupdate');
	Route::get('/ogretmen/basvurudurum','OgretmenController@basvurudurum');
	Route::get('ogretmen/basvuru-iptal/{id}','OgretmenController@IsletmeIptal');
	Route::get('ogretmen/basvuru-onay/{id}','OgretmenController@IsletmeOnay');
});

////////
Route::group(array('before' => 'auth|Yonetici','prefix' => 'panel'), function()
{
	Route::get('/yonetici','YoneticiController@index');
	Route::get('/yonetici/ogrhavuz','YoneticiController@ogrhavuz');
	Route::get('/yonetici/isletmehavuz','YoneticiController@isletmehavuz');
	Route::get('/yonetici/ogronay/{id}','YoneticiController@ogronay');
	Route::get('/yonetici/islonay/{id}','YoneticiController@islonay');
	Route::get('/yonetici/stajhavuz','YoneticiController@stajhavuz');
	Route::get('yonetici/stajyeronay/{id}','YoneticiController@stajyeronay');
	Route::get('/yonetici/stajyeriptal/{id}','YoneticiController@stajyeriptal');
	Route::get('/yonetici/ilanhavuz','YoneticiController@ilanhavuz');
	Route::get('/yonetici/ilanonay/{id}','YoneticiController@ilanonay');
	Route::get('/yonetici/ilaniptal/{id}','YoneticiController@ilaniptal');
	Route::get('/yonetici/stajyapanhavuz','YoneticiController@stajyapan');
	Route::get('/yonetici/stajdonemduzenle','YoneticiController@stajdonemduzenle');
	Route::get('/donem-sonlandirma','YoneticiController@DonemSonlandirma');
	Route::get('yonetici/ogrenci/dilekce/{id}','AdminOgrenciController@dilekce');
	
	Route::post('/donem-sonlandirma','YoneticiController@DonemSonlandirmaOnay');
	Route::post('yonetici/ogrenci/ara','AdminOgrenciController@ogrenciAra');
	Route::post('yonetici/stajyer/ara','AdminOgrenciController@stajyerAra');

	Route::resource('/yonetici/danisman','AdminDanismanController');
	Route::resource('/yonetici/ogrenci','AdminOgrenciController');
	Route::resource('/yonetici/isletme','AdminIsletmeController');
	Route::resource('/yonetici/duyuru','AdminDuyuruController');
	Route::resource('/yonetici/staj-donemleri','StajDonemiController');
});

Route::group(array('before' => 'auth|Komisyon','prefix' => 'panel/komisyon'), function(){
	Route::controller('/','KomisyonController');
});