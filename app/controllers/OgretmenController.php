<?php
class OgretmenController extends BaseController {

/*
	|--------------------------------------------------------------------------
	| Isletme Controller | Isletme Uyeligi Yönlendirmeler ve diğerleri
	|--------------------------------------------------------------------------
	*/



	public function index()
	{
		$EklenenIsletmeler = IsletmeKayitlari::where('DanismanID','=',Auth::id())->where('Onay','=','0')->paginate(10);
		$TercihOnaySay = StajBasvuru::whereRaw('OgrenciOnay = 0 and IsletmeOnay = 1 and OgretmenOnay = 0 and AdminOnay = 0')->count();
		$Kullanicilar = User::OnayOgrenciler()->take(5)->get();
		$Kontrol = User::ogrenciler()->take(4)->get();
		$Ilanlar = Ilan::BolumeGoreCek()->get();
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		return View::make('ogretmen.index',array('EklenenIsletmeler' => $EklenenIsletmeler, 'TercihOnaySay'=>$TercihOnaySay,'Mesajlar' => $Mesajlar,'Kullanicilar' => $Kullanicilar,'Ilanlar' =>$Ilanlar, 'Kontrol' => $Kontrol));
	}

	public function ogrencihavuz()
	{
		$Ilanlar = Ilan::BolumeGoreCek()->get();
		$Kullanicilar = User::ogrenciler()->Paginate(9);
		return View::make('ogretmen.ogrencihavuz',array('Kullanicilar' => $Kullanicilar,'Ilanlar' => $Ilanlar));
	}

	public function profil()
	{
		$TercihOnaySay = StajBasvuru::whereRaw('OgrenciOnay = 0 and IsletmeOnay = 1 and OgretmenOnay = 0 and AdminOnay = 0')->count();
		$Hesap = User::find(Auth::user()->id);
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		return View::make('ogretmen.profil',array('TercihOnaySay'=>$TercihOnaySay,'Hesap' => $Hesap,'Mesajlar' => $Mesajlar));
	}

	public function stajyerekle(){
		$TercihOnaySay = StajBasvuru::whereRaw('OgrenciOnay = 0 and IsletmeOnay = 1 and OgretmenOnay = 0 and AdminOnay = 0')->count();
		$Kullanicilar = User::ogrenciler()->get();
		$Bolumler = Bolumler::all();
		$SGK = SGKDurumlari::all();
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		return View::make('ogretmen.stajyerekle',array('TercihOnaySay'=>$TercihOnaySay,'Kullanicilar' => $Kullanicilar,'Mesajlar' => $Mesajlar,'Bolumler' => $Bolumler,'SGK' => $SGK));
	}

	public function isletmeekle(){
		$TercihOnaySay = StajBasvuru::whereRaw('OgrenciOnay = 0 and IsletmeOnay = 1 and OgretmenOnay = 0 and AdminOnay = 0')->count();
		$Kullanicilar = User::ogrenciler()->get();
		$Bolumler = Bolumler::all();
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		return View::make('ogretmen.isletmeekle',array('TercihOnaySay'=>$TercihOnaySay,'Kullanicilar' => $Kullanicilar,'Mesajlar' => $Mesajlar,'Bolumler' => $Bolumler));
	}

	public function ogrencionay(){
		$Kullanicilar = User::OnayOgrenciler()->paginate(9);
		$Mesajlar = Mesajlar::Okunmamislar()->count();
		return View::make('ogretmen.ogrencionay',array('Kullanicilar' => $Kullanicilar,'Mesajlar' => $Mesajlar));
	}

	public function onay($id){
		$OgrenciBul = User::find($id);
		$OgrenciBul->Onay = '1';
		$OgrenciBul->save();
		return Redirect::back()->with('message','Onayla İşlemi Başarıyla Yapıldı');
	}

	public function tercihler(){
		$OgrStajBilgisi=StajBasvuru::StajTercih()->Paginate(9);
		return View::make('ogretmen.ogrencitercihleri',array('OgrStajBilgisi' => $OgrStajBilgisi));
	}

	public function OgrenciTercihOnayla($id){
		$OgrBul = StajBasvuru::findOrFail($id);
		$OgrBul->OgretmenOnay = "1";
		$OgrBul->save();
		return Redirect::back()->with('message','Onayla İşlemi Başarıyla Yapıldı.');
	}

	public function danismandetay($id){
		$OgretmenBul = User::findOrFail($id);
		return View::make('danismandetay', array('OgretmenDetay' => $OgretmenBul));
	}

	public function OgrenciTercihIptal($id){
		$OgrBul = StajBasvuru::findOrFail($id);
		$OgrBul->OgretmenOnay = "2";
		$OgrBul->save();
		return Redirect::back()->with('iptalmessage','Öğrenci Tercihi İptal Edildi');
	}

	public function yonlendir(){
		$yonlendir = new StajBasvuru;
		foreach(Input::all() as $key=>$value){
			$yonlendir->$key = $value;
		}
		$yonlendir->OgretmenOnay = 1;
		$yonlendir->BasvuruTuru = 1;
		$yonlendir->save();
		return Redirect::back()->with('message','Yönlendirme İşlemi Yapıldı.');
	}
	
	public function ogrenciregister(){
		$OgrKayit = new Kullanicilar;
		foreach(Input::all() as $key=>$value){
			$OgrKayit->$key = $value;
			if($key == "password"){
				$OgrKayit->password = Hash::make(Input::get("password"));
			}
		}
		$OgrKayit->Yetki = "1";
		$OgrKayit->DanismanID = Auth::user()->id;
		$OgrKayit->save();
		return Redirect::back()->with("eklendi","Öğrenci Eklendi");

	}

	public function isletmeregister(){
		$IslKayit = new Kullanicilar;
		foreach(Input::all() as $key=>$value){
			$IslKayit->$key = $value;
			if($key == "password"){
				$IslKayit->password = Hash::make(Input::get("password"));
			}
		}
		$IslKayit->Yetki = "2";
		$IslKayit->IlanSiniri = "3";	
		$IslKayit->save();
		return Redirect::back()->with("eklendi","İşletme Eklendi");
	}

	public function profilupdate(){
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
	    $OgretmenGuncelle = User::find(Auth::user()->id);
		foreach (Input::all() as $key => $value) {
			if($key == "password"){
				if(Input::get('password') != ""){	
					if(Input::get('password') != Input::get('password2')){
						return Redirect::back()->with('Uyari','Şifreleriniz Uyuşmuyor');
					}else{
						$OgretmenGuncelle->password = Hash::make(Input::get('password'));
					}
				}
			}else if($key == "password2"){

			}else if($key == "Resim"){
				if(Input::file('Resim') != ""){
					$ImageName = 'asset/img/users/danismanlar/'.Auth::id().'-'.Auth::user()->slug.'-'.Auth::user()->uniqID.'.jpg';
					Image::make(Input::file('Resim'))->save($ImageName);
					$OgretmenGuncelle->Resim = $ImageName;
				}
			}else{

				$OgretmenGuncelle->$key = $value;
			}
		}
		$OgretmenGuncelle->slug = Str::slug(Input::get('Adi').' '.Input::get('Soyadi'));
		$OgretmenGuncelle->save();
		return Redirect::back()->with('Basarili','Güncelleme Başarılı');


	}

	public function basvurudurum(){
		$OgrBul = StajBasvuru::where('OgretmenID','=',Auth::user()->id)->paginate(12);
		return View::make('ogretmen.basvurusurec',['OgrBul' => $OgrBul]);
	}

	public function IsletmeIptal($id){
		$Kayit = IsletmeKayitlari::findOrFail($id);
		$Kayit->Onay = "2";
		$Kayit->save();
		return Redirect::back();
	}

	public function IsletmeOnay($id){

		$Kayit = IsletmeKayitlari::findOrFail($id);
		$Kayit->Onay = "1";
		if($Kayit->Kayit == "0"){
			$UniqID = str_random(10);
			$IsletmeEkle = new User;
			$IsletmeEkle->password = Hash::make($UniqID);
			$IsletmeEkle->IsletmeAdi = $Kayit->IsletmeAdi;
			$IsletmeEkle->Donem = Auth::user()->Donem;
			$IsletmeEkle->slug = Str::slug($Kayit->IsletmeAdi);
			$IsletmeEkle->Adi = $Kayit->YetkiliAdi;
			$IsletmeEkle->Soyadi = $Kayit->YetkiliSoyadi;
			$IsletmeEkle->Telefon = $Kayit->YetkiliTelefon;
			$IsletmeEkle->Adres = $Kayit->Adres;
			$IsletmeEkle->uniqID = $UniqID;
			$IsletmeEkle->email = $Kayit->email;
			$IsletmeEkle->WebSitesi = $Kayit->WebSitesi;
			$IsletmeEkle->Fax = $Kayit->Fax;
			$IsletmeEkle->Yetki = "2";
			$IsletmeEkle->Kayit = "0";
			$IsletmeEkle->Onay = "1";
			$IsletmeEkle->save();
			$Email = $Kayit->email;
			Mail::send('emails.welcome', array('UniqID' => $UniqID,'Firma' => $Kayit->IsletmeAdi,'YetkiliAdiSoyadi' => $Kayit->YetkiliAdi.' '.$Kayit->YetkiliSoyadi,'Ogrenci' => $Kayit->OgrenciBilgisi[0]["Adi"].' '.$Kayit->OgrenciBilgisi[0]["Soyadi"],'Fakulte' => 'Ege Meslek Yüksek Okulu'), function($message)  use ($Email)
			{    
			    $message->to($Email)->subject('Ege Üniversitesinden Aldığınız Stajyer Hakkında');    
			});
		}
		$IsletmeIDBul = User::where('IsletmeAdi','=',$Kayit->IsletmeAdi)->first();
		$OgrenciStajGirisi = User::findOrFail($Kayit->OgrenciID);
		$OgrenciStajGirisi->IsletmeID = $IsletmeIDBul->id;

		if($OgrenciStajGirisi->StajTuru == "2"){
			$NotAlaniAc = new Notlar;
			$NotAlaniAc->OgrenciID = $OgrenciStajGirisi->id;
			$NotAlaniAc->FakulteID = $OgrenciStajGirisi->FakulteID;
			$NotAlaniAc->Donem = $OgrenciStajGirisi->Donem;
			$NotAlaniAc->StajTuru = "2";
			$NotAlaniAc->DanismanID = $OgrenciStajGirisi->DanismanID;
			$NotAlaniAc->OgrenciNo = $OgrenciStajGirisi->OgrenciNo;
			$NotAlaniAc->BolumID = $OgrenciStajGirisi->Bolum;
			$NotAlaniAc->StajDonemi = "1";
			$NotAlaniAc->save();

			$NotAlaniAc = new Notlar;
			$NotAlaniAc->OgrenciID = $OgrenciStajGirisi->id;
			$NotAlaniAc->FakulteID = $OgrenciStajGirisi->FakulteID;
			$NotAlaniAc->Donem = $OgrenciStajGirisi->Donem;
			$NotAlaniAc->StajTuru = "2";
			$NotAlaniAc->DanismanID = $OgrenciStajGirisi->DanismanID;
			$NotAlaniAc->BolumID = $OgrenciStajGirisi->Bolum;
			$NotAlaniAc->OgrenciNo = $OgrenciStajGirisi->OgrenciNo;
			$NotAlaniAc->StajDonemi = "2";
			$NotAlaniAc->save();
		}else{
			$NotAlaniAc = new Notlar;
			$NotAlaniAc->OgrenciID = $OgrenciStajGirisi->id;
			$NotAlaniAc->FakulteID = $OgrenciStajGirisi->FakulteID;
			$NotAlaniAc->Donem = $OgrenciStajGirisi->Donem;
			$NotAlaniAc->BolumID = $OgrenciStajGirisi->Bolum;
			$NotAlaniAc->OgrenciNo = $OgrenciStajGirisi->OgrenciNo;
			$NotAlaniAc->DanismanID = $OgrenciStajGirisi->DanismanID;
			$NotAlaniAc->StajTuru = $OgrenciStajGirisi->StajTuru;
			$NotAlaniAc->StajDonemi = "1";
			$NotAlaniAc->save();
		}

		$OgrenciStajGirisi->save();
		$Kayit->save();
		return Redirect::back();


		
	}

}

?>