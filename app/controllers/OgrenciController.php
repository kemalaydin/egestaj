<?php

class OgrenciController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Ogrenci Controller | Öğrenci Üyeliği Yönlendirmeler ve diğerleri
	|--------------------------------------------------------------------------
	*/

	public function index(){
		$Kullanicilar = User::Isletmeler()->get();
		$Ilanlar = Ilan::BolumeGoreCek()->take(4)->get();
		$IlanVeren = Ilan::all();
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		$StajBilgisi = StajBasvuru::StajBilgisi()->take(5)->get();
		
		return View::make('ogrenci.index',array('StajBilgisi' => $StajBilgisi ,'Mesajlar' => $Mesajlar,'Kullanicilar' => $Kullanicilar,'Ilanlar' => $Ilanlar,'IlanVeren' => $IlanVeren));
	}
	public function profil(){
		$SGK = SGKDurumlari::all();
		$BolumBilgisi = Bolumler::findOrFail(Auth::user()->Bolum);
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		return View::make('ogrenci.profil',array('Mesajlar' => $Mesajlar,'SGK' => $SGK,'Bolum' => $BolumBilgisi));
	}

	public function profilDuzenle(){

		$validator = Validator::make(
		    array(
		        'email' => Input::get('email')
		    ),
		    array(
		        'email' => 'unique:kullanicilar,email,'.Auth::id().''
		    )
		);
		 if ($validator->fails())
	    {
	        return Redirect::back()->with('Uyari','Kullanılan Bir Mail Adresi Girdiniz !');
	    }

		$OgrGuncelle = User::find(Auth::user()->id);
		foreach (Input::all() as $key => $value) {
			if($key == "password"){
				if(Input::get('password') != ""){	
					if(Input::get('password') != Input::get('password2')){
						return Redirect::back()->with('Uyari','Şifreleriniz Uyuşmuyor');
					}else{
						$OgrGuncelle->password = Hash::make(Input::get('password'));
					}
				}
			}else if($key == "password2"){

			}else if($key == "Resim"){
				if(Input::file('Resim') != ""){
					$ImageName = 'asset/img/users/ogrenciler/'.Auth::id().'-'.Auth::user()->slug.'-'.Auth::user()->uniqID.'.jpg';
					Image::make(Input::file('Resim'))->save($ImageName);
					$OgrGuncelle->Resim = $ImageName;
				}
			}else{

				$OgrGuncelle->$key = $value;
			}
		}
		$OgrGuncelle->slug = Str::slug(Input::get('Adi').' '.Input::get('Soyadi'));
		$OgrGuncelle->save();
		return Redirect::back()->with('Basarili','Güncelleme Başarılı');
	}

	// public function ilandetay($id){
	// 	$Mesajlar = Mesajlar::Okunmamislar()->count();
	// 	$Ilanlar=Ilan::findOrFail($id);
	// 	$IlanBasvuru = StajBasvuru::where('IlanID','=',$id)->count();
	// 	return View::make('ilandetay',array('Mesajlar' => $Mesajlar,'Ilanlar' => $Ilanlar,'BasvuruDurumu' => $IlanBasvuru));
	// }


	public function ogrencidetay($id){
		
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		$Kullanicilar = User::findOrFail($id);
		$Ilanlar=Ilan::where('IsletmeID','=',Auth::user()->id)->get();
		$Staj=StajBasvuru::whereRaw('OgrenciID = '.$id)->get();
		$StajSay=$Staj->count();
		return View::make('ogrencidetay',array('Mesajlar' => $Mesajlar,'Kullanicilar' => $Kullanicilar,'StajSay' => $StajSay,'Ilanlar' => $Ilanlar));
	}

	public function StajBasvuru($id){
		$Ilanlar                  = Ilan::findOrFail($id);
		$stajbasvuru              = new StajBasvuru;
		$stajbasvuru->OgrenciID   = Auth::user()->id;
		$stajbasvuru->IsletmeID   = $Ilanlar->IsletmeID;
		$stajbasvuru->OgretmenID  = Auth::user()->DanismanID;
		$stajbasvuru->IlanID      = $Ilanlar->id;
		$stajbasvuru->save();
		return Redirect::back()->with('message','Başvurunuz Başarıyla Yapıldı.');
	}
	public function tercihhavuz(){

		$StajBilgisi=stajbasvuru::StajBilgisi()->Paginate(9);
		
		return View::make('ogrenci.basvuruhavuz',array('StajBilgisi' => $StajBilgisi ));
	}

	public function IlanIptal($id){
		$IlanSil = StajBasvuru::find($id);
		$IlanSil->delete();
		return Redirect::back()->with('message','Başvurunuz Başarıyla İptal Edildi, İşletme veya Okul Onayı verilmişse bu ilan için geçersiz sayılacaktır');
	}

	public function tercih($id){
		$BasvuruBul=StajBasvuru::findOrFail($id);
		$TumTercihler=StajBasvuru::where('OgrenciID','=',$BasvuruBul->OgrenciID)->get();
		
		foreach($TumTercihler as $TercihIptal){
			$TercihIptal->OgrenciOnay = 3;
			$TercihIptal->save();
		}



		$BasvuruBul->OgrenciOnay = 1;
		$BasvuruBul->save();

		foreach($BasvuruBul->StajBasvuruIsBilgisi as $BasvuruIs){
			foreach($BasvuruBul->StajBasvuruIlanBilgisi as $BasvuruIlan){
				$Isletmesi=$BasvuruIs->IsletmeAdi;
				$Ilani=$BasvuruIlan->Baslik;
			}
		}
		return Redirect::back()->with('tercihmessage',$Isletmesi.','.$Ilani.' İlanı Tercih Edildi');
	}

	public function evraklar(){
		$Aranacak  = array("ğ","ı","Ğ","İ","ş","Ş");
		$Degisecek = array("g","i","G","I","s","S");
		$Kullanici = User::find(Auth::id());
		$BolumBilgisi = "";
		$SGKBilgisi = "";
		$HizmetBilgisi = "";
		foreach ($Kullanici->BolumBilgisi as $Bolum) {
			$BolumBilgisi = $Bolum->Bolum;
		}
		foreach ($Kullanici->SgkBilgisi as $SGKBilgi) {
			$SGKBilgisi =  $SGKBilgi->DurumAdi;
		}

		$StajyeriBilgisi = User::find(Auth::user()->IsletmeID);
		foreach ($StajyeriBilgisi->HizmetBilgisi as $Hizmet) {
			$HizmetBilgisi = $Hizmet->Bolum;
		}

		if(Auth::user()->StajTuru == "1" || Auth::user()->StajTuru == ""){
			$StajTuru = "TEK STAJ";
		}else{
			$StajTuru = "CIFT STAJ";
		}

		$data = array('OgrenciAdiSoyadi' => str_replace($Aranacak, $Degisecek,Auth::user()->Adi).' '.str_replace($Aranacak, $Degisecek,Auth::user()->Soyadi),
		 'OgrenciTelefon' => Auth::user()->Telefon,
		 'OgrenciNo' => Auth::user()->OgrenciNo ,
		 'TCNo' => Auth::user()->TCNo ,
		 'StajyeriAdi' => str_replace($Aranacak, $Degisecek,$StajyeriBilgisi->IsletmeAdi),
		 'StajyeriAdresi' =>  str_replace($Aranacak, $Degisecek,$StajyeriBilgisi->Adres),
		 'StajyeriTelefon' => $StajyeriBilgisi->Telefon,
		 'StajyeriFax' => $StajyeriBilgisi->Fax,
		 'StajyeriWeb' => $StajyeriBilgisi->WebSitesi,
		 'StajyeriVergi' => $StajyeriBilgisi->VergiNo,
		 'StajTarihAraligi' => '__/__/_____ - __/__/_____',
		 'StajyeriAlan' => $HizmetBilgisi,
		 'StajyeriGorevli' => str_replace($Aranacak, $Degisecek,$StajyeriBilgisi->Adi.' '.$StajyeriBilgisi->Soyadi),
		 'StajyeriUnvan' => str_replace($Aranacak, $Degisecek,$StajyeriBilgisi->Gorevi),
		 'StajyeriEposta' => $StajyeriBilgisi->eposta,
		 'Sgk' => $SGKBilgisi,
		 'OgrenciAlan' => $BolumBilgisi,
		 'StajTuru' => $StajTuru,
		 'Resim' => Auth::user()->Resim);
		$pdf = PDF::loadView('pdf.ogrenciBelge',$data);
		return $pdf->setPaper('a4')->download(Auth::user()->Adi.'_'.Auth::user()->Soyadi.'_StajFormu.pdf');
	}

	public function IsletmeEkle(){
		$Basvuru = IsletmeKayitlari::where('OgrenciID','=',Auth::id())->where('Donem','=',Auth::user()->Donem)->orderBy('id','DESC')->take('1')->get();
		$Kullanicilar = User::Isletmeler()->get();
		$Ilanlar = Ilan::BolumeGoreCek()->take(4)->get();
		$IlanVeren = Ilan::all();
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		$StajBilgisi = StajBasvuru::StajBilgisi()->take(5)->get();
		$Isletmeler = User::where('Yetki','=','2')->get();
		
		return View::make('ogrenci.IsletmeEkle',array('Basvuru' => $Basvuru,'Isletmeler' => $Isletmeler,'StajBilgisi' => $StajBilgisi ,'Mesajlar' => $Mesajlar,'Kullanicilar' => $Kullanicilar,'Ilanlar' => $Ilanlar,'IlanVeren' => $IlanVeren));
	
	}

	public function IsletmeKayit(){
		$Basvuru = new IsletmeKayitlari;
		foreach (Input::all() as $key => $value) {
			$Basvuru->$key = $value;
		}
		$Basvuru->OgrenciID = Auth::id();
		$Basvuru->DanismanID = Auth::user()->DanismanID;
		$Basvuru->Donem = Auth::user()->Donem;
		$Basvuru->save();
		return Redirect::back();
	}
}
